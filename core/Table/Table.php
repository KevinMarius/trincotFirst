<?php


namespace Core\Table;

use Core\Database\Database;

class Table {

    protected $table;
    protected $db;

        
    /**
     * __construct
     *
     * @param  mixed $db
     * @return void
     */
    public function __construct(Database $db) {
        $this->db = $db;
        if(is_null($this->table)) {
            $parts  = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)). 's';
        }
    }

        
    /**
     * query
     *
     * @param  mixed $statement
     * @param  mixed $attributes
     * @param  mixed $one
     * @return void
     */
    public function query($statement, $attributes = null, $one = false) {
        if($attributes) {
            return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
        }else{
            return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
        }
    }
        
    /**
     * find
     * recherche un objet en particulier
     * @param  mixed $id
     * @return void
     */
    public function find($id) {
        return $this->query("SELECT *  FROM ". $this->table ." WHERE id= ? ", [$id], true);
    }

    public function extract($key, $value) {
        $records = $this->all();

        $return = [];
        foreach($records as $v) {
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

    public function update($id, $fields) {
        $sqlParts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sqlParts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sqlPart = implode(', ', $sqlParts);

        return $this->query("UPDATE ". $this->table ." SET $sqlPart WHERE id= ? ", $attributes, true);
    }

    public function created($fields) {
        $sqlParts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sqlParts[] = "$k = ?";
            $attributes[] = $v;
        }
    
        $sqlPart = implode(', ', $sqlParts);
        return $this->query("INSERT INTO ". $this->table ." SET $sqlPart", $attributes, true);
    }

    public function delete($id) {
        return $this->query("DELETE FROM ". $this->table ." WHERE id= ? ", [$id], true);
    }

        
    /**
     * all
     * selectionne tout les objets de la base de donnees
     *
     * @return void
     */
    public function all() {
        return $this->query("SELECT * FROM ". $this->table ." ORDER BY created_at DESC");
    }

    public function getNumber() {
        return $this->query("SELECT COUNT(".$this->table.".id) as nbre FROM ". $this->table ."", null, true);
    }

    public function numbre() {
        return $this->query("SELECT COUNT(*) as nbre FROM ". $this->table ."", null, true);
    }


    public function getLast() {
        return $this->query("SELECT * FROM ".$this->table." ORDER BY created_at DESC LIMIT 0, 3");
    }
}