<?php

use Table\ArticleTable;

class App 
{
    static public function start(): void
    {
        // Nous créons une connexion à la base de données en utilisant
        // la class PDO
        $pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root', '');
        // Nous créons une instance de ArticleTable : $articleTable. Cette objet
        // nous permet de récupérer / créer des articles.
        $articleTable = new ArticleTable($pdo);

        // $articleTable->findAll();
        // $articleTable->findOne($_GET['id']);
        // $articleTable->createOne()

        // $_GET permet d'accèder au query string
        // ex: $_GET['page'] retourne la query string "page"
        // la fonction isset(...) permet de tester si un
        // élement est présent dans un tableaux.

        $pageName = 'list';

        if (isset($_GET['page'])) {
            $pageName = $_GET['page'];
        }
    
        $pagePath = __DIR__ . '/../pages/' . $pageName . '.php';

        ob_start();

        if (file_exists($pagePath)){
            try {
                require $pagePath;
            } catch (Exception $exception) {
                ob_clean();
                require __DIR__ . '/../pages/notFound.php';
            }
        } else {
            require __DIR__ . '/../pages/notFound.php';
        }
    
        echo ob_get_clean();
    }
}