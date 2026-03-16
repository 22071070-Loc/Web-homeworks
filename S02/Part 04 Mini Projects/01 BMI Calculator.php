<?php
function calculateBMI(float $kg, float $m): array {
    $bmi = $kg / ($m * $m);

    if ($bmi < 18.5) {
        $category = "Underweight";
    } elseif ($bmi < 25) {
        $category = "Normal";
    } else {
        $category = "Overweight";
    }

    return [$bmi, $category];
}
