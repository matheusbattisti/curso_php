<?php

  $vel = 60;
  $velMax = 40;

  if($vel < $velMax) {

    echo "Parabéns, você está numa velocidade segura <br>";

  } else if($vel == $velMax) {

    echo "Cuidado! Você está no limite de velocidade <br>";

  } else {

    echo "Você foi multado, velocidade acima do permitido <br>";

  }