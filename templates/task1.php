<?php 
$a = -5;
$b = -2;
if ($a >= 0 && $b >= 0) {
     $result = $a - $b;  
} elseif ($a < 0 && $b < 0) {
     $result = $a * $b;
} else {
     $result = $a + $b;
}
?>
<h1>Задание 1</h1>
<h2>
    Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
    если $a и $b положительные, вывести их разность;
    если $а и $b отрицательные, вывести их произведение;
    если $а и $b разных знаков, вывести их сумму;
</h2>
<h2>
    Ответ
    <?=$result?>
</h2>
