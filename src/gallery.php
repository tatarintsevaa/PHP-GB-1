<?php

//Функция плучения массива изображений
function getImageList($path) {
    return array_splice(scandir($path),2);
}

//функция загрузки картинок
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
}