<?php

  $arr = [2, 4, 6, 8, 10, 12, 14, 16, 18];

  $slice1 = array_slice($arr, 1, 3);

  print_r($slice1);
  echo "<br>";

  $slice2 = array_slice($arr, 4, 4);

  print_r($slice2);
  echo "<br>";

  $slice3 = array_slice($arr, 4);

  print_r($slice3);
  echo "<br>";

  $slice4 = array_slice($arr, 4, -3);

  print_r($slice4);
  echo "<br>";