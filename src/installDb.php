<?php
function getImageList($path)
{
    return array_splice(scandir($path), 2);
}

$imageList = getImageList(dirname(__DIR__) . '/public/images/big/');

$db = @mysqli_connect("localhost", "tatalexGB", "123456", "tatalex_gb") or
Die("Ошибка соединения! " . mysqli_connect_error());

$result = @mysqli_query($db, "DELETE FROM gallery") or die(mysqli_error($db));


$query = "INSERT INTO gallery (id, name, views) VALUES";
foreach ($imageList as $item) {
    $query .= " (NULL, '{$item}', '0'),";
}
$query = mb_substr($query, 0, -1);
$result = @mysqli_query($db, $query) or die(mysqli_error($db));
var_dump($result);
