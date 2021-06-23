<?php
$numbers = [1,9,4.5,6.6,5.7,-4.5];
function selectionSort($array)
{
    for ($i = 0; $i <count($array); $i++){
        $min = $i;
        for ($j = $i + 1;$j < count($array); $j++)
        {
            if ($array[$j] < $array[$min]){
                $min = $j;
            }
        }
        $tmp = $array[$min];
        $array[$min] =  $array[$i];
        $array[$i] = $tmp;
    }
    return $array;
}
echo implode(', ',selectionSort($numbers));
