<h1>Корзина</h1>
<div class="cart">
    <p>Наименование</p>
    <p>Картинка</p>
    <p>Цена</p>
    <p>Кол-во</p>
    <p>Сумма
    <p>Удалить</p>
</div>
<hr>
<? foreach ($products as $item): ?>
    <div class="cart">
        <p><?= $item['name'] ?></p>
        <img width="100px" src="/<?= SMALL_IMG_DIR . $item['image'] ?>" alt="photo">
        <p><?= $item['price'] ?></p>
        <p><?= $item['qty'] ?></p>
        <p><?= $item['qty'] * $item['price'] ?></p>
        <button class="delBtn"  data-id ="<?=$item['id']?>">X</button>
    </div>
    <hr>
<? endforeach; ?>

<script>
    const delBtn = document.querySelectorAll('.delBtn');
    delBtn.forEach((elem) => {
        elem.addEventListener('click', (evt) => {
            evt.preventDefault();
            let id = evt.target.dataset.id;
            fetch(`/api/del/?id=${id}`)
                .then((response) => response.json())
                .then((data) => {
                    updateCartQty(data.qty);
                    const newQty = data.newQty;
                    if (newQty >= 1) {
                        elem.previousElementSibling.previousElementSibling.textContent = newQty;
                    } else {
                        elem.parentElement.nextElementSibling.remove();
                        elem.parentElement.remove();
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        })
    })

</script>
