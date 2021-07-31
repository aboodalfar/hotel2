<?php 
date_default_timezone_set("Asia/Amman");
define("ROOT_DIR", __DIR__.'/../');
define("BASE_DIR", __DIR__.'/../../');
define("WEB_DIR", __DIR__ .'/../../web');
setlocale(LC_ALL, 'en_GB');
$FRAMEWORK_CONFIG = array(
    'BASE_URL'  => '/',
    'ROUTES'   => require __DIR__.'/routes.php',
);

