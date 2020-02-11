<?php

function getOrders() {
    return getAssocResult('SELECT * FROM orders WHERE 1 ');
}

function changeOrderStatus($id, $status) {
    $sql = "UPDATE orders SET status={$status} WHERE id={$id}";
    executeQuery($sql);
}

