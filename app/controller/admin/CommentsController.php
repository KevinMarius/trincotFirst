<?php

namespace App\Controller\Admin;

class CommentsController extends AppController {
    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Comment');
    }
}