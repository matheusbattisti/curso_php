<?php


$resultado = 5;
$resultado2 = "5";
$resultado3 = "5"+5;
$resultado4 = "4"+5;

  if(is_int($resultado)) { // true
    echo " resultado 1 é um inteiro <br>";
  }

  if(is_int($resultado2)) { // false
    echo "resultado 2 é um inteiro <br>";
  }


  $a = 10;
   echo  " <br> resultado 3 é inteigro ou não".$resultado3." ? <br>";
  if(is_int($resultado3)) { // true
    echo "o resultado é um inteiro <br>";
  }

  echo  " <br> resultado 4 é inteigro ou não. ".$resultado4." ? <br>";
  if(is_int($resultado4 )) { // true
    echo "o resultado é um inteiro  <br>".$resultado4;
  }

 