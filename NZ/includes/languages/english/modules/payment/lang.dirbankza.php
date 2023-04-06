<?php
// DIRBANKNZ based on  $Id: DIRBANKNZZ.php 1970 2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $
// v1.5.5.01 $Id: lang.dirbank.php OldNGrey (BMH)) 2023-03-26 lang.dirbanknz.php for zc158
// 2023-03-26 removed cheques and moneyorders
// 2023-03-30 sdk change order, added bank/branch, make za version

$define = [
    //'MODULE_PAYMENT_DIRBANKZA_TEXT_TITLE' => 'Direct Bank EFT',
    'MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION' => 'Direct Bank Transfer',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKZA_TEXT_TITLE' => 'Direct Bank EFT',
    'MODULE_PAYMENT_DIRBANKZA_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKZA_PAYABLE' => '',
];

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below


//if (defined('MODULE_PAYMENT_DIRBANKZA_STATUS') && MODULE_PAYMENT_DIRBANKZA_STATUS == 'True') {
if (defined('MODULE_PAYMENT_DIRBANKZA_STATUS')) {
       // BMH insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION'] = '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
		"\nAccount Name:  " . MODULE_PAYMENT_DIRBANKZA_ACCNAM . 
		"\nAccount No.:   " . MODULE_PAYMENT_DIRBANKZA_ACCNUM .
        "\nBank Name:     " . MODULE_PAYMENT_DIRBANKZA_BANKNAM .
        "\nBranch Code:   " . MODULE_PAYMENT_DIRBANKZA_BANKCODE .
        "\nReference:      " . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' // BMH //
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
    }

return $define;
?>
