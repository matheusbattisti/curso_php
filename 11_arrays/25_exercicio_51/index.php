<?php

  $ranking = [
    "Matheus" => 200,
    "João" => 54,
    "Pedro" => 444,
    "Maria" => 239,
    "Joana" => 123,
    "Henrique" => 12
  ];

  arsort($ranking);

?>

<h1>Ranking:</h1>
<ol>
  <?php foreach($ranking as $pessoa => $pontuacao): ?>
    <li><?= $pessoa ?> -> <?= $pontuacao ?> pontos</li>
  <?php endforeach; ?>
</ol>