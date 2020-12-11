<?php

  include_once("models/User.php");
  include_once("models/Message.php");

  class UserDAO implements UserDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildUser($data) {

      $user = new User();

      $user->id = $data["id"];
      $user->name = $data["name"];
      $user->lastname = $data["lastname"];
      $user->email = $data["email"];
      $user->password = $data["password"];
      $user->image = $data["image"];
      $user->bio = $data["bio"];
      $user->token = $data["token"];

      return $user;

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

        $this->setTokenToSession($user->token);

      }

    }

    public function update(User $user) {

      $stmt = $this->conn->prepare("UPDATE users SET 
        name = :name,
        lastname = :lastname,
        email = :email,
        image = :image,
        bio = :bio,
        token = :token
        WHERE id = :id
      ");

      $stmt->bindParam(":name", $user->name);
      $stmt->bindParam(":lastname", $user->lastname);
      $stmt->bindParam(":email", $user->email);
      $stmt->bindParam(":image", $user->image);
      $stmt->bindParam(":bio", $user->bio);
      $stmt->bindParam(":token", $user->token);
      $stmt->bindParam(":id", $user->id);

      $stmt->execute();
        
      // Redireciona e apresenta mensagem de sucesso
      $this->message->setMessage("Dados atualizados com sucesso!", "success", "editprofile.php");
      
    }

    public function changePassword($user) {

      $stmt = $this->conn->prepare("UPDATE users SET 
        password = :password
        WHERE id = :id
      ");

      $stmt->bindParam(":password", $user->password);
      $stmt->bindParam(":id", $user->id);

      $stmt->execute();
        
      // Redireciona e apresenta mensagem de sucesso
      $this->message->setMessage("Senha atualizada!", "success", "editprofile.php");
      
    }

    public function findByToken($token) {

      $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

      $stmt->bindParam(":token", $token);

      $stmt->execute();

      if($stmt->rowCount() > 0) {

        $data = $stmt->fetch();
        $user = $this->buildUser($data);

        return $user;

      } else {
        return false;
      }

    }

    public function findByEmail($email) {

      if($email != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $user = $this->buildUser($data);
  
          return $user;

        } else {
          return false;
        }

      }

      return false;

    }

    public function setTokenToSession($token, $redirect = true) {

      // Save token to session
      $_SESSION["token"] = $token;

      if($redirect) {

        // Redireciona e apresenta mensagem de sucesso
        $this->message->setMessage("Seja bem-vindo!", "success", "editprofile.php");

      }

    }

    public function verifyToken($protected = true) {

      
      if(!empty($_SESSION["token"])) {

        // Pega o token da session
        $token = $_SESSION["token"];

        $user = $this->findByToken($token);

        if($user) {
          return $user;
        } else if($protected) {

          // Redireciona para home caso não haja usuário
          $this->message->setMessage("Faça a autenticação para acessar esta página.", "error", "index.php");

        }

      } else {
        return false;
      }

    }

    public function authenticateUser($email, $password) {

      $user = new User();

      $user = $this->findByEmail($email);

      // Checa se o usuário existe
      if($user) {

        // Checa se a senha bate
        if(password_verify($password, $user->password)) {

          // Gera o token e coloca na session, sem redirecionar
          $token = $user->generateToken();

          $this->setTokenToSession($token, false);

          // Atualiza token do usuário
          $user->token = $token;

          $this->update($user);

          return true;

        }

      }

      return false;
      
    }

    public function destroyToken() {

      // Remove o token
      $_SESSION["token"] = "";

      // Redireciona e apresenta mensagem de sucesso
      $this->message->setMessage("Você fez o logout com sucesso!", "success", "index.php");

    }

    public function findById($id) {

      if($id != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $user = $this->buildUser($data);
  
          return $user;

        } else {
          return false;
        }

      }

    }

  }