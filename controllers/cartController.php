<?php
function cartController(&$params, $action) {

    if (empty($action)) $action = 'cart';

    $templateName = '/cart/' . $action;
    switch ($action) {
        case 'cart':
            $params['products'] = getCartProducts(session_id());
            $params['totalPrice'] = totalPrice($params['products']);
            break;
    }
    return render($templateName, $params);
}