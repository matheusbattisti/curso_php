<?php

  require_once("../db.php");
  require_once("../globals.php");
  require_once("../models/User.php");
  require_once("../models/Auth.php");

  $name = filter_input(INPUT_POST, "name");
  $lastname = filter_input(INPUT_POST, "lastname");
  $email = filter_input(INPUT_POST, "email");
  $password = filter_input(INPUT_POST, "password");

  // Verificar se usuário já existe
  if($user->findByEmail($email) === false) {



  } else {

    header("Location: $BASE_URL");

  }