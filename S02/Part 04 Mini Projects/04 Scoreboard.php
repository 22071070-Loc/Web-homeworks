<?php
$scores = [65, 78, 90, 82, 55, 99, 70];

$sum = 0;
$max = $scores[0];
$min = $scores[0];

foreach ($scores as $s) {
    $sum += $s;
    if ($s > $max) {
        $max = $s;
    }
    if ($s < $min) {
        $min = $s;
    }
}

$avg = $sum / count($scores);

$top = [];
foreach ($scores as $s) {
    if ($s > $avg) {
        $top[] = $s;
    }
}

echo "Average: " . $avg . "\n";
echo "Max: " . $max . "\n";
echo "Min: " . $min . "\n";

foreach ($top as $t) {
    echo $t . " ";
}
