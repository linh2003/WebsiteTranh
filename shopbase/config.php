<?php
$location = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http' . '://' .$_SERVER['HTTP_HOST'];
$site_url = $location . '/shopbase/';
define('LOCATION', 			$location);
define('SITE_URL', 			$site_url);
define('PUBLIC_URL', 		$site_url . '/public');
define('UPLOAD_URL', 		PUBLIC_URL . '/upload/');
define('CSS_URL', 			PUBLIC_URL . '/css');
define('JS_URL', 			PUBLIC_URL . '/js');
define('ADMIN_PATH', 		PUBLIC_URL . '/admin');
define('ADMIN_URL', 		$site_url . 'admin');
define('DIR_BASE',			__DIR__ );
define('CONTROLLER_PATH',	DIR_BASE . '/mvc/controllers/');
define('VIEW_PATH',			DIR_BASE . '/mvc/views/');
define('IMAGES_PATH',		DIR_BASE . '/public/images/');
define('LIB_PATH',			DIR_BASE . '/mvc/lib/');
define('UPLOAD_DIR', 		DIR_BASE . '/public/upload/');