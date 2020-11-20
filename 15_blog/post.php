<?php
  include_once("templates/header.php");

  if(isset($_GET['id'])) {

    $postId = $_GET['id'];
    $currentPost;

    foreach($posts as $post) {
      if($post['id'] == $postId) {
        $currentPost = $post;
      }
    }

  }

?>
  <main id="post-container">
    <div class="content-container">
      <h1 id="main-title"><?= $currentPost['title'] ?></h1>
      <p id="post-description"><?= $currentPost['description'] ?></p>
      <div class="img-container">
        <img src="<?= $BASE_URL ?>/img/<?= $currentPost['img'] ?>" alt="<?= $currentPost['title'] ?>">
      </div>
      <p class="post-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo, explicabo provident, voluptatum, veniam nihil repellat eveniet quae adipisci exercitationem quos minus corrupti placeat veritatis architecto excepturi laudantium nulla tenetur cupiditate.
      Odit saepe voluptas voluptates, iusto minima dolore deleniti corporis itaque, rem facere inventore in sed cumque voluptatibus unde! Assumenda nam aspernatur eveniet id illo inventore ratione laboriosam iusto culpa provident.
      Nam blanditiis autem fugiat officiis animi, adipisci consequuntur minima. Mollitia atque iste sapiente quod pariatur necessitatibus minus voluptatem rerum eos modi enim perspiciatis provident ducimus, iure nostrum nobis eum iusto.
      Perspiciatis sed numquam animi quae assumenda nesciunt voluptatibus rem! Deserunt, quae ex, pariatur nemo eveniet ipsam delectus aperiam aut quas blanditiis repellat quibusdam debitis sequi odit nostrum? Dolores, iure quam!
      Beatae vel corrupti laborum repudiandae, placeat neque officiis odit provident reiciendis ducimus amet rem. Exercitationem similique itaque labore asperiores quasi officia aspernatur quas soluta quos. Quasi aliquam in laboriosam illum.</p>
      <p class="post-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo, explicabo provident, voluptatum, veniam nihil repellat eveniet quae adipisci exercitationem quos minus corrupti placeat veritatis architecto excepturi laudantium nulla tenetur cupiditate.
      Odit saepe voluptas voluptates, iusto minima dolore deleniti corporis itaque, rem facere inventore in sed cumque voluptatibus unde! Assumenda nam aspernatur eveniet id illo inventore ratione laboriosam iusto culpa provident.
      Nam blanditiis autem fugiat officiis animi, adipisci consequuntur minima. Mollitia atque iste sapiente quod pariatur necessitatibus minus voluptatem rerum eos modi enim perspiciatis provident ducimus, iure nostrum nobis eum iusto.
      Perspiciatis sed numquam animi quae assumenda nesciunt voluptatibus rem! Deserunt, quae ex, pariatur nemo eveniet ipsam delectus aperiam aut quas blanditiis repellat quibusdam debitis sequi odit nostrum? Dolores, iure quam!
      Beatae vel corrupti laborum repudiandae, placeat neque officiis odit provident reiciendis ducimus amet rem. Exercitationem similique itaque labore asperiores quasi officia aspernatur quas soluta quos. Quasi aliquam in laboriosam illum.</p>
    </div>
    <aside id="nav-container">
      <h3 id="tags-title">Tags</h3>
      <ul id="tag-list">
        <?php foreach($currentPost['tags'] as $tag): ?>
          <li><a href="#"><?= $tag ?></a></li>
        <?php endforeach; ?>
      </ul>
      <h3 id="categories-title">Categorias</h3>
      <ul id="categories-list">
        <?php foreach($categories as $category): ?>
          <li><a href="#"><?= $category ?></a></li>
        <?php endforeach; ?>
      </ul>
    </aside>
  </main>
<?php
  include_once("templates/footer.php")
?>