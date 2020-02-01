<?php
function getCartProducts()
{
    $sql = "SELECT goods.id as goods_id, goods.name as name, goods.image as image, goods.price as price,
 cart.qty as qty FROM goods, cart WHERE cart.id_good = goods.id";
    return getAssocResult($sql);
}

function getQty($id)
{
    $sql = "SELECT cart.qty FROM cart WHERE 1";
    $result = getAssocResult($sql);
    return array_sum(array_column($result, 'qty'));

}

function addToCart($id)
{
    $sql = "INSERT INTO cart (id, id_good, qty) VALUES (NULL, {$id}, 1);";
    $result = executeQuery($sql);
}