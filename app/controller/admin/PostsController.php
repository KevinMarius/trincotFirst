<?php

namespace App\Controller\Admin;

use Core\Html\BootstrapForm;
use \App;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Service');
        $this->loadModel('Category');
        $this->loadModel('Message');
        $this->loadModel('User');
    }

    public function home() {
        $nbrPost = $this->Post->getNumber();
        $nbrService = $this->Service->getNumber();
        $nbrCategory = $this->Category->getNumber();
        $nbrMessage = $this->Message->getNumber();
        $user = $this->User->find($_SESSION['auth']);

        $this->render('admin.home', compact('nbrService', 'nbrCategory', 'nbrMessage', 'nbrPost', 'user'));
    }

    public function index() {
        $post = $this->Post->all();

        $this->render('admin.posts.index', compact('post'));
    }

    public function add() {
        $error = false;
        $errorFile = false;
        if(!empty($_POST)) {

            $path = ROOT."/public/admin/img/uploads/";

            $fileName = basename($_FILES['file']['name']);
            $fileType = pathinfo($path.$fileName, PATHINFO_EXTENSION);
            $filePath = $path.$fileName;
            if($fileType === "png" || $fileType === "jpg" || $fileType === "jpeg" || $fileType === "gif") {
                if(!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

                $result = $this->Post->created([
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'picture' => $fileName,
                    'category_id' => $_POST['category_id']
                ]);

            }else{
                $errorFile = true;
            }

            if($result) {
                return $this->index();
            }
            $error = true;
        }

        $form = new BootstrapForm($_POST);
        $categories = $this->Category->extract('id', 'name');
        $this->render('admin.posts.edit', compact('form', 'categories', 'error', 'errorFile'));
    }

    public function edit() {
        $error = false;
        $errorFile = false;
        $post = $this->Post->find($_GET['id']);

        if(!empty($_POST)) {

            $path = ROOT."/public/admin/img/uploads/";
            $fileName = basename($_FILES['file']['name']);
            $fileType = pathinfo($path.$fileName, PATHINFO_EXTENSION);
            $filePath = $path.$fileName;
            if($fileType === "png" || $fileType === "jpg" || $fileType === "jpeg" || $fileType === "gif") {
                if(!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

                $result = $this->Post->update($_GET['id'], [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'picture' => $fileName,
                    'category_id' => $_POST['category_id'],
                ]);

                if($result) {
                    return $this->index();
                }
                $error = true;

            }else{
                $errorFile = true;
            }

        }

        $form = new BootstrapForm($post);
        $categories = $this->Category->extract('id', 'name');

        $this->render('admin.posts.edit', compact('form', 'categories', 'error', 'errorFile'));
    }

    public function delete() {
        
        if(!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            header('Location: ?p=admin.posts.index');
        }
    }

    public function getPostNumber() {
        $nbrPostArticle = $this->Post->nbrPostArticle();
        $nbrCat = $this->Category->numbre();

        $data = [];

        $data[] = $nbrPostArticle;
        $data[] = $nbrCat;
    
        echo(json_encode($data)); //echo(json_encode($nbrCat));

    }

}