<?php

  $dataNascimento = mktime(02, 12, 33, 02, 05, 1991);

  echo $dataNascimento . "<br>";

  $dataNascimentoFormatada = date('d/m/Y', $dataNascimento);

  echo $dataNascimentoFormatada . "<br>";

  $dataEspecifica = mktime(10, 20, 11, 04, 28, 2041);

  $dataFuturaFormatada = date('m/d/y', $dataEspecifica);

  echo $dataFuturaFormatada . "<br>";