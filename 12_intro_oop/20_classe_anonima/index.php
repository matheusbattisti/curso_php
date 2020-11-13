<?php

  $pessoa = new class() {

    public $nome = "Matheus";

    public function dizerNome() {
      echo "Olá meu nome é $this->nome <br>";
    }

  };

  echo $pessoa->nome . "<br>";

  $pessoa->dizerNome();