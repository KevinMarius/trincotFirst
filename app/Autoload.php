<?php
namespace App;

/**
 * Autoload
 * classe qui permet le chargement automatique des classe du site. 
 */
class Autoload {
    
    /**
     * register
     *
     * @return void
     * permet de recuperer et stocker la classe autoload
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
        
    /**
     * autoload
     *
     * @param  mixed $classe
     * @return void
     * permet de generer le chemin vers les differente classe du site.
     * elle prend en parametre le nom de la classe.
     */
    static function autoload($classe){
        if (strpos($classe, __NAMESPACE__.'\\') === 0){
            $classe = str_replace(__NAMESPACE__. '\\', '', $classe);
            $classe = str_replace('\\', '/', $classe);
            require __DIR__ . '/' . $classe . '.php';
        }
    }

}