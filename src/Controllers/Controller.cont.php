<?php


class Controller implements IAppDatas
{
    private $ex;
    private $layout;
    private $post;

    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    /**
     * @return mixed
     */
    public function getDatasGet()
    {
        return $this->ex = isset($_GET['ex']) ? $_GET['ex'] : 'home';
    }

    /**
     * @return mixed
     */
    public function getDatasPost()
    {
        if (isset($_POST)){
            return $this->post;
        }

    }

    public function getLayout()
    {
        $this->layout = require 'Views/layout.view.php';
        return $this->layout;
    }

    public function control()
    {
        switch ($this->getDatasGet()) {

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
        $db = new DBase('root', 'root', 'test');
        $datas = new MDatas($db);

        $arg = $datas->select();
        var_dump($arg);

        global $content;

        $content['title'] = 'Accueil';
        $content['class'] = 'VHome';
        $content['method'] = 'showHome';
        $content['arg'] = $arg;
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