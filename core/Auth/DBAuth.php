<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId() {
        if($this->logged()) {
            return $_SESSION['auth'];
        }

        return false;
    }
        
    /**
     * login
     *
     * @param  mixed $name
     * @param  mixed $password
     * @return boolean
     */
    public function login($email, $password) {
        $user = $this->db->prepare("SELECT * FROM users WHERE email = ?", [$email], null, true);

        if($user) {
            if($user->password === sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        
        return false;
        

    }

    public function logout() {
        session_destroy();
        header('Location: index.php?p=login');
    }

    public function logged() {
        return isset($_SESSION['auth']);
    }

}