<?php
function apiFeedController(&$params, $action) {
    $data = json_decode(file_get_contents('php://input'));
    $parsedData = [
        'name' => $data->name,
        'feed' => $data->feed,
        'id_good' => $data->id_good,
    ];
    doFeedbackAction($params,$action, $parsedData);
    die();
}