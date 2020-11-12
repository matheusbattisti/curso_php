<?php

  class Cachorro {

    function latir() {
      echo "Au au <br>";
    }

    function andar($m) {
      echo "O cachorro andou $m metros <br>";
    }

  }

  $viraLata = new Cachorro;
  $pastorAlemao = new Cachorro;

  $viraLata->latir();
  $pastorAlemao->latir();

  $viraLata->andar(1000);
  $pastorAlemao->andar(50);