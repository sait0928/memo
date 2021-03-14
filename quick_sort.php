<?php

$array = [4, 5, 3, 6, 2, 7, 1];
$result = quickSort($array);
var_dump($result);

/**
 * クイックソート
 *
 * @param $array
 * @return array
 */
function quickSort($array)
{
	// 配列の要素数が1以下なら処理は行わない
	$count = count($array);
	if($count <= 1) {
		return $array;
	}

	// 基準値を決める
	$pivot = $array[0];

	// 基準値よりも小さい値と大きい値でグループ分けする
	$left = [];
	$right = [];
	for($i = 1; $i < $count; $i++) {
		if($array[$i] < $pivot) {
			$left[] = $array[$i];
		}
		if($array[$i] > $pivot) {
			$right[] = $array[$i];
		}
	}

	// グループ分けした配列に対して再帰的にクイックソートを行う
	$left = quickSort($left);
	$right = quickSort($right);

	// 結合する
	$pivot = [$pivot];
	$array = array_merge($left, $pivot, $right);
	return $array;
}