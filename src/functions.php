<?php
//Файл с функциями нашего движка

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'layout', [
        'content' => renderTemplate($page, $params),
        'menu' => renderTemplate('menu', $params),
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
        Die("Страницы {$page} не существует.");
    }

    return ob_get_clean();
}
//Функция плучения массива изображений
function getImageList($path) {
    return array_splice(scandir($path),2);
}

function filesUpload() {
    $path = ROOT_DIR . '/public/' . BIG_IMG_DIR . $_FILES["newFile"]["name"];
    $pathToSmall = ROOT_DIR . '/public/' . SMALL_IMG_DIR . $_FILES["newFile"]["name"];
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['newFile']['name'])) {
            return "Файлы PHP загружать запрещено\n";
        }
    }
    $imageInfo = getimagesize($_FILES['newFile']['tmp_name']);
    if($imageInfo['mime'] != 'image/gif' && $imageInfo['mime'] != 'image/jpeg' && $imageInfo['mime'] != 'image/png') {
        return "Извините, мы принимаем только файлы с форматами: jpeg, gif и png\n";
    }
    if(move_uploaded_file($_FILES["newFile"]["tmp_name"],$path)) {
        $image = new SimpleImage();
        $image->load($path);
        $image->resizeToWidth(150);
        $image->save($pathToSmall);
        header('Location: /?page=gallery');
    } else {
        return "Ошибка! Код ошибки - {$_FILES['newFile']['error']}";
    }
    // Раз уж класс подключили , то можно было так. Только проверки добавить
//if (isset($_POST['load'])) {
//    $path = ROOT_DIR . '/public/' . BIG_IMG_DIR . $_FILES["newFile"]["name"];
//    $pathToSmall = ROOT_DIR . '/public/' . SMALL_IMG_DIR . $_FILES["newFile"]["name"];
//    $image = new SimpleImage();
//    $image->load($_FILES["newFile"]["tmp_name"]);
//    $image->save($path);
//    $image->resizeToWidth(150);
//    $image->save($pathToSmall);
//    header('Location: /?page=gallery');
//}
}
function getMenu($menuArray, $class = 'menu')
{
    $output = "<ul class=\"{$class}\">";
    foreach ($menuArray as $item) {
        $output .= "<li><a href=\"{$item["href"]}\">{$item["tittle"]}</a>";
        if (isset($item["submenu"])) {
            $output .= getMenu($item["submenu"], 'submenu');
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
}
