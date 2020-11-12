<?php

  $frase = "O rato roeu a roupa do Rei de Roma"; // 4 letras a

  $contadorDeAs = 0;

  for($i = 0; $i < strlen($frase); $i++) {

    if($frase[$i] === "a") {
      $contadorDeAs++;
    }

  }

  echo "O número de a's na frase é de : $contadorDeAs";