<?php

namespace Core\mail;

use Core\Database\Database;

class mail {

    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function mail($fields) {
        $message = wordwrap($fields['message'], 70, "\r\n");
        $etat = mail("kevinmariuskamgaingteteu@yahoo.fr", $fields['subject'], $message);
        if($etat) {
            var_dump('success');
            die();
        }else {
            var_dump('error');
            die();
        }

        $sqlParts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sqlParts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sqlPart = implode(', ', $sqlParts);
        
        if(!$this->db->prepare("INSERT INTO messages SET ". $sqlPart."", $attributes, true)) {
            var_dump("impossible d'enregistrer le mail");
        }

    }

}