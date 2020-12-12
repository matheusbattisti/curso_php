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

      $movieDao->create($movie);
  
    } else {

      $message->setMessage("Você precisa adicionar pelo menos: título, descrição e categoria.", "error", "newmovie.php");

    }

  // Deletar um filme
  } else if($type === "delete") {

    // Recebendo os inputs do formulário
    $id = filter_input(INPUT_POST, "id");

    $movie = $movieDao->findById($id);

    if($movie) {

      // Verificar se o filme pertence ao usuário
      if($movie->users_id === $userData->id) {
        $movieDao->destroy($movie->id);
      } else {
        $message->setMessage("Erro, tente novamente mais tarde!", "error", "dashboard.php");
      }

    } else {

      $message->setMessage("Este filme não existe!", "error", "dashboard.php");

    }

  } else if($type === "update") {

    // Recebendo os inputs do formulário
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $length = filter_input(INPUT_POST, "length");
    $id = filter_input(INPUT_POST, "id");

    $movieDb = $movieDao->findById($id);

    // Verifica se o filme existe
    if($movieDb) {

      // Verificar se o filme pertence ao usuário
      if($movieDb->users_id === $userData->id) {

        // Verificação de dados mínimos
        if(!empty($title) && 
          !empty($description) &&
          !empty($category)) {

            // Criar o objeto de movie, apenas com os dados que vieram
            $movieDb->title = $title;
            $movieDb->description = $description;
            $movieDb->trailer = $trailer;
            $movieDb->category = $category;
            $movieDb->length = $length;

            $image = $_FILES["image"];
            
            // Verifica se veio alguma imagem
            if(!empty($image["tmp_name"])) {

              // Checando tipo da imagem
              if(in_array($image["type"], ["image/jpeg", "image/jpg", "image/png"])) {

                // Checa se é jpg
                if(in_array($image["type"], ["image/jpeg", "image/jpg"])) {
                  $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                } else {
                  $imageFile = imagecreatefrompng($image["tmp_name"]);
                }

                $movie = new Movie();

                $imageName = $movie->generateImageName();

                imagejpeg($imageFile, "./img/movies/".$imageName, 100);

                $movieDb->image = $imageName;

              } else {
                $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "dashboard.php");
              }

            }

            $movieDao->update($movieDb);

        } else {
          
          $message->setMessage("Você precisa adicionar pelo menos: título, descrição e categoria.", "error", "dashboard.php");

        }

      } else {
        $message->setMessage("Erro, tente novamente mais tarde!", "error", "dashboard.php");
      }

    } else {

      $message->setMessage("Este filme não existe!", "error", "dashboard.php");

    }

  }