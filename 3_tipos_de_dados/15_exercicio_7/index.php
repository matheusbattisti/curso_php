<?php

  $pessoa = ["nome"=>"filipe",
  "peso" => 80,
  "altura" =>1.78,
  "imc"=> 0,
  "sexo"=>"masculino"  
];

$pessoa["imc"] = $pessoa["peso"] /($pessoa["altura"] * $pessoa["altura"]);

$imc = $pessoa["imc"];
$nome = $pessoa["nome"];

echo "O IMC da pessoa $nome é de $imc";
echo "<br>";

if(is_float($imc)){
echo "imc é float";
echo "<br>";
if($imc > 24){
  echo "$nome esta acima do peso";
}    

}   