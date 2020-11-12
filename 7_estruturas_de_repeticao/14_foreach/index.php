<?php

  $nomes = ["Matheus", "João", "Pedro", "Maria"];

  $a = 10;

  foreach($nomes as $nome) {
    echo "O nome do índice atual é $nome <br>";
    if($nome == "Matheus") {
      echo "Opa $a <br>";
    }
  }