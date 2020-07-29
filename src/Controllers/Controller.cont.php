<?php


class Controller
{
    private $ex;
    private $layout;

    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function setEx()
    {
        $this->ex = isset($_GET['ex']) ? $_GET['ex'] : 'home';
    }

    public function getEx()
    {
        return $this->ex;
    }

    public function getLayout()
    {
        $this->layout = require 'Views/layout.view.php';
        return $this->layout;
    }

    public function control()
    {
        switch ($this->getEx()) {
            case 'home' :
                $this->home();
                break;

            default     :
                $this->home();
        }

        $this->getLayout();
    }

    public function home()
    {
        global $content;

        $content['title'] = 'Accueil';
        $content['class'] = 'VHome';
        $content['method'] = 'acceuil';
        $content['arg'] = '';
    }
}