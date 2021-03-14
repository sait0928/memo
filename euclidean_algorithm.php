<?php

$int1 = 876;
$int2 = 204;

echo calculateGreatestCommonDivisor($int1, $int2) . PHP_EOL;

/**
 * 2数の最大公約数を求める
 *
 * @param $int1
 * @param $int2
 * @return int
 */
function calculateGreatestCommonDivisor($int1, $int2)
{
	$l = $int1;
	$s = $int2;

	if($l < $s) {
		$s = $s - $l;
	} elseif ($l > $s) {
		$l = $l - $s;
	} else {
		return $l;
	}

	return calculateGreatestCommonDivisor($l, $s);
}
