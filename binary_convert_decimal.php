<?php

echo '2進数を入力してください : ';
$binary_number = trim(fgets(STDIN));

$digits = mb_strlen($binary_number);

$decimal_number = 0;

for($i = 1; $i <= $digits; $i++) {
	$binary = substr($binary_number, $i - 1, 1);
	$decimal_number += $binary * pow(2, $digits - $i);
}

echo $decimal_number . PHP_EOL;
