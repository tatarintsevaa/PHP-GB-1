<?php 

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

echo renderTemplate('layout', renderTemplate('menu'), renderTemplate($page));

function renderTemplate($page, $menu = '', $content = '')
{
    ob_start();
    include "templates/{$page}.php";
    return ob_get_clean();
}




