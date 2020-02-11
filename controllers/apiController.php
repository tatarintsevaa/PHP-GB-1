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
    } else {
        $qty = getQty(session_id());
        echo json_encode(['qty' => $qty]);
        die();
    }
}