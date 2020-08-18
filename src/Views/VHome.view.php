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
            foreach ($arg as $v){
                echo '<p>' . $v->title . '</p>';
                echo '<p>' . $v->body . '</p>';
            }
        }

        phpinfo();

    }

}