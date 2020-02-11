<div class="item_box">
    <h2><?= $item['name'] ?></h2>
    <img src="/<?= BIG_IMG_DIR . $item['image'] ?>" alt="photo" width="400px">
    <hr>
    <h3>Цена: <?= $item['price'] ?></h3>
    <hr>
    <h3>Описание товара</h3>
    <p><?= $item['description'] ?></p>
    <a href="/catalog/">Назад в каталог товара</a>
    <hr>
    <h2>Отзывы</h2>
    <?= $message ?>
    <div id="feedback" data-id_good="<?= $item['id'] ?>">
        <input type="text" placeholder="Имя" id="name">
        <input type="text" placeholder="Отзыв" id="feed">
        <button id="ok">Отправить</button>
    </div>
    <br>
    <div class="feedback_list">
        <? foreach ($feedback as $value): ?>
            <div>
                <span><strong><?= $value['name'] ?></strong>: <?= $value['feedback'] ?></span>
                <a href="/" class="edit" data-id_feed="<?= $value['id'] ?>">[править]</a>
                <a href="/" class="del" data-id_feed="<?= $value['id'] ?>">[X]</a>
            </div>
        <? endforeach; ?>
    </div>
</div>
<script>


    document.addEventListener('DOMContentLoaded', () => {
        addEvent(btnOk);
        document.querySelectorAll('.edit').forEach((elem) => {
            editEvent(elem);
        });

        document.querySelectorAll('.del').forEach((elem) => {
            delEvent(elem);

        });

    })


</script>