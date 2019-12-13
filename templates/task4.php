<?php
$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];
$str = " Объявить массив, индексами которого являются буквы русского языка,
    а значениями – соответствующие латинские буквосочетания";
//$str = $_POST['textToTranslate'];
function translator($str, $alfabet)
{
    $result = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $symbol = mb_substr($str, $i, 1);
        $lowerSymbol = mb_strtolower(mb_substr($str, $i, 1));
        if (array_key_exists($lowerSymbol, $alfabet)) {
            foreach ($alfabet as $key => $value) {
                if ($lowerSymbol === $key) {
                    if ($lowerSymbol != $symbol) {
                        $result .= mb_strtoupper($value);
                    } else {
                        $result .= $value;
                    }
                }
            }
        } else {
            $result .= $symbol;
        }

    }
    return $result;
}

?>
<h1>Задание 3</h1>
<h2>
    Объявить массив, индексами которого являются буквы русского языка,
    а значениями – соответствующие латинские буквосочетания
    (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
    Написать функцию транслитерации строк. Должны корректно обрабатываться разного рода пробелы,
    знаки препинания, и заглавные буквы.
</h2>

<!--<h2>пример</h2>-->
<!--<form action="task4.php" method="post">-->
<!--    <p>Введите текст: <input type="text" name="textToTranslate" /></p>-->
<!--    <p><input type="submit" /></p>-->
<!--</form>-->
<h2>
    результат
</h2>
<h3>
    <?= translator($str, $alfabet) ?>
</h3>

