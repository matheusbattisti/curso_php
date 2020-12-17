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

    public function getFullName($user) {
      return $user->name . " " . $user->lastname;
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generatePassword($password) {
      return password_hash($password, PASSWORD_DEFAULT);
    }

    public function imageGenerateName() {
      return bin2hex(random_bytes(60)) . ".jpg";
    }

  }

  interface UserDAOInterface {

    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(User $user);

  }