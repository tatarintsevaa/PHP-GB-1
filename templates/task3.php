<?php 
    $a = rand(-5, 5);
    $b = rand(0, 5);

    function sum($a, $b) {
        return $a + $b;
    }
    $sum1 = sum($a, $b);
     function dif($a, $b) {
        return $a - $b;
    }
    $dif1 = dif($a, $b);
    function mul($a, $b) {
        return $a * $b;
    }
    $mul1 = mul($a, $b);
    function div($a, $b) {
        if ($b === 0) {
            return "Ошибка!На ноль делить нельзя!";
        }
        return $a / $b;
    }
    $div1 = div($a, $b);




?>


<h1>Задание 3</h1>
<h2>
     Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. Сделайте в функции деления проверку деления на ноль и возврат сообщения об ошибке.
</h2>
<h2>
    Cумма <?=$a?> и <?=$b?> равна <?=$sum1?><br>
    Разность <?=$a?> и <?=$b?> равна <?=$dif1?><br>
    Произведение <?=$a?> и <?=$b?> равна <?=$mul1?><br>
    Деление <?=$a?> и <?=$b?> равна <?=$div1?>
</h2>