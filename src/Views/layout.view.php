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
    <a href="index.php?ex=rss">Flux RSS</a>
    <a href="index.php?ex=comics_list">Comics</a>
</header>

<div id="content">
    <p><?= $vcontent->{$content['method']}($content['arg']) ?></p>
</div>
</body>
</html>
