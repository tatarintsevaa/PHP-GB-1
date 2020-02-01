<h1>Каталог</h1>
<div class="catalog_box">
    <? foreach ($catalog as $item): ?>
        <a href="/catalogItem/?id=<?=$item['id']?>">
            <div class="catalogItem">
                <img src="/<?= SMALL_IMG_DIR . $item['image'] ?>" alt="photo">
                <p>Название товара: <span><?= $item["name"] ?></span></p>
                <p>цена товара: <span><?= $item["price"] ?></span></p>
                <button class="byBtn" data-id = "<?=$item['id']?>">Купить</button>
            </div>
        </a>
    <? endforeach; ?>
</div>
<script>

    const byBtn = document.querySelectorAll('.byBtn');
    byBtn.forEach((elem) => {
        elem.addEventListener('click', (evt) => {
            evt.preventDefault();
            let id = evt.target.dataset.id;
            fetch(`/api/buy/?id=${id}`)
            .then((response) => response.text())
            .then((data) => {
                const qty = data;

            })
            .catch((error) => {
                console.log(error);
            })
        })
    })

</script>