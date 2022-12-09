<?php

$roman = 'VVIVVV';

$roman = strtoupper($roman);
$count = strlen($roman);

function validate_string($roman, $count)
{
    for ($i = 0; $i < $count; $i++) {
        if (!in_array($roman[$i], ['I', 'V', 'X', 'L', 'C', 'D', 'M'])) {
            return false;
        }
    }
    return true;
}

function get_int($letter)
{
    if ($letter == 'I') {
        return 1;
    } elseif ($letter == 'V') {
        return 5;
    } elseif ($letter == 'X') {
        return 10;
    } elseif ($letter == 'L') {
        return 50;
    } elseif ($letter == 'C') {
        return 100;
    } elseif ($letter == 'D') {
        return 500;
    } elseif ($letter == 'M') {
        return 1000;
    }
}

function total($roman, $count)
{
    $total = 0;
    for ($i = 0; $i < $count; $i++) {
        $value1 = get_int($roman[$i]);
        $value2 = $i+1 < $count ? get_int($roman[$i+1]) : 0;
        if ($value1 >= $value2) {
            $total += $value1;
        } else {
            $total -= $value1;
        }
    }
    return $total;
}

if (!validate_string($roman, $count)) {
    echo 'not a proper roman number';
} else {
    echo total($roman, $count);
}
