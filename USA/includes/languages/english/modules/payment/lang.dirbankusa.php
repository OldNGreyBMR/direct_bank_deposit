<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: DIRBANKUSA.php 1970 2009-11-24 06:57:21Z CRYSTAL JONES $
//
// BMH)OldNGrey) 2023-02-05 zc158 lang file

$define = [
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_TITLE' => 'Direct Bank USA',
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION' => 'Direct Bank Transfer',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:', 
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_TITLE' => 'Direct-Bank-Deposit - USA',
    'MODULE_PAYMENT_DIRBANKUSA_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKUSA_PAYABLE' => '', 
];
$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below


if (defined('MODULE_PAYMENT_DIRBANKUSA_STATUS')) {
       // BMH insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION'] = '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br><pre>' . 
        '<br>Please use the following details to transfer your total order value:<br><pre>' . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' // BMH //
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

    $define ['MODULE_PAYMENT_DIRBANKUSA_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKUSA_ADDRESS') . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKUSA_PAYABLE') .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.' 
        ;
    }
        
return $define;
//
//
//+++++++++++++++++++++++++
//  define('MODULE_PAYMENT_DIRBANKUSA_TEXT_EMAIL_FOOTER', 
//  "Please use the following details to transfer your total order value:\n\n" .
//  "\nAccount No.:   " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
//  "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING . 
//  "\nAccount Name:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
//  "\nBank Name:     " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
//  "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n");
//
//  define('MODULE_PAYMENT_DIRBANKUSA_TEXT_TITLE', 'Direct Bank Deposit - USA');
//   define('MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION', 
//  '<BR>Please use the following details to transfer your total order value:<br><pre>' . 
//  "\nAccount No.:    " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
//  "\nRouting Number: " . MODULE_PAYMENT_DIRBANKUSA_ROUTING . 
//  "\nAccount Name:   " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
//  "\nBank Name:      " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
//  '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.');
