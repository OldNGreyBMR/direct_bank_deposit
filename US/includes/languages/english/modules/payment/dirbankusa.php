<?php
/*
*  Copyright (c) 2003-2023 The zen-cart developers  
*  Portions Copyright (c) 2003 osCommerce            
*  This source file is subject to version 2.0 of the GPL license, 
* $Id: DIRBANKUSA.php 1970 2009-11-24 06:57:21Z CRYSTAL JONES $
* $Id: DIRBANKNZ.php 2023-02-19 OldNGrey (BMH) for zc157d and PHP7.4 (NOT for PHP7.3)
*/

// BMH 2023-02-19 reorganised for PHP7.4

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? ''; 

define ('MODULE_PAYMENT_DIRBANKAUS_PAYABLE', '');
define ('MODULE_PAYMENT_DIRBANKAUS_ADDRESS', '');
define ('MODULE_PAYMENT_DIRBANKUSA_TEXT_TITLE', 'Direct Bank USA');
define ('MODULE_PAYMENT_DIRBANKUSA_DESCRIPTION','Direct Bank Transfer USA');

define('EMAIL_TEXT_NO_DELIVERY',   '<p>No Delivery, see below:');

if (defined('MODULE_PAYMENT_DIRBANKUSA_STATUS')  {
    
    define('MODULE_PAYMENT_DIRBANKUSA_TEXT_EMAIL_FOOTER', 
        "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:   " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING . 
        "\nAccount Name:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:     " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n");

    define ('MODULE_PAYMENT_DIRBANKUSA_HTML_EMAIL_FOOTER', 
        '<BR>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:   " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
        "\nRouting Number:" . MODULE_PAYMENT_DIRBANKUSA_ROUTING .
        "\nAccount Name:  " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
        "\nBank Name:     " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.');

    define('MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION', 
    '<BR>Please use the following details to transfer your total order value:<br><pre>' . 
    "\nAccount No.:    " . MODULE_PAYMENT_DIRBANKUSA_ACCNUM .
    "\nRouting Number: " . MODULE_PAYMENT_DIRBANKUSA_ROUTING . 
    "\nAccount Name:   " . MODULE_PAYMENT_DIRBANKUSA_ACCNAM . 
    "\nBank Name:      " . MODULE_PAYMENT_DIRBANKUSA_BANKNAM .
    '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.');
}
