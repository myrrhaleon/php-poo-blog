<?php

namespace Controller;

/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class ListController extends BaseController
{

    public function display(): void
    {
        $articles = $this->articleTable->findAll();
        
        $this->page->print('list', [ 'articles' => $articles]);
    }
}