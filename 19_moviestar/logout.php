<?php

  require_once("templates/header.php");

  if($userDao) {
    $userDao->destroyToken();
  }