<?php

  require_once("templates/header.php");

  // Checa autenticação
  require_once("models/Movie.php");
  require_once("dao/MovieDAO.php");

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

?>
<div id="main-container" class="container-fluid">
  <div class="row">
    <div class="offset-md-1 col-md-6 movie-container">
      <h1 class="page-title"><?= $movie->title ?></h1>
      <p class="movie-details">Duração: <?= $movie->length ?> <span class="pipe"></span> <?= $movie->category ?> <span class="pipe"></span> <i class="fas fa-star"></i> 9</p>
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
      <div class="col-md-12" id="review-form-container">
        <h4>Envie sua avaliação</h4>
        <p class="page-description">Preencha o formulário com a nota e comentário sobre o filme</p>
        <form action="">
          <div class="form-group">
            <label for="rate">Nota do filme:</label>
            <select class="form-control" name="rate" id="rate">
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
            <label for="comment">Seu comentário:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="O que você achou do filme?"></textarea>
          </div>
        </form>
      </div>
      <div class="col-md-12 review">
        <div class="row">
          <div class="col-md-1">
            <img src="img/user.png" class="img-fluid" alt="Matheus Battisti">
          </div>
          <div class="col-md-9">
            <h4 class="author-name"><a href="#">Matheus Battisti</a></h4>
            <p><i class="fas fa-star"></i> 8</p>
          </div>
          <div class="col-md-12">
            <p class="comment-title">Comentário:</p>
            <p>Realmente o filme é muito legal, parabéns a todos!</p>
          </div>
        </div>
      </div>
      <div class="col-md-12 review">
        <div class="row">
          <div class="col-md-1">
            <img src="img/user.png" class="img-fluid" alt="Matheus Battisti">
          </div>
          <div class="col-md-9">
            <h4 class="author-name"><a href="#">Matheus Battisti</a></h4>
            <p><i class="fas fa-star"></i> 8</p>
          </div>
          <div class="col-md-12">
            <p class="comment-title">Comentário:</p>
            <p>Realmente o filme é muito legal, parabéns a todos!</p>
          </div>
        </div>
      </div>
      <div class="col-md-12 review">
        <div class="row">
          <div class="col-md-1">
            <img src="img/user.png" class="img-fluid" alt="Matheus Battisti">
          </div>
          <div class="col-md-9">
            <h4 class="author-name"><a href="#">Matheus Battisti</a></h4>
            <p><i class="fas fa-star"></i> 8</p>
          </div>
          <div class="col-md-12">
            <p class="comment-title">Comentário:</p>
            <p>Realmente o filme é muito legal, parabéns a todos!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

  require_once("templates/footer.php");

?>