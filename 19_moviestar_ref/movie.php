<?php

  require_once("templates/header.php");

  // Dados do filme e reviews
  require_once("models/Movie.php");
  require_once("dao/MovieDAO.php");
  require_once("dao/ReviewDAO.php");

  // Pegar detalhes do usuário pelo id do get
  $id = filter_input(INPUT_GET, 'id');

  $movie;

  $movieDao = new MovieDAO($conn, $BASE_URL);

  if(empty($id)) {

    $message->setMessage("Filme não encontrado.", "error", "index.php");

  } else {

    $movie = $movieDao->findById($id);

    // Caso não encontre usuário
    if(!$movie) {
      $message->setMessage("Filme não encontrado.", "error", "index.php");
    }

  }

  // Checando se o filme é do usuário
  $userOwnsMovie = false;

  if(!empty($userData)) {

    if($userData->id === $movie->users_id) {
      $userOwnsMovie = true;
    }

  }
  
  // Resgatar as reviews do filme
  $reviewDao = new ReviewDAO($conn, $BASE_URL);

  $movieReviews = $reviewDao->getMovieReviews($id);

  // Só faz estas checagens se o usuário estiver logado
  if(!empty($userData)) {
    // Verifica se já fez review
    $alreadyReviewed = $reviewDao->hasAlreadyReviewed($id, $userData->id);
  }


?>
<div id="main-container" class="container-fluid">
  <div class="row">
    <div class="offset-md-1 col-md-6 movie-container">
      <h1 class="page-title"><?= $movie->title ?></h1>
      <p class="movie-details">
        <span>Duração: <?= $movie->length ?></span>
        <span class="pipe"></span>
        <span><?= $movie->category ?></span>
        <span class="pipe"></span>
        <span><i class="fas fa-star"></i> <?= $movie->rating ?></span>
      </p>
      <iframe width="560" height="315" src="<?= $movie->trailer ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <p><?= $movie->description ?></p>
    </div>
    <div class="col-md-4">
      <?php if(!empty($movie->image)): ?>
        <div class="movie-image-container" style="background-image: url('<?= $BASE_URL ?>img/movies/<?= $movie->image ?>')"></div>
      <?php else: ?>
        <p>Este filme não possui foto ainda!</p>
      <?php endif; ?>
    </div>
    <div class="offset-md-1 col-md-10" id="reviews-container">
      <h3 id="reviews-title">Avaliações:</h3>
      <!-- Habilita formulário apenas se não é dono do filme e não fez review deste -->
      <?php if(!empty($userData) && !$userOwnsMovie && !$alreadyReviewed): ?>  
        <div class="col-md-12" id="review-form-container">
          <h4>Envie sua avaliação</h4>
          <p class="page-description">Preencha o formulário com a nota e comentário sobre o filme</p>
          <form action="<?= $BASE_URL ?>review_process.php" method="POST">
            <input type="hidden" name="type" value="create">
            <input type="hidden" name="movies_id" value="<?= $movie->id ?>">
            <div class="form-group">
              <label for="rating">Nota do filme:</label>
              <select class="form-control" name="rating" id="rating">
                  <option value="">Selecione</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
            </div>
            <div class="form-group">
              <label for="review">Seu comentário:</label>
              <textarea class="form-control" id="review" name="review" rows="3" placeholder="O que você achou do filme?"></textarea>
            </div>
            <input type="submit" class="btn form-btn" value="Enviar comentário">
          </form>
        </div>
      <?php endif; ?>
      <?php foreach($movieReviews as $review): ?>
        <?php require("templates/user_review.php"); ?>
      <?php endforeach; ?>
      <?php if(empty($movieReviews)): ?>
        <p class="empty-list">Ainda não há comentários!</p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php

  require_once("templates/footer.php");

?>