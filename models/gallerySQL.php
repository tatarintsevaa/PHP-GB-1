<?php
function getImagesListSQL() {
    return getAssocResult('SELECT * FROM gallery WHERE 1 ORDER BY views DESC');
}

function getOneImage(int $id) {
    $sqlInc = "UPDATE gallery SET views=views+1 WHERE id = {$id}";
    $result = executeQuery($sqlInc);
    $sql = "SELECT * FROM gallery WHERE id = {$id}";
    $image = getAssocResult($sql);
    return $image[0];
}
