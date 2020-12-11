<?php

  class User {

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $image;
    public $bio;
    public $token;

    public function getFullName(User $user) {
      return $user->name . " " . $user->lastname;
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generateImageName() {
      return bin2hex(random_bytes(60)) . ".jpg";
    }

  }

  interface UserDAOInterface {

    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user);
    public function findByToken($token);
    public function verifyToken($protected = true);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function changePassword(User $user);

  }