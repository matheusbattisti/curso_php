<?php

  class Review {

    public $id;
    public $rate;
    public $review;
    public $users_id;
    public $movies_id;   

  }

  interface ReviewDAOInterface {

    public function buildReview($data);
    public function create(Review $review);
    public function getMovieReviews($id);
    public function hasAlreadyReviewed($id, $userId);

  }