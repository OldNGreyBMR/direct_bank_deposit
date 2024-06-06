<?php
//
// | Copyright (c) 2024 The zen-cart developers                           |
// BMH (OldNGrey) 2024-05-31 lang.dirbankuk.php for zc158 zc200 
// $Id: lang.dirbankuk.php $
//

$define = [
  'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
  'MODULE_PAYMENT_DIRBANKUK_TEXT_TITLE' => 'Direct-Bank-Deposit - UK',
  'MODULE_PAYMENT_DIRBANKUK_ADDRESS' => '',
  'MODULE_PAYMENT_DIRBANKUK_PAYABLE' => '',
];

$ln = $_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id = $_SESSION['customer_id'] ?? '';           // required for inclusion below

if (defined('MODULE_PAYMENT_DIRBANKUK_STATUS')) {
  // insert details on payment screen //
  $define['MODULE_PAYMENT_DIRBANKUK_TEXT_DESCRIPTION'] = '<br>Banking and Address details will also be sent to your email once the order is confirmed.<br><pre>' .
    '<br>Please use the following details to transfer your total order value:<br><pre>' .
    "\nAccount No.:    " . MODULE_PAYMENT_DIRBANKUK_ACCNUM .
    "\nSort Code:      " . MODULE_PAYMENT_DIRBANKUK_SORTCODE .
    "\nAccount Name:   " . MODULE_PAYMENT_DIRBANKUK_ACCNAM .
    "\nBank Name:      " . MODULE_PAYMENT_DIRBANKUK_BANKNAM .
    "\nReference:      Please use Order Number as reference"  .
    "\nSwift/BIC Code: " . MODULE_PAYMENT_DIRBANKUK_SWIFT . 
    "\nIBAN Number:    " . MODULE_PAYMENT_DIRBANKUK_IBAN . 
    '</pre><p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.' 
  ;

  $define['MODULE_PAYMENT_DIRBANKUK_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
    "\nAccount No.:  " . MODULE_PAYMENT_DIRBANKUK_ACCNUM .
    "\nSort Code:" . MODULE_PAYMENT_DIRBANKUK_SORTCODE .
    "\nAccount Name: " . MODULE_PAYMENT_DIRBANKUK_ACCNAM .
    "\nBank Name:    " . MODULE_PAYMENT_DIRBANKUK_BANKNAM .
    "\nReference:    Please use Order Number as reference"  .
    "\nSwift/BIC Code:   " . MODULE_PAYMENT_DIRBANKUK_SWIFT . 
    "\nIBAN Number:   " . MODULE_PAYMENT_DIRBANKUK_IBAN . 
    "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
  ;

  $define['MODULE_PAYMENT_DIRBANKUK_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br><pre>' .
  "\nAccount No.:   " . MODULE_PAYMENT_DIRBANKUK_ACCNUM .
  "\nSort Code:" . MODULE_PAYMENT_DIRBANKUK_SORTCODE . 
  "\nAccount Name:  " . MODULE_PAYMENT_DIRBANKUK_ACCNAM . 
  "\nBank Name:     " . MODULE_PAYMENT_DIRBANKUK_BANKNAM .
  "\nReference:    Please use Order Number as reference"  .
  "\nSwift/BIC Code:   " . MODULE_PAYMENT_DIRBANKUK_SWIFT . 
  "\nIBAN Number:   " . MODULE_PAYMENT_DIRBANKUK_IBAN . 
  "\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
  ;

}

return $define;

?>
