<?php
?>
<div class="auth">
    <? if (!$allow) : ?>
        <form method="post" >
            <input type="text" name="login" placeholder="login">
            <input type="password" name="pass" placeholder="password">
            Запомнить? <input type="checkbox" name="save">
            <button id="authBtn">Войти</button>
            </div>
        </form>
    <? else: ?>
        <H4>Добро пожаловть <?= $user ?></H4>
        <p><a href="/?logout">Выход</a></p>
    <? endif; ?>
</div>
<script>
    const login = document.getElementById('login');
    const pass = document.getElementById('pass');
    const save = document.getElementById('save');
    const authBtn = document.getElementById('authBtn');
    authBtn.addEventListener('click', () => {
        fetch('/apiAuth/auth', {
            method: 'POST',
            body: JSON.stringify({
                login: login.value,
                pass: pass.value,
                save: save.checked,
            }),
            headers: {
                'Content-type': 'application/json'
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
            })
            .catch((err) => {
                console.log(err);
            })
    })

</script>
