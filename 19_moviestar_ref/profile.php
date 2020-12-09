<?php

  require_once("templates/header.php");

  // Checa autenticação
  require_once("dao/UserDAO.php");

  // Verifica o token, se não for o correto redireciona para a home
  $auth = new UserDAO($conn, $BASE_URL);

  $userData = $auth->verifyToken();

?>
  <h1>Profile</h1>
<?php

  require_once("templates/footer.php");

?>