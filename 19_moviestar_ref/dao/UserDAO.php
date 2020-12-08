<?php

  include_once("models/User.php");
  include_once("models/Auth.php");

  class UserDAO implements UserDAOInterface {

    private $conn;
    private $url;
    private $auth;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->auth = new Auth($conn, $this->url);
    }

    public function create(User $user, $authUser = false) {

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

      // Autentica usuário caso venha da tela de registro
      if($authUser) {

        $this->auth->setTokenToSession($user->token);

      }

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