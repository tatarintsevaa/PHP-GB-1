<?php

function getAllFeedback($id) {
    $sql = "SELECT * FROM feedback WHERE id_goods={$id} ORDER BY id DESC";
    return getAssocResult($sql);    
};

function doFeedbackAction(&$params, $action) {
    $db = getDb();
    $row = [];
    $params['buttonText'] = "Отправить";
    $params['action'] = 'add';

    if ($action == 'add') {
        $id_goods = $_POST['id_goods'];
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
        $sql = "INSERT INTO `feedback` (`name`, `feedback`, `id_goods`) VALUES ('{$name}', '{$feedback}','{$id_goods}')";
        $result = mysqli_query($db, $sql);
        header("Location: /catalogItem/?id={$id_goods}&message=OK");
    }
    if ($action == 'edit') {
        $id_feed = (int)$_GET['id_feed'];
        $sql = "SELECT * FROM `feedback` WHERE id = '{$id_feed}'";
        $params['row'] = getAssocResult($sql)[0];
        $id_goods = $params['row']['id_goods'];
        $params['buttonText'] = "Править";
        $params['action'] = "save";
        header("Location: /catalogItem/?id={$id_goods}");
    }
    if ($action == "save") {
        $id = (int)$_GET['id_feed'];
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['feedback'])));
        $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
        $result = mysqli_query($db, $sql);
    }
    if ($action == "del") {
        $id_feed = (int)$_GET['id_feed'];
        $id = (int)$_GET['id'];
        $sql = "DELETE FROM `feedback` WHERE id = {$id_feed}";
        executeQuery($sql);
        header("Location: /catalogItem/?id={$id}&message=del");
    }
    if ($_GET['message'] == 'OK') $params['message'] = 'Отзыв добавлен';
    if ($_GET['message'] == 'edit') $params['message'] = 'Отзыв отредактированн';
    if ($_GET['message'] == 'del') $params['message'] = 'Отзыв удален';
}