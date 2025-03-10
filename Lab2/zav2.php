<?php
$intNumber = 10;         // Ціле число
$floatNumber = 5.75;     // Дробове число

// Явне перетворення
$intToFloat = (float) $intNumber;
$floatToInt = (int) $floatNumber;

echo "Ціле число: $intNumber<br>";
echo "Дробове число: $floatNumber<br>";
echo "Ціле -> Дробове: $intToFloat<br>";
echo "Дробове -> Ціле: $floatToInt<br>";
?>
