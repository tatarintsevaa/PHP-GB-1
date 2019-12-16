<?php
$cities = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин']
];

foreach ($cities as $key => $value) {
    $result8 .= "{$key}: <br>";
    $citiesFiltered = preg_grep("/^К+.+$/ m", $value);
    foreach ($citiesFiltered as $item) {
        if ($item == $citiesFiltered[array_key_last($citiesFiltered)]) {
            $result8 .= "{$item}. <br> ";
        } else {
            $result8 .= "{$item}, ";
        }

    }
}
?>
<h1>Задание 8</h1>
<h2>
    *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
</h2>
<h2>
    <?= $result8 ?>
</h2>