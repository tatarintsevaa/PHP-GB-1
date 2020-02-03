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
        <p><?= $item['price'] ?> $</p>
        <p><?= $item['qty'] ?></p>
        <p><?= $item['qty'] * $item['price'] ?> $</p>
        <button class="delBtn" data-id="<?= $item['id'] ?>">X</button>
    </div>
    <hr>
<? endforeach; ?>
<hr>
<div class="checkout">
    <div class="checkout_box">
        <input type="text" name="name" placeholder="ФИО" id="name">
        <input type="text" name="phone-num" placeholder="Номер телефона" id="phone-num">
        <button class="checkoutBtn">Оформить заказ</button>
    </div>
    <div class="totalPrice">
        <h4>Общая сумма заказа: <strong id="total"><?= $totalPrice ?> $</strong></h4>
    </div>
</div>
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
    });

    const checkoutBtn = document.querySelector('.checkoutBtn');
    checkoutBtn.addEventListener('click', () => {
        const name = document.getElementById('name').value;
        const phoneNum = document.getElementById('phone-num').value;
        const totalPrice = document.getElementById('total').value;
        let elem = document.querySelector('.red');
        if (name === '' || phoneNum === '') {
            if (elem == null) {
                elem = document.createElement('p');
                checkoutBtn.insertAdjacentElement('beforebegin', elem);
                elem.className = 'red';
                elem.innerText = 'Заполните все поля!'
            }
        } else {
            if (elem) {
                elem.remove();
            }
            fetch('/api/checkout', {
                method: 'POST',
                body: JSON.stringify({
                    name: name,
                    phoneNum: phoneNum,
                }),
                headers: {
                    'Content-type': 'application/json',
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.totalPrice !== 0) {
                        elem = document.createElement('p');
                        elem.className = 'red';
                        elem.innerText = `Ваш заказ на сумму ${data.totalPrice} $ успешно оформлен!`;
                        checkoutBtn.insertAdjacentElement('afterend', elem);
                        checkoutBtn.remove();
                        setTimeout(newSession, 5000);
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    });



</script>
