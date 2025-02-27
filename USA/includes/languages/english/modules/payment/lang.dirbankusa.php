<?php
// Copyright (c) 2024-2025 The zen-cart developers                           |
// BMH (OldNGrey) v2.1.1 2025-02-26 lang.dirbankusa.php for zc158a to zc210 PHP8.2 to PHP8.4
//

$define = [
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION' => 'Direct Bank Transfer USA',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:', 
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_TITLE' => 'Direct-Bank-Deposit - USA',
    'MODULE_PAYMENT_DIRBANKUSA_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKUSA_PAYABLE' => '', 
];
$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below


if (defined('MODULE_PAYMENT_DIRBANKUSA_STATUS') && 
    (defined('MODULE_PAYMENT_DIRBANKUSA_STATUS') == 'True') ) {
       //  insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION'] = 'Banking and Address details will also be sent to your email once the order is confirmed.<br>' . 
        '<br>Please use the following details to transfer your total order value:<br><pre>' . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '<p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' 
        ; 
        
  $define ['MODULE_PAYMENT_DIRBANKUSA_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKUSA_ADDRESS')  . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKUSA_PAYABLE') .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n" 
  ; 

    $define ['MODULE_PAYMENT_DIRBANKUSA_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKUSA_ADDRESS') . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKUSA_PAYABLE') .
        '<p>Thanks for your order which will ship immediately once we receive payment in the above account.' 
        ;
    }else {
        $define['MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION'] = '<br>Setup DirbankUSA';
        $define['MODULE_PAYMENT_DIRBANKUSA_TEXT_EMAIL_FOOTER'] = 'Please Setup DirbankUSA';
        $define['MODULE_PAYMENT_DIRBANKUSA_HTML_EMAIL_FOOTER']  = '<br>Please Setup DirbankUSA';
    }
return $define;
