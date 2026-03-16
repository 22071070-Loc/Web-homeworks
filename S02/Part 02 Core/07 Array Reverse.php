<?php
$numbers = [1, 2, 3, 4, 5];
$reversed = [];

for ($i = count($numbers) - 1; $i >= 0; $i--) {
    $reversed[] = $numbers[$i];
}

foreach ($reversed as $n) {
    echo $n . " ";
}
