<?php

  $arr = [
    [1, 2, 3, 4],
    [2, 4, 6, 8],
    [3, 6, 9, 12]
  ];

  // loop no array externo
  for($i = 0; $i < count($arr); $i++) {

    // Imprimindo array
    echo "Imprimindo array externo: " . ($i + 1) . "<br>";

    // Imprimindo o array interno
    for($j = 0; $j < count($arr[$i]); $j++) {

      echo $arr[$i][$j] . "<br>";

    }

  }