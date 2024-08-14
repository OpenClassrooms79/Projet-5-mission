<h2>Suppression des commentaires</h2>

Article : <?= Utils::format($article->getTitle()) ?>

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
                    <td><input type="checkbox" name="comments[]" value="<?= $comment->getId() ?>"></td>
                    <td><?= Utils::format($comment->getPseudo()) ?></td>
                    <td><?= $comment->getContent() ?></td>
                    <td class=" cellRight"><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <input type="submit" value="Supprimer" class="submit">
    </form>
<?php } ?>