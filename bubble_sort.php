<?php

/**
 * バブルソート(交換法)
 * 隣同士のデータの大小を比較して、順番が逆であれば交換するアルゴリズム
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
	// 整列中の比較位置
	$j = $right;

	// jの値 と j-1の値 を比較していくので、j-1 が i になったらその処理で終了
	while($j - 1 >= $i) {
		// jの値 よりも j-1の値 が大きかった場合、データを入れ替える
		if($array[$j - 1] > $array[$j]) {
			// storage に一時的に jの値 を保存しておき
			$storage = $array[$j];

			// jの値 を j-1の値 で上書きしたら
			$array[$j] = $array[$j - 1];

			// j-1の値 を storage に保存しておいた jの値 で上書きする
			$array[$j - 1] = $storage;
		}
		echo $array[0].', '.$array[1].', '.$array[2].', '.$array[3].', '.$array[4].PHP_EOL;
		// j を1つ左にずらす
		$j --;
	}
	// i を1つ右にずらす
	$i++;
}
