<?php 
require __DIR__ . '/partials/themeStart.php'; 

?>

<h1><?= $article['title'] ?></h1>

<p>
    <?= $article['content'] ?>
</p>

<?php require __DIR__ . '/partials/themeEnd.php'; ?>