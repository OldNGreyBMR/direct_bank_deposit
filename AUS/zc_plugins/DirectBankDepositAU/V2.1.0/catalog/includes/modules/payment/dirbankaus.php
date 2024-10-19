<?php
/*
* Copyright (c) 2003-2024 The zen-cart developers
*  Portions Copyright (c) 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* $Id: DIRBANKAUS.php 1106 2009-11-24 22:05:35Z CRYSTAL JONES $ modify from Auzbank of OZcommerce module by birdbrain
* @version $Id V2.1.0 DIRBANKAUS 22024-10-17  BMH (OldNGrey) for zc158 zc158a zc200 ZC 201 zC 210 PHP8.2 PHP8.3
*/

declare(strict_types = 1);
if (!defined('VERSION_AUS')) { define('VERSION_AUS', '2.1.0');}

// check which zc version and preload language files if required. Language files may be required if this module is called directly eg from edit _orders

if (!defined('MODULE_PAYMENT_DIRBANKAUS_TEXT_TITLE')) {
    $filename = "dirbankaus.php";
    $folder = "/modules/payment/";  // end with slash
    $old_langfile = DIR_FS_CATALOG . DIR_WS_LANGUAGES . $_SESSION['language'] . $folder .  $filename;
    $new_langfile = DIR_FS_CATALOG . DIR_WS_LANGUAGES . $_SESSION['language'] . $folder .  "lang." . $filename;

    if (file_exists($new_langfile)) {
        global $languageLoader;
        $languageLoader->loadExtraLanguageFiles(DIR_FS_CATALOG . DIR_WS_LANGUAGES,  $_SESSION['language'], $folder . 'lang.'.$filename);

    } else if (file_exists($old_langfile)) {
        $tpl_old_langfile = DIR_WS_LANGUAGES . $_SESSION['language'] . $folder .  $template_dir . '/' . $filename;
        if (file_exists($tpl_old_langfile)) {
            $old_langfile = $tpl_old_langfile;
        }
        include_once ($old_langfile);
    }
}

$id=isset($_SESSION['customer_id']);            //
$ln=ISSET($_SESSION['customer_last_name']);     //

class dirbankaus {
    public $code;
    public $description;        // $description is a soft name for this payment method @var string
    public $email_footer;       //$email_footer is the text to me placed in the footer of the email @var string
    public $enabled;            //
    public $order_status;       // $order_status is the order status to set after processing the payment
    public $sort_order;         // $sort_order is the order priority of this payment module when displayed
    public $title;              // $title is the displayed name for this order total method
    public $check;              //
    public $_check;             //


// class constructor
    function __construct() {
      global $order;

      $this->code = 'dirbankaus';
      $this->title = MODULE_PAYMENT_DIRBANKAUS_TEXT_TITLE;
      $this->description = 'V' . VERSION_AUS . ' ' . MODULE_PAYMENT_DIRBANKAUS_TEXT_DESCRIPTION; // show version in admin panel
      $this->email_footer = defined('MODULE_PAYMENT_DIRBANKAUS_TEXT_EMAIL_FOOTER');
      $this->sort_order = defined('MODULE_PAYMENT_DIRBANKAUS_SORT_ORDER') ? MODULE_PAYMENT_DIRBANKAUS_SORT_ORDER : null;
      $this->enabled = (defined('MODULE_PAYMENT_DIRBANKAUS_STATUS') && MODULE_PAYMENT_DIRBANKAUS_STATUS == 'True');

      if (null === $this->sort_order) return false;

      if ((int)MODULE_PAYMENT_DIRBANKAUS_ORDER_STATUS_ID > 0) {
        $this->order_status = MODULE_PAYMENT_DIRBANKAUS_ORDER_STATUS_ID;
      }

      if (is_object($order)) $this->update_status();
    }

// class methods
    function update_status() {
      global $order, $db;

      if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_DIRBANKAUS_ZONE > 0) && isset($order->delivery['country']['id']) ) {
        $check_flag = false;
        $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_DIRBANKAUS_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
        while (!$check->EOF) {
          if ($check->fields['zone_id'] < 1) {
            $check_flag = true;
            break;
          } elseif ($check->fields['zone_id'] == $order->delivery['zone_id']) {
            $check_flag = true;
            break;
          }
          $check->MoveNext();
        }

        if ($check_flag == false) {
          $this->enabled = false;
        }
      }
