<?php

  class Pessoa {

    function falar() {
      echo "Olá, eu sou um objeto! <br>";
    }

    function somar($x, $y) {
      echo $x + $y . "<br>";
    }

  }

  $matheus = new Pessoa;

  $matheus->falar();
  $matheus->falar();

  $joao = new Pessoa;

  $joao->falar();

  $matheus->somar(2, 2);

  $joao->somar(10, 12);