<?php
// DIRBANKNZ based on  $Id: DIRBANKNZ.php 1970 2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $
// BMH (OldNGrey) v2.1.2 2025-12-20  lang.dirbanknz.php for zc220 PHP 8.2 to PHP 8.4
// V2.1.2

$define = [
    'MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION' => 'Direct Bank Transfer NZ',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKNZ_TEXT_TITLE' => 'Direct-Bank-Deposit - New Zealand',
    'MODULE_PAYMENT_DIRBANKNZ_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKNZ_PAYABLE' => '',
];

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

if (defined('MODULE_PAYMENT_DIRBANKNZ_STATUS') &&
        (defined('MODULE_PAYMENT_DIRBANKNZ_STATUS') == 'True')) {            //  insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION'] = 'Banking and Address details will also be sent to your email once the order is confirmed.<br>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nBranch No.:"    . MODULE_PAYMENT_DIRBANKNZ_BRANCHNUM . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '<p>Thanks for your order which will ship immediately <br>once we receive payment in the above account. </pre>' // BMH //
        ;

  $define ['MODULE_PAYMENT_DIRBANKNZ_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nBranch Number:" . MODULE_PAYMENT_DIRBANKNZ_BRANCHNUM . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
  ;

    $define ['MODULE_PAYMENT_DIRBANKNZ_HTML_EMAIL_FOOTER'] = 'Please use the following details to transfer your total order value:<br><pre>' .
        "\nBranch Number:" . MODULE_PAYMENT_DIRBANKNZ_BRANCHNUM . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.'
        ;
    }else {
        $define['MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION'] = '<br>Setup DirbankNZ';
        $define['MODULE_PAYMENT_DIRBANKNZ_TEXT_EMAIL_FOOTER'] = 'Please Setup DirbankNZ';
        $define['MODULE_PAYMENT_DIRBANKNZ_HTML_EMAIL_FOOTER']  = '<br>Please Setup DirbankNZ';
    }

return $define;

