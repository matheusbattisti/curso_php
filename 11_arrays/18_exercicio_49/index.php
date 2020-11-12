<?php

  $raca = "Vira lata";
  $nome = "Turca";
  $idade = 3;
  $cor = "Preta";

  $turca = compact("raca", "nome", "idade", "cor");

  print_r($turca);
  echo "<br>";

  foreach($turca as $caracteristica => $value) {

    echo "$caracteristica: $value <br>";

  }