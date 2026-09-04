<?php
/**
 * Direct Bank Deposit - UK (dirbankuk) : One-Page Checkout (OPC) integration.
 *
 * BMH (OldNGrey) V2.1.3 2026-08-25, for Zen Cart v2.2.x / OPC v2.4+ (v2.7.0 tested)
 *
 * On the "normal" 3-page checkout, the bank-account details are displayed on
 * checkout_confirmation (page 3 of 3) via the module's confirmation() method.  The OPC's
 * checkout_one page replaces that page, so the details would otherwise never be seen.
 *
 * This observer hooks NOTIFY_HEADER_START_CHECKOUT_ONE which is fired at the very top of
 * /includes/modules/pages/checkout_one/header_php.php -- i.e. BEFORE that page processes
 * its language files (/includes/languages/.../lang.checkout_one.php).  Because the
 * ArraysLanguageLoader::makeConstants() method skips any constant that has already been
 * defined, defining TEXT_CHECKOUT_ONE_INSTRUCTIONS here "wins" and its value is what the
 * tpl_modules_opc_instructions.php template displays in the "Bottom instructions" box.
 *
 * Any store-customized value of TEXT_CHECKOUT_ONE_INSTRUCTIONS found in the store's
 * lang.checkout_one.php files is preserved and the bank details are appended to it.
 * (The stock placeholder value 'Bottom instructions' is discarded.)
 *
 * The appended block contains a small jQuery snippet so that the details are shown only
 * while the customer has the dirbankuk payment-method radio selected; choosing another
 * payment method hides them again without a page reload.
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

class dirbankuk_opc_observer extends base
{
    protected string $module_code = 'dirbankuk';

    public function __construct()
    {
        $this->attach($this, ['NOTIFY_HEADER_START_CHECKOUT_ONE']);
    }

    public function update(&$callingClass, $notifier, $paramsArray = [])
    {
        if ($notifier === 'NOTIFY_HEADER_START_CHECKOUT_ONE') {
            $this->defineOpcBottomInstructions();
        }
    }

    // -----
    // Define the OPC page's "bottom instructions", if this module applies to the current
    // order/customer.  zen_define_default() is used as an extra guard in case some other
    // observer got there first.
    //
    protected function defineOpcBottomInstructions(): void
    {
        // -----
        // Proceed only when the One-Page Checkout is actually running for this request;
        // $checkout_one is OPC's own observer instance (created by OPC's autoloader).
        //
        global $checkout_one;
        if (!isset($checkout_one) || !is_object($checkout_one) || !$checkout_one->isEnabled()) {
            return;
        }

        // ----- Only when this payment module is enabled ...
        //
        if ((string)zen_config('MODULE_PAYMENT_DIRBANKUK_STATUS', 'False') !== 'True') {
            return;
        }

        // ----- ... not for virtual-only orders (the module disables itself for those) ...
        //
        if ($_SESSION['cart']->get_content_type() === 'virtual') {
            return;
        }

        // ----- ... and only when the module's payment-zone allows the delivery address.
        //
        if ($this->zoneAllows() === false) {
            return;
        }

        $details = $this->buildDetailsHtml();
        if ($details === '') {
            return;
        }

        zen_define_default('TEXT_CHECKOUT_ONE_INSTRUCTIONS', $this->getBaseInstructions() . $details);
    }

    // -----
    // Mirror the module's update_status() zone-restriction processing, based on the
    // currently-selected shipping address.  If the check cannot be performed (e.g. a
    // guest-checkout's temporary address), remain permissive; the payment-module itself
    // performs the authoritative check later in the checkout flow.
    //
    protected function zoneAllows(): bool
    {
        $geo_zone = (int)zen_config('MODULE_PAYMENT_DIRBANKUK_ZONE', 0);
        if ($geo_zone <= 0) {
            return true;
        }

        $address_id  = (int)($_SESSION['sendto'] ?? 0);
        $customer_id = (int)($_SESSION['customer_id'] ?? 0);
        if ($address_id <= 0 || $customer_id <= 0) {
            return true;
        }

        global $db;
        $addr = $db->Execute(
            "SELECT entry_country_id, entry_zone_id
               FROM " . TABLE_ADDRESS_BOOK . "
              WHERE address_book_id = " . $address_id . "
                AND customers_id = " . $customer_id . "
              LIMIT 1"
        );
        if ($addr->EOF) {
            return true;
        }

        $check = $db->Execute(
            "SELECT zone_id
               FROM " . TABLE_ZONES_TO_GEO_ZONES . "
              WHERE geo_zone_id = " . $geo_zone . "
                AND zone_country_id = " . (int)$addr->fields['entry_country_id'] . "
              ORDER BY zone_id"
        );
        if ($check->EOF) {
            return false;
        }
        while (!$check->EOF) {
            if ((int)$check->fields['zone_id'] < 1 || (int)$check->fields['zone_id'] === (int)$addr->fields['entry_zone_id']) {
                return true;
            }
            $check->MoveNext();
        }
        return false;
    }

    // -----
    // Build the bank-details block.  Uses phrasing-level HTML only (<span>, <br>, <strong>)
    // since the template wraps the constant's value inside a <p>...</p> element.
    //
    protected function buildDetailsHtml(): string
    {
        $accnum   = htmlspecialchars((string)zen_config('MODULE_PAYMENT_DIRBANKUK_ACCNUM', ''), ENT_QUOTES);
        $sortcode = htmlspecialchars((string)zen_config('MODULE_PAYMENT_DIRBANKUK_SORTCODE', ''), ENT_QUOTES);
        $accnam   = htmlspecialchars((string)zen_config('MODULE_PAYMENT_DIRBANKUK_ACCNAM', ''), ENT_QUOTES);
        $banknam  = htmlspecialchars((string)zen_config('MODULE_PAYMENT_DIRBANKUK_BANKNAM', ''), ENT_QUOTES);
        $swift    = htmlspecialchars((string)zen_config('MODULE_PAYMENT_DIRBANKUK_SWIFT', ''), ENT_QUOTES);
        $iban     = htmlspecialchars((string)zen_config('MODULE_PAYMENT_DIRBANKUK_IBAN', ''), ENT_QUOTES);
        if ($accnum === '' && $sortcode === '') {
            return '';
        }

        $title = defined('MODULE_PAYMENT_DIRBANKUK_TEXT_TITLE') ? MODULE_PAYMENT_DIRBANKUK_TEXT_TITLE : 'Direct Bank Deposit';

        // Pre-show the block only if dirbankuk was previously selected (page re-entry).
        $display = (($_SESSION['payment'] ?? '') === $this->module_code) ? 'block' : 'none';

        $html  = '<span id="dbuk-opc-bank-details" style="display:' . $display . ';margin-top:0.5rem;">';
        $html .= '<strong>' . htmlspecialchars($title, ENT_QUOTES) . '</strong><br>';
        $html .= 'Please transfer your total order value to:<br>';
        $html .= '<span style="display:inline-block;margin-left:1rem;">';
        $html .= 'Account No.: ' . $accnum . '<br>';
        $html .= 'Sort Code: ' . $sortcode . '<br>';
        $html .= 'Account Name: ' . $accnam . '<br>';
        $html .= 'Bank Name: ' . $banknam . '<br>';
        $html .= 'Reference: Please use Order Number as reference<br>';
        if ($swift !== '') {
            $html .= 'Swift/BIC Code: ' . $swift . '<br>';
        }
        if ($iban !== '') {
            $html .= 'IBAN Number: ' . $iban . '<br>';
        }
        $html .= '</span>';
        $html .= 'These details are also included in your order-confirmation email.';
        $html .= '</span>';

        // -----
        // Toggle visibility whenever a payment-method radio changes on the OPC page.
        //
        $html .= '<script>';
        $html .= 'if (window.jQuery) {';
        $html .= 'jQuery(function($){';
        $html .= 'var box=$("#dbuk-opc-bank-details");';
        $html .= 'var toggle=function(){var show=false;';
        $html .= '$("input[name=\\"payment\\"]").each(function(){if(this.value==="' . $this->module_code . '"&&this.checked){show=true;}});';
        $html .= 'box.toggle(show);};';
        $html .= 'toggle();';
        $html .= '$(document).on("change","input[name=\\"payment\\"]",toggle);';
        $html .= '});}';
        $html .= '</script>';

        return $html;
    }

    // -----
    // Gather whatever value the store gives TEXT_CHECKOUT_ONE_INSTRUCTIONS via its own
    // lang.checkout_one.php files (base language, session language and template overrides)
    // so that any customised message is kept and the bank details are simply appended.
    // The stock placeholder text is dropped.
    //
    protected function getBaseInstructions(): string
    {
        global $template_dir;

        $langRoot = DIR_FS_CATALOG . DIR_WS_LANGUAGES;
        $language = ($_SESSION['language'] ?? 'english');
        $tpl      = ($template_dir ?? '');

        $candidates = [
            $langRoot . 'english/lang.checkout_one.php',
            $langRoot . $language . '/lang.checkout_one.php',
            $langRoot . 'english/' . $tpl . '/lang.checkout_one.php',
            $langRoot . $language . '/' . $tpl . '/lang.checkout_one.php',
        ];

        $defines = [];
        $loaded  = [];
        foreach ($candidates as $file) {
            if ($file === '' || isset($loaded[$file]) || !is_file($file)) {
                continue;
            }
            $loaded[$file] = true;
            $defines = array_merge($defines, require $file);
        }

        $base = trim((string)($defines['TEXT_CHECKOUT_ONE_INSTRUCTIONS'] ?? ''));
        return ($base !== '' && strcasecmp($base, 'bottom instructions') !== 0) ? $base : '';
    }
}
