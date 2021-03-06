<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App {

    private static $_instance;
    private $db_instance;

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new App();
        }

        return self::$_instance;
    } 

        
    /**
     * getTable
     *
     * @param  mixed $name
     * @return void
     */
    public function getTable($name) {
        $class_name = "App\\Table\\" . ucfirst($name). "Table";
        return new $class_name($this->getDb());
    }

    public function getDb() {

        $config = Config::getInstance(ROOT . '/config/config.php');
        
        if(is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }

        return $this->db_instance;
    }
        
    /**
     * load
     * demarre une session
     * inclu les differents autoloader
     *
     * @return void
     */
    public static function load() {
        session_start();
        require ROOT. "/app/Autoload.php";
        App\Autoload::register();
        
        require ROOT. "/core/Autoload.php";
        Core\Autoload::register();
    }
} 