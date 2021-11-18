<?php 
class test3{


/**
 * 
 * get the pair of array count which satisfy condition
 * 
 * @params array $array
 * @params int $l
 * @params int $r
 * 
 * @response int $output
 * 
 */
function test($array, $l, $r)
{
    $output = 0;
    if (!empty($array)) {
        foreach ($array as $key => $value) {
            $output = $output+$this->checkCombination($value, $array,  $l, $r);
        }
    }
    return $output;
}


/**
 * 
 * Check individual value of array with all other value and match condition
 * 
 * @params string $value
 * @params array $array
 * @params int $l
 * @params int $r
 * 
 * @response int $count
 * 
 */
function checkCombination($value, $array, $l, $r){
    $count = 0;

    foreach ($array as $key => $arr) {
        if ($arr != $value) {
            if ($value < $arr && $l <= ($value * $arr) && ($value * $arr) <= $r) {
                $count = $count+1;
            }
        }
    }

    return $count;
}

}

$array = [1, 2, 5, 10, 5];
$l = 2;
$r = 15;
$test3 = new test3();

echo $test3->test($array, $l, $r);
