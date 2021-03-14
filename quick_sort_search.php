<?php

/**
 * 平成27年度春 FE試験
 * 午後問題 問8
 * クイックソートの応用
 */

// 走査対象の配列
$array = [3, 5, 6, 4, 7, 2, 1];
echo implode(', ', $array) . PHP_EOL;

// 走査範囲の初期値
$top = 0;
$last = count($array) - 1;

// k番目に小さい値を求めたい(0 <= k <= $last)
$k = 2;

while($top < $last) {
	// 基準値
	$pivot = $array[$k];

	$i = $top;
	$j = $last;

	// 基準値より小さい値と大きい値に振り分ける
	while(true) {
		// 基準値より前側にあり、基準値より大きい値を探す
		while($array[$i] < $pivot) {
			$i++;
		}

		// 基準値より後側にあり、基準値より小さい値を探す
		while($array[$j] > $pivot) {
			$j--;
		}

		// ループ終了
		if($i >= $j) {
			break;
		}

		// 値の入れ替え
		$work = $array[$i];
		$array[$i] = $array[$j];
		$array[$j] = $work;

		// 次の値を探す
		$i++;
		$j--;

		$result = implode(', ', $array);
		echo $result . PHP_EOL;
	}

	// 走査範囲を狭める
	if($i <= $k) {
		$top = $j + 1;
	}

	if($j >= $k) {
		$last = $i - 1;
	}
}
