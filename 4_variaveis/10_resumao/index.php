<?php

$num_1 = 5;
$num_2 = 2;

$resultado  = 0;
//global
function somar_global($num_1, $num_2){ //parametro
  global $resultado;

  $resultado = $num_1 + $num_2;
}
somar_global($num_1,$num_2);
echo $num_1 .' + '.$num_2.'='. $resultado;

echo '<br> tabuada<br> ';
function tabuada($b) {
  static $a ;
  $a++;
 global $resulado;
 $resulado = $a * $b;
  echo " $a x  $b =   $resulado <br>";
}
tabuada(2);
tabuada(2);
tabuada(2);
tabuada(2);
tabuada(2);
tabuada(2);
tabuada(2);
tabuada(2);

echo '<br> local<br> ';

function variavel_local(){
  $num_1 = 5;
  tabuada($num_1);
  tabuada($num_1);
}
variavel_local();


echo '<br> referencia<br> ';

$x = 'filipe';

$y =& $x;
echo '<br>';
echo 'Y REFERENCIANDO VALOR DE X';
echo '<br>';
echo 'y: '.$y;
echo '<br>';
echo 'x: '.$x;
echo '<br>';
$y = 'Mathias';
echo 'Y MUDANDO VALOR DE  X';
echo '<br>';
echo 'y: '.$y;
echo '<br>';
echo 'x: '.$x;
echo '<br>';
$x = 'Filipe';
echo 'X MUDANDO VALOR DE  Y';
echo '<br>';
echo 'y: '.$y;
echo '<br>';
echo 'x: '.$x;
echo '<br>';
echo '<br>';
echo 'VARIAVEL DE VARIAVEL';
echo '<br>';

$x = "nome"; // valor de nome

echo "$x <br>";

$$x = "Matheus"; // var com o nome de x (nome), com valor de Matheus

echo "$nome <br>";


