<?php

namespace Controller;


/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class NotFoundController extends BaseController
{
    public function display(): void
    {
        $this->page->print('notFound');
    }
}