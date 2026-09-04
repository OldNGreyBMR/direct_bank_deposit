# direct_bank_deposit 
# 2026-09-04 V2.1.3

## Direct Bank Deposit Australia (AUS), Canada (CA), New Zealand (NZ), United Kingdom (UK), United States (USA), South Africa (ZA)
 
# Plugin Installler for Zen Cart v2.1.0, v2.2.0, v2.2.1, v2.2.2 and PHP 8.2 to 8.5
Read the installation instructions below.  

**The Plugin Installer is _NOT_ FOR Zen Cart versions before Zen Cart 2.1.0**  

**For Zen Cart versions before Zen Cart 2.1.0 read the Installation Instructions below**

### Released under the GNU General Public License
This plugin release intergrates with One Page Checkout (OPC) to display banking details on the Checkout page in the "Bottom Instructions" box.

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
Copy the relevant folder to the Zen Cart zc_plugins folder, eg under direct_bank_deposit/AUS copy zc_plugins to the zen cart store root.
In the Admin > Modules > Plugin Manager Install the plugin.
In the Admin > Modules > Payment Modules select the module and press "Install Module", configure the fields and press "update".

When populated, the bank details are displayed in the admin module. 
The field "Reference" displays "--$s". This is a payment reference code that displays the customer id 
  and invoice number when the order is finalised.

## TO INSTALL on ZC V2.0.0 and V1.5.8
 - Open the zc_plugins folder for your country.   
 - Navigate down the folder structure until the "includes" folder is displayed.  
 - Copy the "includes" folder to the root of your Zen Cart installation.   
 - Intergration with OPC requires zencart v2.10 or greater.

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

