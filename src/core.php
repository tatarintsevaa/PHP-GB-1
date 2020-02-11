<?php
function autoload($catalog) {
    $array = array_splice(scandir(ROOT_DIR . '/' . $catalog . '/'), 2);
    foreach ($array as $value) {
        $filename = ROOT_DIR . '/' . $catalog . '/' . $value;
        include $filename;
    }
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [], $layout = 'layout')
{
    return renderTemplate(LAYOUTS_DIR . $layout, [
        'content' => renderTemplate($page, $params),
        'menu' => renderTemplate('menu', $params),
        'auth' => renderTemplate('auth', $params),
    ]);
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        var_dump($fileName);
        Die("Страницы {$page} не существует.");
    }

    return ob_get_clean();
}


