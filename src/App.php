<?php

class App 
{
    static public function start(): void
    {
        $page = 'list';

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
    
        $pagePath = __DIR__ . '/../pages/' . $page . '.php';

        if (file_exists($pagePath)){
            try {
            require $pagePath;
        } catch (Exception $exception) {
            require __DIR__ . '/../pages/notFound.php';
            }
        } else {
            require __DIR__ . '/../pages/notFound.php';
        }
    
    }
}