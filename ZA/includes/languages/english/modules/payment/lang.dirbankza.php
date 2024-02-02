<?php
// DIRBANKNZ based on  $Id: DIRBANKNZZ.php 1970 2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $
// BMR (OldNGrey) v158 2024-02-02 lang.dirbankaus.php for zc158

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

$define = [
    'MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION' => 'Direct Bank Transfer',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKZA_TEXT_TITLE' => 'Direct-Bank-Deposit - Sth African',
    'MODULE_PAYMENT_DIRBANKZA_TEXT_DESCRIPTION' => 'Banking and Address details will also be sent to your email once the order is confirmed.<pre>' .
        'Please use the following details to transfer <br>your total order value:' .
        "\nAccount Name:  " . (defined('MODULE_PAYMENT_DIRBANKZA_ACCNAM')  ? MODULE_PAYMENT_DIRBANKZA_ACCNAM : '(your Ac name)' ) .
        "\nAccount No.:   " . (defined('MODULE_PAYMENT_DIRBANKZA_ACCNUM')  ? MODULE_PAYMENT_DIRBANKZA_ACCNUM :  '(your Ac num)' ).
        "\nBank Name:     " . (defined('MODULE_PAYMENT_DIRBANKZA_BANKNAM') ? MODULE_PAYMENT_DIRBANKZA_BANKNAM : '(your bank name)' ) .
        "\nBranch Code:   " . (defined('MODULE_PAYMENT_DIRBANKZA_BANKCODE') ? MODULE_PAYMENT_DIRBANKZA_BANKCODE : '(your Bank Code)' ) .
        "\nReference:      " . $ln ."-" . $id . "-%s" .
        '</pre>Thanks for your order which will ship immediately <br>once we receive payment in the above account.'
        ,
    'MODULE_PAYMENT_DIRBANKZA_TEXT_EMAIL_FOOTER' => "Please use the following details to transfer <br>your total order value:\n" .
        "\nAccount Name:  " . (defined('MODULE_PAYMENT_DIRBANKZA_ACCNAM')  ? MODULE_PAYMENT_DIRBANKZA_ACCNAM : '(your Ac name)' ) .
        "\nAccount No.:   " . (defined('MODULE_PAYMENT_DIRBANKZA_ACCNUM')  ? MODULE_PAYMENT_DIRBANKZA_ACCNUM :  '(your Ac num)' ).
        "\nBank Name:     " . (defined('MODULE_PAYMENT_DIRBANKZA_BANKNAM') ? MODULE_PAYMENT_DIRBANKZA_BANKNAM : '(your bank name)' ) .
        "\nBranch Code:   " . (defined('MODULE_PAYMENT_DIRBANKZA_BANKCODE') ? MODULE_PAYMENT_DIRBANKZA_BANKCODE : '(your Bank Code)' ) .
         "\nReference:     " . $ln ."-" . $id . "-%s" .
        "\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
        ,
        'MODULE_PAYMENT_DIRBANKZA_HTML_EMAIL_FOOTER' => '<br>Please use the following details to transfer your total order value:<pre>' .
        "\nAccount Name:  " . (defined('MODULE_PAYMENT_DIRBANKZA_ACCNAM')  ? MODULE_PAYMENT_DIRBANKZA_ACCNAM : '(your Ac name)' ) .
        "\nAccount No.:   " . (defined('MODULE_PAYMENT_DIRBANKZA_ACCNUM')  ? MODULE_PAYMENT_DIRBANKZA_ACCNUM :  '(your Ac num)' ).
        "\nBank Name:     " . (defined('MODULE_PAYMENT_DIRBANKZA_BANKNAM') ? MODULE_PAYMENT_DIRBANKZA_BANKNAM : '(your bank name)' ) .
        "\nBranch Code:   " . (defined('MODULE_PAYMENT_DIRBANKZA_BANKCODE') ? MODULE_PAYMENT_DIRBANKZA_BANKCODE : '(your Bank Code)' ) .
        "\nReference:      " . $ln ."-" . $id . "-%s" .
        '</em><p>Thanks for your order which will ship immediately once we receive payment in the above account.'
        ,
];

return $define;
