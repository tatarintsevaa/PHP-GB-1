<?php

function getDb()
{
    static $db = null;
    if (is_null($db)) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or Die("Could not connect: " .
            mysqli_connect_error());
    }
    return $db;
}

function closeDb() {
    mysqli_close(getDb());
}


function executeQuery($sql) {
    $db = getDb();
    $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
    return $result;
}

function getAssocResult($sql) {
    $db = getDb();
    $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
    $array_result = [];
    while ($row = mysqli_fetch_assoc($result))
        $array_result[] = $row;
    return $array_result;
}

function saveData($data) {
    $db = getDb();
    return strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $data)));
}