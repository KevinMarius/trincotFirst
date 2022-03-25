<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{
        
    /**
     * getUrl
     * genere le lien d'un article
     *
     * @return void
     */
    public function getUrl() {
        return 'index.php?p=posts.show&id='. $this->id;
    }
    
    /**
     * getExtrait
     * renvoie un apercu d'un articles
     *
     * @return void
     */
    public function getExtrait() {
        $html = '<p>'. substr($this->description, 0, 50).' ...</p>';
        //$html .= '<p><a href="'. $this->getURL() .'">Voir la suite</a></p>';
        return $html;
    }

}