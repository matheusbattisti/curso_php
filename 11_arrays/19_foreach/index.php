<?php

  $matheus = [
    'nome' => 'Matheus',
    'idade' => 29,
    'profissao' => 'Programador'
  ];

  $alexia = [
    'nome' => 'Aléxia',
    'idade' => 25,
    'profissao' => 'Eng. Civil'
  ];

  foreach($matheus as $carac => $value) {

    echo "$carac => $value <br>";

  }

  foreach($alexia as $value) {

    echo "$value <br>";

  }