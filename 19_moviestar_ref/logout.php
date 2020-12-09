<?php

  // Chamando headers pois tem arquivos de configuração e DAO do User
  require_once("templates/header.php");

  if($userDao) {
    $userDao->destroyToken();
  }