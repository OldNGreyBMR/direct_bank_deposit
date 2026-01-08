<?php
// DIRBANKZA based on  $Id: DIRBANKNZA.php 1970 2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $
// BMH (OldNGrey) v2.1.2 2025-12-20 lang.dirbankza.php for zc220 PHP 8.2 to PHP 8.4
// V2.1.2 2026-01-06

$define = [
    'MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION' => 'Direct Bank Transfer - ZA',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKZA_TEXT_TITLE' => 'Direct Bank Deposit - Sth Africa',
  //  'MODULE_PAYMENT_DIRBANKZA_ADDRESS' => '',
  //  'MODULE_PAYMENT_DIRBANKZA_PAYABLE' => '',
];

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

if (defined('MODULE_PAYMENT_DIRBANKZA_STATUS') &&
        (defined('MODULE_PAYMENT_DIRBANKZA_STATUS') == 'True') ) {          //  insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION'] = 'Banking and Address details will also be sent to your email once the order is confirmed.<br>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
		"\nAccount Name:  " . MODULE_PAYMENT_DIRBANKZA_ACCNAM .  
		"\nAccount No.:   " . MODULE_PAYMENT_DIRBANKZA_ACCNUM . 
        "\nBank Name:     " . MODULE_PAYMENT_DIRBANKZA_BANKNAM . 
        "\nBranch Code:   " . MODULE_PAYMENT_DIRBANKZA_BANKCODE . 
        "\nReference:      " . $ln ."-" . $id . "-%s" .
        '<p>Thanks for your order which will ship immediately <br>once we receive payment in the above account. </pre>' // BMH //
        ;

  $define ['MODULE_PAYMENT_DIRBANKZA_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n" .
		"\nAccount Name:  " . MODULE_PAYMENT_DIRBANKZA_ACCNAM .  
		"\nAccount No.:   " . MODULE_PAYMENT_DIRBANKZA_ACCNUM . 
        "\nBank Name:     " . MODULE_PAYMENT_DIRBANKZA_BANKNAM . 
        "\nBranch Code:   " . MODULE_PAYMENT_DIRBANKZA_BANKCODE . 
         "\nReference:     " . $ln ."-" . $id . "-%s" .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
  ;

    $define ['MODULE_PAYMENT_DIRBANKZA_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br><em>' .
		"\nAccount Name:  " . MODULE_PAYMENT_DIRBANKZA_ACCNAM .  
		"\nAccount No.:   " . MODULE_PAYMENT_DIRBANKZA_ACCNUM . 
        "\nBank Name:     " . MODULE_PAYMENT_DIRBANKZA_BANKNAM . 
        "\nBranch Code:   " . MODULE_PAYMENT_DIRBANKZA_BANKCODE . 
        "\nReference:      " . $ln ."-" . $id . "-%s" .
        '</em><p>Thanks for your order which will ship immediately once we receive payment in the above account.'
        ;
    }else {
        $define['MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION'] = '<br>Setup DirbankZA';
        $define['MODULE_PAYMENT_DIRBANKZA_TEXT_EMAIL_FOOTER'] = 'Please Setup DirbankZA';
        $define['MODULE_PAYMENT_DIRBANKZA_HTML_EMAIL_FOOTER']  = '<br>Please Setup DirbankZA';
}

return $define;
