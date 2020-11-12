<?php

  $arr = range(1, 20);

  print_r(array_chunk($arr, 4));
  echo "<br>";

  $arrays = array_chunk($arr, 10);

  print_r($arrays);
  echo "<br>";

  print_r($arrays[1]);
  echo "<br>";