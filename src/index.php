<?php
//Inclusion de l'autoload.
include 'Config/Ini.inc.php';
//Controller
$controller = new Controller();

$controller->getDatasGet();
$controller->control();
