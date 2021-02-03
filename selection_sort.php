<?php

/**
 * 選択ソート(選択法)
 * 最小値、または最大値を探して順に並べていくアルゴリズム
 */

// 整列対象の配列
$array = [5, 3, 1, 4, 2];
echo $array[0].', '.$array[1].', '.$array[2].', '.$array[3].', '.$array[4].PHP_EOL;

// データの個数
$count = count($array);

// 右端の番号(配列は 0 から始まるためデータの個数とは別に用意しておく)
$right = $count - 1;

// 確定させる左端のデータの位置
$i = 0;

// 左端 〜 右端-1 までデータを確定させるので、i が right-1 になったらその処理で終了
while($i <= $right - 1) {
	// 最小値の位置(暫定)
	$min = $i;

	// 最小値と比較するデータの位置
	$j = $i + 1;

	// i+1 から right までの値を順番に最小値と比較していくので、j が right になったらその処理で終了
	while($j <= $right) {
		// minの値 と jの値 を比較して、jの値 の方が小さい場合 min を更新する
		if($array[$j] < $array[$min]) {
			$min = $j; // この時点では最小値の位置(min)が分かっているだけで入れ替えは行なっていない
		}
		// j を1つ右にずらす
		$j++;
	}
	// 最小値の位置(min)が現在地(i)でなかった場合は入れ替えを行う
	if($min != $i) {
		// storage に一時的に iの値 を保存しておき
		$storage = $array[$i];

		// iの値 を minの値 で上書きしたら
		$array[$i] = $array[$min];

		// minの値 を storage に保存しておいた iの値 で上書きする
		$array[$min] = $storage;
	}
	echo $array[0].', '.$array[1].', '.$array[2].', '.$array[3].', '.$array[4].PHP_EOL;
	// i を1つ右にずらす
	$i++;
}
