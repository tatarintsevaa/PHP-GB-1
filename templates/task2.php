<?php
$j = 0;
do {
    if ($j === 0) {
        $result2 .= "{$j} - ноль. <br>";
    } elseif ($j % 2 === 0) {
        $result2 .= "{$j} - четное число. <br>";
    } else {
        $result2 .= "{$j} - не четное число. <br>";
    }
    $j++;
} while ($j <= 10);
?>
<h1>Задание 2</h1>
<h2>
    С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – ноль.
    1 – нечетное число.
    2 – четное число.
    3 – нечетное число.
    …
    10 – четное число
</h2>
<h2>
    Ответ 1 вариант <br>
    <?= $result2 ?>
</h2>
