<?php

include_once 'AppConfiguration.config.php';

//Chargement de la méthode de configuration des classes
AppConfiguration::GetAppConfig();
$configuration = new AppConfiguration();
$configuration->SetPaths('Mon Dossier', 'Mon Fichier');
$configuration->CreateDir();
$configuration->CreateFile();
