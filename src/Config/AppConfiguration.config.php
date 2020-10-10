<?php

namespace Config;

class AppConfiguration
{
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
            switch ($class[0])
            {
                case 'C' : include_once 'Controllers/'. $class . '.cont.php';
                break;

                case 'D' : include_once 'Database/'. $class . '.db.php';
                break;

                case 'I' : include_once 'Interfaces/'. $class . '.int.php';
                break;

                case 'M' : include_once 'Models/'. $class . '.model.php';
                break;

                case 'V' : include_once 'Views/'. $class . '.view.php';
                break;
            }
        });
    }

}