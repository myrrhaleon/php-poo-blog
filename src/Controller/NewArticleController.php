<?php

namespace Controller;

/**
 * Ceci est un controller. Il permet de contenir la logique 
 * de nos pages. Il interagit avec le model, contient 
 * la logique de la page et affiche une "View" (une page HTML)
 */
class NewArticleController extends BaseController
{
    
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
        
        $this->page->print('newArticle', ['success' => $success]);
    }
}