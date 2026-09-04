<?php
// -----
// Direct Bank Deposit - UK (dirbankuk) : One-Page Checkout (OPC) integration.
//
// BMH (OldNGrey) V2.1.3 2026-08-25
//
// Registers an observer that appends this module's bank-account details to the OPC
// "Bottom instructions" box (TEXT_CHECKOUT_ONE_INSTRUCTIONS) rendered by the
// tpl_modules_opc_instructions.php template on the checkout_one page.
//
// Checkpoint 98 is used so that the load occurs **after** OPC's own observer has been
// instantiated (checkpoint 97, creating the $checkout_one global) and well before the
// checkout_one page's header_php.php issues NOTIFY_HEADER_START_CHECKOUT_ONE.
//
$autoLoadConfig[98][] = [
    'autoType' => 'class',
    'loadFile' => 'observers/class.dirbankuk_opc_observer.php'
];
$autoLoadConfig[98][] = [
    'autoType'   => 'classInstantiate',
    'className'  => 'dirbankuk_opc_observer',
    'objectName' => 'dirBankUkOpcObserver'
];
