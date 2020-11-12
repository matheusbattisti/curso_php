<?php

  $carro = ["Jaguar", 3.0, "Azul", 18, "Teto solar", "Automático"];

  list($marca, $motor, $cor, $aro, $opicional, $cambio) = $carro;

  echo "$marca <br>";
  echo "$motor <br>";
  echo "$cor <br>";
  echo "$aro <br>";
  echo "$opicional <br>";
  echo "$cambio <br>";

  print_r($carro);