<?php
function getCartProducts($session_id)
{
    $sql = "SELECT goods.id as goods_id, goods.name as name, goods.image as image, goods.price as price,
 cart.qty as qty, cart.session_id as session_id, cart.id as id FROM goods, cart WHERE cart.id_good = goods.id AND cart.session_id='{$session_id}'";
    return getAssocResult($sql);
}

function getQty($session_id)
{
    $sql = "SELECT cart.qty FROM cart WHERE session_id='{$session_id}'";
    $result = getAssocResult($sql);
    return array_sum(array_column($result, 'qty'));
}


function addNewProduct($id, $session_id)
{
    $sql = "INSERT INTO cart (id, id_good, qty, session_id) VALUES (NULL, {$id}, 1, '{$session_id}')";
    $result = executeQuery($sql);
}

function updateQty($id, $action, $session_id)
{
    if ($action == 'buy') {
        $sql = "UPDATE cart SET qty=qty+1 WHERE id_good={$id} AND session_id='{$session_id}'";
        $result = executeQuery($sql);
    } else if ($action == 'del') {
        $sql = "UPDATE cart SET qty=qty-1 WHERE id={$id} AND session_id='{$session_id}'";
        $result = executeQuery($sql);
    }
}

function addToCart($id, $action, $session_id)
{
    $sql = "SELECT cart.qty FROM cart WHERE id_good={$id} AND session_id='{$session_id}'";
    $qty = (int)getAssocResult($sql);
    if ($qty >= 1) {
        updateQty($id, $action, $session_id);
    } else {
        addNewProduct($id, $session_id);
    }
}

function delProduct($id, $session_id)
{
    $sql = "DELETE FROM cart WHERE id={$id} AND session_id='{$session_id}'";
    $result = executeQuery($sql);
}

function delFromCart($id, $action, $session_id)
{
    $sql = "SELECT cart.qty FROM cart WHERE id={$id} AND session_id='{$session_id}'";
    $qty = getAssocResult($sql)[0]['qty'];
    if ($qty > 1) {
        updateQty($id, $action, $session_id);
        return --$qty;
    } else {
        delProduct($id, $session_id);
        return --$qty;
    }
}

function totalPrice($array)
{
    $total = 0;
    foreach ($array as $value) {
        $total += (int)$value['qty'] * (int)$value['price'];
    }
    return $total;
}

function getTotalPrice($session_id) {
    $sql = "SELECT cart.qty as qty, goods.price as price  FROM cart, goods WHERE cart.id_good = goods.id AND session_id='{$session_id}'";
    $order = getAssocResult($sql);
    return totalPrice($order);
}

function addNewOrder($data, $session_id)
{
    $parsedData = [
        'name' => $data->name,
        'phoneNum' => $data->phoneNum,
    ];
    $sql = "INSERT INTO ordres (`id`, `session_id`, `name`, `phone`) VALUES (null, '{$session_id}','{$parsedData['name']}','{$parsedData['phoneNum']}')";
    executeQuery($sql);
    $sql = "SELECT cart.qty as qty, goods.price as price  FROM cart, goods WHERE cart.id_good = goods.id AND session_id='{$session_id}'";
    $order = getAssocResult($sql);
    return totalPrice($order);
}

function doOrderActions($action, $id){
    if ($action == 'buy') {
        addToCart($id, $action, session_id());
        $qty = getQty(session_id());
        return json_encode(['qty' => $qty]);

    } elseif ($action == 'del') {
        $newQty = delFromCart($id, $action, session_id());
        $qty = getQty(session_id());
        $total = getTotalPrice(session_id());
        return json_encode(['qty' => $qty, 'newQty' => $newQty, 'totalPrice' => $total]);
    } elseif ($action == 'checkout') {
        $data = json_decode(file_get_contents('php://input'));
        $totalPrice = addNewOrder($data, session_id());
        return json_encode(['totalPrice' => $totalPrice]);
    } elseif ($action == 'newSession') {
        session_regenerate_id();
        exit();
    } else {
        $qty = getQty(session_id());
        return json_encode(['qty' => $qty]);
    }
}
