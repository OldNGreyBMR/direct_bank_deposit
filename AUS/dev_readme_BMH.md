2026-08-25
----------
#dirbankaus to integrate with OPC
## Query: using zen cart v2.2.2 and using the plugin module dirbankaus for payment, the bank account details are displayed on "page 3 of 3 - order confirmation" during the normal order check out process. When I use One Page Checkout (OPC) the back account details are not displayed on the screen.
How can I enhance the dirbankaus payment plugin to detect when OPC is used an display the bank account details in the "bottom instructions" box of the OPC checkout page?
## REsult
The OPC "Bottom instructions" box comes from TEXT_CHECKOUT_ONE_INSTRUCTIONS. Now let me look at how OPC builds that box and where a payment module could inject its details.

The instructions box is a plain constant rendered by the template. Let me check whether OPC ships any observer/hook intended for payment-module instructions before deciding the integration point.

No built-in hook feeds that box, so the plugin must supply it. Before designing the fix I need to verify how Zen Cart 2.x defines language constants (whether an early define() wins silently or errors), since that determines the integration point.

The loader (makeConstants) silently skips keys already defined — so an observer that pre-defines TEXT_CHECKOUT_ONE_INSTRUCTIONS before require_languages.php runs will win cleanly. Now let me confirm how OPC registers its own observers (autoloader pattern) so the plugin can do the same.

All integration points confirmed. Quick verification of two helpers before writing the code:

Everything's confirmed. Now I'll add the two new files to the plugin (no core/OPC/template edits needed):

An autoloader registration file (catalog/includes/auto_loaders/config.dirbankaus_opc.php)
The observer class that pre-defines TEXT_CHECKOUT_ONE_INSTRUCTIONS on the checkout_one page
Both files lint clean and all integration points are verified. Done — the enhancement is two new files inside the plugin; nothing in OPC, templates, or core was touched.

What was added
In public\zc_plugins\DirectBankDepositAU\V2.1.2a\catalog\includes\:

auto_loaders\config.dirbankaus_opc.php — registers the observer at checkpoint 98 (after OPC's own observer creates the $checkout_one global at CP-97). Zen Cart's InitSystem::loadPluginAutoLoaders() picks this up automatically from installed plugins — no reinstall/copying needed.
classes\observers\class.dirbankaus_opc_observer.php — the actual integration.
How it works
OPC detection: hooks NOTIFY_HEADER_START_CHECKOUT_ONE, fired at the top of checkout_one/header_php.php:10. It only proceeds when $checkout_one->isEnabled() is true, i.e. the one-page checkout is actually running.
Injection point: it fires before require_languages.php (header_php.php:22) loads lang.checkout_one.php, and Zen Cart's ArraysLanguageLoader::makeConstants() skips already-defined constants — so pre-defining TEXT_CHECKOUT_ONE_INSTRUCTIONS wins cleanly. Any store-customised instruction text is captured from your lang files first and preserved; only the stock 'Bottom instructions' placeholder is dropped.
Applicability guards: module enabled via zen_config(), cart not virtual-only, and the payment-zone check mirroring the module's own update_status().
Dynamic display: the appended block contains a small jQuery snippet that shows the bank details only while the dirbankaus radio is selected (and hides them when another method is chosen) — no reload needed. If $_SESSION['payment'] is already dirbankaus on page entry, it renders pre-shown.
The normal 3-page flow (details on page 3 of 3) is untouched, and the emailed footer still contains the real Surname-ID-<order#> reference after after_order_create() runs.
To test
Add an item to the cart and go through checkout with OPC enabled → select Direct Bank Deposit → the "Bottom instructions" card should show BSB/account details; switching to another payment method should hide them.
Re-run the same cart through "alternate" checkout (&opctype=jserr) to confirm page 3 still shows the original confirmation text.