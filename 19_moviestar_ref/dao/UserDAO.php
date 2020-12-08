<?php

  include_once("models/User.php");

  class UserDAO implements UserDAOInterface {

    private $conn;

    public function __construct(PDO $conn) {
      $this->conn = $conn;
    }

    public function create(User $user) {

      $stmt = $this->conn->prepare("INSERT INTO users (
        name, lastname, email, password, token
      ) VALUES (
        :name, :lastname, :email, :password, :token
      )");

      $stmt->bindParam(":name", $user->name);
      $stmt->bindParam(":lastname", $user->lastname);
      $stmt->bindParam(":email", $user->email);
      $stmt->bindParam(":password", $user->password);
      $stmt->bindParam(":token", $user->token);

      $stmt->execute();

    }

    public function update(User $user) {
      
    }

    public function findByToken($token) {

    }

    public function findByEmail($email) {

      if($email != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

        } else {
          return false;
        }

      }

      return false;

    }

    public function findById($id) {

    }

  }