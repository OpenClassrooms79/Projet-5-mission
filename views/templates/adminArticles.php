<h2>Monitoring des articles</h2>

<table>
    <thead>
    <tr>
        <th><?= Utils::getSortLink('Titre', 'title') ?></th>
        <th><?= Utils::getSortLink('Vues', 'views') ?></th>
        <th><?= Utils::getSortLink('Commentaires', 'commentsCount') ?></th>
        <th><?= Utils::getSortLink('Création', 'date_creation') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?= Utils::format($article->getTitle()) ?></td>
            <td class="cellCenter"><?= $article->getViews() ?></td>
            <td class="cellCenter"><a class="submit" href="index.php?action=deleteComments&article=<?= $article->getId() ?>" title="Aller à la gestion des commentaires"><?= $article->getCommentsCount() ?></a></td>
            <td class="cellRight date"><?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
