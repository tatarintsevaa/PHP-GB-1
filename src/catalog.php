<?php
function getCatalog() {
    $sql = "SELECT * FROM goods WHERE 1";
    return getAssocResult($sql);
}

function getCatalogItem(int $id) {
$sql = "SELECT * FROM goods WHERE id={$id}";
$item = getAssocResult($sql);
return $item[0];
}