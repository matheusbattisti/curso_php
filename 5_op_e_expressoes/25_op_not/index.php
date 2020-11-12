<?php

  if(!(5 > 2)) { // true > false
    echo "A operação 1 é verdadeira <br>";
  }

  if(!(5 > 20)) { // false > true
    echo "A operação 2 é verdadeira <br>";
  }

  $a = 10;
  $b = 20;

  if(!($a >= $b)) {
    echo "A operação 3 é verdadeira <br>";
  }