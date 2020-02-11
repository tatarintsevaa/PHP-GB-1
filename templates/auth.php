<?php
?>
<div class="auth">
    <? if (!$allow) : ?>
        <form method="post" action="/auth/login/" >
            <input type="text" name="login" placeholder="login">
            <input type="password" name="pass" placeholder="password">
            Запомнить? <input type="checkbox" name="save">
            <button id="authBtn">Войти</button>
            </div>
        </form>
    <? else: ?>
        <H4>Добро пожаловть <?= $user ?></H4>
        <p><a href="/auth/logout/">Выход</a></p>
    <? endif; ?>
</div>
