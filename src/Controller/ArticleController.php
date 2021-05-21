<?php

namespace Controller;

use Table\ArticleTable;
use Exception;

/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class ArticleController
{
    private ArticleTable $articleTable;
    
    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    public function display(): void
    {
        $article = $this->articleTable->findOne($_GET['id']);
        $pagePath = __DIR__ . '/../../pages/article.php';

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