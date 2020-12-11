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

    // Pegar info do usuário para substituir apenas o necessário
    $auth = new UserDAO($conn, $BASE_URL);
    $userData = $auth->verifyToken();

    // Recebendo os inputs do formulário
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $bio = filter_input(INPUT_POST, "bio");

    // Model do usuário para usar métodos
    $user = new User();

    // Alterando o que precisa para atualizar
    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;

    // Upload de imagem
    if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

      $image = $_FILES["image"];

      // Checando tipo da imagem
      if(in_array($image["type"], ["image/jpeg", "image/jpg", "image/png"])) {

        // Checa se é jpg
        if(in_array($image["type"], ["image/jpeg", "image/jpg"])) {
          $imageFile = imagecreatefromjpeg($image["tmp_name"]);
        } else {
          $imageFile = imagecreatefrompng($image["tmp_name"]);
        }

        $imageName = $user->generateImageName();

        imagejpeg($imageFile, "./img/users/".$imageName, 100);

        $userData->image = $imageName;

      } else {
        $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
      }

    }

    $userDao->update($userData);

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