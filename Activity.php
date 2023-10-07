<?php
//Create a function that will return the square root will return the square root of every number from 1-N.
// Function should return Array
function SquareRoot($n){
    $num = array();
    for($i = 1; $i <= $n; $i++){
        $squareroot = sqrt($i);
        array_push($num, $squareroot);
        
    }
    return $num;
}
$n = 10;
// print_r(SquareRoot($n));

foreach(SquareRoot($n) as $square) {
    echo "$square";
    echo "<br>";
}


?>