<?php

  class Humano {

    public $idade = 29;

    public function falar() {
      echo "Olá Mundo! <br>";
    }

    private function gritar() {
      echo "PHP É MUITO BOM! <br>";
    }

    public function acessaGritar() {
      $this->gritar();
    }

    protected function falarBaixinho() {
      echo "lalala <br>";
    }

    public function acessaFalarBaixinho() {
      $this->falarBaixinho();
    }

  }

  class Programador extends Humano {

    public function acessaFalarBaixinhoProgramador() {
      $this->falarBaixinho();
    }

  }

  $ze = new Humano;

  $ze->falar();
  $ze->acessaGritar();
  $ze->acessaFalarBaixinho();

  $matheus = new Programador;

  echo $matheus->idade . "<br>";

  $matheus->falar();
  $matheus->acessaGritar();
  $matheus->acessaFalarBaixinhoProgramador();