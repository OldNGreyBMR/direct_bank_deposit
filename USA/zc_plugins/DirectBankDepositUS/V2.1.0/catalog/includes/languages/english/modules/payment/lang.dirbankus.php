<?php
//
// | Copyright (c) 2024 The zen-cart developers                           |
// BMH (OldNGrey) 2024-10-14 lang.dirbankusa.php for zc210
// $Id: lang.dirbankusa.php $
//

$define = [
    'MODULE_PAYMENT_DIRBANKUS_TEXT_DESCRIPTION' => 'Direct Bank Transfer US',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:', 
    'MODULE_PAYMENT_DIRBANKUS_TEXT_TITLE' => 'Direct-Bank-Deposit - US',
    'MODULE_PAYMENT_DIRBANKUS_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKUS_PAYABLE' => '', 
];
$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below


if (defined('MODULE_PAYMENT_DIRBANKUS_STATUS')) {
       //  insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKUS_TEXT_DESCRIPTION'] = '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br>' . 
        '<br>Please use the following details to transfer your total order value:<br><pre>' . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUS_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUS_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUS_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '<p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' 
        ; 
        
  $define ['MODULE_PAYMENT_DIRBANKUS_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUS_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUS_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUS_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKUS_ADDRESS')  . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKUS_PAYABLE') .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n" 
  ; 

    $define ['MODULE_PAYMENT_DIRBANKUS_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUS_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUS_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUS_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKUS_ADDRESS') . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKUS_PAYABLE') .
        '<p>Thanks for your order which will ship immediately once we receive payment in the above account.' 
        ;
    }
return $define;
