<?php

  function parOuImpar($num) {

    if($num % 2 === 0) {
      echo "O número $num: é par <br>";
    } else {
      echo "O número $num: é ímpar <br>";
    }

  }

  parOuImpar(30);
  parOuImpar(31);
  parOuImpar(22);
  parOuImpar(11);