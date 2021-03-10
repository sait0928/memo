<?php
$n = trim(fgets(STDIN));

echo $n . 'の階乗は' . factorial($n) . 'です' . PHP_EOL;

/**
 * nの階乗を求める
 *
 * @param $n
 */
function factorial($n)
{
	if($n == 0 || $n == 1) {
		return 1;
	}

	if($n >= 2) {
		return $n * factorial($n - 1);
	}

	return false;
}