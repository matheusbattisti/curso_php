<?php

  require_once("templates/header.php");

  require_once("dao/MovieDAO.php");

  // Dao dos Filmes
  $movieDao = new MovieDAO($conn, $BASE_URL);

  // Resgata input e faz a busca
  $q = filter_input(INPUT_GET, "q");

  $movies = $movieDao->findByTitle($q);

?>
<div id="main-container" class="container-fluid">
    <h2 class="section-title" id="search-title">Você está buscando por: <span id="search-result"><?= $q ?></span></h2>
    <p class="section-description">Resultados retornados baseados em sua busca.</p>
    <div class="movies-container">
      <?php foreach($movies as $movie): ?>
          <?php require("templates/movie_card.php"); ?>
      <?php endforeach; ?>
      <?php if(count($movies) === 0): ?>
          <p class="empty-list">Não há filmes para esta busca, <a class="back-link" href="<?= $BASE_URL ?>index.php">voltar</a>.</p>
      <?php endif; ?>
    </div>
</div>
<?php

  include_once("templates/footer.php");

?>