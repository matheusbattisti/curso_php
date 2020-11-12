<?php

  $arr = [1, 2, 4, 19, 234, 12, 34, 5, 12];

  function soma($a, $b) {
    return $a + $b;
  }

  function subtracao($a, $b) {
    return $a - $b;
  }

  $resultado = array_reduce($arr, "soma");

  echo "$resultado <br>";

  $resultado2 = array_reduce($arr, "subtracao");

  echo "$resultado2 <br>";