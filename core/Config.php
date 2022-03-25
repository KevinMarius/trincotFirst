<?php
namespace Core;

class Config {

    private $settings = [];
    private static $_instances;

    public function __construct($file) {
        $this->settings = require($file);
    }

    public static function getInstance($file) {
        if(is_null(self::$_instances)) {
            self::$_instances = new Config($file);
        }
        return self::$_instances;
    }

    public function get($key) {
        if(!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}