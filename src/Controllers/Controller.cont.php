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

            case 'data-1' :
                $this->data1();
                break;

            case 'data-2' :
                $this->data2();
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
        $content['method'] = 'showAcceuil';
        $content['arg'] = '';
    }

    public function data1()
    {
        global $content;

        $content['title'] = 'Datas';
        $content['class'] = 'VDatas';
        $content['method'] = 'showDatas';
        $content['arg'] = '1';
    }

    public function data2()
    {
        global $content;

        $content['title'] = 'Datas';
        $content['class'] = 'VDatas';
        $content['method'] = 'showDatas';
        $content['arg'] = '2';
    }
}