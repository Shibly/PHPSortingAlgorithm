<?php 
function minVal(array $array) {
        $length=count($array);
        for ($i=0;$i<$length;$i++) {
            $min=$i;
            for ($j=$i+1;$j<$length;$j++) {
                if ($array[$j]>$array[$min]) {
                    $min=$j;
                }
            }
            $tmp=$array[$min];
            $array[$min]=$array[$i];
            $array[$i]=$tmp;
		} 
        return $array[0];
    }


    $data = minVal(array(0,8,7,6,5,4,3,2,1,9));
    echo $data;
?>