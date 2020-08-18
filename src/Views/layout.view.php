<?php
global $content;
$vcontent = new $content['class']();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title><?= $content['title'] ?></title>
</head>

<body>
<header>
    <a href="index.php?ex=home">Accueil</a>
    <a href="index.php?ex=data-1">Data 1</a>
    <a href="index.php?ex=data-2">Data 2</a>
    <a href="index.php?ex=formulaire">Formulaire</a>
</header>

<div id="content">
    <p><?= $vcontent->{$content['method']}($content['arg']) ?></p>
</div>
</body>
</html>
