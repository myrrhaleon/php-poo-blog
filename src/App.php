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
    
        $controllerClassName = 'Controller\\' . ucfirst($pageName) . 'Controller';

        if (file_exists(__DIR__ . '/' . str_replace('\\', '/', $controllerClassName) . '.php')){
            $controller = new $controllerClassName($articleTable);
            $controller->display();
        } else {
            $controller = new Controller\NotFoundController($articleTable);

            $controller->display();
        }
    }
}