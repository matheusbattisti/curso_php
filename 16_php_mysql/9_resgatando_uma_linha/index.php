<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "cursophp";

  $conn = new mysqli($host, $user, $pass, $db);

  // ASSUNTO DA AULA
  $id = 11;

  $stmt = $conn->prepare("SELECT * FROM itens WHERE id = ?");

  $stmt->bind_param("i", $id);

  $stmt->execute();

  $result = $stmt->get_result();

  $item = $result->fetch_row();

  print_r($item);

  $conn->close();