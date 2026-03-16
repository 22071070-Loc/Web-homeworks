<?php
$value = "25.50";

$a = (float)$value;
$b = (int)$a;

echo gettype($a) . "(" . $a . "), ";
echo gettype($b) . "(" . $b . ")";
