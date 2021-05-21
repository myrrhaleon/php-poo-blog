<?php

namespace Controller;

use Table\ArticleTable;
use Exception;

/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class NewArticleController
{
    private ArticleTable $articleTable;
    
    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    public function display(): void
    {
        $success = false;

        if (!empty($_POST)) {

            // ETAPE 2 : Récupérer les données du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];

            $this->articleTable->createOne($title, $description, $content);
            
            $success = true;
        }
        
        $pagePath = __DIR__ . '/../../pages/newArticle.php';

        ob_start();

            try {
                require $pagePath;
            } catch (Exception $exception) {
                ob_clean();
                require __DIR__ . '/../pages/notFound.php';
            }
    
        echo ob_get_clean();
    }
}