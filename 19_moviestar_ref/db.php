<?php

  session_start();

  $db_name = 'moviestar_ref';
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';

  $conn = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);