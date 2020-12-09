<?php

  require_once("db.php");
  require_once("globals.php");
  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  // Verificando o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  $userDao = new UserDAO($conn, $BASE_URL);

  if($type === "update") {

    // Recebendo os inputs do formulário
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password");
    $image = filter_input(INPUT_POST, "image");
    $bio = filter_input(INPUT_POST, "bio");
    $token = filter_input(INPUT_POST, "token");

    // Montando usuário com dados novos
    $user = new User();

    $user->name = $name;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->password = $finalPassword;
    $user->image = $image;
    $user->bio = $bio;
    $user->token = $token;

  }