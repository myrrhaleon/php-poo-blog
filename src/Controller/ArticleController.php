<?php

namespace Controller;

/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class ArticleController extends BaseController
{
    public function display(): void
    {
        $article = $this->articleTable->findOne($_GET['id']);
        
        $this->page->print('article', ['article' => $article]);
    }
}