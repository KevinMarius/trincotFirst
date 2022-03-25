<?php

namespace App\Controller\Admin;

use App\Controller\AppController as ControllerAppController;
use \App;
use Core\Auth\DBAuth;

class AppController extends ControllerAppController {

    public function __construct(){
        parent::__construct();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        
        if(!$auth->logged()) {
            $this->forbidden();
        }
    }
}