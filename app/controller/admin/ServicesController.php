<?php

namespace App\Controller\Admin;

use Core\Html\BootstrapForm;
use \App;

class ServicesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Service');
    }


    public function index() {
        $services = $this->Service->all();

        $this->render('admin.services.index', compact('services'));
    }

    public function add() {
        $error = false;
        if(!empty($_POST)) {
            $result = $this->Service->created([
                'name' => $_POST['name'],
                'picture' => $_POST['picture'],
                'description' => $_POST['description'],
            ]);
            if($result) {
                return $this->index();
            }
            $error = true;
        }

        $form = new BootstrapForm($_POST);
        $this->render('admin.services.edit', compact('form', 'error'));
    }

    public function edit() {
        $error = false;
        $service = $this->Service->find($_GET['id']);

        if(!empty($_POST)) {
            $result = $this->Service->update($_GET['id'], [
                'name' => $_POST['name'],
                'picture' => $_POST['picture'],
                'description' => $_POST['description'],
            ]);
            if($result) {
                return $this->index();
            }
            $error = true;
        }

        $form = new BootstrapForm($service);

        $this->render('admin.services.edit', compact('form', 'error'));
    }

    public function delete() {
        
        if(!empty($_POST)) {
            $result = $this->Service->delete($_POST['id']);
            header('Location: ?p=admin.services.index');
        }
    }

}