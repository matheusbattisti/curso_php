<div class="card movie-card">
  <img src="<?= $BASE_URL ?>img/movies/<?= $movie->image ?>" class="card-img-top" alt="<?= $movie->title ?>">
  <div class="card-body">
      <p class="card-rating">
          <i class="fas fa-star"></i>
          <span class="rating">8.6</span>
      </p>
      <h5 class="card-title">
          <a href="<?= $BASE_URL ?>movie?id=<?= $movie->id ?>"><?= $movie->title ?></a>
      </h5>
      <a href="<?= $BASE_URL ?>movie?id=<?= $movie->id ?>" class="btn btn-primary rate-btn">Avaliar</a>
      <a href="<?= $BASE_URL ?>movie?id=<?= $movie->id ?>" class="btn btn-primary card-btn">Conhecer</a>
  </div>
</div>