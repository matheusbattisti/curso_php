<?php

  class Message {

    private $url;

    public function __construct($url) {
      $this->url = $url;
    }

    public function setMessage($msg, $type, $redirect = "") {

      $_SESSION["msg"] = $msg;
      $_SESSION["type"] = $type;

      if($redirect) {
        header("Location: $this->url" . $redirect);
      }

    } 

    public function getMessage() {

      return [
        "msg" => $_SESSION["msg"],
        "type" => $_SESSION["type"]
      ];

    }

    public function clearMessage() {

      $_SESSION["msg"] = "";
      $_SESSION["type"] = "";

    }

  }