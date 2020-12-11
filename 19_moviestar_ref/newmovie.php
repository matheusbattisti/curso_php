<?php

  include_once("templates/header.php");

  // Checa autenticação
  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  // Verifica o token, se não for o correto redireciona para a home
  $auth = new UserDAO($conn, $BASE_URL);

  $userData = $auth->verifyToken();

?>
<div id="main-container" class="container-fluid">
  <div class="offset-md-4 col-md-4 new-movie-container">
    <h1 class="page-title">Adicionar Filme</h1>
    <p class="page-description">Adicione sua crítica e compartilhe com o mundo!</p>
    <form id="add-movie-form" action="<?= $BASE_URL ?>movie_process.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
          <label for="title">Título:</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do filme">
      </div>
      <div class="form-group">
          <label for="image">Imagem:</label>
          <input type="file" name="image" class="form-control-file">
      </div>
      <div class="form-group">
          <label for="length">Duração:</label>
          <input type="text" class="form-control" id="length" name="length" placeholder="Digite a duração do filme">
      </div>
      <div class="form-group">
          <label for="category">Categoria do filme:</label>
          <select class="form-control" name="category" id="cateogry">
              <option value="">Selecione</option>
              <option value="Ação">Ação</option>
              <option value="Drama">Drama</option>
              <option value="Comédia">Comédia</option>
              <option value="Fantasia / Ficção">Fantasia / Ficção</option>
              <option value="Romance">Romance</option>
          </select>
      </div>
      <div class="form-group">
          <label for="trailer">Trailer:</label>
          <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insira o link do trailer">
      </div>
      <div class="form-group">
          <label for="description">Descrição:</label>
          <textarea class="form-control" name="description" id="description" rows="5"></textarea>
      </div>
      <input type="submit" class="btn form-btn" value="Adicionar filme">
    </form>
  </div>
</div>
<?php

  include_once("templates/footer.php");

?>