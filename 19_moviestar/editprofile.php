<?php
  require_once("templates/header.php");

  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  $user = new User();
  $userDao = new UserDao($conn, $BASE_URL);

  $userData = $userDao->verifyToken(true);

  $fullName = $user->getFullName($userData);

  if($userData->image == "") {
    $userData->image = "user.png";
  }

?>
  <div id="main-container" class="container-fluid edit-profile-page">
    <div class="col-md-12">
      <form action="<?= $BASE_URL ?>user_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">
        <div class="row">
          <div class="col-md-4">
            <h1><?= $fullName ?></h1>
            <p class="page-description">Altere seus dados no formulário abaixo:</p>
            <div class="form-group">
              <label for="name">Nome:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o seu nome" value="<?= $userData->name ?>">
            </div>
            <div class="form-group">
              <label for="lastname">Sobrenome:</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite o seu nome" value="<?= $userData->lastname ?>">
            </div>
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="text" readonly class="form-control disabled" id="email" name="email" placeholder="Digite o seu nome" value="<?= $userData->email ?>">
            </div>
            <input type="submit" class="btn card-btn" value="Alterar">
          </div>
          <div class="col-md-4">
            <div id="profile-image-container" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>')"></div>
            <div class="form-group">
              <label for="image">Foto:</label>
              <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
              <label for="bio">Sobre você:</label>
              <textarea class="form-control" name="bio" id="bio" rows="5" placeholder="Conte quem você é, o que faz e onde trabalha..."><?= $userData->bio ?></textarea>
            </div>
          </div>
        </div>
      </form>
      <div class="row" id="change-password-container">
        <div class="col-md-4">
          <h2>Alterar a senha:</h2>
          <p class="page-description">Digite a nova senha e confirme, para alterar sua senha:</p>
          <form action="<?= $BASE_URL ?>user_process.php" method="POST">
            <input type="hidden" name="type" value="changepassword">
            <div class="form-group">
              <label for="password">Senha:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Digite a sua nova senha">
            </div>
            <div class="form-group">
              <label for="confirmpassword">Confirmação de senha:</label>
              <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirme a sua nova senha">
            </div>
            <input type="submit" class="btn card-btn" value="Alterar Senha">
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
  require_once("templates/footer.php");
?>