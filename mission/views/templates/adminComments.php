<h2>Suppression des commentaires</h2>

<span class="articleTitle" title="Article"><?= Utils::format($article->getTitle()) ?></span>

<?php if ($deleted !== false) { ?>
    <div class="info deletedComments"><?= $deleted ?> commentaire(s) supprimé(s)</div>
<?php } ?>

<?php if (count($comments) === 0) { ?>
    <p class="message">Cet article ne possède aucun commentaire.</p>
    <?php
} else {
    ?>
    <form method="post" class="deleteComments">
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment) { ?>
                <tr>
                    <td class="cellCenter"><input type="checkbox" name="comments[]" value="<?= $comment->getId() ?>" title="Sélectionnez ce commentaire pour le supprimer"></td>
                    <td class="cellCenter"><?= Utils::format($comment->getPseudo()) ?></td>
                    <td><?= $comment->getContent() ?></td>
                    <td class="cellRight date"><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <input type="submit" value="Supprimer" class="submit">
    </form>
<?php } ?>