<?php

class SortingAlgorithm
{

    /**
     *
     * @param array $array
     * @return type
     */
    public static function bubbleSort(array $array)
    {
        $array_size = count($array);
        for ($i = 0; $i < $array_size; $i++) {
            for ($j = 0; $j < $array_size; $j++) {
                if ($array[$i] < $array[$j]) {
                    $tem = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $tem;
                }
            }
        }
        return $array;
    }

    /**
     *
     * @param array $array
     * @return type
     */
    public static function selectionSort(array $array)
    {
        $length = count($array);
        for ($i = 0; $i < $length; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($array[$j] < $array[$min]) {
                    $min = $j;
                }
            }
            $tmp = $array[$min];
            $array[$min] = $array[$i];
            $array[$i] = $tmp;
        }
        return $array;
    }

    /**
     *
     * @param array $array
     * @return type
     */
    public static function insertionSort(array $array)
    {
        $count = count($array);
        for ($i = 1; $i < $count; $i++) {

            // j is the index number of the first element of the array.
            // i is the index number of the second element of the array.
            $j = $i - 1;
            // second element of the array
            $element = $array[$i];
            while ($j >= 0 && $array[$j] > $element) {
                $array[$j + 1] = $array[$j];
                $array[$j] = $element;
                $j = $j - 1;
            }
        }
        return $array;
    }

    /**
     * @param array $array
     * @return array
     * Shell short is an improved version of insertion sort.
     * It improves on insertion sort by allowing the comparison and exchange
     * of element that are far apart. The last step of shell sort is pure insertion sort.
     * Shell sort uses a fixed gap sequence between the items then decrease the value(gap)
     * on every iteration. There are many gap sequence used in shell sort.
     * In this example I've used
     * Pratt Sequence
     */
    public static function shellSort(array $array)
    {
        $gaps = array(1, 2, 3, 4, 6);
        $gap = array_pop($gaps);
        $length = count($array);
        while ($gap > 0) {
            for ($i = $gap; $i < $length; $i++) {
                $tmp = $array[$i];
                $j = $i;
                while ($j >= $gap && $array[$j - $gap] > $tmp) {
                    $array[$j] = $array[$j - $gap];
                    $j -= $gap;
                }
                $array[$j] = $tmp;
            }
            $gap = array_pop($gaps);
        }
        return $array;
    }

    /**
     * @param array $array
     * @return array
     * Comb Sort is an improved version of bubble sort. The bubble sort always
     * compares values that are adjacent to each other in the data set.
     * The comb sort improves on this by adding the gap(the distance between two element in a data set)
     * which allows not adjacent numbers to be compared. After each iteration the gap is reduced by a
     * shrink factor until it reaches the value of 1. Hence at the very end comb sort performs a bubble sort :)
     */
    public static function combSort(array $array)
    {
        $gap = count($array);
        $swap = true;
        while ($gap > 1 || $swap) {
            if ($gap > 1) $gap /= 1.25;
            $swap = false;
            $i = 0;
            while ($i + $gap < count($array)) {
                if ($array[$i] > $array[$i + $gap]) {
                    // swapping the elements.
                    list($array[$i], $array[$i + $gap]) = array($array[$i + $gap], $array[$i]);
                    $swap = true;
                }
                $i++;
            }
        }
        return $array;
    }

    /**
     * @param array $array
     * @return array
     * Merge sort is a  divide and conquer algorithm. It divides the unsorted list(array) into n sub-lists
     * unless the list contain one single element. A list of one single element is considered sorted.
     * It then repeatedly merge the sub-lists to produce the resultant sorted list(Array).
     */
    public static function mergeSort(array $array)
    {

        if (count($array) <= 1)
            return $array;


        $left = self::mergeSort(array_splice($array,
            floor(count($array) / 2)));

        $right = self::mergeSort($array);

        $result = array();

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] <= $right[0]) {
                array_push($result, array_shift($left));
            } else {
                array_push($result, array_shift($right));
            }
        }
        while (count($left) > 0)
            array_push($result, array_shift($left));

        while (count($right) > 0)
            array_push($result, array_shift($right));

        return $result;
    }


}

// Example
$selectionSort = SortingAlgorithm::mergeSort(array(6, 5, 3, 1, 8, 7, 2, 4));
?>
<pre>
    <?php
    print_r($selectionSort);
    ?>
</pre>
