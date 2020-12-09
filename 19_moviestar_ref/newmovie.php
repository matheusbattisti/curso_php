<?php

  include_once("templates/header.php");

?>
<div id="main-container" class="container-fluid">
  <div class="offset-md-4 col-md-4 new-movie-container">
    <h1 class="page-title">Adicionar Filme</h1>
    <p class="page-description">Adicione sua crítica e compartilhe com o mundo!</p>
    <form id="add-movie-form" action="">
      <div class="form-group">
          <label for="name">Título:</label>
          <input type="text" class="form-control" id="name" placeholder="Digite o título do filme">
      </div>
      <div class="form-group">
          <label for="image">Imagem:</label>
          <input type="file" name="image" class="form-control-file">
      </div>
      <div class="form-group">
          <label for="length">Duração:</label>
          <input type="text" class="form-control" id="length" placeholder="Digite a duração do filme">
      </div>
      <div class="form-group">
          <label for="category">Categoria do filme:</label>
          <select class="form-control" name="category" id="cateogry">
              <option value="">Selecione</option>
              <option value="action">Ação</option>
              <option value="drama">Drama</option>
              <option value="comedy">Comedia</option>
              <option value="fantasy">Fantasia / Ficção</option>
              <option value="romance">Romance</option>
          </select>
      </div>
      <div class="form-group">
          <label for="trailer">Trailer:</label>
          <input type="text" class="form-control" id="trailer" placeholder="Insira o link do trailer">
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