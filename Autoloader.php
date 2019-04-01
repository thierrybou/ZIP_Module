<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 31/03/2019
 * Time: 18:19
 */

class Autoloader
{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        require 'class/' . $class . '.php';
    }

}