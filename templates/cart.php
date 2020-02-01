<?php
?>
<h1>Корзина</h1>
<? foreach ($product as $item):?>
    <div class="cart">
        <p><?=$item['name']?></p>
        <img src="/<?=SMALL_IMG_DIR . $item['image']?>" alt="photo">
        <p>Цена: <?=$item['price']?></p>
    </div>
<?endforeach;?>
