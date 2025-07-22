<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tech_store');

// Configuración de la aplicación (versión mejorada)
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', 'http://'.$_SERVER['HTTP_HOST'].'/nw/proyectofinal_p3/public');
define('SITE_NAME', 'Tech Store');
define('URL_SUBFOLDER', '/nw/proyectofinal_p3/public');  // Nuevo - para rutas consistentes

// PayPal Sandbox
// PayPal Sandbox Config
define('PAYPAL_SANDBOX', true);
define('PAYPAL_CLIENT_ID', 'AWcYXkuA_xyCwGUc9Rwwwqhe9OcE8UGEILOz5bcXOkuPvoTy4R_8aRSRg_j4QcTGjkm0zwL7MMNRGHH-');
define('PAYPAL_SECRET', 'EG_ojGtGxKyxiz1uG6Bp8kpEohexvMX-P_35leTF52CjbOMMN3XQG_CL6djLw4cCXNzTxSJ_s_aNHnR9');
define('PAYPAL_RETURN_URL', URL_ROOT.'/payment/success');
define('PAYPAL_CANCEL_URL', URL_ROOT.'/payment/cancel');