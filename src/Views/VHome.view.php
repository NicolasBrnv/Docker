<?php

class VHome
{
    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function showAcceuil()
    {
        echo 'Page d\'accueil';

        try {
            $dsn = 'mysql:host=db;dbname=test';
            $username = 'root';
            $password = 'root';

            $dbh = new PDO($dsn, $username, $password);

            echo "<h3>La connexion a été établi !</h3>";

            phpinfo();
        } catch (PDOException $e) {
            print " Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}