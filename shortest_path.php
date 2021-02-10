<?php

// $distance[$i][$j] ... 地点iから地点jまでの距離を格納
$distance[0] = [ 0,  2,  8,  4, -1, -1, -1];
$distance[1] = [ 2,  0, -1, -1,  3, -1, -1];
$distance[2] = [ 8, -1,  0, -1,  2,  3, -1];
$distance[3] = [ 4, -1, -1,  0, -1,  8, -1];
$distance[4] = [-1,  3,  2, -1,  0, -1,  9];
$distance[5] = [-1, -1,  3,  8, -1,  0,  3];
$distance[6] = [-1, -1, -1, -1,  9,  3,  0];

$s_dist = 10000; // 最短距離の初期化

$n_point = 7; // 地点数

// 必要な配列の初期化
for ($i = 0; $i < $n_point; $i ++) {
	$s_route[$i] = -1; // 最短経路上の地点番号
	$p_dist[$i] = 10000; // 出発地から各地点までの最短距離
	$p_fixed[$i] = false; // 各地点の最短距離の確定状態
	$p_route[$i] = 0; // 出発地から最短経路で各地点にたどり着く時、直前に経由する地点番号
}

$sp = 0; // 出発地の地点番号

$p_dist[$sp] = 0; // 出発地から出発地自身への最短距離は0

// 最短経路探索処理
while (true) {
	// 最短距離が未確定の地点(p_fixed[i]がfalseの地点)を1つ探す
	for ($i = 0; $i < $n_point; $i ++) {
		if (!$p_fixed[$i]) {
			break;
		}
	}

	// 出発地から全地点までの最短距離が確定したら、探索処理終了(直前のループでbreakできなかった場合)
	if ($i == $n_point) {
		break;
	}

	// 最短距離が確定されていない地点のうち、最短距離がより短い地点を探す
	for ($j = $i + 1; $j < $n_point; $j ++) {
		if (!($p_fixed[$j]) && $p_dist[$j] < $p_dist[$i]) {
			$i = $j;
		}
	}

	$s_point = $i; // 出発地からの最短距離が未確定である地点のうち、出発地からの距離が最も短い地点

	$p_fixed[$s_point] = true; // 出発地からの最短距離を確定

	for ($j = 0; $j < $n_point; $j ++) {
		// jまでの最短経路が確定されていない時、s_pointを経由した場合のjまでの距離を求める
		if ($distance[$s_point][$j] > 0 && !($p_fixed[$j])) {
			$new_dist = $p_dist[$s_point] + $distance[$s_point][$j];

			// これが現時点のp_dist[j]の値よりも小さかった場合は更新する
			if ($new_dist < $p_dist[$j]) {
				$p_dist[$j] = $new_dist; // 最短距離の上書き
				$p_route[$j] = $s_point; // 直前の地点番号
			}
		}
	}
} // 最短経路探索ここまで

$dp = 6; // 目的地の地点番号

$s_dist = $p_dist[$dp]; // 目的地までの最短距離

$j = 0;
$i = $dp;
while ($i != $sp) {
	$s_route[$j] = $i; // 最短経路の地点番号を目的地から順番に格納
	$i = $p_route[$i]; // 直前の地点番号を辿っていく
	$j ++;
}

$s_route[$j] = $sp;
