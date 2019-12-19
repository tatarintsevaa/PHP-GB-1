<?php
if (isset($_POST['load'])) {
    $path = ROOT_DIR . '/public/' . BIG_IMG_DIR . $_FILES["newFile"]["name"];
    $pathToSmall = ROOT_DIR . '/public/' . SMALL_IMG_DIR . $_FILES["newFile"]["name"];
    if(move_uploaded_file($_FILES["newFile"]["tmp_name"],$path)) {
        $image = new SimpleImage();
        $image->load($path);
        $image->resizeToWidth(150);
        $image->save($pathToSmall);
        header('Location: /?page=gallery');
    } else {
        echo "Ошибка! Код ошибки - {$_FILES['newFile']['error']}";
    }
}
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
?>
<h1>Галерея</h1>
<div class="gallery_box">
    <?php foreach ($imgArray as $item) : ?>
        <a href="<?= BIG_IMG_DIR . "{$item}" ?>" target="_blank">
            <img src="<?= SMALL_IMG_DIR . "{$item}" ?>" alt="photo">
        </a>
    <? endforeach; ?>
</div>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="newFile">
    <input type="submit" value="Загрузить" name="load">
</form>
