<?php
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}

echo "Згенерований масив: " . implode(", ", $numbers) . "\n<br>";

echo "Мінімальне значення: " . min($numbers) . "\n<br>";
echo "Максимальне значення: " . max($numbers) . "\n<br>";
?>