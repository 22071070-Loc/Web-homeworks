<?php
$students = [
    ["name" => "Alice", "grade" => 90],
    ["name" => "Bob", "grade" => 85],
    ["name" => "Charlie", "grade" => 78]
];

echo "<table border='1'>";
echo "<tr><th>Name</th><th>Grade</th></tr>";

foreach ($students as $s) {
    echo "<tr>";
    echo "<td>" . $s["name"] . "</td>";
    echo "<td>" . $s["grade"] . "</td>";
    echo "</tr>";
}

echo "</table>";
