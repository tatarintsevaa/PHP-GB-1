<?php
function sum($a, $b)
{
    return $a + $b;
}

function dif($a, $b)
{
    return $a - $b;
}

function mul($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if ($b == 0) {
        return 'Ошибка!На ноль делить нельзя!';
    }
    return $a / $b;
}

$data = json_decode(file_get_contents('php://input'));

$parsedData = [
    'operand_1' => $data->operand_1,
    'operand_2' => $data->operand_2,
    'operation' => $data->operation,
];
if (!empty($parsedData)) {
    $operation = $parsedData['operation'];
    $operand_1 = $parsedData['operand_1'];
    $operand_2 = $parsedData['operand_2'];
    $result = '';

    if ($operation == '+') {
        $result = sum($operand_1, $operand_2);
    } elseif ($operation == '-') {
        $result = dif($operand_1, $operand_2);
    } elseif ($operation == '*') {
        $result = mul($operand_1, $operand_2);
    } else {
        $result = div($operand_1, $operand_2);
    }
} else {
    $result = 'Введите верное значение';
}

header('Content-type: application/json');
echo json_encode($result);
