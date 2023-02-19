<?php
/*
* Copyright (c) 2003-2023 The zen-cart developers 
* Portions Copyright (c) 2003 osCommerce  
* This source file is subject to version 2.0 of the GPL license, 
* $Id: DIRBANKNZ.php  2010-6-22 06:57:21Z Nigel Thomson - adjusted from Crystal Jones code $
* $Id: DIRBANKNZ.php 2023-02-19 OldNGrey (BMH) for zc157d and PHP7.4 (NOT for PHP7.3)
*/
define ('MODULE_PAYMENT_DIRBANKNZ_TEXT_TITLE', 'Direct Bank NZ');
define ('MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION','Direct Bank Transfer');

if (defined('MODULE_PAYMENT_DIRBANKNZ_STATUS') && MODULE_PAYMENT_DIRBANKNZ_STATUS == 1) {
  define('MODULE_PAYMENT_DIRBANKNZ_TEXT_EMAIL_FOOTER', 
  "Please use the following details to transfer your total order value:\n\n" .
  "\nAccount No.:   " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM .
  "\nAccount Name:  " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM . 
  "\nBank Name:     " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM .
  "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n");
}

if (defined('MODULE_PAYMENT_DIRBANKNZ_STATUS') && MODULE_PAYMENT_DIRBANKNZ_STATUS == 1) {
  define('MODULE_PAYMENT_DIRBANKNZ_TEXT_TITLE', 'Direct Bank Deposit - NZ');
   define('MODULE_PAYMENT_DIRBANKNZ_TEXT_DESCRIPTION', 
  '<BR>Please use the following details to transfer your total order value:<br><pre>' . 
  "\nAccount No.:    " . MODULE_PAYMENT_DIRBANKNZ_ACCNUM .
  "\nAccount Name:   " . MODULE_PAYMENT_DIRBANKNZ_ACCNAM . 
  "\nBank Name:      " . MODULE_PAYMENT_DIRBANKNZ_BANKNAM .
  '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.');
}
