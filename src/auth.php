<?php

session_start();

function doAuthActions($logout, &$params, $data) {
    $params['allow'] = false;

    if (isset($logout)) {
        session_destroy();
        setcookie("hash");
        header("Location: /");
    }

    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }


    if (!empty($data)) {
        $login = $data['login'];
        $pass = $data['pass'];

        if (!auth($login, $pass)) {
            Die('Не верный логин пароль');
        } else {
            if (isset($data['save'])) {
                $hash = uniqid(rand(), true);
                $id = saveData(($_SESSION['id']));
                $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
                $result = executeQuery($sql);
                setcookie("hash", $hash, time() + 3600);
            }
            $params['allow'] = true;
            $params['user'] = get_user();
        }
    }
}


function auth($login, $pass)
{
    $login = saveData($login);
    $sql = "SELECT * FROM users WHERE login = '{$login}'";
    $row = getAssocResult($sql)[0];

    if (password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
        $row = getAssocResult($sql)[0];
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return $_SESSION['login'];
}


