<?php
//Inclusion de l'autoload.
require 'Config/Ini.inc.php';
//Controller
$controller = new Controller();

$controller->getDatasGet();
$controller->control();
