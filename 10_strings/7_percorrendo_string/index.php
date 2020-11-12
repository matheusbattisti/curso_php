<?php

  $str = "Esta é uma string muito grande, ela tem vários caracteres";

  for($i = 0; $i < strlen($str); $i++) {

    echo "$str[$i] <br>";

  }