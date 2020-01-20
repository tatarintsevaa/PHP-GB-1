<h1>Каталог</h1>
<div class="catalog_box">
    <? foreach ($catalog as $item): ?>
        <a href="/catalogItem/?id=<?=$item['id']?>">
            <div class="catalogItem">
                <img src="/<?= SMALL_IMG_DIR . $item['image'] ?>" alt="photo">
                <p>Название товара: <span><?= $item["name"] ?></span></p>
                <p>цена товара: <span><?= $item["price"] ?></span></p>
                <button>Купить</button>
            </div>
        </a>
    <? endforeach; ?>
</div>
