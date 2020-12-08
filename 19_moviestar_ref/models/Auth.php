<?php

  class Auth {

    private $conn;
    private $url;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
    }

    public function checkToken() {

      // Pega o token da session
      $token = $_SESSION["token"];
      
    }

    public function setTokenToSession($token) {

      // Save token to session
      $_SESSION["token"] = $token;

      // Redirect to profile
      header("Location:" . $this->url ."profile.php");

    }

  }