<?php

class VHome implements IHome
{
    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function showHome($arg)
    {
        echo 'Page d\'accueil';
        echo '<p>' . $arg['data_title'] . '</p>';
        echo '<p>' . $arg['data_content'] . '</p>';

        //A supprimer à la fin des modifications
//        try {
//            $dsn = 'mysql:host=db;dbname=test';
//            $username = 'root';
//            $password = 'root';
//
//            new PDO($dsn, $username, $password);
//
//            echo "<h3>La connexion a été établi !</h3>";
//
//            phpinfo();
//        } catch (PDOException $e) {
//            print " Erreur !: " . $e->getMessage() . "<br/>";
//            phpinfo();
//            die();
//        }
    }

}