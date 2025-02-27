<?php
// DIRBANKCA based on  DIRBANKAUS $Id: DIRBANKCA.php 1970 2009-11-24 06:57:21Z CRYSTAL JONES $
// BMH (OldNGrey) v2.1.1 2025-02-26  lang.dirbankca.php for zc158a to zc210 PHP8.2 to PHP8.4
//

define('MODULE_PAYMENT_DIRBANKCA_ADDRESS', '');
define('MODULE_PAYMENT_DIRBANKCA_PAYABLE', '');


$define = [
    //'MODULE_PAYMENT_DIRBANKCA_TEXT_DESCRIPTION' => 'Direct Bank Transfer CA',
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKCA_TEXT_TITLE' => 'Direct-Bank-Deposit - Canada',

    ];

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

if (defined('MODULE_PAYMENT_DIRBANKCA_STATUS') &&       //  insert details on payment screen //
    (defined('MODULE_PAYMENT_DIRBANKCA_STATUS') == 'True') ){ 
    $define['MODULE_PAYMENT_DIRBANKCA_TEXT_DESCRIPTION'] = 'Banking and Address details will also be sent to your email once the order is confirmed.<br>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nInstitution No.:  " .    MODULE_PAYMENT_DIRBANKCA_INSTNUM .
        "\nTransit Number:" .       MODULE_PAYMENT_DIRBANKCA_TRANSIT .
        "\nAccount Name: " .        MODULE_PAYMENT_DIRBANKCA_ACCNAM  .
        "\nAccount Number:    " .   MODULE_PAYMENT_DIRBANKCA_ACCNUM  .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '<p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.  </pre>'
       ;

    $define['MODULE_PAYMENT_DIRBANKCA_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nInstitution No.:  " .    MODULE_PAYMENT_DIRBANKCA_INSTNUM .
        "\nTransit Number:" .       MODULE_PAYMENT_DIRBANKCA_TRANSIT .
        "\nAccount Name: " .        MODULE_PAYMENT_DIRBANKCA_ACCNAM .
        "\nAccount Number:    " .   MODULE_PAYMENT_DIRBANKCA_ACCNUM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . MODULE_PAYMENT_DIRBANKCA_ADDRESS  .
        "\nCheques/Money Orders Payable To:   " . MODULE_PAYMENT_DIRBANKCA_PAYABLE .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
       ;

    $define['MODULE_PAYMENT_DIRBANKCA_HTML_EMAIL_FOOTER']  = 'Please use the following details to transfer your total order value:<br>' .
        "\nInstitution No.:  " .    MODULE_PAYMENT_DIRBANKCA_INSTNUM .
        "\nTransit Number:" .       MODULE_PAYMENT_DIRBANKCA_TRANSIT .
        "\nAccount Name: " .        MODULE_PAYMENT_DIRBANKCA_ACCNAM .
        "\nAccount Number:    " .   MODULE_PAYMENT_DIRBANKCA_ACCNUM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . ('MODULE_PAYMENT_DIRBANKCA_ADDRESS') .
        "\nCheques/Money Orders Payable To:   " . ('MODULE_PAYMENT_DIRBANKCA_PAYABLE') .
        '<p>Thanks for your order which will ship immediately once we receive payment in the above account.'
       ;
    }else {
        $define['MODULE_PAYMENT_DIRBANKCA_TEXT_DESCRIPTION'] = '<br>Setup DirbankCA';
        $define['MODULE_PAYMENT_DIRBANKCA_TEXT_EMAIL_FOOTER'] = 'Please Setup DirbankCA';
        $define['MODULE_PAYMENT_DIRBANKCA_HTML_EMAIL_FOOTER']  = '<br>Please Setup DirbankCA';
}

return $define;
