<?php

  $arr = ['banana', 'maçã', 'batata', 'pêra', 'mamão'];

  if(in_array("batata", $arr)) {
    echo "Há o item batata no array <br>";
  } else {
    echo "Não há batata no array <br>";
  }

  $b = "banana";

  if(in_array($b, $arr)) {
    echo "Há o item banana no array <br>";
  } else {
    echo "Não há banana no array <br>";
  }

  if(in_array("teste", $arr)) {
    echo "Há o item teste no array <br>";
  } else {
    echo "Não há teste no array <br>";
  }