<?php
session_start();
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include dirname(__DIR__) . "/config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$action = $url_array[2];

if ($url_array[1] == '') {
    $page = "index";
} else {
    $page = $url_array[1];
}

$params = getMenuList();


if (is_auth()) {
    $params['allow'] = true;
    $params['user'] = get_user();
}

$controllerName = $page . 'Controller';

if (function_exists($controllerName)) {
    echo $controllerName($params, $action);
} else {
    die("Не правильный контроллер");
}




