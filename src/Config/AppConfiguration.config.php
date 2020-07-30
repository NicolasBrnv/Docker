<?php

class AppConfiguration
{
    private $pathDir;
    private $pathFile;
    public static $static = 'AppConfiguration.config.php';

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

                case 'M' : include_once 'Models/'. $class . '.model.php';
                break;

                case 'V' : include_once 'Views/'. $class . '.view.php';
                break;
            }
        });
    }

    public function SetPaths($_dirName = null, $_fileName = null)
    {
        if (!$_dirName)
        {
            $this->pathDir = './Nouveau Dossier';
            $this->pathFile = $this->pathDir  . '/Nouveau Document.txt';
        } else
        {
            $this->pathDir = './' . $_dirName . '/';
            $this->pathFile = $this->pathDir  . $_fileName . '.txt';
        }
    }

    public function CreateDir()
    {
        if (!is_dir($this->pathDir))
        {
            mkdir($this->pathDir, 777);
        }
    }

    public function CreateFile()
    {
        if (!is_file($this->pathFile))
        {
            fopen($this->pathFile, 'w');
        }
    }
}