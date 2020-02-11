<?php

function galleryController(&$params, $action) {

    if (empty($action)) $action = 'gallery';
    $params['imgArray'] = getImageList(BIG_IMG_DIR);
    $templateName = 'gallery';
    if (isset($_POST['load'])) {
        echo filesUpload();
    }
    return render($templateName, $params);
}
