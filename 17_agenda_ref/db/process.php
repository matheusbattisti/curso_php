<?php

  include_once("connection.php");
  include_once("helpers/url.php");

  $data = $_POST;

  if(!empty($data)) {

    // Criar contato
    if($data["type"] === "create") {

      $name = $data["name"];
      $phone = $data["phone"];
      $observation = $data["observations"];

      $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":phone", $phone);
      $stmt->bindParam(":observations", $observations);

      try {
        $stmt->execute();
      } catch(PDOException $e) {
        // verificando erro
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    // Deletar contato
    } else if($data["type"] === "delete") {

      $id = $data["id"];

      $query = "DELETE FROM contacts WHERE id = :id";

      $stmt = $conn->prepare($query);
      
      $stmt->bindParam(":id", $id);

      try {
        $stmt->execute();
      } catch(PDOException $e) {
        // verificando erro
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    }

    header("Location: ". $BASE_URL . "../index.php");

  } else {

    $id;

    if(!empty($_GET)) {
      $id = $_GET["id"];
    }
    
    // Retorna dado de um post específico
    if(!empty($id)) {

      $query = "SELECT * FROM contacts WHERE id = :id";

      $stmt = $conn->prepare($query);
      
      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $contact = $stmt->fetch();

    // Retorna todos os contatos
    } else {

      $query = "SELECT * FROM contacts";

      $stmt = $conn->prepare($query);

      $stmt->execute();

      $contacts = $stmt->fetchAll();

    }

  }
