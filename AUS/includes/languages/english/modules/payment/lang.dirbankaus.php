<?php
// DIRBANKAUS based on  $Id: DIRBANKAUS.php 1970 2009-11-24 06:57:21Z CRYSTAL JONES $
// BMH (OldNGrey) 2022-10-21 lang.dirbankaus.php for zc158
//
// BMH 2022-01-24 defines line 23; 25; 56
// BMH Undefined index: customer_id @
// BMH zc158 lang file
// BMH 2023-02-02 duplicate constants defined
//

$define = [
    //'MODULE_PAYMENT_DIRBANKAUS_TEXT_TITLE' => 'Direct Bank Aus',
    //'MODULE_PAYMENT_DIRBANKAUS_TEXT_DESCRIPTION' => 'Direct Bank Transfer',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:', 
    'MODULE_PAYMENT_DIRBANKAUS_TEXT_TITLE' => 'Direct-Bank-Deposit - Australian',
    'MODULE_PAYMENT_DIRBANKAUS_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKAUS_PAYABLE' => '', 
];

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below


//if (defined('MODULE_PAYMENT_DIRBANKAUS_STATUS') && MODULE_PAYMENT_DIRBANKAUS_STATUS == 'True') {
if (defined('MODULE_PAYMENT_DIRBANKAUS_STATUS')) {
       // BMH insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKAUS_TEXT_DESCRIPTION'] = '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br><pre>' . 
        '<br>Please use the following details to transfer your total order value:<br><pre>' . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKAUS_ACCNUM .
        "\nBSB Number:   " . MODULE_PAYMENT_DIRBANKAUS_BSB . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKAUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKAUS_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' // BMH //
        ; 
        
  $define ['MODULE_PAYMENT_DIRBANKAUS_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKAUS_ACCNUM .
        "\nBSB Number:   " . MODULE_PAYMENT_DIRBANKAUS_BSB . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKAUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKAUS_BANKNAM .
        "\nSwift Code:   " . MODULE_PAYMENT_DIRBANKAUS_SWIFT . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKAUS_ADDRESS')  . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKAUS_PAYABLE') .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n" 
  ; 

    $define ['MODULE_PAYMENT_DIRBANKAUS_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKAUS_ACCNUM .
        "\nBSB Number:   " . MODULE_PAYMENT_DIRBANKAUS_BSB . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKAUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKAUS_BANKNAM .
        "\nSwift Code:   " . MODULE_PAYMENT_DIRBANKAUS_SWIFT . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKAUS_ADDRESS') . 
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKAUS_PAYABLE') .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.' 
        ;
    }
        
return $define;
?>
