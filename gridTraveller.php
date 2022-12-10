<?php

function gridTraveler(int $rows, int $column, array &$ways, &$i = 0)
{
	$i++;
	$key = $rows . ',' . $column;
	if(isset($ways[$key])){
		return $ways[$key];
	}
	if($rows == 1 && $column == 1){
		return 1;
	}
	if($rows <= 0 || $column <= 0){
		return false;
	}
	$ways[$key] = gridTraveler($rows-1, $column, $ways, $i) + gridTraveler($rows, $column - 1, $ways, $i) + gridTraveler($rows - 1, $column - 1, $ways, $i);
	// print_r($ways);
	// $i++;
	return $ways[$key];
}
$ways = [];
$i = 0;
echo gridTraveler(4,4, $ways, $i) . PHP_EOL;
print_r($ways);
echo $i;