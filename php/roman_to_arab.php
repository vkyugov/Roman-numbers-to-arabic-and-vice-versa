<?php
function roman_to_arab($n)
{
    $rome = array('I' => 1,
                  'V' => 5,
                  'X' => 10,
                  'L' => 50,
                  'C' => 100,
                  'D' => 500,
                  'M' => 1000);

    $rome1 = array(1 => 'I',
                   2 => 'V',
                   3 => 'X',
                   4 => 'L',
                   5 => 'C',
                   6 => 'D',
                   7 => 'M');

    if($n<0){
        return '';
    }
    if(!$n){
        return '0';
    }
    $n = mb_strtoupper($n);

    /*
    *Split the string to iterate over
    */
    $array = str_split($n);

    /*
     * $a - Future arab number
     */
    $a = 0;

    for($i = 0; $i < count($array); $i++) {
    /*
     * Check if the number of the Romans was
     */
        if(!array_key_exists($array[$i], $rome)){
            $a = 0;
            return 'The Romans didn’t have such a number : '.$array[$i];
        }

        /*
         * 3 digit check
         */
        if($array[$i] == $array[$i+1] && $array[$i] == $array[$i+2] && $array[$i] == $array[$i+3] && $array[$i] !='M'){
            $a = 0;
            return 'The number does not repeat more than three times!';
        }
        /*
         * Conversion process
         */
        $k = array_search($array[$i], $rome1);
        if($array[$i+1] != false){
            $knext = array_search($array[$i+1], $rome1);
        }
        else {
                $knext = 0;
        }
        
        if ($k < $knext){
            $a = $a-$rome[$array[$i]];
        }

        else {
            foreach ($rome as $key => $value) {
            if($array[$i] == $key){
                $a+=$value;
                }
            }    
        }
        
    unset($knext);
    }
    return $a;
} 