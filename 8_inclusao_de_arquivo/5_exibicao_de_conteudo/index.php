<?php

  $nome = "Matheus";
  $sobrenome = "Battisti";
  $idade = "31"

?>

<form action="">
  <div>
    <input type="text" value="<?= $nome; ?>">
  </div>
  <div>
    <input type="text" value="<?= $sobrenome; ?>">
  </div>
  <div>
    <input type="text" value="<?= $idade; ?>">
  </div>
  <div>
    <input type="submit" value="Enviar">
  </div>
</form>