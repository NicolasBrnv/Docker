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

            case 'formulaire' :
                $this->formulary();
                break;

            case 'modify' :
                $this->modify();
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

        $arg = $datas->select('all');

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

    public function formulary()
    {
        $arg = false;

        switch (isset($_GET['option'])){
            case 'update':
                $db = new DBase('root', 'root', 'test');
                $datas = new MDatas($db);
                $arg['datas'] = $datas->select('all');

                if (isset($_GET['data_id'])) {
                    $arg['data_selected'] = $datas->select('one', $_GET['data_id']);

                } else {
                    $arg['data_selected'] = $datas->select('one');
                }
//                $arg['option'] = $_GET['option'];
                break;

            case 'insert':
                $arg['datas'] = null;
                $arg['option'] = $_GET['option'];
                break;
        }

        global $content;

        $content['title'] = 'Formulaire';
        $content['class'] = 'VForm';
        $content['method'] = 'showForm';
        $content['arg'] = $arg;
    }


    public function modify()
    {

        switch (isset($_GET['option'])){
            case $_GET['option'] = 'update':
                if (isset($_POST['datas_title']) && isset($_POST['datas_body'])){
                    $db = new DBase('root', 'root', 'test');
                    $data = new MDatas($db);
                    $data->update($_POST['datas_title'], $_POST['datas_body'], $_POST['datas_id']);
                    $this->formulary();
                }
                break;

            case $_GET['option'] = 'insert':
                if (isset($_POST['datas_title']) && isset($_POST['datas_body'])){
                    $data['title'] = $_POST['datas_title'];
                    $data['body'] = $_POST['datas_body'];
                    $db = new DBase('root', 'root', 'test');
                    $data = new MDatas($db);
                    $data->add($data);
                    $this->formulary();
                }
                break;

            case $_GET['option'] = 'delete':
                var_dump($_GET);
                die();
                break;
        }
    }

} //Controller