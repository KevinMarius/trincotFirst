<?php

namespace App\Controller\Admin;

use Core\Html\BootstrapForm;
use \App;

class MessagesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Message');
    }


    public function index() {
        $messages = $this->Message->all();

        $this->render('admin.messages.index', compact('messages'));
    }

    public function delete() {
        
        if(!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            header('Location: ?p=admin.categories.index');
        }
    }

}