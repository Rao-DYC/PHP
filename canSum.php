<?php

function canSum(int $target, array $numbers, array &$sum = []){
	if(isset($sum[$target])){
		return $sum[$target];
	}
	if($target == 0){
		return true;
	}
	if($target < 0){
		return false;
	}

	foreach($numbers as $num){
		$reminder = $target - $num;
		if(canSum($reminder, $numbers, $sum) === true){
			$sum[$target] = true;
			return true;
		}
	}
	$sum[$target] = false;
	return false;
}
$sum = [];
echo canSum(7, [1,2,3,4,5,7], $sum) . PHP_EOL;
echo canSum(10, [9,12,6,7,15,7], $sum) . PHP_EOL;
echo canSum(700, [800,2,3,4,5,7], $sum) . PHP_EOL;
print_r($sum);