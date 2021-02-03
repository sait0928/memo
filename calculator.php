<?php
// 入力された整数式を1文字ずつ配列に格納
$stdin = trim(fgets(STDIN));
$expression = str_split($stdin);
$expLen = count($expression);

$opCnt = 0; // operator count
$value[0] = 0;
$nest = 0; // 計算の優先度を管理

// 整数式の解析
for ($i = 0; $i < $expLen; $i ++) {
	$chr = $expression[$i];

	if ($chr >= '0' && $chr <= '9') {
		$value[$opCnt] = 10 * $value[$opCnt] + (int)$chr;
	}

	if ($chr == '+' || $chr == '-' || $chr == '*' || $chr == '/') {
		$operator[$opCnt] = $chr;
		if ($chr == '+' || $chr == '-') {
			$priority[$opCnt] = $nest + 1;
		} else {
			$priority[$opCnt] = $nest + 2; // +- より */ の方が優先度高い
		}
		$opCnt ++;
		$value[$opCnt] = 0;
	}

	if ($chr == '(') {
		$nest += 10; // カッコ内に入ると優先度高い
	}

	if ($chr == ')') {
		$nest -= 10; // カッコ外に出ると優先度戻る
	}
}

// 計算処理
while ($opCnt > 0) {
	$ip = 0; // 一番優先度の高い要素番号

	for ($i = 1; $i < $opCnt; $i ++) {
		if ($priority[$ip] < $priority[$i]) {
			$ip = $i; // さらに優先度の高い要素があれば上書き
		}
	}

	switch ($operator[$ip]) {
		case '+':
			$value[$ip] = $value[$ip] + $value[$ip + 1];
			break;
		case '-':
			$value[$ip] = $value[$ip] - $value[$ip + 1];
			break;
		case '*':
			$value[$ip] = $value[$ip] * $value[$ip + 1];
			break;
		case '/':
			$value[$ip] = $value[$ip] / $value[$ip + 1];
			break;
	}

	for ($i = $ip + 1; $i < $opCnt; $i ++) {
		$value[$i] = $value[$i + 1];
		$operator[$i - 1] = $operator[$i];
		$priority[$i - 1] = $priority[$i];
	}

	$opCnt --;
}

echo $value[0] . PHP_EOL;
