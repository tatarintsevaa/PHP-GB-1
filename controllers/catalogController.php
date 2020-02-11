<?php

function catalogController(&$params, $action) {

    if (empty($action)) $action = 'catalog';

    $templateName = '/catalog/' . $action;
    switch ($action) {
        case 'catalog':
            $params['catalog'] = getCatalog();
            break;
        case 'catalogItem':
            $params['item'] = getCatalogItem($_GET['id']);
            $params['feedback'] = getAllFeedback($_GET['id']);
            break;
    }
    return render($templateName, $params);
}
