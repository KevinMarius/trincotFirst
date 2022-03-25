<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity{

    /**
     * getUrl
     * genere le lien d'une categorie
     * @return void
     */
    public function getUrl() {
        return 'index.php?p=posts.category&id='. $this->id;
    }
}