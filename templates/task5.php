<?php
$str2 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet animi, ex ipsam necessitatibus totam. 
Aut blanditiis enim excepturi fuga ipsam, laboriosam laborum, magnam mollitia officiis quam quisquam suscipit unde!';
function translator2($str)
{
    $result = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $symbol = mb_substr($str, $i, 1);
        if ($symbol == ' ') {
            $result .= '_';
        } else {
            $result .= $symbol;
        }

    }
    return $result;
}
function translator3($str) {
    return str_replace(' ', '_', $str);
}

?>
<h1>Задание 5</h1>
<h2>
    Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
    Можно сделать через str_replace
</h2>
<h2>
    результат
</h2>
<h3>
    вариант 1 <br>
    <?= translator2($str2)?>
</h3>
<h3>
    вариант 2 <br>
    <?= translator3($str2)?>
</h3>

