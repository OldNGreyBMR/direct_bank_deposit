<?php
// $Id: DIRBANKUSA.php 1970 2009-11-24 06:57:21Z CRYSTAL JONES $
// BMR (OldNGrey) v158 2024-02-02 lang.dirbankusa.php for zc158

$ln=$_SESSION['customer_last_name'] ?? '';    // required for inclusion below
$id=$_SESSION['customer_id'] ?? '';           // required for inclusion below

$define = [
    'EMAIL_TEXT_NO_DELIVERY' => '<p>No Delivery, see below:',
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_TITLE' => 'Direct-Bank-Deposit - USA',
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_DESCRIPTION' => 'Banking and Address details will also be sent to your email once the order is confirmed.<pre>' .
        'Please use the following details to transfer <br>your total order value:' .
        "\nAccount No.:  " .  (defined('MODULE_PAYMENT_DIRBANKUSA_ACCNUM')  ? MODULE_PAYMENT_DIRBANKUSA_ACCNUM : '(your Ac num)' ).
        "\nRouting Number:" . (defined('MODULE_PAYMENT_DIRBANKUSA_ROUTING') ? MODULE_PAYMENT_DIRBANKUSA_ROUTING : '(your Routing num)' ).
        "\nAccount Name: " .  (defined('MODULE_PAYMENT_DIRBANKUSA_ACCNAM')  ? MODULE_PAYMENT_DIRBANKUSA_ACCNAM : '(your Ac name)' ) .
        "\nBank Name:    " .  (defined('MODULE_PAYMENT_DIRBANKUSA_BANKNAM') ? MODULE_PAYMENT_DIRBANKUSA_BANKNAM : '(your bank name)' ) .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre>Thanks for your order which will ship immediately <br>once we receive payment in the above account.'
        ,
    'MODULE_PAYMENT_DIRBANKUSA_TEXT_EMAIL_FOOTER' => "Please use the following details to transfer <br>your total order value:\n" .
        "\nAccount No.:  "  . (defined('MODULE_PAYMENT_DIRBANKUSA_ACCNUM')  ? MODULE_PAYMENT_DIRBANKUSA_ACCNUM : '(your Ac num)' ).
        "\nRouting Number:" . (defined('MODULE_PAYMENT_DIRBANKUSA_ROUTING') ? MODULE_PAYMENT_DIRBANKUSA_ROUTING : '(your Routing num)' ).
        "\nAccount Name: "  . (defined('MODULE_PAYMENT_DIRBANKUSA_ACCNAM')  ? MODULE_PAYMENT_DIRBANKUSA_ACCNAM : '(your Ac name)' ) .
        "\nBank Name:    "  . (defined('MODULE_PAYMENT_DIRBANKUSA_BANKNAM') ? MODULE_PAYMENT_DIRBANKUSA_BANKNAM : '(your bank name)' ) .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        "\nThanks for your order which will ship immediately once we receive payment in the above account.\n"
        ,
    'MODULE_PAYMENT_DIRBANKUSA_HTML_EMAIL_FOOTER' => '<br>Please use the following details to transfer <br>your total order value:<pre>' .
        "\nAccount No.:  "  .(defined('MODULE_PAYMENT_DIRBANKUSA_ACCNUM')  ? MODULE_PAYMENT_DIRBANKUSA_ACCNUM : '(your Ac num)' ).
        "\nRouting Number:" .(defined('MODULE_PAYMENT_DIRBANKUSA_ROUTING') ? MODULE_PAYMENT_DIRBANKUSA_ROUTING : '(your Routing num)' ).
        "\nAccount Name: "  .(defined('MODULE_PAYMENT_DIRBANKUSA_ACCNAM')  ? MODULE_PAYMENT_DIRBANKUSA_ACCNAM : '(your Ac name)' ) .
        "\nBank Name:    "  .(defined('MODULE_PAYMENT_DIRBANKUSA_BANKNAM') ? MODULE_PAYMENT_DIRBANKUSA_BANKNAM : '(your bank name)' ) .
        "\nReference:    "  . $ln ."-" . $id . "-%s" .
        '</pre><br>Thanks for your order which will ship immediately once we receive payment in the above account.'
        ,
];

return $define;
