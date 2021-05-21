<?php

namespace Controller;

use Table\ArticleTable;
use Exception;

/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class NotFoundController
{
    private ArticleTable $articleTable;
    
    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    public function display(): void
    {
        ob_start();

            require __DIR__ . '/../../pages/notFound.php';
    
        echo ob_get_clean();
    }
}