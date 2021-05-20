<?php require __DIR__ . '/partials/themeStart.php'; 

$success = false;

if (!empty($_POST)) {
    // ETAPE 1 : Se connecter à la base de données
    $pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root', '');

    // ETAPE 2 : Récupérer les données du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    // ETAPE 3 : Création de la requête SQL.
    // Attention à ne pas concaténer les valeurs
    // directement mais à plutôt utiliser des ?
    $sql = 'INSERT INTO articles (title, description, content) VALUES (?, ?, ?)';

    // ETAPE 4 : Nous préparons la requête SQL et nous récupèrons une requête
    $request = $pdo->prepare($sql);

    // ETAPE 5 : Envoyer ma requête à la base de données. C'est cette commande
    // qui enregistre l'article dans la base.
    $request->execute([
        $title,
        $description,
        $content,
    ]);

    $success = true;
}

?>

<h1>Page de création d'un article</h1>

<?php if ($success) : ?>
    <div class="alert alert-success" role="alert">
        L'article a bien été créé
    </div>
<?php endif; ?>

<form method="POST" action="./index.php?page=newArticle">
    <div class="mb-3">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description de l'article</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenue de l'article</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?php require __DIR__ . '/partials/themeEnd.php'; ?>