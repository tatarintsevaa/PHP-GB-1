<?php
function getCartProducts()
{
    $sql = "SELECT goods.id as goods_id, goods.name as name, goods.image as image, goods.price as price,
 cart.qty as qty FROM goods, cart WHERE cart.id_good = goods.id";
    return getAssocResult($sql);
}

function getQty()
{
    $sql = "SELECT cart.qty FROM cart WHERE 1";
    $result = getAssocResult($sql);
    return array_sum(array_column($result, 'qty'));
}

function addNewProduct($id)
{
    $sql = "INSERT INTO cart (id, id_good, qty) VALUES (NULL, {$id}, 1)";
    $result = executeQuery($sql);
}

function updateQty($id, $action)
{
    if ($action == 'buy') {
        $sql = "UPDATE cart SET qty=qty+1 WHERE id_good={$id}";
        $result = executeQuery($sql);
    } else if ($action == 'del') {
        $sql = "UPDATE cart SET qty=qty-1 WHERE id_good={$id}";
        $result = executeQuery($sql);
    }
}

function addToCart($id, $action)
{
    $sql = "SELECT cart.qty FROM cart WHERE id_good={$id}";
    $qty = (int)getAssocResult($sql);
    if ($qty >= 1) {
        updateQty($id, $action);
    } else {
        addNewProduct($id);
    }
}

function delProduct($id)
{
    $sql = "DELETE FROM cart WHERE id_good={$id}";
    $result = executeQuery($sql);
}

function delFromCart($id, $action)
{
    $sql = "SELECT cart.qty FROM cart WHERE id_good={$id}";
    $qty = getAssocResult($sql)[0]['qty'];
    if ($qty > 1) {
        updateQty($id, $action);
        return --$qty;
    } else {
        delProduct($id);
        return --$qty;
    }
}
