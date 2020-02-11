<?php
function apiController(&$params, $action) {
    if ($action == 'buy') {
        addToCart($_GET['id'], $action, session_id());
        $qty = getQty(session_id());
        echo json_encode(['qty' => $qty]);
        die();
    } elseif ($action == 'del') {
        $newQty = delFromCart($_GET['id'], $action, session_id());
        $qty = getQty(session_id());
        $total = getTotalPrice(session_id());
        echo json_encode(['qty' => $qty, 'newQty' => $newQty, 'totalPrice' => $total]);
        die();
    } elseif ($action == 'checkout') {
        $data = json_decode(file_get_contents('php://input'));
        $totalPrice = addNewOrder($data, session_id());
        echo json_encode(['totalPrice' => $totalPrice]);
        die();
    } elseif ($action == 'newSession') {
        session_regenerate_id();
        exit();
    } elseif ($action == 'editStatus') {
        changeOrderStatus((int) $_GET['id'], (int) $_GET['status']);
        $statuses = [
            1 => 'Создан',
            2 => 'Оплачен',
            3 => 'Отправлен',
        ];
        $newStatus = "";
        foreach ($statuses as $key => $value) {
            if ((int) $_GET['status'] == $key) {
                 $newStatus = $value;
            }
        }
        echo json_encode(['status' => $newStatus]);
        exit();
    } else {
        $qty = getQty(session_id());
        echo json_encode(['qty' => $qty]);
        die();
    }
}