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
    <form action="/catalogItem/<?=$action?>/" method="post">
        <input hidden type="text" name="id" value="<?=$row['id']?>"><br>
        <input hidden type="text" name="id_goods" value="<?=$item['id']?>"><br>
        <input type="text" placeholder="Имя" name="name" value="<?=$row['name']?>"><br>
        <input type="text" placeholder="Отзыв" name="feedback" value="<?=$row['feedback']?>"><br>
        <input type="submit" name="ok" value=<?=$buttonText?>><br>
    </form><br>
    <? foreach ($feedback as $value):?>
        <div>
            <strong><?=$item['name']?></strong>: <?=$value['feedback']?>
            <a href="/catalogItem/?id=<?=$item['id']?>/edit/&id_feed=<?=$value['id']?>">[править]</a>
            <a href="/catalogItem/del/?id_feed=<?=$value['id']?>&id=<?=$item['id']?>">[X]</a>
        </div>
    <?endforeach;?>
</div>
<script>





</script>