// disable the module if the order only contains virtual products
      if ($this->enabled == true) {
        if ($order->content_type == 'virtual') {
          $this->enabled = false;
        }
      }
    }

    function javascript_validation() {
      return false;
    }

    function selection() {
      return array('id' => $this->code,
                   'module' => $this->title);
    }

    function pre_confirmation_check() {
      return false;
    }

    function confirmation() {
      return array('title' => MODULE_PAYMENT_DIRBANKAUS_TEXT_DESCRIPTION);
    }

    function process_button() {
      return false;
    }

    function before_process() {
      return false;
    }

    function after_order_create($order_id) {
      $this->email_footer = sprintf(MODULE_PAYMENT_DIRBANKAUS_TEXT_EMAIL_FOOTER, $order_id);
    }

    function after_process() {
      return false;
    }

    function get_error() {
      return false;
    }

    function check() {
        global $db;
        global $_check;
        if (!isset($this->_check)) {
            $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_DIRBANKAUS_STATUS'");
            $this->_check = $check_query->RecordCount();
        }
        return $this->_check;
    }

    function install() {
      global $db;
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Direct Bank Deposit/Cheque Module', 'MODULE_PAYMENT_DIRBANKAUS_STATUS', 'True', 'Do you want to accept Australian Bank Deposit payments, cheques and money orders?', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_DIRBANKAUS_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_DIRBANKAUS_SORT_ORDER', '10', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('BSB Number', 'MODULE_PAYMENT_DIRBANKAUS_BSB', '123-456', 'BSB Number in the format 000-000', '6', '1', now());");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Account No.', 'MODULE_PAYMENT_DIRBANKAUS_ACCNUM', '12345678', 'Bank Account No.', '6', '1', now());");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Swift Code.', 'MODULE_PAYMENT_DIRBANKAUS_SWIFT', '12345678', 'Swift Code.', '6', '1', now());");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Account Name', 'MODULE_PAYMENT_DIRBANKAUS_ACCNAM', 'Account Name', 'Bank Account Name', '6', '1', now());");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Name', 'MODULE_PAYMENT_DIRBANKAUS_BANKNAM', ' Your Bank Name', 'Bank Name', '6', '1', now());");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_DIRBANKAUS_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Address', 'MODULE_PAYMENT_DIRBANKAUS_ADDRESS', '44 Australia St. Brisbane 4000','Address to send cheques/money orders.','6','1',now());");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Payable', 'MODULE_PAYMENT_DIRBANKAUS_PAYABLE', 'Your Store Name','Cheques/Money Orders Payable to:','6','1',now());");
    }

    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
        return array('MODULE_PAYMENT_DIRBANKAUS_STATUS', 'MODULE_PAYMENT_DIRBANKAUS_ZONE', 'MODULE_PAYMENT_DIRBANKAUS_SORT_ORDER', 'MODULE_PAYMENT_DIRBANKAUS_BSB', 'MODULE_PAYMENT_DIRBANKAUS_ACCNUM', 'MODULE_PAYMENT_DIRBANKAUS_ACCNAM', 'MODULE_PAYMENT_DIRBANKAUS_SWIFT', 'MODULE_PAYMENT_DIRBANKAUS_BANKNAM', 'MODULE_PAYMENT_DIRBANKAUS_ORDER_STATUS_ID' , 'MODULE_PAYMENT_DIRBANKAUS_ADDRESS', 'MODULE_PAYMENT_DIRBANKAUS_PAYABLE');
    }
  } // eof class
