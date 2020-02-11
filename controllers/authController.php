<?php
function authController(&$params, $action)
{
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if ($action == 'login') {
        if (!auth($login, $pass)) {
            Die('Не верный логин или пароль');
        } else {
            if (isset($_POST['save'])) {
                updateHash();
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
    if ($action == 'logout') {
        session_destroy();
        setcookie("hash", "", time() - 36000, '/');
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
