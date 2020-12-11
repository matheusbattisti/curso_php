<?php

    require_once("templates/header.php");

  require_once("dao/MovieDAO.php");

  // Dao dos Filmes
  $movieDao = new MovieDAO($conn, $BASE_URL);

  $lastestMovies = $movieDao->getLatestMovies();

?>
<div id="main-container" class="container-fluid">
  <h2 class="section-title">Filmes novos</h2>
  <p class="section-description">Veja as críticas dos últimos filmes adicionados no MovieStar</p>
  <div class="movies-container">
    <?php foreach($lastestMovies as $movie): ?>
        <?php require("templates/movie_card.php"); ?>
    <?php endforeach; ?>
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
      <div class="card movie-card">
          <img src="img/vikings.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
  </div>
  <h2 class="section-title">Ação</h2>
  <p class="section-description">Veja os melhores filmes de ação</p>
  <div class="movies-container">
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
      <div class="card movie-card">
          <img src="img/gambitorainha.jpg" class="card-img-top" alt="O Gambito da Rainha">
          <div class="card-body">
              <p class="card-rating">
                  <i class="fas fa-star"></i>
                  <span class="rating">8.6</span>
              </p>
              <h5 class="card-title">
                  <a href="#">O Gambito da Rainha</a>
              </h5>
              <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
              <a href="#" class="btn btn-primary card-btn">Conhecer</a>
          </div>
      </div>
  </div>
</div>
<?php

  include_once("templates/footer.php");

?>