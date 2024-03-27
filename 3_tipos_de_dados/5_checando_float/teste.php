<?php

  $a = 1.5;
  $b = 2;
  $c = $a * $b;

  if(is_float($a)) {
    echo  $a." é float <br>";
  }
  if(is_int($b)) {
    echo  $b." é inteiro <br>";
  }

  if(is_int($c)) {
    echo  $c." é inteiro <br>";
  }

  if(is_float($c)) {
    echo  $c." é float <br>";
  }
echo "outro teste <br>";
  $x = 1.5;
  $y = 1.5;
  $d = $x+  $y ;

  if(is_float($d)) {
    echo  $d." é float <br>";
  }