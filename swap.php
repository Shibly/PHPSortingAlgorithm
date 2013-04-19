<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
function array_swap($array, $key1 = 0, $key2 = 1)
{
    $newArray = array();
    foreach ($array as $key => $val) {
        if ($key == $key1) {
            $newArray[$key1] = $array[$key2];
        } else if ($key == $key2) {
            $newArray[$key2] = $array[$key1];
        } else {
            $newArray[$key] = $val;
        }
    }
    return $newArray;
}

*/
$input = array("red", "green", "blue", "yellow");
$res = array_splice($input, 3);
print_r($res);
?>
