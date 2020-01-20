<?php
?>
<form method="post">
    <input type="number" name="operand_1" class="operand_1">
    <select name="operation" class="operation" >
        <option <? if (($_POST['operation'] == '+')) echo 'selected' ?>>+</option>
        <option <? if (($_POST['operation'] == '-')) echo 'selected' ?>>-</option>
        <option <? if (($_POST['operation'] == '*')) echo 'selected' ?>>*</option>
        <option <? if (($_POST['operation'] == '/')) echo 'selected' ?>>/</option>
    </select>
    <input type="number" name="operand_2" class="operand_2" >
    <button type="button" class="ok"> =</button>
</form>
<div>Результат вычисления: <strong class="result"></strong></div>

<script>

    document.querySelector('.ok').addEventListener('click', evt => {
        fetch('operation.php', {
            method: 'POST',
            body: JSON.stringify({
                operand_1: document.querySelector('.operand_1').value,
                operand_2: document.querySelector('.operand_2').value,
                operation: document.querySelector('.operation').value,
            }),
            headers: {
                'Content-type': 'application/json',
            },
        })
            .then((response) => response.json())
            .then((data) => {
                const result = document.querySelector('.result');
                result.innerHTML = data;
            })
    })


</script>

