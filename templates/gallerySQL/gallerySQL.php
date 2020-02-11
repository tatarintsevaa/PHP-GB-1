<?php
?>
<div class="gallery_box">
    <?php foreach ($images as $row): ?>
        <a href="/gallerySQL/imageSQL/?id=<?=$row['id']?>"><img src="/<?= SMALL_IMG_DIR . $row['name'] ?>" alt=""></a>
    <?php endforeach; ?>
</div>
