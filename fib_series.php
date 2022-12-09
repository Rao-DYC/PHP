<?php

function fib($number)
{
	$sum[1] = 1;
	$sum[2] = 1;
	if ($number > 2) {
		for ($i = 3; $i <= $number; $i++) {
			$sum[$i] = $sum[$i - 1] + $sum[$i - 2];
		}
	}
	// print_r($sum);
	return $sum[$number];
}


// Recursion 

function fib_recursion(int $number, &$sum)
{
	if(array_key_exists($number, $sum)){
		return $sum[$number];
	}
	if($number === 1 || $number === 2){
		return 1;
	}
	$sum[$number] = fib_recursion(($number - 1), $sum) + fib_recursion(($number - 2), $sum);
	// print_r($sum);
	return $sum[$number];
}



// Classic 

function fib_classic( int $number)
{
	if($number === 1 || $number === 2){
		return 1;
	}
	$prev_first = 1;
	$prev_second = 1;
	for($i = 3; $i <= $number; $i++){
		$sum = $prev_first + $prev_second;
		[$prev_first, $prev_second] = [$sum, $prev_first];
		// print_r($sum);echo PHP_EOL;
	}
	return $sum;
}

echo "Classic" . PHP_EOL;
echo fib_classic(15) . PHP_EOL;

echo "Array with for loop" . PHP_EOL;
echo fib(15) .PHP_EOL;

$sum = [];
echo "Recursion with array" . PHP_EOL;
echo fib_recursion(15, $sum) . PHP_EOL;

