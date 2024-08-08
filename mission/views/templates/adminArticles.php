<h2>Monitoring des articles</h2>

<table>
    <thead>
    <tr>
        <th>Titre&nbsp;<?= Utils::getSortLink('title') ?></th>
        <th>Vues&nbsp;<?= Utils::getSortLink('views') ?></th>
        <th>Commentaires&nbsp;<?= Utils::getSortLink('commentsCount') ?></th>
        <th>Création&nbsp;<?= Utils::getSortLink('date_creation') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?= Utils::format($article->getTitle()) ?></td>
            <td><?= $article->getViews() ?></td>
            <td><?= $article->getCommentsCount() ?></td>
            <td><?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
