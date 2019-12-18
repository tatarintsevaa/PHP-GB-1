<?php
//TODO сделать пути абсолютными
define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATES_DIR', ROOT_DIR . '/templates/');
define('LAYOUTS_DIR', 'layouts/');
define('BIG_IMG_DIR', 'images/big/');
define('SMALL_IMG_DIR', 'images/small/');

include ROOT_DIR . "/src/functions.php";
include ROOT_DIR . "/src/log.php";
include ROOT_DIR . "/src/gallery.php";