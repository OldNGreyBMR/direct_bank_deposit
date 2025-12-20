<?php
// Copyright (c) 2024-2025 The zen-cart developers                           |
// BMH (OldNGrey) v2.1.2 2025-12-20 lang.dirbankuk.php for zc220 PHP 8.2 to PHP 8.4
// V2.1.2

$define = [
  'MODULE_PAYMENT_DIRBANKUK_TEXT_DESCRIPTION' => 'Direct Bank Transfer UK',
  'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
  'MODULE_PAYMENT_DIRBANKUK_TEXT_TITLE' => 'Direct-Bank-Deposit - UK',
];

$ln = $_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id = $_SESSION['customer_id'] ?? '';           // required for inclusion below

if (defined('MODULE_PAYMENT_DIRBANKUK_STATUS') &&
    (defined(constant_name: 'MODULE_PAYMENT_DIRBANKUK_STATUS') == 'True') ) {
  // insert details on payment screen //
    $define['MODULE_PAYMENT_DIRBANKUK_TEXT_DESCRIPTION'] = 'Banking and Address details will also be sent to your email once the order is confirmed.<br>' .
        '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:  " . defined('MODULE_PAYMENT_DIRBANKUK_ACCNUM') .
        "\nSort Code:    " . defined('MODULE_PAYMENT_DIRBANKUK_SORTCODE') .
        "\nAccount Name: " . defined('MODULE_PAYMENT_DIRBANKUK_ACCNAM') .
        "\nBank Name:    " . defined('MODULE_PAYMENT_DIRBANKUK_BANKNAM') .
        "\nReference:    Please use Order Number as reference"  .
        "\nSwift/BIC Code:   " . defined('MODULE_PAYMENT_DIRBANKUK_SWIFT') .
        "\nIBAN Number:      " . defined('MODULE_PAYMENT_DIRBANKUK_IBAN') .
        '<p>Thanks for your order which will ship immediately <br>once we receive payment in the above account.';

    $define['MODULE_PAYMENT_DIRBANKAUS_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n" .
        "\nAccount No.:  " . defined('MODULE_PAYMENT_DIRBANKUK_ACCNUM') .
        "\nSort Code:    " . defined('MODULE_PAYMENT_DIRBANKUK_SORTCODE') .
        "\nAccount Name: " . defined('MODULE_PAYMENT_DIRBANKUK_ACCNAM') .
        "\nBank Name:    " . defined('MODULE_PAYMENT_DIRBANKUK_BANKNAM') .
        "\nReference:    Please use Order Number as reference"  .
        "\nSwift/BIC Code:   " . defined('MODULE_PAYMENT_DIRBANKUK_SWIFT') .
        "\nIBAN Number:      " . defined('MODULE_PAYMENT_DIRBANKUK_IBAN') .
        '\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n';

    $define['MODULE_PAYMENT_DIRBANKAUS_HTML_EMAIL_FOOTER'] = '<br>Please use the following details to transfer your total order value:<br><pre>' .
        "\nAccount No.:   " . defined('MODULE_PAYMENT_DIRBANKUK_ACCNUM') .
        "\nSort Code:     " . defined('MODULE_PAYMENT_DIRBANKUK_SORTCODE') .
        "\nAccount Name:  " . defined('MODULE_PAYMENT_DIRBANKUK_ACCNAM') .
        "\nBank Name:     " . defined('MODULE_PAYMENT_DIRBANKUK_BANKNAM') .
        "\nReference:    Please use Order Number as reference"  .
        "\nSwift/BIC Code:   " . defined('MODULE_PAYMENT_DIRBANKUK_SWIFT') .
        "\nIBAN Number:      " . defined('MODULE_PAYMENT_DIRBANKUK_IBAN') .
        '\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n';
    } else {
        $define['MODULE_PAYMENT_DIRBANKUK_TEXT_DESCRIPTION'] = '<br>Setup DirbankUK';
        $define['MODULE_PAYMENT_DIRBANKUK_TEXT_EMAIL_FOOTER'] = 'Please Setup DirbankUK';
        $define['MODULE_PAYMENT_DIRBANKUK_HTML_EMAIL_FOOTER']  = '<br>Please Setup DirbankUK';
        }
return $define;
