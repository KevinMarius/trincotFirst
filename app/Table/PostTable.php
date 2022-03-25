<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table {
        
    /**
     * lastByCategorie
     * les articles d'une categorie
     *
     * @param  mixed $category_id
     * @return void
     */
    public function lastByCategorie($category_id) {
        return $this->query("SELECT posts.id, posts.name, posts.description, posts.created_at, posts.picture, categories.name as categorie, posts.category_id as category_id FROM posts LEFT JOIN categories ON category_id = categories.id WHERE category_id=?", [$category_id]);
    }

    public function findWithCategorie($id) {
        return $this->query("SELECT posts.id, posts.name, posts.description, categories.name as categorie FROM posts LEFT JOIN categories ON category_id = categories.id WHERE category_id=?", [$id]);
    }
 
    /**
     * getNomberPost
     * renvoie le nombre d'article par produit
     * @param  mixed $id
     * @return void
     */
    public function getNomberPost($id) {
        return $this->query("SELECT COUNT(posts.id) as nbre FROM posts WHERE category_id=?", [$id], true);
    }
        
    /**
     * getLastWithCategory
     * recupere les differents articles
     *
     * @return void
     */
    public function getLastWithCategory() {
        return $this->query("SELECT posts.id, posts.name, posts.description, posts.picture, categories.name as categorie FROM posts LEFT JOIN categories ON category_id = categories.id");
    }

    public function postPagination($premier, $parPage) {
        $sqlPart = [];
        $sqlPart[] = $premier;
        $sqlPart[] = $parPage;

        $sqlPart = implode(', ', $sqlPart);

        return $this->query("SELECT posts.id, posts.name, posts.description, posts.picture, posts.created_at, categories.name as categorie FROM posts LEFT JOIN categories ON category_id = categories.id ORDER BY created_at DESC LIMIT ". $sqlPart."");
    }

    public function postPaginationFind($premier, $parPage, $id) {
        $sqlPart = [];
        $sqlPart[] = $premier;
        $sqlPart[] = $parPage;
        $sqlPart = implode(', ', $sqlPart);
        return $this->query("SELECT posts.id, posts.name, posts.description, posts.picture, posts.category_id, posts.created_at, categories.name as categorie FROM posts LEFT JOIN categories ON category_id = categories.id WHERE category_id=? ORDER BY created_at DESC LIMIT ". $sqlPart."", [$id]);
    }

    public function numbreByCategory($id) {
        return $this->query("SELECT category_id, COUNT(*) as nbre FROM ". $this->table ." WHERE category_id=?", [$id], true);
    }

    public function nbrPostArticle() {
        return $this->query("SELECT categories.id, categories.name, categories.description, COUNT(*) as nbArticle FROM categories INNER JOIN posts ON posts.category_id = categories.id GROUP BY categories.id");
    }

    public function allWithCommentNumber() {
        return $this->query("SELECT posts.id, posts.name, posts.description, posts.picture, COUNT(*) as nbArticle FROM posts INNER JOIN comments ON comments.post_id = posts.id GROUP BY posts.id ORDER BY nbArticle DESC LIMIT 0, 3");
    }

    public function findAll($premier, $parPage, $sql) {
        $sqlPart = [];
        $sqlPart[] = $premier;
        $sqlPart[] = $parPage;
        $sqlPart = implode(', ', $sqlPart);
        return $this->query("SELECT posts.id, posts.name, posts.description, posts.picture, posts.category_id, posts.created_at, categories.name as categorie FROM posts LEFT JOIN categories ON category_id = categories.id". $sql ."ORDER BY created_at DESC LIMIT ". $sqlPart ."");
    }

    public function findAllBySearch($premier, $parPage, $params) {
        $sqlPart = [];
        $sqlPart[] = $premier;
        $sqlPart[] = $parPage;
        $sqlPart = implode(', ', $sqlPart);
        $params = "%$params%";

        return $this->query("SELECT posts.id, posts.name, posts.description, posts.picture, posts.category_id, posts.created_at, categories.name as categorie FROM posts LEFT JOIN categories ON category_id = categories.id WHERE posts.name LIKE ? ORDER BY created_at DESC LIMIT ". $sqlPart ."", [$params]);
    }

    public function numbreOfPost($params) {

        $params = "%$params%";

        return $this->query("SELECT COUNT(*) as nbre FROM posts WHERE name LIKE ?", [$params], true);
    }

}