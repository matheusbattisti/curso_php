<?php

  include_once("models/Review.php");
  include_once("models/Message.php");

  // Necessário para resgatar dados do usuário
  include_once("dao/userDAO.php");

  class ReviewDAO implements REviewDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildReview($data) {

      $reviewObject = new Review();

      $reviewObject->id = $data["id"];
      $reviewObject->rate = $data["rate"];
      $reviewObject->review = $data["review"];
      $reviewObject->users_id = $data["users_id"];
      $reviewObject->movies_id = $data["movies_id"];

      return $reviewObject;

    }

    public function create(Review $review) {

      $stmt = $this->conn->prepare("INSERT INTO reviews (
        rate, review, users_id, movies_id
      ) VALUES (
        :rate, :review, :users_id, :movies_id
      )");

      $stmt->bindParam(":rate", $review->rate);
      $stmt->bindParam(":review", $review->review);
      $stmt->bindParam(":users_id", $review->users_id);
      $stmt->bindParam(":movies_id", $review->movies_id);

      $stmt->execute();

      // Redireciona e apresenta mensagem de sucesso
      $this->message->setMessage("Comentário adicionado com sucesso!", "success", "index.php");

    }

    
    public function getMovieReviews($id) {

      $reviews = [];

      // encontrar as reviews na tabela de review
      $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE movies_id = :id");

      $stmt->bindParam("id", $id);

      $stmt->execute();

      if($stmt->rowCount() > 0) {

        $userDao = new userDAO($this->conn, $this->url);

        $reviewsArray = $stmt->fetchAll();

        foreach($reviewsArray as $review) {

          $reviewObject = $this->buildReview($review);

          // pegar dados do usuário
          $user = $userDao->findById($reviewObject->users_id);

          // Adiciona usuário na review
          $reviewObject->user = $user;
          
          $reviews[] = $reviewObject;

        }
        
      }

      return $reviews;

    }

    public function hasAlreadyReviewed($id, $userId) {

      // verificar se usuário já fez review no filme
      $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE movies_id = :id AND users_id = :userid");

      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":userid", $userId);

      $stmt->execute();

      if($stmt->rowCount() > 0) {
        return true;
      } else {
        return false;
      }

    }

  }