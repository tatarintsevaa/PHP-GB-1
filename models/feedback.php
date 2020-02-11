<?php

function getAllFeedback($id) {
    $sql = "SELECT * FROM feedback WHERE id_goods={$id} ORDER BY id DESC";
    return getAssocResult($sql);    
};

function doFeedbackAction(&$params, $action, $parsedData) {
    if ($action == 'add') {
        $id_goods = $parsedData['id_good'];
        $name = saveData($parsedData['name']);
        $feedback = saveData($parsedData['feed']);
        $sql = "INSERT INTO feedback (`name`, `feedback`, `id_goods`) VALUES ('{$name}', '{$feedback}','{$id_goods}')";
        $result = executeQuery($sql);
        $id_feed = mysqli_insert_id(getDb());
        echo json_encode(['status' => $result, 'id' => $id_feed]);
        die();
    }
    if ($action == 'edit') {
        $id_feed = (int)$_GET['id_feed'];
        $sql = "SELECT * FROM `feedback` WHERE id = '{$id_feed}'";
        $result = getAssocResult($sql)[0];
        echo json_encode(['name' => $result['name'], 'feed' => $result['feedback']]);
        die();
    }
    if ($action == "save") {
        $id = (int)$_GET['id_feed'];
        $name = saveData($parsedData['name']);
        $feedback = saveData($parsedData['feed']);
        $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
        $result = executeQuery($sql);
        echo json_encode(['status' => $result]);
        die();

    }
    if ($action == "del") {
        $id_feed = (int)$_GET['id_feed'];
        $sql = "DELETE FROM `feedback` WHERE id = {$id_feed}";
        $result = executeQuery($sql);
        echo json_encode(['status' => $result]);
        die();
    }
}