<?php

// 配列と要素数
$array = [3, 5, 7, 9, 11];
$n = count($array);

// 探しているデータ
$x = 9;

// 探索範囲
$first = 0;
$last = $n - 1;

// 探索結果
$result = -1;

while($first < $last) {
	// 探索範囲の中央値
	$center = floor(($first + $last) / 2);

	// 中央値が探しているデータより小さい時、探索範囲を後半に絞る
	if($array[$center] < $x) {
		$first = $center + 1;
	}

	// 中央値が探しているデータより大きい時、探索範囲を前半に絞る
	if($array[$center] > $x) {
		$last = $center - 1;
	}

	// 中央値が探しているデータに一致した場合、探索成功とする
	if($array[$center] == $x) {
		$result = $center;
		break;
	}
}

if($result == -1) {
	echo '探索データなし';
} else {
	echo '配列の' . $result . '番目にデータが見つかりました';
}

echo PHP_EOL;
