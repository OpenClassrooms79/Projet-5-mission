<?php
/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.
 *
 * Les variables qui doivent impérativement être définie sont :
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page.
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emilie Forteroche</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<header>
    <nav>
        <a href="index.php">Articles</a>
        <a href="index.php?action=apropos">À propos</a>
        <?php
        // Si on est connecté, on affiche les liens vers les pages admin
        if (isset($_SESSION['user'])) { ?>
            <a href="index.php?action=admin" class="menuLeftSeparator">Édition des articles</a>
            <a href="index.php?action=adminArticles">Monitoring des articles</a>
            <a href="index.php?action=disconnectUser">Déconnexion</a>
        <?php } ?>
    </nav>
    <h1>Emilie Forteroche</h1>
</header>

<main>
    <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
</main>

<footer>
    <p>Copyright © Emilie Forteroche 2023 - Openclassrooms - <a href="index.php?action=admin">Admin</a>
</footer>

</body>
</html>