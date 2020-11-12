<?php

  $marca = "BMW";
  $motor = "3.0";
  $tetoSolar = true;
  $portas = 4;

  $carro = compact("marca", "motor", "tetoSolar", "portas");

  print_r($carro);