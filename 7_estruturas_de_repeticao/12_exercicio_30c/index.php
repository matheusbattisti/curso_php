<?php

  $arr = [];

  for($i = 10; $i <= 20; $i++) {
    array_push($arr, $i);
  }

  print_r($arr);
  echo "<br>";

  for($i = 0; $i < count($arr); $i++) {

    if($arr[$i] % 2 != 0) {
      echo "Número ímpar: $arr[$i] <br>";
    }

  }