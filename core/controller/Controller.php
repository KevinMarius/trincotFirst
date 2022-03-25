<?php

namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;
    protected $title = "Trincot";

    protected function render($view, $props = []) {
        ob_start();
        extract($props);
        $path = explode('.', $view); 

        require($this->viewPath . str_replace('.', '/', $view). ".php");
        $content = ob_get_clean();
        if($path[0] === 'admin') {
            require($this->viewPath . "templates/admin/". $this->template . ".php");
        }elseif( $path[0] === 'users') {
            require($this->viewPath . "templates/admin/users/". $this->template . ".php");
        }else {
            require($this->viewPath . "templates/". $this->template . ".php"); 
        }
    }

        
    /**
     * notFound
    * 
    * @return void
    */
    protected function notFound() {
        header("http://1.0 404 not found");
        header("Location:index.php?p=404");
    }
    protected function forbidden() {
        header("http://1.0 Forbidden");
        header("Location:index.php?p=users.login");
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $this->title .' - '. $title;
    }
    
}