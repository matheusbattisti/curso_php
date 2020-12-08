<?php

  require_once("db.php");
  require_once("globals.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  print_r($_POST); exit;

  // Recebendo os inputs do formulário
  $name = filter_input(INPUT_POST, "name");
  $lastname = filter_input(INPUT_POST, "lastname");
  $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
  $password = filter_input(INPUT_POST, "password");
  $type = filter_input(INPUT_POST, "type");

  $message = new Message($BASE_URL);

  // Verificação do tipo de formulário
  if($type === "register") {

    // Verificação de campos necessários para registro
    if($name && $lastname && $email && $password) {

      $userDao = new UserDAO($conn);

      // Verificar se usuário já existe
      if($userDao->findByEmail($email) === false) {

        $user = new User();

        // Criar token e senha
        $userToken = bin2hex(random_bytes(50));
        $finalPassword = password_hash($password, PASSWORD_BCRYPT);

        print_r($userToken); exit;

        $user->name = $name;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = $password;

        $userDao->create($user);

      } else {

        $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "auth.php");

      }

    } else {

      $message->setMessage("Por favor, preencha todos os campos.", "error", "auth.php");

    }

  } else if($type === "login") {

    echo "Login";

  } else {

    $message->setMessage("Informações inválidas, tente novamente.", "error", "index.php");

  }