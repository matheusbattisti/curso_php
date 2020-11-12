<?php

  $str1 = "Esta string é muito grande";
  $str2 = "Esta não";

  echo strlen($str1) . "<br>";
  echo strlen($str2) . "<br>";

  $len1 = strlen($str1);
  $len2 = strlen($str2);

  if($len1 > $len2) {
    echo "A string 1 é maior que a string 2";
  } else {
    echo "A string 2 é maior que a string 1";
  }