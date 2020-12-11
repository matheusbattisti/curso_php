<?php

  include_once("models/Movie.php");
  include_once("models/Message.php");

  class MovieDAO implements MovieDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildMovie($data) {

      $movie = new Movie();

      $movie->id = $data["id"];
      $movie->title = $data["title"];
      $movie->description = $data["description"];
      $movie->image = $data["image"];
      $movie->trailer = $data["trailer"];
      $movie->category = $data["image"];
      $movie->users_id = $data["users_id"];

      return $movie;

    }

    public function create(Movie $movie) {

      $stmt = $this->conn->prepare("INSERT INTO movies (
        title, description, image, trailer, category, length, users_id
      ) VALUES (
        :title, :description, :image, :trailer, :category, :length, :users_id
      )");

      $stmt->bindParam(":title", $movie->title);
      $stmt->bindParam(":description", $movie->description);
      $stmt->bindParam(":image", $movie->image);
      $stmt->bindParam(":trailer", $movie->trailer);
      $stmt->bindParam(":category", $movie->category);
      $stmt->bindParam(":length", $movie->length);
      $stmt->bindParam(":users_id", $movie->users_id);

      $stmt->execute();

      // Redireciona e apresenta mensagem de sucesso
      $this->message->setMessage("Filme adicionado!", "success", "index.php");

    }

    public function update(Movie $movie) {

    }

    public function findAll() {

    }

    public function findById($id) {
      
    }

    public function getLatestMovies() {

      $movies = [];

      $stmt = $this->conn->query("SELECT * FROM movies ORDER BY id DESC");

      $stmt->execute();

      if($stmt->rowCount() > 0) {

        $moviesArray = $stmt->fetchAll();
        
        foreach($moviesArray as $movie) {
          $movies[] = $this->buildMovie($movie);
        }
        
      }

      return $movies;

    }

  }