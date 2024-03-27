<?php

$array = [1,5,"filipe",6,"cassila","mathias",20,5,010,"filipe"];
$tamanho = count($array);
$contador = 0;
while ($tamanho> $contador) {
  
  if(is_string($array[$contador])){
    echo " a ".$array[$contador]. " é uma string <br>";
  }    
  $contador++;
}
echo "------------------------------------";

  $arr = [5, "Matheus", true, false, "Opa", 12.8, "Teste", true, [], "Palavra", 5, 10, "Alô"];

  $x = count($arr);
  $y = 0;

  while($y < $x) {

    if(is_string($arr[$y])) {
      echo $arr[$y] . "<br>";
    }

    $y++;

  }