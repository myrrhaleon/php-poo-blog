<?php require __DIR__ . '/partials/themeStart.php'; ?>
<h1>Page de création d'un article</h1>

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
    <button type="submit" class="btn btn-primary" name="submit">Créer</button>
</form>


<?php

var_dump($_POST);

$serveur = "localhost" ; //nom du serveur
$username = "root" ; // nom d'utilisateur pour se connecter à MariaDB ou MySQL
$password = "" ; // rien car définie el quel lors de l'installation
$dbname = "php-poo-blog" ;

//création de connexion
$connexion = new mysqli($serveur, $username, $password, $dbname, '3306');

//checker si connexion réussi

if( $connexion->connect_error){
    die("Echec de connexion :".$connexion->connect_error );
}

echo " Connexion réussie !" ;

/*
if ( isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['numero']) && isset($_POST['ville']) && isset($_POST['poste_occupe']) ){
    if (ctype_alpha($_POST['prenom']) ) {
        if (ctype_alpha($_POST['nom']) ) {
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) ) {
                if (ctype_digit($_POST['numero']) ) {
                    if (ctype_alpha($_POST['ville']) ){
                        if (ctype_alpha($_POST['poste']) ){
                            echo ' Toutes les infos sont correctes ' ;
                        }
                        else{ echo ' Le poste ';}
                    }
                    else{ echo 'La ville rentrée doit être un seul mot';}
                }
                else { echo 'Le numéro inséré semble erroné (utiliser 00 à la place de +)';}
            }
            else { echo ' L\'adresse e-mail semble incorrecte...';}
        }
        else { echo 'Veuillez rentrer un nom valide';}
    }
    else { echo 'Veuillez rentrer un prénom valide';}
}
else{ echo 'L\'envoi des données du formulaire a rencontré un problème';}
*/


if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];


    $cmd = "INSERT INTO `articles`
    (title, description, content)
    VALUES
    ('$title','$description','$content')" ;

    if ($connexion->query($cmd) ===TRUE) {
        echo ' L\'insertion des données s\'est correctement déroulée !';
    }
    else{
        echo 'Un problème est survenu lors de l\'insertion des données';
    }

}


?>

<?php require __DIR__ . '/partials/themeEnd.php'; ?>