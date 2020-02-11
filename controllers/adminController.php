<?php

function adminController(&$params, $action)
{

    if (empty($action)) $action = 'admin';

    switch ($action) {
        case 'admin':
            $params['orders'] = getOrders();
            break;
        case 'detail':
            $params['basket'] = getOrderDetail($_GET['id']);
            break;
    }

    $templateName = '/admin/' . $action;

    return render($templateName, $params);
}