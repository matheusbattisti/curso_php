<?php

  require_once("db.php");
  require_once("globals.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  $message = new Message($BASE_URL);
  $userDao = new UserDAO($conn, $BASE_URL);

  // Verificando o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  // Verificação do tipo de formulário
  if($type === "register") {

    // Recebendo os inputs do formulário
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password");
    $confirmPassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificação de campos necessários para registro
    if($name && $lastname && $email && $password) {

      // Verificar se as senhas são iguais
      if($password === $confirmPassword) {

        // Verificar se usuário já existe
        if($userDao->findByEmail($email) === false) {

          $user = new User();

          // Criar token e senha
          $userToken = $user->generateToken();
          $finalPassword = password_hash($password, PASSWORD_DEFAULT);

          $user->name = $name;
          $user->lastname = $lastname;
          $user->email = $email;
          $user->password = $finalPassword;
          $user->token = $userToken;

          $auth = true;

          $userDao->create($user, $auth);

        } else {

          $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "auth.php");

        }

      } else {

        $message->setMessage("As senhas não são iguais.", "error", "auth.php");

      }

    } else {

      $message->setMessage("Por favor, preencha todos os campos.", "error", "auth.php");

    }

  // Fazer o login do usuário
  } else if($type === "login") {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    // Se conseguir autenticar, mensagem de sucesso
    if($userDao->authenticateUser($email, $password)) {

      $message->setMessage("Seja bem-vindo!", "success", "editprofile.php");

    // Caso não autenticar, redireciona para a página de auth com erro
    } else {

      $message->setMessage("Usuário e/ou senha incorretos!", "error", "auth.php");

    }

  } else {

    $message->setMessage("Informações inválidas, tente novamente.", "error", "index.php");

  }