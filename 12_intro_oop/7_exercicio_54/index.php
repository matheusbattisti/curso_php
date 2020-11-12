<?php

  class Pessoa {

    public $nome;
    public $idade;

    function andar($m) {
      echo "A pessoa andou $m metros <br>";
    }

  }

  $matheus = new Pessoa;

  $matheus->nome = "Matheus";
  $matheus->idade = 29;

  echo "O nome dele é $matheus->nome e tem $matheus->idade anos <br>";

  $matheus->andar(20);

  $joaquim = new Pessoa;

  $joaquim->nome = "Joaquim";
  $joaquim->idade = 32;

  echo "O nome dele é $joaquim->nome e tem $joaquim->idade anos <br>";

  $joaquim->andar(30);