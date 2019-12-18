<?php
function getImageList($path) {
    return array_splice(scandir($path),2);
}
$imgArray = getImageList(ROOT_DIR . '/public/' . BIG_IMG_DIR);
?>
<h1>Галерея</h1>
<div class="gallery_box">
    <?php foreach ($imgArray as $item) :?>
    <a href="<?=BIG_IMG_DIR . "{$item}"?>" target="_blank">
        <img src="<?=SMALL_IMG_DIR . "{$item}"?>" alt="photo">
    </a>
    <?endforeach;?>
</div>
