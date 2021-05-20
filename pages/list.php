<?php 
require __DIR__ . '/partials/themeStart.php';
?>

<h1>Bienvenue</h1>

<? foreach ($articleTable->findAll() as $article) : ?>
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title"><?= $article['title'] ?></h5>
            <p class="card-text"><?= $article['description'] ?></p>
            <a href="./index.php?page=article&id=<?= $article['id'] ?>" class="btn btn-primary">Lire cette article</a>
        </div>
    </div>
<? endforeach; ?>

<?php require __DIR__ . '/partials/themeEnd.php'; ?>