<?php

class test4{

    /**
     * 
     * Sort array your temperory value $temp
     * we can also do this using php sort function
     * 
     */
    function test($array){
        for($j = 0; $j < count($array); $j ++) {
            for($i = 0; $i < count($array)-1; $i ++){
        
                if($array[$i] > $array[$i+1]) {
                    $temp = $array[$i+1];
                    $array[$i+1]=$array[$i];
                    $array[$i]=$temp;
                }       
            }
        }
        return $array;
    }
}


$test4 = new test4();

print_r($test4->test([0, 1, 2, 0, 1, 2]));
