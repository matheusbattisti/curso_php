<?php

$array = [];

for ($i = 10; $i <= 20; $i++) {
array_push($array, $i);
}
for ($x = 0; $x <= count($array); $x++) {
echo $array[$x];
echo "</br>";
}

for( $i = 0; $i <= count($array); $i++){

  if ($array[$i]% 2 > 0) {
    echo " Número ".$array[$i]."é impar" ;
    echo "</br>";
  }
}






















  // $arr = [];

  // for($i = 10; $i <= 20; $i++) {
  //   array_push($arr, $i);
  // }

  // print_r($arr);
  // echo "<br>";

  // for($i = 0; $i < count($arr); $i++) {

  //   if($arr[$i] % 2 != 0) {
  //     echo "Número ímpar: $arr[$i] <br>";
  //   }

  //}