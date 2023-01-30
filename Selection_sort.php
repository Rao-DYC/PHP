<?php

function generate_unsorted_array($length)
{
	$unsorted_array = [];
	for ($i = 0; $i < $length; $i++) {
		$random_number = rand(1, 999999);
		if (!isset($unsorted_array[$random_number])) {
			$unsorted_array[$random_number] = $random_number;
		}
	}
	return $unsorted_array;
}

$array = generate_unsorted_array(100000);
$unsorted_array = [...$array];
$start = time();
$count = count($unsorted_array);

/* Unidirectional Sorting */
for ($i = 0; $i < $count; $i++) {
	$smallest = $i;
	for($j = $i+1; $j < $count; $j++){
		if ($unsorted_array[$smallest] > $unsorted_array[$j]) {
			$smallest = $j;
		}
	}
	if($unsorted_array[$smallest] < $unsorted_array[$i]){
		[$unsorted_array[$smallest], $unsorted_array[$i]] = [$unsorted_array[$i], $unsorted_array[$smallest]];
	}
}
$end = time();
print_r($start);echo "\n";print_r($end);echo "\n";
// print_r($unsorted_array);

/* Bidirectional Sorting */

// $array = generate_unsorted_array(100000);
$unsorted_array = [...$array];
$start = time();
$count = count($unsorted_array);

/* Unidirectional Sorting */
$i = 0;
for ($j = $count - 1; $i < $j; $j--) {
	// index
	$smallest = $i;
	$largest = $i;
	// value
	$large = $unsorted_array[$i];

	for($k = $i; $k <= $j; $k++){
		if ($unsorted_array[$smallest] > $unsorted_array[$k]) {
			$smallest = $k;
		}
		if($unsorted_array[$largest] < $unsorted_array[$k]){
			$largest = $k;
			$large = $unsorted_array[$k];
		}
	}
	if($unsorted_array[$smallest] < $unsorted_array[$i]){
		[$unsorted_array[$smallest], $unsorted_array[$i]] = [$unsorted_array[$i], $unsorted_array[$smallest]];
	}
	if($unsorted_array[$smallest]  == $large){
		[$unsorted_array[$smallest], $unsorted_array[$j]] = [$unsorted_array[$j], $unsorted_array[$smallest]];
	}else{
		[$unsorted_array[$largest], $unsorted_array[$j]] = [$unsorted_array[$j], $unsorted_array[$largest]];
	}
	$i++;
}
$end = time();
print_r($start);echo "\n";print_r($end);echo "\n";
// print_r($unsorted_array);