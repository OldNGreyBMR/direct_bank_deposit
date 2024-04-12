<?php
// DIRBANKAUS based on  $Id: DIRBANKCA.php 1970 2009-11-24 06:57:21Z CRYSTAL JONES $
// BMH (OldNGrey) V2.0.1 2024-04-213 lang.dirbankca.php for zc158 zc158a zc200 and PHP8.1 to PHP8.3

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

$define = [
    'MODULE_PAYMENT_DIRBANKCA_TEXT_TITLE' => 'Direct Bank Canada',
    'MODULE_PAYMENT_DIRBANKCA_DESCRIPTION' => 'Direct Bank Transfer',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKCA_TEXT_TITLE' => 'Direct-Bank-Deposit - CA',
    'MODULE_PAYMENT_DIRBANKCA_ADDRESS' => '',
    'MODULE_PAYMENT_DIRBANKCA_PAYABLE' => '',

    'MODULE_PAYMENT_DIRBANKCA_TEXT_DESCRIPTION' => '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br><pre>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nInstitution No.:  " .    (defined('MODULE_PAYMENT_DIRBANKCA_INSTNUM') ?  MODULE_PAYMENT_DIRBANKCA_INSTNUM : '(your Inst num)' ) .
        "\nTransit Number:" .       (defined('MODULE_PAYMENT_DIRBANKCA_TRANSIT') ? MODULE_PAYMENT_DIRBANKCA_TRANSIT : '(your Transit num)' ) .
        "\nAccount Name: " .        (defined('MODULE_PAYMENT_DIRBANKCA_ACCNAM') ? MODULE_PAYMENT_DIRBANKCA_ACCNAM : '(your Ac name)' ) .
        "\nAccount Number:    " .   (defined('MODULE_PAYMENT_DIRBANKCA_ACCNUM') ? MODULE_PAYMENT_DIRBANKCA_ACCNUM : '(your Ac num)' ) .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.'
        ,

    'MODULE_PAYMENT_DIRBANKCA_TEXT_EMAIL_FOOTER' => "Please use the following details to transfer your total order value:\n\n" .
        "\nInstitution No.:  " .    (defined('MODULE_PAYMENT_DIRBANKCA_INSTNUM') ?  MODULE_PAYMENT_DIRBANKCA_INSTNUM : '(your Inst num)' ) .
        "\nTransit Number:" .       (defined('MODULE_PAYMENT_DIRBANKCA_TRANSIT') ? MODULE_PAYMENT_DIRBANKCA_TRANSIT : '(your Transit num)' ).
        "\nAccount Name: " .        (defined('MODULE_PAYMENT_DIRBANKCA_ACCNAM') ? MODULE_PAYMENT_DIRBANKCA_ACCNAM : '(your Ac name)' ) .
        "\nAccount Number:    " .   (defined('MODULE_PAYMENT_DIRBANKCA_ACCNUM') ? MODULE_PAYMENT_DIRBANKCA_ACCNUM : '(your Ac num)' ) .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKCA_ADDRESS')  .
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKCA_PAYABLE') .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
        ,

    'MODULE_PAYMENT_DIRBANKCA_HTML_EMAIL_FOOTER'  => '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nInstitution No.:  " .    (defined('MODULE_PAYMENT_DIRBANKCA_INSTNUM') ?  MODULE_PAYMENT_DIRBANKCA_INSTNUM : '(your Inst num)' ) .
        "\nTransit Number:" .       (defined('MODULE_PAYMENT_DIRBANKCA_TRANSIT') ? MODULE_PAYMENT_DIRBANKCA_TRANSIT : '(your Transit num)' ) .
        "\nAccount Name: " .        (defined('MODULE_PAYMENT_DIRBANKCA_ACCNAM') ? MODULE_PAYMENT_DIRBANKCA_ACCNAM : '(your Ac name)' ) .
        "\nAccount Number:    " .   (defined('MODULE_PAYMENT_DIRBANKCA_ACCNUM') ? MODULE_PAYMENT_DIRBANKCA_ACCNUM : '(your Ac num)' ) .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . defined('MODULE_PAYMENT_DIRBANKCA_ADDRESS') .
        "\nCheques/Money Orders Payable To:   " . defined('MODULE_PAYMENT_DIRBANKCA_PAYABLE') .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.'
       ,
];

return $define;
