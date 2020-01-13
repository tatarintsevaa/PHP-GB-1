<?php

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include dirname(__DIR__) . "/config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$url_array = explode("/", $_SERVER['REQUEST_URI']);
if ($url_array[1] == '') {
    $page = "index";
} else {
    $page = $url_array[1];
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон

$params = prepareVariables($page);



_log($params);

echo render($page, $params);


