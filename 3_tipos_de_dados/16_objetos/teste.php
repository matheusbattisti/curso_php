<?php

  class Carro {

   
    function avanca() {
      echo "carro avançando";
    }
    function para() {
      echo "carro parando!";
    }
  }

  $gol = new Carro();

  $gol ->nome = "gol";

  echo $gol ->nome;

  echo "<br>";

  $gol->avanca();
  echo "<br>";
  $gol->para();
