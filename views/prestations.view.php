<?php
// Démarrage de la temporisation de sortie
ob_start();
?>
<?php
// Initialisation de la variable index à 0
$index = 0;
?>
<!-- Création de la section principale avec des classes de mise en page et un margin-top -->
<section class="main-section d-flex align-items-center justify-content-center" style="margin-top: 150px;">
  <div class="container">
    <?php // Parcours du tableau de composants
    foreach ($components as $component) {
      // Réinitialisation de la variable index à 0 pour chaque composant
      $index = 0;
    ?>
      <div class="col m-0 mb-5">
        <!-- Affichage du titre du composant -->
        <h3 class="text-center"><?= $component->getTitre() ?></h3>
        <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
        if (isset($_SESSION['Pseudo'])) {
          if ($_SESSION['Role'] = 1) { ?>
            <!-- Affichage du lien pour supprimer le titre du composant -->
            <a href="<?= URL ?>component/supp/<?= $component->getIdComponent() ?>" class="btn btn-primary">supprimer titre</a>
        <?php }
        } ?>
        <div class="row">
          <?php // Vérification si l'identifiant du composant est pair
          if ($component->getIdComponent() % 2 != 0) { ?>
            <div class="col">
              <?php // Parcours du tableau de descriptions
              foreach ($descriptions as $description) {
                // Vérification si l'identifiant du composant correspond à celui de la description
                if ($component->getIdComponent() == $description->getIdComponent()) { ?>
                  <!-- Affichage du prix de la description -->
                  <p class="text-center w-100"><?= $description->getPrix() ?></p>
                  <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
                  if (isset($_SESSION['Pseudo'])) {
                    if ($_SESSION['Role'] = 1) { ?>
                      <!-- Affichage du lien pour supprimer la description -->
                      <a href="<?= URL ?>description/supp/<?= $description->getIdDescription() ?>" class="btn btn-primary">supprimer description</a>
                  <?php }
                  } ?>
              <?php }
              } ?>
              <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
              if (isset($_SESSION['Pseudo'])) {
                if ($_SESSION['Role'] = 1) { ?>
                  <!-- Création du formulaire pour ajouter une description -->
                  <form action="<?= URL ?>description/l" method="POST">
                    <!-- Champ caché pour stocker l'identifiant du composant -->
                    <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
                    <div class="mb-3">
                      <!-- Champ de texte pour saisir la description -->
                      <textarea class="form-control" name="description" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                      <!-- Bouton pour soumettre le formulaire -->
                      <input class="btn btn-primary" type="submit" value="Ajouter une description">
                    </div>
                  </form>
              <?php }
              } ?>
            </div>
        
        <div class="col d-flex align-items-center justify-content-center">
          <!-- Création du carrousel d'images pour le composant -->
          <div id="carousel-<?= $component->getIdComponent() ?>" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php // Parcours du tableau d'images
              foreach ($images as $image) {
                // Vérification si l'identifiant du composant correspond à celui de l'image
                if ($image->getIdComponent() == $component->getIdComponent()) { ?>
                  <!-- Création d'un élément du carrousel avec la classe 'active' si l'index est égal à 0 -->
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <!-- Affichage de l'image -->
                    <img src="/public/images/<?= $image->getNomImage() ?>" class="d-block " style="width: 400px;height: 400px;" alt="">
                    <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
                    if (isset($_SESSION['Pseudo'])) {
                      if ($_SESSION['Role'] = 1) { ?>
                        <!-- Affichage du lien pour supprimer l'image -->
                        <a href="<?= URL ?>image/supp/<?= $image->getIdImage() ?>" class="btn btn-primary">supprimer image</a>
                    <?php }
                    } ?>
                  </div>

              <?php // Incrémentation de l'index
                  $index++;
                }
              } ?>
            </div>
            <!-- Bouton de contrôle précédent du carrousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <!-- Bouton de contrôle suivant du carrousel -->
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
            if (isset($_SESSION['Pseudo'])) {
              if ($_SESSION['Role'] = 1) { ?>
            <!-- Création du formulaire pour ajouter une image -->
            <form action="<?= URL ?>image/l" method="POST" enctype="multipart/form-data">
              <!-- Champ caché pour stocker l'identifiant du composant -->
              <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
              <div class="form-group">
                <!-- Champ de sélection de fichier pour télécharger l'image -->
                <input class="form-control-file" type="file" id="image" name="image">
              </div>
              <!-- Bouton pour soumettre le formulaire -->
              <button type="submit" class="btn btn-primary">Ajoute une image</button>
            </form>
        <?php }
            } ?>

      <?php } else { ?>
        <div class="col d-flex align-items-center justify-content-center">
          <!-- Création du carrousel d'images pour le composant -->
          <div id="carousel-<?= $component->getIdComponent() ?>" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php // Parcours du tableau d'images
              foreach ($images as $image) {
                // Vérification si l'identifiant du composant correspond à celui de l'image
                if ($image->getIdComponent() == $component->getIdComponent()) { ?>
                  <!-- Création d'un élément du carrousel avec la classe 'active' si l'index est égal à 0 -->
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <!-- Affichage de l'image -->
                    <img src="/public/images/<?= $image->getNomImage() ?>" class="d-block " style="width: 400px;height: 400px;" alt="">
                    <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
                    if (isset($_SESSION['Pseudo'])) {
                      if ($_SESSION['Role'] = 1) { ?>
                        <!-- Affichage du lien pour supprimer l'image -->
                        <a href="<?= URL ?>image/supp/<?= $image->getIdImage() ?>" class="btn btn-primary">supprimer description</a>
                    <?php }
                    } ?>
                  </div>
              <?php // Incrémentation de l'index
                  $index++;
                }
              } ?>
            </div>
            <!-- Bouton de contrôle précédent du carrousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <!-- Bouton de contrôle suivant du carrousel -->
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
            if (isset($_SESSION['Pseudo'])) {
              if ($_SESSION['Role'] = 1) { ?>
            <!-- Création du formulaire pour ajouter une image -->
            <form action="<?= URL ?>image/l" method="POST" enctype="multipart/form-data">
              <!-- Champ caché pour stocker l'identifiant du composant -->
              <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
              <div class="form-group">
                <!-- Champ de sélection de fichier pour télécharger l'image -->
                <input class="form-control-file" type="file" id="image" name="image">
              </div>
              <!-- Bouton pour soumettre le formulaire -->
              <button type="submit" class="btn btn-primary">Ajoute une image</button>
            </form>
        <?php }
            } ?>

        <div class="col">
          <?php // Parcours du tableau de descriptions
            foreach ($descriptions as $description) {
              // Vérification si l'identifiant du composant correspond à celui de la description
              if ($component->getIdComponent() == $description->getIdComponent()) { ?>
              <!-- Affichage de la description -->
              <p class="w-100 text-center "><?= $description->getPrix() ?></p>
              <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
                if (isset($_SESSION['Pseudo'])) {
                  if ($_SESSION['Role'] = 1) { ?>
                  <!-- Affichage du lien pour supprimer la description -->
                  <a href="<?= URL ?>description/supp/<?= $description->getIdDescription() ?>" class="btn btn-primary">supprimer description</a>
              <?php }
                } ?>
            <?php }
            }
            // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
            if (isset($_SESSION['Pseudo'])) {
              if ($_SESSION['Role'] = 1) { ?>
              <!-- Création du formulaire pour ajouter une description -->
              <form action="<?= URL ?>description/l" method="POST">
                <!-- Champ caché pour stocker l'identifiant du composant -->
                <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
                <div class="mb-3">
                  <!-- Champ de saisie pour la description -->
                  <textarea class="form-control" name="description" rows="5" required></textarea>
                </div>
                <!-- Bouton pour soumettre le formulaire -->
                <div class="text-center">
                  <input class="btn btn-primary" type="submit" value="Ajouter une description">
                </div>
              </form>
          <?php }
            } ?>
        </div>
      <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>
<!-- Création d'un bloc pour ajouter un titre -->
<div class="d-flex align-items-center justify-content-center mt-5">
  <?php // Vérification si l'utilisateur est connecté et a le rôle 1 (administrateur)
  if (isset($_SESSION['Pseudo'])) {
    if ($_SESSION['Role'] = 1) { ?>
      <!-- Création du formulaire pour ajouter un titre -->
      <form action="<?= URL ?>component/l" method="POST">
        <div class="mb-3">
          <!-- Champ de saisie pour le titre -->
          <textarea class="form-control" name="titre" rows="5" required></textarea>
        </div>
        <!-- Bouton pour soumettre le formulaire -->
        <div class="text-center">
          <input class="btn btn-primary" type="submit" value="Ajouter un titre">
        </div>
      </form>
  <?php }
  } ?>
</div>
</div>
<?php
// Capture du contenu du tampon de sortie et stockage dans la variable $content
$content = ob_get_clean();
// Inclusion du fichier de template
require "template.php";
?>