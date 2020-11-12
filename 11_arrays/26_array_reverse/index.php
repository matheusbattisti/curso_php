<?php

  $arr = [1, 2, 3, 4, 5];

  $arrRev = array_reverse($arr);

  print_r($arr);
  echo "<br>";
  print_r($arrRev);
  echo "<br>";

  $arr2 = ["Matheus", 12, true, [1, 2]];

  $arr2Rev = array_reverse($arr2);

  print_r($arr2Rev);