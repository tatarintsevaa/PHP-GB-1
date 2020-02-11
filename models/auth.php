<?php
function updateHash()
{
    $hash = uniqid(rand(), true);
    $id = saveData(($_SESSION['id']));
    $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
    executeQuery($sql);
    setcookie("hash", $hash, time() + 3600);
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

function is_admin() {
    $user = get_user();
    return $user == 'admin' ? true : false;
}


