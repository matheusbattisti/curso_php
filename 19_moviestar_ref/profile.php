<?php

  include_once("templates/header.php");

  // Checa autenticação
  include_once("models/Auth.php");

  // Verifica o token, se não for o correto redireciona para a home
  $auth = new Auth($conn, $BASE_URL);

  $auth->checkToken();

?>
  <h1>Profile</h1>
<?php

  include_once("templates/footer.php");

?>