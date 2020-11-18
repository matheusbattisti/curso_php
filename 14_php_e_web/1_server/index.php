<?php

  print_r($_SERVER);

  echo "<br>";

  echo $_SERVER['MYSQL_HOME'] . "<br>";

  if($_SERVER['SERVER_NAME'] == 'localhost') {

    echo "Está acessando o localhost <br>";

  }