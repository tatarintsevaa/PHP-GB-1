<?php
?>
<h1>Каталог</h1>
<?foreach ($catalog as $item):?>
<div class="catalogItem">
    <p>Название товара: <span><?=$item["name"]?></span></p>
    <p>цена товара: <span><?=$item["price"]?></span></p>
    <button>Купить</button>
    <hr>
</div>
<?endforeach;?>
