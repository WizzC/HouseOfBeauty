<?php
ob_start();
?>
<div class="container pt-5">
    <div class="pt-5 row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Commentaires</h1>

            <h2 class="mb-4 text-center">Liste des commentaires :</h2>
            <?php if (isset($_SESSION['Pseudo'])) : ?>
                <form action="<?= URL ?>avis/l" method="POST">
                    <div class="mb-3">
                        <textarea class="form-control" name="commentaire" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="Ajouter un commentaire">
                    </div>
                </form>
            <?php else : ?>
                <p class="text-center">Connectez-vous pour ajouter un commentaire.</p>
            <?php endif; ?>
            <?php
            if ($commentaires != 0) {
                foreach ($commentaires as $commentaire) {
                   echo "<div>";
                    echo "<p><strong>" . $commentaire->getPseudo() . "</strong></p>";
                    echo "<p>" . $commentaire->getCommentaire() . "</p>";

                    $date = new DateTime($commentaire->getDateCommentaire());
                    $date->setTimezone(new DateTimeZone('Europe/Paris'));
                    echo "<p><small>" . $date->format('l d F Y H:i:s') . "</small></p>";

                    echo "</div>";
                    if (isset($_SESSION['idUsers']) && $_SESSION['idUsers'] == $commentaire->getIdUsers()) {
            ?>          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#commentaire<?= $commentaire->getIdcommentaire() ?>" data-bs-whatever="biybib">modifier le commentaire</button>
                        <a class="btn btn-danger"href="<?= URL ?>avis/supp/<?= $commentaire->getIdCommentaire() ?>">supprimer</a><br>
            <?php

                    }?> <div class="modal fade" id="commentaire<?= $commentaire->getIdCommentaire() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="<?= URL ?>avis/mv" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                      <label for="commentaire">commentaire :</label>
                      <input type="text" class="form-control" id="commentaire" name="commentaire" value="<?= $commentaire->getCommentaire() ?>">
                    </div>
                    <input type="hidden" class="form-control" id="idCommentaire" name="idCommentaire" value="<?= $commentaire->getIdCommentaire() ?>">
                      <button type="submit" class="btn btn-primary">modifier</button>
                    </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
            } else {
                echo "rien";
            }
            ?>

            
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>