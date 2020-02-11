<?php
function gallerySQLController(&$params, $action) {

    if (empty($action)) $action = 'gallerySQL';

    $templateName = '/gallerySQL/' . $action;
    switch ($action) {
        case 'gallerySQL':
            $params['images'] = getImagesListSQL();
            break;
        case 'imageSQL':
            $params['image'] = getOneImage($_GET['id']);
            break;
    }
    return render($templateName, $params);
}