<?php

class Page{
    public function print(string $pageName, array $parameters = []): void
    {
        extract($parameters);
        
        $pagePath = __DIR__ . '/../pages/' . $pageName . '.php';

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