<?php

  $str = "Estamos testando o método strpos, com o strpos podemos encontrar strings";

  $testeEncontrar = strpos($str, "strpos");

  echo "$testeEncontrar <br>";

  $testeEncontrar2 = strpos($str, "Java");

  echo "$testeEncontrar2 <br>";

  if($testeEncontrar2 === false) {
    echo "Palavra não encontrada <br>";
  }

  $palavra = "com";

  $testeEncontrar3 = strpos($str, $palavra);

  echo "$testeEncontrar3 <br>";

  $palavra2 = "to";

  $testeEncontrar4 = strpos($str, $palavra2);

  echo "$testeEncontrar4 <br>";