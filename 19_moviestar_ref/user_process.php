<?php

  require_once("db.php");
  require_once("globals.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  // Verificando o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  $message = new Message($BASE_URL);
  $userDao = new UserDAO($conn, $BASE_URL);

  // Atualizar informações do usuário
  if($type === "update") {

    // Recebendo os inputs do formulário
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $image = filter_input(INPUT_POST, "image");
    $bio = filter_input(INPUT_POST, "bio");
    $token = filter_input(INPUT_POST, "token");
    $id = filter_input(INPUT_POST, "id");

    // Montando usuário com dados novos
    $user = new User();

    $user->name = $name;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->image = $image;
    $user->bio = $bio;
    $user->token = $token;
    $user->id = $id;

    $userDao->update($user);

  // Atualizar senha
  } else if($type === "changepassword") {

    // Recebendo os inputs do formulário
    $password = filter_input(INPUT_POST, "password");
    $confirmPassword = filter_input(INPUT_POST, "confirmpassword"); 
    $id = filter_input(INPUT_POST, "id");
    
    if($password == $confirmPassword) {

      // Montando usuário com dados novos
      $user = new User();

      $finalPassword = password_hash($password, PASSWORD_DEFAULT);

      $user->password = $finalPassword;
      $user->id = $id;

      $userDao->changePassword($user);

    } else {

      $message->setMessage("As senhas não são iguais.", "error", "editprofile.php");

    }

  }