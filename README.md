# direct_bank_deposit

## Direct Bank Deposit Australia (AUS), Canada (CA), New Zealand (NZ), United Kingdom (UK), United States (USA), South Africa (ZA)
 
2026-01-10 V2.1.2
# For Zen Cart v2.1.0 and PHP 8.3 to 8.4
Create zc_plugins folder installer for AU, CA, NZ, UK, USA, ZA

NOT FOR zc versions before ZC2.1.0
----------------------------------


 Released under the GNU General Public License
 
================================================================

Please read the install Instructions further down the page

This is a simple module for those that want to provide a bank transfer payment option. Customers can choose to pay by direct money transfer into your Bank Account.

The Australian version of this module allows you to configure the following in the admin:
~ BSB Number 
~ Account Number 
~ Bank Name 
~ Address 

The Canadian version of this module allows you to configure the following in the admin:
Institution No.
Transit Number 
Bank Account Name 
Bank Account Number 

The New Zealand version of this module allows you to configure the following in the admin:
Branch No.
Account No.
Account Name
Bank Name

The South Africe version of this module allows you to configure the following in the admin:
Account Name
Account No.
Bank Name
Branch Code

The United Kingdom version of this module allows you to configure the following in the admin:
Account No.
Sort Code
Account Name
Bank Name
Swift/BIC Code
IBAN Number    
  
The United States of America version of this module allows you to configure the following in the admin:
Account No.
Routing Number
Account Name
Bank Name


===========================

TO INSTALL

Copy the relevant folder to the Zen Cart zc_plugins folder.
In the Admin > Modules > Plugin Manager Install the plugin.
In the Admin > Modules > Payment Modules select the module and press "Install Module", configure the fields and press "update".


When populated the bank details are displayed in the admin module. 
The field "Reference" displays "--$s". This is a payment reference code that displays the customer id 
  and invoice number when the order is finalised.
