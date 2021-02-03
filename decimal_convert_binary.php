<?php
echo '10進数を入力してください : ';

$decimal_number = trim(fgets(STDIN));

$binary_number = '';

do {
	$binary_number = $decimal_number % 2 . $binary_number;
	$decimal_number = floor($decimal_number / 2);
} while($decimal_number > 0);

echo '2進数 : '. $binary_number . PHP_EOL;
