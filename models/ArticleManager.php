<?php

/**
 * Classe qui gère les articles.
 */
class ArticleManager extends AbstractEntityManager
{
    public const ALLOWED_SORT_FIELDS = [
        'title', 'views', 'commentscount', 'date_creation', 'date_update'
    ];

    public const ALLOWED_SORT_ORDERS = ['asc', 'desc'];

    /**
     * Récupère tous les articles.
     *
     * @return array : un tableau d'objets Article.
     */
    public function getAllArticles(): array
    {
        $sql = "SELECT * FROM articleView";
        $sortField = strtolower(trim(Utils::request('field', '')));
        $order = strtolower(trim(Utils::request('order', '')));
        if (!in_array($sortField, self::ALLOWED_SORT_FIELDS)) {
            $sortField = 'date_creation';
        }
        if (!in_array($order, self::ALLOWED_SORT_ORDERS)) {
            $order = 'asc';
        }

        if (!empty($sortField)) {
            $sql .= sprintf(' ORDER BY %s %s', $sortField, $order);
        }
        $result = $this->db->query($sql);

        $articles = [];

        while ($article = $result->fetch()) {
            $articles[] = new Article($article);
        }
        return $articles;
    }

    /**
     * Récupère un article par son id.
     *
     * @param int $id : l'id de l'article.
     * @return Article|null : un objet Article ou null si l'article n'existe pas.
     */
    public function getArticleById(int $id): ?Article
    {
        $sql = "SELECT * FROM articleView WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $article = $result->fetch();
        if ($article) {
            return new Article($article);
        }
        return null;
    }

    /**
     * Ajoute ou modifie un article.
     * On sait si l'article est un nouvel article car son id sera -1.
     *
     * @param Article $article : l'article à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateArticle(Article $article): void
    {
        if ($article->getId() == -1) {
            $this->addArticle($article);
        } else {
            $this->updateArticle($article);
        }
    }

    /**
     * Ajoute un article.
     *
     * @param Article $article : l'article à ajouter.
     * @return void
     */
    public function addArticle(Article $article): void
    {
        $sql = "INSERT INTO article (id_user, title, content, date_creation) VALUES (:id_user, :title, :content, NOW())";
        $this->db->query($sql, [
            'id_user' => $article->getIdUser(),
            'title' => $article->getTitle(),
            'content' => $article->getContent()
        ]);
    }

    /**
     * Modifie un article.
     *
     * @param Article $article : l'article à modifier.
     * @return void
     */
    public function updateArticle(Article $article): void
    {
        $sql = "UPDATE article SET title = :title, content = :content, date_update = NOW() WHERE id = :id";
        $this->db->query($sql, [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'id' => $article->getId()
        ]);
    }

    /**
     * Supprime un article.
     *
     * @param int $id : l'id de l'article à supprimer.
     * @return void
     */
    public function deleteArticle(int $id): void
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    public function incrementViews(Article $article)
    {
        $sql = "UPDATE article SET views = views + 1 WHERE id = :id";
        $this->db->query($sql, [
            'id' => $article->getId()
        ]);
    }

    public function getCommentsCount(int $articleId)
    {
        echo "getCommentsCount<br>";
        $sql = "SELECT COUNT(*) FROM comment WHERE id_article = :idArticle";
        $result = $this->db->query($sql, ['idArticle' => $articleId]);
        return $result->fetchColumn();
    }
}