<?php 

// On se connecte à la base de données
$pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root', '');

// On crée une requête SQL pour récupérer un seul
// article depuis la base de données
$sql = 'SELECT * FROM articles WHERE id = ?';

// On prépare notre requête SQL
$request = $pdo->prepare($sql);

//On exécute la requête
$request->execute([$_GET['id']]);

// On récupère un seul article !
$article = $request->fetch(PDO::FETCH_ASSOC);

if (empty($article)) {
    throw new Exception('Article not found');
}

require __DIR__ . '/partials/themeStart.php'; 
?>

<h1><?= $article['title'] ?></h1>

<p>
    <?= $article['content'] ?>
</p>

<?php require __DIR__ . '/partials/themeEnd.php'; ?>