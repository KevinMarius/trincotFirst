<?php

namespace App\Controller;

use Core\Html\BootstrapForm;
use \App;

class UsersController extends AppController {

    public function login() {

        $error = false;
        
        if(!empty($_POST)) {
            $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['email'], $_POST['password'])) {
                header('Location: index.php?p=admin.posts.home');
            } else {
                $error = true;
            }
        }
        $form = new BootstrapForm($_POST);

        $this->render('users.login', compact('form', 'error'));
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?p=users.login');
    }

}