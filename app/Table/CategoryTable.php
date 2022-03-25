<?php

namespace App\Table;

use Core\Table\Table;

class CategoryTable extends Table {
    protected $table = 'categories';

    public function allWithPostNumber() {
        return $this->query("SELECT categories.id, categories.name, categories.description, COUNT(*) as nbArticle FROM categories INNER JOIN posts ON posts.category_id = categories.id GROUP BY categories.id");
    }
    
}