<?php
// -----
// Direct Bank Deposit - AU (dirbankaus) : One-Page Checkout (OPC) integration.
//
/**
* @copyright    2003-2026 The zen-cart developers
* @license      http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* @author       $Id: dirbankaus.php v2.1.3 BMH (OldNGrey)
* @version      $Id V2.1.3 dirbankaus.php 2026-08-25  BMH (OldNGrey) for Zen Cart v2.2.x / OPC v2.4+ (v2.7.0 tested) PHP 8.2 to PHP 8.5
*
*/

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
    'loadFile' => 'observers/class.dirbankaus_opc_observer.php'
];
$autoLoadConfig[98][] = [
    'autoType'   => 'classInstantiate',
    'className'  => 'dirbankaus_opc_observer',
    'objectName' => 'dirBankAusOpcObserver'
];
