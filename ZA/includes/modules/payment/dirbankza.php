<?php
/*
* Copyright (c) 2003-2024 The zen-cart developers
* Portions Copyright (c) 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* $Id: DIRBANKNZ.php 1970 2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $ modify from Auzbank of OZcommerce module by birdbrain
* @version $Id DIRBANKAUS V158 2024-02-02 BMH for zc158 zc158a PHP8.2 PHP8.3
*/

declare(strict_types = 1);

$id=isset($_SESSION['customer_id']);
$ln=ISSET($_SESSION['customer_last_name']);

class dirbankza extends base
  {
    public $code;
    public $description;                // $description is a soft name for this payment method @var string
    public $email_footer;               // $email_footer is the text to me placed in the footer of the email @var string
    public $enabled;                    // $enabled determines whether this module shows or not... in catalog.
    public $moduleVersion = '1.5.8';    // $moduleVersion is the plugin version number
    public $order_status;               // $order_status is the order status to set after processing the payment
    public $sort_order;                 // $sort_order is the order priority of this payment module when displayed
    public $title;                      // $title is the displayed name for this order total method
    public $check;                      //
    protected $_check;                  //


// class constructor
    public function __construct() {
        global $order;

        $this->code = 'dirbankza';
        $this->enabled = (defined('MODULE_PAYMENT_DIRBANKZA_STATUS') && MODULE_PAYMENT_DIRBANKZA_STATUS == 'True');
        $this->sort_order = defined('MODULE_PAYMENT_DIRBANKZA_SORT_ORDER') ? MODULE_PAYMENT_DIRBANKZA_SORT_ORDER : null;
        $this->title = MODULE_PAYMENT_DIRBANKZA_TEXT_TITLE;                      // Payment module title in Catalog
        if (IS_ADMIN_FLAG === true) {
            $this->description = '<strong>' . MODULE_PAYMENT_DIRBANKZA_TEXT_TITLE . ' ' . $this->moduleVersion . ' </strong>';
            $this->description .= '<br><br>' .  MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION;
        }

        $this->email_footer = defined('MODULE_PAYMENT_DIRBANKZA_TEXT_EMAIL_FOOTER');

        if (null === $this->sort_order) return false;

        if ((int)MODULE_PAYMENT_DIRBANKZA_ORDER_STATUS_ID > 0) {
        $this->order_status = MODULE_PAYMENT_DIRBANKZA_ORDER_STATUS_ID;
        }

        if (is_object($order)) $this->update_status();
    }

// class methods
public function update_status() {
    global $order, $db;

    if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_DIRBANKZA_ZONE > 0) && isset($order->delivery['country']['id']) ) {
        $check_flag = false;
        $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_DIRBANKZA_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
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

    function javascript_validation()
    {
      return false;
    }

    function selection()
    {
      return array('id' => $this->code,
                   'module' => $this->title);
    }

    function pre_confirmation_check()
    {
        return false;
    }

    function confirmation()
    {
        return array('title' => MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION);
    }

    function process_button()
    {
      return false;
    }

    function before_process()
    {
      return false;
    }

    function after_order_create($order_id)
    {
      $this->email_footer = sprintf(MODULE_PAYMENT_DIRBANKZA_TEXT_EMAIL_FOOTER, $order_id);
    }

    function after_process()
    {
      return false;
    }

    function get_error()
    {
      return false;
    }

    function check()
    {
        global $db;
        //global $_check;
        if (!isset($this->_check)) {
            $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_DIRBANKZA_STATUS'");
            $this->_check = $check_query->RecordCount();
        }
        return $this->_check;
    }

    public function install()
    {
    global $db;
     if (!defined('MODULE_PAYMENT_DIRBANKZA_STATUS')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Direct Bank Deposit Module', 'MODULE_PAYMENT_DIRBANKZA_STATUS', 'True', 'Do you want to accept ZA Bank Deposit payments?', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    if (!defined('MODULE_PAYMENT_DIRBANKZA_ZONE')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_DIRBANKZA_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
     if (!defined('MODULE_PAYMENT_DIRBANKZA_SORT_ORDER')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_DIRBANKZA_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
     if (!defined('MODULE_PAYMENT_DIRBANKZA_ACCNUM')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Account No.', 'MODULE_PAYMENT_DIRBANKZA_ACCNUM', '12345678', 'Bank Account No.', '6', '1', now());");
     if (!defined('MODULE_PAYMENT_DIRBANKZA_ACCNAM')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Account Name', 'MODULE_PAYMENT_DIRBANKZA_ACCNAM', 'John Bloggs', 'Bank Account Name', '6', '1', now());");
     if (!defined('MODULE_PAYMENT_DIRBANKZA_BANKNAM')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Name', 'MODULE_PAYMENT_DIRBANKZA_BANKNAM', 'The Bank', 'Bank Name', '6', '1', now());");
     if (!defined('MODULE_PAYMENT_DIRBANKZA_BANKCODE')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bank Code', 'MODULE_PAYMENT_DIRBANKZA_BANKCODE', '12345', 'Bank Code', '6', '1', now());");
     if (!defined('MODULE_PAYMENT_DIRBANKZA_ORDER_STATUS_ID')) $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_DIRBANKZA_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
   }

    public function remove()
    {
        global $db;
        $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    public function keys()
    {
        return array(
        'MODULE_PAYMENT_DIRBANKZA_STATUS',
        'MODULE_PAYMENT_DIRBANKZA_ZONE',
        'MODULE_PAYMENT_DIRBANKZA_SORT_ORDER',
        'MODULE_PAYMENT_DIRBANKZA_ACCNUM',
        'MODULE_PAYMENT_DIRBANKZA_ACCNAM',
        'MODULE_PAYMENT_DIRBANKZA_BANKNAM',
        'MODULE_PAYMENT_DIRBANKZA_BANKCODE',
        'MODULE_PAYMENT_DIRBANKZA_ORDER_STATUS_ID',
        );
    }
  }
