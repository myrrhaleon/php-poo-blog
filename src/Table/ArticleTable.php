<?php

namespace Table;

use PDO;
use Exception;

/*
* Cette class permet de récupérer ainsi que de créer des articles
*/
class ArticleTable
{
    /**
     * On définit un attribut (une variable dans une class)
     * privée pour stocker un objet PDO
     */
    private PDO $pdo;

    /**
     * On définit un constructeur qui recoit un objet PDO
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    /**
     * Cette méthode permet de récupérer l'intégralité des articles
     * de la base de données
     */
    public function findAll(): array
    {
        // On créé une requète SQL pour récupérer tout les articles
        $sql = 'SELECT * FROM articles ORDER BY id DESC';

        // On prépare notre requète SQL
        $request = $this->pdo->prepare($sql);

        // On éxecute la requète
        $request->execute();

        // On récupére tout les articles
        $articles = $request->fetchAll();

        return $articles;
    }

    /**
     * Cette méthode permet de récupérer qu'un seul article ! 
     */
    public function findOne(int $id): array
    {
                // On crée une requête SQL pour récupérer un seul
        // article depuis la base de données
        $sql = 'SELECT * FROM articles WHERE id = ?';

        // On prépare notre requête SQL
        $request = $this->pdo->prepare($sql);

        //On exécute la requête
        $request->execute([$id]);

        // On récupère un seul article !
        $article = $request->fetch(PDO::FETCH_ASSOC);

        if (empty($article)) {
            throw new Exception('Article not found');
        }
        return $article;
    }

    /**
     * Cette méthode permet de créer un nouvel article
     */
    public function createOne(
        string $title, 
        string $description, 
        string $content
    ): void {
        // ETAPE 3 : Création de la requête SQL.
    // Attention à ne pas concaténer les valeurs
    // directement mais à plutôt utiliser des ?
    $sql = 'INSERT INTO articles (title, description, content) VALUES (?, ?, ?)';

    // ETAPE 4 : Nous préparons la requête SQL et nous récupèrons une requête
    $request = $this->pdo->prepare($sql);

    // ETAPE 5 : Envoyer ma requête à la base de données. C'est cette commande
    // qui enregistre l'article dans la base.
    $request->execute([
        $title,
        $description,
        $content,
    ]);
    }
}