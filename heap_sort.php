<?php

$data = [15, 30, 5, 60, 10, 45, 20];
$heap = [];
$hnum = count($data);

$heap = heapSort($data, $heap, $hnum);
var_dump($heap);

/**
 * 親の要素番号を求める
 *
 * @param $element
 * @return false|float
 */
function parent($element)
{
	return floor(($element - 1) / 2);
}

/**
 * 左側の子の要素番号を求める
 *
 * @param $element
 * @return float|int
 */
function leftChild($element)
{
	return $element * 2 + 1;
}

/**
 * 右側の子の要素番号を求める
 *
 * @param $element
 * @return float|int
 */
function rightChild($element)
{
	return $element * 2 + 2;
}

/**
 * 配列をヒープにする
 *
 * @param $data
 * @param $heap
 * @param $hnum
 * @return mixed
 */
function makeHeap($data, $heap, $hnum)
{
	for ($i = 0; $i < $hnum; $i ++) {
		$heap[$i] = $data[$i];

		$k = $i;
		while ($k > 0) {
			if ($heap[$k] > $heap[parent($k)]) {
				$heap = swap($heap, $k, parent($k));
				$k = parent($k);
			} else {
				break;
			}
		}
	}
	return $heap;
}

/**
 * 要素を交換する
 *
 * @param $array
 * @param $element
 * @param $parent
 * @return mixed
 */
function swap($array, $element, $parent)
{
	$tmp = $array[$element];
	$array[$element] = $array[$parent];
	$array[$parent] = $tmp;

	return $array;
}

/**
 * ヒープに対してソートを行う
 *
 * @param $data
 * @param $heap
 * @param $hnum
 * @return mixed
 */
function heapSort($data, $heap, $hnum)
{
	$heap = makeHeap($data, $heap, $hnum);

	for ($last = $hnum - 1; $last > 0; $last --) {
		$heap = swap($heap, 0, $last);
		$heap = downHeap($heap, $last - 1);
	}

	return $heap;
}

/**
 * heapSort実行中に、未整列の部分がヒープの条件を満たすように再構成する
 *
 * @param $heap
 * @param $hlast
 * @return mixed
 */
function downHeap($heap, $hlast)
{
	$n = 0;
	while (leftChild($n) <= $hlast) {
		$tmp = leftChild($n);

		if (rightChild($n) <= $hlast) {
			if ($heap[$tmp] <= $heap[rightChild($n)]) {
				$tmp = rightChild($n);
			}
		}

		if ($heap[$tmp] > $heap[$n]) {
			$heap = swap($heap, $n, $tmp);
		} else {
			return $heap;
		}

		$n = $tmp;
	}

	return $heap;
}
