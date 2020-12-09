<?php

  require_once("templates/header.php");

  // Checa autenticação
  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  $userModel = new User();

  // Verifica o token, se não for o correto redireciona para a home
  $auth = new UserDAO($conn, $BASE_URL);

  // Não precisa de redirect
  $userData = $auth->verifyToken(false);

  // Pegar detalhes do usuário pelo id do get
  $id = filter_input(INPUT_GET, 'id');

  $user;

  if(empty($id)) {

    $user = $userData;

  } else {

    $user = $auth->findById($id);

    // Caso não encontre usuário
    if(!$user) {
      $message->setMessage("Usuário não encontrado.", "error", "index.php");
    }

  }

  $fullName = $userModel->getFullName($userData);

?>
<div id="main-container" class="container-fluid">
  <div class="col-md-8 offset-md-2">
    <div class="row profile-container">
      <div class="col-md-12 about-container">
        <h1 class="page-title"><?= $fullName ?></h1>
        <img id="profile-image" src="img/user.png" alt="Matheus Battisti">
        <h3 class="about-title">Sobre:</h3>
        <?php if(!empty($user->bio)): ?>
          <p class="profile-description"><?= $user->bio ?></p>
        <?php else: ?>
          <p class="profile-description">O usuário ainda não escreveu nada aqui...</p>
        <?php endif; ?>
      </div>
      <div class="col-md-12 added-movies-container">
        <h3>Filmes que enviou:</h3>
          <div class="movies-container">
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
        </div>
      </div>
    </div>
  </div>
</div>
<?php

  require_once("templates/footer.php");

?>