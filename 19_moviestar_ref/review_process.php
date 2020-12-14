<?php

  require_once("db.php");
  require_once("globals.php");
  require_once("models/Message.php");
  require_once("models/Movie.php");
  require_once("dao/UserDAO.php");
  require_once("dao/ReviewDAO.php");

  // Verificando o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  $message = new Message($BASE_URL);
  $auth = new UserDAO($conn, $BASE_URL);
  $reviewDao = new ReviewDAO($conn, $BASE_URL);

  // Pegar dados do usuário
  $userData = $auth->verifyToken();

  // Verificando o tipo do formulário
  $type = filter_input(INPUT_POST, "type");
  
  if($type === "create") {

    // Recebendo os inputs do formulário
    $rating = filter_input(INPUT_POST, "rating");
    $review = filter_input(INPUT_POST, "review");
    $movies_id = filter_input(INPUT_POST, "movies_id");

    $reviewObject = new Review();

    // Validação de dados mínimos
    if(!empty($rating) && 
      !empty($review) &&
      !empty($movies_id)) {

        $reviewObject->rating = $rating;
        $reviewObject->review = $review;
        $reviewObject->movies_id = $movies_id;
        $reviewObject->users_id = $userData->id;

        $reviewDao->create($reviewObject);

    } else {

      $message->setMessage("Você precisa adicionar a sua nota e o comentário.", "error", "back");

    }

  }