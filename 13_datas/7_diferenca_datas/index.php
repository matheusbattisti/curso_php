<?php

  $dataA = new DateTime();
  $dataB = new DateTime();

  $dataB->setDate(2001, 10, 15);

  print_r($dataA);
  echo "<br>";
  print_r($dataB);
  echo "<br>";

  $diferenca = $dataA->diff($dataB);

  print_r($diferenca);
  echo "<br>";

  echo $diferenca->format("%a days");
  echo "<br>";