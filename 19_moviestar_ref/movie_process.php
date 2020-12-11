<?php

  require_once("db.php");
  require_once("globals.php");
  require_once("models/Message.php");
  require_once("models/Movie.php");
  require_once("dao/UserDAO.php");
  require_once("dao/MovieDAO.php");

  // Verificando o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  $message = new Message($BASE_URL);
  $auth = new UserDAO($conn, $BASE_URL);

  // Pegar dados do usuário
  $userData = $auth->verifyToken();
  
  // Dao dos Filmes
  $movieDao = new MovieDAO($conn, $BASE_URL);

  // Atualizar informações do usuário
  if($type === "create") {

    // Recebendo os inputs do formulário
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $length = filter_input(INPUT_POST, "length");

    $movie = new Movie();

    // Validação de dados mínimos
    if(!empty($title) && 
      !empty($description) &&
      !empty($category)) {

      $movie->title = $title;
      $movie->description = $description;
      $movie->trailer = $trailer;
      $movie->category = $category;
      $movie->length = $length;
      $movie->users_id = $userData->id;

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

          $imageName = $movie->generateImageName();

          imagejpeg($imageFile, "./img/movies/".$imageName, 100);

          $movie->image = $imageName;

        } else {
          $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
        }
      }

      //print_r($movie); exit;

      $movieDao->create($movie);
  
    } else {

      $message->setMessage("Você precisa adicionar pelo menos: título, descrição e categoria.", "error", "newmovie.php");

    }


  }