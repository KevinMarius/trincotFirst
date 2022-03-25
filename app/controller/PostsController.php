<?php

namespace App\Controller;

use \App;
use Core\mail\mail;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Service');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    public function home() {
        $services = $this->Service->all();
        $posts = $this->Post->getLast();

        if(!empty($_POST)) {
        $mail = new mail(App::getInstance()->getDb());
        $mail->mail([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message']]);
        }

        $title = $this->getTitle();

        $this->render('posts.home', compact('services', 'posts', 'title'));
    }

    public function index() {

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

        $nbreArticle = $this->Post->numbre();
        $parPage = 3;

        $pages = ceil($nbreArticle->nbre / $parPage);

        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;

        $postPagination = $this->Post->postPagination($premier, $parPage);

        $categories = $this->Category->allWithPostNumber();

        $postComment = $this->Post->allWithCommentNumber();


        $this->setTitle('Blog');
        $title = $this->getTitle();

        $this->render('posts.index', compact('postPagination', 'categories', 'title', 'pages', 'currentPage', 'postComment'));
    }

    public function category() {

        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false) {
            $this->notFound();
        }

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }
        $nbreArticle = $this->Post->numbreByCategory($_GET['id']);
        $parPage = 3;
        $pages = ceil($nbreArticle->nbre / $parPage);
        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;
        $postPaginationFind = $this->Post->postPaginationFind($premier, $parPage, $_GET['id']); 

        $categories =$this->Category->allWithPostNumber();

        $postComment = $this->Post->allWithCommentNumber();

        $this->setTitle($categorie->name);
        $title = $this->getTitle();

        $this->render('posts.category', compact('postPaginationFind', 'categories', 'categorie', 'title', 'pages', 'currentPage', 'postComment'));        
    }

    public function show() {

        if(!empty($_POST)) {
            
            if(isset($_POST['name']) || isset($_POST['comment'])) {
                $result = $this->Comment->created([
                    'from_user' => $_POST['name'],
                    'comment' => $_POST['comment'],
                    'post_id' => $_GET['id'],
                ]);
            }
                    
        }

        $post = $this->Post->find($_GET['id']);
        $comments = $this->Comment->findWithPost($_GET['id']);

        if($post == null) {
            $this->notFound();
        }
        
        $this->setTitle($post->name);
        $title = $this->getTitle();

        $this->render('posts.show', compact('post', 'title', 'comments')); 
    }

    public function search() {

        $params = $_GET['s'];

        if(!empty($params)) {
            
            $params = htmlspecialchars($params);

            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int) strip_tags($_GET['page']);
            }else{
                $currentPage = 1;
            }
            $nbreArticle = $this->Post->numbreOfPost($params);
            
            $parPage = 3;
            $pages = ceil($nbreArticle->nbre / $parPage);
            // Calcul du 1er article de la page
            $premier = ($currentPage * $parPage) - $parPage;
            $categories =$this->Category->allWithPostNumber();
            $postComment = $this->Post->allWithCommentNumber();

            $this->setTitle($_GET['s']);
            $title = $this->getTitle();

            $postPaginationFind = $this->Post->findAllBySearch($premier, $parPage, $params);
           
           
            $this->render('posts.search', compact('postPaginationFind', 'pages', 'postComment', 'categories', 'title', 'currentPage')); 
        }
        
    }

}