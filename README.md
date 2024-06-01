# direct_bank_deposit

 Direct Bank Deposit Australia (AUS), Canada (CA), New Zealand (NZ), United Kingdom (UK), United States (USA), South Africa (ZA)
 -----------------------------------------
2024-06-1013 V2.0.1 DRAFT
For Zen Cart 1.5.8 to V2.0.0 and PHP 8.1 to 8.3
-----------------------------------------
2024-06-01 V2.0.0 
added UK

2024-01-29 V2.0.0
For Zen Cart 1.5.8 to V2.0.0 and PHP 8.1 to 8.3

Updated from:
Direct Bank Deposit v 1.5.5 for Zen Cart 1.5.7 to 1.5.8

2023-03-26
NZ updated to match AUS changes
AUS removed Cheques, money orders, swift code

2023-02-15
Modified USA to match AUS changes

2015-05-22
 (Modified AUS to include Reference, Cheques and Money Orders. 
  Also added an address field. 
  Added modified "Store Pickup" plugin. Addresses only appear in confirmation email
 )

(Modified from Ausbank for OS Commerce)
Original Mod Released 20/06/06
Released under the GNU General Public License
================================================================

Please read the install Instructions further down the page

This is a simple module for those that want to provide a bank transfer payment option. Customers can choose to pay by direct money transfer into your Bank Account.

The Australian version of this module allows you to configure the following in the admin:
~ BSB Number
~ Account Number
~ Bank Name
~Address

===========================
TO INSTALL
===========================
Copy the includes folder for your country to the root of your Zen Cart store.

Go to Admin --> Modules --> Payment and click on the module and add your details

When populated the bank details are displayed in the admin module. 
The field "Reference" displays "--$s". This is a payment reference code that displays the customer id 
  and invoice number when the order is finalised.
