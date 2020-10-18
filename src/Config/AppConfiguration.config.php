<?php

class AppConfiguration
{

    /**
     * Configuration des extensions de l'application .
     */
    const CONTROLLER_EXT = '.cont.php';
    const DB_EXT = '.db.php';
    const MODELS_EXT = '.model.php';
    const VIEWS_EXT = '.view.php';
    const INTERFACES_EXT = '.int.php';

    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public static function GetAppConfig()
    {
        //Chargement des classes de l'application
        spl_autoload_register(function ($class){
            switch ($class[0]) {
                case 'C' :
                    include_once 'Controllers/' . $class . self::CONTROLLER_EXT;
                    break;

                case 'D' :
                    include_once 'Database/' . $class . self::DB_EXT;
                    break;

                case 'I' :
                    include_once 'Interfaces/' . $class . self::INTERFACES_EXT;
                    break;

                case 'M' :
                    include_once 'Models/' . $class . self::MODELS_EXT;
                    break;

                case 'V' :
                    include_once 'Views/' . $class . self::VIEWS_EXT;
                    break;
            }
        });
    }

}