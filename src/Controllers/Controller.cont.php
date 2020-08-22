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
    } //getDatasGet()

    /**
     * @return mixed
     */
    public function getDatasPost()
    {
        if (isset($_POST)){
            return $this->post;
        }
    } //getDatasPost()

    public function getLayout()
    {
        $this->layout = require 'Views/layout.view.php';
        return $this->layout;
    } //getLayout()

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
    } //control()

    public function home()
    {
        $db = new DBase('root', 'root', 'test');
        $dataset = new MDatas($db);

        $arg = $dataset->select('all', 0, 'datas');

        global $content;

        $content['title'] = 'Accueil';
        $content['class'] = 'VHome';
        $content['method'] = 'showHome';
        $content['arg'] = $arg;
    } //home

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

        if (isset($_GET['form_type'])){
            switch (isset($_GET['option'])){
                case 'update':
                    $db = new DBase('root', 'root', 'test');
                    $dataset = new MDatas($db);
                    $arg['cv'] = $dataset->select('all', 0, 'cv');

                    if (isset($_GET['cv_id'])) {
                        $arg['cv_selected'] = $dataset->select('one', $_GET['cv_id'], 'cv');

                    } else {
                        $arg['cv_selected'] = $dataset->select('one', 0, 'cv');
                    }
                    break;

                case 'insert':
                    $arg['cv'] = null;
                    $arg['option'] = $_GET['option'];
                    break;

                default:
                    $db = new DBase('root', 'root', 'test');
                    $dataset = new MDatas($db);
                    $arg['cv'] = $dataset->select('all', 0, 'cv');
                    break;
            }
            global $content;

            $content['title'] = 'Formulaire';
            $content['class'] = 'VForm';
            $content['method'] = 'showFormCv';
            $content['arg'] = $arg;

            return;
        }

        switch (isset($_GET['option'])){
            case 'update':
                $db = new DBase('root', 'root', 'test');
                $dataset = new MDatas($db);
                $arg['datas'] = $dataset->select('all',0 , 'datas' );

                if (isset($_GET['data_id'])) {
                    $arg['data_selected'] = $dataset->select('one', $_GET['data_id'], 'datas');

                } else {
                    $arg['data_selected'] = $dataset->select('one', 0, 'datas');
                }
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
    } //formulary()

    public function modify()
    {
        switch (isset($_GET['option'])){
            case $_GET['option'] == 'update':
                if (isset($_POST['datas_title']) && isset($_POST['datas_body'])){
                    $db = new DBase('root', 'root', 'test');
                    $dataset = new MDatas($db);
                    $dataset->update($_POST['datas_title'], $_POST['datas_body'], $_POST['datas_id']);
                    $this->formulary();
                }
                break;

            case $_GET['option'] == 'insert':
                if (isset($_POST['datas_title']) && isset($_POST['datas_body'])){
                    $dataset['title'] = $_POST['datas_title'];
                    $dataset['body'] = $_POST['datas_body'];
                    $db = new DBase('root', 'root', 'test');
                    $data = new MDatas($db);
                    $data->add('datas', $dataset);
                    $this->formulary();
                }
                break;

            case $_GET['option'] == 'delete':
                if (isset($_GET['data_id'])){
                    $db = new DBase('root', 'root', 'test');
                    $dataset = new MDatas($db);
                    $dataset->delete($_GET['data_id']);
                    $this->formulary();
                }
                break;
        }
    } //modify()
} //Controller