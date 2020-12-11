<?php

  class Movie {

    public $id;
    public $title;
    public $description;
    public $image;
    public $trailer;
    public $category;
    public $users_id;
        
    public function generateImageName() {
      return bin2hex(random_bytes(60)) . ".jpg";
    }

  }

  interface MovieDAOInterface {

    public function buildMovie($data);
    public function findAll();
    public function getLatestMovies();
    public function findById($id);
    public function create(Movie $movie);
    public function update(Movie $movie);
    
  }