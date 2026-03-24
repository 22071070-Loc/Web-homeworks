<?php
$a = $_POST["a"] ?? null;
$b = $_POST["b"] ?? null;
$op = $_POST["op"] ?? null;
$result = "";

if ($a !== null && $b !== null) {
    $a = (float)$a;
    $b = (float)$b;

    switch ($op) {
        case "+":
            $result = $a + $b;
            break;
        case "-":
            $result = $a - $b;
            break;
        case "*":
            $result = $a * $b;
            break;
        case "/":
            $result = $b == 0 ? "Error" : $a / $b;
            break;
    }
}
?>

<form method="post">
    <input type="number" step="any" name="a">
    <select name="op">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" step="any" name="b">
    <button type="submit">=</button>
</form>

<div><?php echo $result; ?></div>
