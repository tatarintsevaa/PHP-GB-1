<?php
?>
<div class="item_box">
    <h2><?=$item['name']?></h2>
    <img src="/<?=BIG_IMG_DIR . $item['image']?>" alt="photo" width="400px">
    <hr>
    <h3>Цена: <?=$item['price']?></h3>
    <hr>
    <h3>Описание товара</h3>
    <p><?=$item['description']?></p>
    <a href="/catalog/">Назад в каталог товара</a>
    <hr>
    <h2>Отзывы</h2>
    <?=$message?>
    <form action="?action=<?=$action?>" method="post">
        <input hidden type="text" name="id" value="<?=$row['id']?>"><br>
        <input type="text" placeholder="Имя" name="name" value="<?=$row['name']?>"><br>
        <input type="text" placeholder="Отзыв" name="feedback" value="<?=$row['feedback']?>"><br>
        <input type="submit" name="ok" value=<?=$buttonText?>><br>
    </form><br>
    <? foreach ($feedback as $item):?>
        <div>
            <strong><?=$item['name']?></strong>: <?=$item['feedback']?>
            <a href="/?action=edit&id=<?=$item['id']?>">[править]</a>
        </div>
    <?endforeach;?>
</div>