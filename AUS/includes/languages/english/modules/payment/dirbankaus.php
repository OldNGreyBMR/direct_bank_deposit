<?php
/*
* Copyright (c) 2003-2023 The zen-cart developers 
* Portions Copyright (c) 2003 osCommerce  
*  This source file is subject to version 2.0 of the GPL license, 
* $Id: DIRBANKAUS.php  2009-11-24 by CRYSTAL JONES $
* @version $Id DIRBANKAUS v1.5.5 2023-02-19 BMH for zc158 PHP8.1 PHP8.1
*/
// BMH 2023-02-19 reorganised for PHP7.4

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? ''; 

define ('MODULE_PAYMENT_DIRBANKAUS_PAYABLE', '');
define ('MODULE_PAYMENT_DIRBANKAUS_ADDRESS', '');
define ('MODULE_PAYMENT_DIRBANKAUS_TEXT_TITLE', 'Direct Bank Australia');
define ('MODULE_PAYMENT_DIRBANKAUS_DESCRIPTION','Direct Bank Transfer AUS');

define('EMAIL_TEXT_NO_DELIVERY',   '<p>No Delivery, see below:');

//if (defined('MODULE_PAYMENT_DIRBANKAUS_STATUS') && MODULE_PAYMENT_DIRBANKAUS_STATUS == 1) {
 if (defined('MODULE_PAYMENT_DIRBANKAUS_STATUS')) {

    define ('MODULE_PAYMENT_DIRBANKAUS_TEXT_EMAIL_FOOTER',  
        "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKAUS_ACCNUM .
        "\nBSB Number:   " . MODULE_PAYMENT_DIRBANKAUS_BSB . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKAUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKAUS_BANKNAM .
        "\nSwift Code:   " . MODULE_PAYMENT_DIRBANKAUS_SWIFT . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . MODULE_PAYMENT_DIRBANKAUS_ADDRESS . 
        "\nCheques/Money Orders Payable To:   " . MODULE_PAYMENT_DIRBANKAUS_PAYABLE .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n" ) ;
        
    define ('MODULE_PAYMENT_DIRBANKAUS_HTML_EMAIL_FOOTER', 
        '<BR>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKAUS_ACCNUM .
        "\nBSB Number:   " . MODULE_PAYMENT_DIRBANKAUS_BSB . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKAUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKAUS_BANKNAM .
        "\nSwift Code:   " . MODULE_PAYMENT_DIRBANKAUS_SWIFT . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\n\nSend Cheques/Money Orders To:    " . MODULE_PAYMENT_DIRBANKAUS_ADDRESS . 
        "\nCheques/Money Orders Payable To:   " . MODULE_PAYMENT_DIRBANKAUS_PAYABLE .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.');
    
    // BMH insert details on payment screen //
    define ('MODULE_PAYMENT_DIRBANKAUS_TEXT_DESCRIPTION', 
        '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br><pre>'  . 
       '<br>Please use the following details to transfer your total order value:<br><pre>' . 
        "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKAUS_ACCNUM . 
        "\nBSB Number:   " . MODULE_PAYMENT_DIRBANKAUS_BSB . 
        "\nAccount Name: " . MODULE_PAYMENT_DIRBANKAUS_ACCNAM . 
        "\nBank Name:    " . MODULE_PAYMENT_DIRBANKAUS_BANKNAM . 
        "\nReference:    "  . $ln ."-" . $id . "-%s" . 
        '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account." ') ;
       
}
