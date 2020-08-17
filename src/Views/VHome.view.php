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

        if (!$arg){
            echo '<p>Pas de donnée</p>';
        }else{
            echo '<p>' . $arg->title . '</p>';
            echo '<p>' . $arg->body . '</p>';
        }

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