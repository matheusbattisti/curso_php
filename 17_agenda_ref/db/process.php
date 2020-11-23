<?php

  include_once("connection.php");

  $data = $_POST;

  // Criar contato
  if($data["type"] === "create") {

    $name = $data["name"];
    $phone = $data["phone"];
    $observation = $data["observations"];

    $query = "INSERT INTO contacts (name, phone, observations)";

  }
