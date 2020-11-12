<?php

  $arr = [
    'porta' => 100,
    'maçaneta' => 5,
    'motor' => 2000,
    'retrovisor' => 8
  ];

  function itensCaros($arr) {

    $arrItensCaros = [];

    foreach($arr as $item => $preco) {

      if($preco > 10) {

        array_push($arrItensCaros, $item);

      }

    }

    return $arrItensCaros;

  }

  $novoArr = itensCaros($arr);

  print_r($novoArr);