<?php
?>
<div class="cart">
    <p>ID</p>
    <p>Имя клиента</p>
    <p>Телефон</p>
    <p>текущий статус</p>
    <p>новый статус</p>
    <p>Изменить статус</p>
</div>
<hr>
<h3>Все оформленные заказы</h3>
<hr>
<?php foreach ($orders as $item): ?>
    <div class="cart">
        <p><?= $item['id'] ?></p>
        <p><?= $item['name'] ?></p>
        <p><?= $item['phone'] ?></p>
        <? if ((int)$item['status'] == 1): ?>
            <p>Создан</p>
        <? elseif ((int)$item['status'] == 2): ?>
            <p>Оплачен</p>
        <? else: ?>
            <p>Отправлен</p>
        <? endif; ?>
        <select id="status">
            <option value="1" selected>Создан</option>
            <option value="2">Оплачен</option>
            <option value="3">Отправлен</option>
        </select>
        <button class="edit-status" data-id="<?= $item['id'] ?>">Изменить статус</button>
    </div>
    <hr>
<?php endforeach; ?>


<script>
    document.querySelectorAll('.edit-status').forEach((elem) => {
       elem.addEventListener('click', (evt) => {
           let id = evt.target.dataset.id;
           let status = elem.previousElementSibling.value;
           fetch(`/api/editStatus/?id=${id}&status=${status}`)
           .then((response) => response.json())
           .then((data) => {
               if (data !== null) {
                   elem.previousElementSibling.previousElementSibling.innerText = data.status;
               }
           })

       })
    })

</script>