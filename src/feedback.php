<?php

function getAllFeedback() {
    $sql = "SELECT * FROM feedback ORDER BY id DESC";
    return getAssocResult($sql);
};

function doFeedbackAction(&$params, $action) {
    $db = getDb();
    $row = [];
    $buttonText = "Отправить";

    if ($action == 'add') {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
        $sql = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
        $result = mysqli_query($db, $sql);
        header("Location: /?message=OK");
    }

    if ($_GET['message'] == 'OK') $params['message'] = 'Отзыв добавлен';
}



if ($_GET['action'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM `feedback` WHERE id = {$id}");
    $row = mysqli_fetch_assoc($result);
    $buttonText = "Править";
    $action = "save";
}

if ($_GET['action'] == "save") {
    $id = (int)$_POST['id'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['feedback'])));
    $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
    $result = mysqli_query($db, $sql);

    header("Location: /?message=edit");
    die();
}

if ($_GET['action'] == 'add') {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
    $sql = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
    $result = mysqli_query($db, $sql);
    header("Location: /?message=OK");
}

$message = [
    "OK" => "Сообщение добавлено.",
    "edit" => "Сообщение изменено."
];


//$result = mysqli_query($db, "SELECT * FROM `feedback` ORDER BY id DESC ");