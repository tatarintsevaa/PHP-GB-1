<?php
define('ROOT_DIR',  dirname(__DIR__));
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('BIG_IMG_DIR', 'images/big/');
define('SMALL_IMG_DIR', 'images/small/');

/* DB config */

define('HOST', 'localhost');
define('USER', 'tatalexGB');
define('PASS', '123456');
define('DB', 'tatalex_gb');


include ROOT_DIR . "/src/db.php";
include ROOT_DIR . "/src/core.php";

autoload('controllers');
autoload('models');




//
//
//include ROOT_DIR . "/models/log.php";
//include ROOT_DIR . "/models/gallery.php";
//include ROOT_DIR . "/models/classSimpleImage.php";
//include ROOT_DIR . "/models/gallerySQL.php";
//include ROOT_DIR . "/models/feedback.php";
//include ROOT_DIR . "/models/catalog.php";
//include ROOT_DIR . "/models/cart.php";
//include ROOT_DIR . "/models/auth.php";
//include ROOT_DIR . "/models/menu.php";

