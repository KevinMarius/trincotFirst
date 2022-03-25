<?php

namespace App\Controller\Admin;

use Core\Html\BootstrapForm;
use \App;

class CategoriesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Category');
    }


    public function index() {
        $categories = $this->Category->all();

        $this->render('admin.categories.index', compact('categories'));
    }

    public function add() {
        $error = false;
        if(!empty($_POST)) {
            $result = $this->Category->created([
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ]);
            if($result) {
                return $this->index();
            }
            $error = true;
        }

        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form', 'error'));
    }

    public function edit() {
        $error = false;
        $category = $this->Category->find($_GET['id']);

        if(!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ]);
            if($result) {
                return $this->index();
            }
            $error = true;
        }

        $form = new BootstrapForm($category);

        $this->render('admin.categories.edit', compact('form', 'error'));
    }

    public function delete() {
        
        if(!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            header('Location: ?p=admin.categories.index');
        }
    }

}