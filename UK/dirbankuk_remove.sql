select * from CONFIGURATION  where configuration_key in (
'MODULE_PAYMENT_DIRBANKUK_STATUS', 
'MODULE_PAYMENT_DIRBANKUK_ZONE', 
'MODULE_PAYMENT_DIRBANKUK_SORT_ORDER', 
'MODULE_PAYMENT_DIRBANKUK_SORTCODE', 
'MODULE_PAYMENT_DIRBANKUK_ACCNUM', 
'MODULE_PAYMENT_DIRBANKUK_ACCNAM',  
'MODULE_PAYMENT_DIRBANKUK_BANKNAM',  
'MODULE_PAYMENT_DIRBANKUK_SWIFT',  
'MODULE_PAYMENT_DIRBANKUK_IBAN', 
'MODULE_PAYMENT_DIRBANKUK_ORDER_STATUS_ID');

delete from CONFIGURATION  where configuration_key in (
'MODULE_PAYMENT_DIRBANKUK_STATUS', 
'MODULE_PAYMENT_DIRBANKUK_ZONE', 
'MODULE_PAYMENT_DIRBANKUK_SORT_ORDER', 
'MODULE_PAYMENT_DIRBANKUK_SORTCODE', 
'MODULE_PAYMENT_DIRBANKUK_ACCNUM', 
'MODULE_PAYMENT_DIRBANKUK_ACCNAM',  
'MODULE_PAYMENT_DIRBANKUK_BANKNAM',  
'MODULE_PAYMENT_DIRBANKUK_SWIFT',  
'MODULE_PAYMENT_DIRBANKUK_IBAN', 
'MODULE_PAYMENT_DIRBANKUK_ORDER_STATUS_ID');
