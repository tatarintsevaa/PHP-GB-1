<?php
define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('BIG_IMG_DIR', 'images/big/');
define('SMALL_IMG_DIR', 'images/small/');

/* DB config */

define('HOST', 'localhost');
define('USER', 'tatalexGB');
define('PASS', '123456');
define('DB', 'tatalex_gb');


include ROOT_DIR . "/src/functions.php";
include ROOT_DIR . "/src/log.php";
include ROOT_DIR . "/src/gallery.php";
include ROOT_DIR . "/src/classSimpleImage.php";
include ROOT_DIR . "/src/gallerySQL.php";
include ROOT_DIR . "/src/db.php";