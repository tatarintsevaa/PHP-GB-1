<?php 


$operation1 = mathOperation(5, 0, 'div');
    
    
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation){
        case 'sum':
            return $arg1 + $arg2; 
        case 'dif':
            return $arg1 - $arg2; 
        case 'mul':
            return $arg1 * $arg2; 
        case 'div':
            if ($arg2 === 0) {
            return "Ошибка!На ноль делить нельзя!";
        }
            return $arg1 / $arg2;  
    }
        
    
}
?>
<h1>Задание 3</h1>
<h2>
    Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
</h2>
<h1>Решение</h1>
<h2>
    <?=$operation1?>
</h2>
<h2>

</h2>
