# direct_bank_deposit

## Direct Bank Deposit Australia (AUS), Canada (CA), New Zealand (NZ), United Kingdom (UK), United States (USA), South Africa (ZA)
 
2026-01-10 V2.1.2  
Updated 2026-02-14
# Plugin Installler for Zen Cart v2.2.0 and PHP 8.3 to 8.4
Read the installation instructions below.  

**The Plugin Installer is _NOT_ FOR Zen Cart versions before Zen Cart 2.1.0**  

**For Zen Cart versions before Zen Cart 2.1.0 read the Installation Instructions below**

### Released under the GNU General Public License

## Overview
This is a simple module for those that want to provide a bank transfer payment option. Customers can choose to pay by direct money transfer into your Bank Account.

The Australian version of this module allows you to configure the following in the admin:  
BSB Number  
Account Number  
Bank Name  
Address  

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

# INSTALLATION INSTRUCTIONS  

##  TO INSTALL on ZC V2.1.0 and greater
Copy the relevant folder to the Zen Cart zc_plugins folder.
In the Admin > Modules > Plugin Manager Install the plugin.
In the Admin > Modules > Payment Modules select the module and press "Install Module", configure the fields and press "update".

When populated, the bank details are displayed in the admin module. 
The field "Reference" displays "--$s". This is a payment reference code that displays the customer id 
  and invoice number when the order is finalised.

## TO INSTALL on ZC V2.0.0 and V1.5.8
Open the zc_plugins folder for your country.   
Navigate down the folder structure until the "includes" folder is displayed.  
Copy the "includes" folder to the root of your Zen Cart installation.   

When populated, the bank details are displayed in the admin module.  
The field "Reference" displays "--$s". This is a payment reference code that displays the customer id 
  and invoice number when the order is finalised.  

## Virtual products
The module is disabled if the the order only contains virtual products.
To enable it for virtual products edit the dirbankXX.php file and 
    search for the line "// disable the module if the order only contains virtual products"
    and change the following lines from " 
        if ($order->content_type == 'virtual') {
          $this->enabled = false;
        }
        "
        TO "
        if ($order->content_type == 'virtual') {
          $this->enabled = true;
        }
    "
