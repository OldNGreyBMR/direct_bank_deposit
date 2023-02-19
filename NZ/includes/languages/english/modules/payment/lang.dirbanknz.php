<?php
// DIRBANKNZ based on  $Id: DIRBANKNZ.php 1970 2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $
// BMH (OldNGrey) 2023-02-19 lang.dirbanknz.php for zc158
//                changes based on working version of DIRBANKAUS
// DIRBANKNZ V1.5.5 2023-02-19

$define = [
    'MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION' => 'Direct Bank Transfer',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKNZ_TEXT_TITLE' => 'Direct-Bank-Deposit - New Zealand',
    'MODULE_PAYMENT_DIRBANKNZ_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKNZ_PAYABLE' => '',
];

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

if (defined('MODULE_PAYMENT_DIRBANKNZ_STATUS')) {
       // BMH insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION'] = '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br><pre>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM .
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' 
        ;

  $define ['MODULE_PAYMENT_DIRBANKNZ_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM .
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKNZ_ADDRESS')  .
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKNZ_PAYABLE') .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
  ;

    $define ['MODULE_PAYMENT_DIRBANKNZ_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM .
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM .
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKNZ_ADDRESS') .
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKNZ_PAYABLE') .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.'
        ;
    }

return $define;

