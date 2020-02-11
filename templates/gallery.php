<h1>Галерея</h1>
<div class="gallery_box">
    <?php foreach ($imgArray as $item) : ?>
        <a href="/<?= BIG_IMG_DIR . $item ?>" target="_blank">
            <img src="/<?= SMALL_IMG_DIR . "{$item}" ?>" alt="photo">
        </a>
    <? endforeach; ?>
</div>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="newFile">
    <input type="submit" value="Загрузить" name="load">
</form>
