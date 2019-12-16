<?php
$paramsMenu = [
    'Главная' => '/',
    'Задание 1' => '/?page=task1',
    'Задание 2' => '/?page=task2',
    'Задание 3' => '/?page=task3',
    'Задание 4' => '/?page=task4',
    'Задание 5' => '/?page=task5',
    'Задание 7' => '/?page=task7',
    'Задание 8' => '/?page=task8',
    'Задание 9' => '/?page=task9',
];
?>
<ul class="menu">
    <?php foreach($paramsMenu as $key => $param): ?>
    <li><a href="<?=$param?>"><?=$key?></a></li>
    <?endforeach;?>
</ul>

