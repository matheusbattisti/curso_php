<?php

  $pessoa = ["Matheus", 29, "Programador", "verde"];

  print_r($pessoa);
  echo "<br>";

  list($nome, $idade, $profissao, $corDosOlhos) = $pessoa;

  echo "$nome <br>";
  echo "$idade <br>";
  echo "$profissao <br>";
  echo "$corDosOlhos <br>";