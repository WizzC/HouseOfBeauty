<?php
// Démarrage de la temporisation de sortie
ob_start();
?>
<?php
// Initialisation de la variable index à 0
$index = 0;
$nb = 0;
$bool = true;
?>
<section class="main-section d-flex align-items-center justify-content-center pt-4" style="height: 70vh; background: url('/public/images/formation-cap-esthetique.jpg') no-repeat center center/cover; margin-top: 80px;">
  <div class="container text-center" style="z-index: 1;">
    <h1 class="display-4 text-dark text-uppercase fst-italic" style="text-shadow: 0 0 10px #fff, 0 0 20px #fff;font-family:Italianno;">Prestations</h1>
    <p class="lead text-dark fs-4" style="text-shadow: 0 0 10px #fff, 0 0 20px #fff;font-family:Italianno;">House Of Beauty</p>
  </div>
</section>

<section class="main-section d-flex align-items-center justify-content-center" style="margin-top: 150px;">
  <div class="container">
    <?php foreach ($components as $component) : ?>
      <?php $index = 0; ?>
      <div class="col m-0 mb-5">
        <h3 class="text-center"><?= $component->getTitre()  ?></h3>
        <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
          <div class="text-center pb-3">
            <a href="<?= URL ?>component/supp/<?= $component->getIdComponent() ?>" class="btn btn-danger">Supprimer le titre</a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#titre<?= $component->getIdComponent() ?>" data-bs-whatever="biybib">Modifier le titre</button>
          </div>
          <!-- modal pour la modification du component -->
          <div class="modal fade" id="titre<?= $component->getIdComponent() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="<?= URL ?>component/mv">
                    <div class="mb-3">
                      <label for="titre">titre :</label>
                      <input type="text" class="form-control" id="titre" name="titre" value="<?= $component->getTitre() ?>">
                    </div>
                    <div class="mb-3">


                    </div>
                    <input type="hidden" name="idComponent" value="<?= $component->getIdComponent(); ?>">
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
              </div>
            </div>
          </div>

        <?php endif; ?>
        <div class="row align-items-center">
          <?php if ($nb % 2 != 0) : ?>
            <div class="col-lg-6">
              <?php foreach ($descriptions as $description) : ?>
                <?php if ($component->getIdComponent() == $description->getIdComponent()) : ?>
                  <p class="text-center w-100"><?= $description->getDescription() ?></p>
                  <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
                    <div class="text-center pb-3">
                      <a href="<?= URL ?>description/supp/<?= $description->getIdDescription() ?>" class="btn btn-danger">Supprimer la description</a>
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#description<?= $description->getIdDescription() ?>" data-bs-whatever="biybib">Modifier le description</button>
                    </div>
                    <div class="modal fade" id="description<?= $description->getIdDescription() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="<?= URL ?>description/mv">
                              <div class="mb-3">
                                <label for="description">description :</label>
                                <input type="text" class="form-control" id="description" name="description" value="<?= $description->getDescription() ?>">
                              </div>
                              <input type="hidden" name="idDescription" value="<?= $description->getIdDescription(); ?>">
                              <input type="hidden" name="idComponent" value="<?= $component->getIdComponent(); ?>">
                              <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
                <form action="<?= URL ?>description/l" method="POST">
                  <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
                  <div class="mb-3">
                    <textarea class="form-control" name="description" rows="5" required></textarea>
                  </div>
                  <div class="text-center">
                    <input class="btn btn-success" type="submit" value="Ajouter une description">
                  </div>
                </form>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div id="carousel-<?= $component->getIdComponent() ?>" class="carousel slide d-flex align-items-center justify-content-center" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php foreach ($images as $image) : ?>


                  <?php if ($image->getIdComponent() == $component->getIdComponent()) : ?>



                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                      <img src="/public/images/<?= $image->getNomImage() ?>" class="d-block mx-auto img-fluid rounded mt-5 shadow-lg" style="width: 500px; height:500px; object-fit: cover;" alt="">
                      <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
                        <div class="text-center py-3">
                          <a href="<?= URL ?>image/supp/<?= $image->getIdImage() ?>" class="btn btn-danger">Supprimer l'image</a>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#image<?= $component->getIdComponent() ?>" data-bs-whatever="biybib">ajouter image</button> <?php $bool = false ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <?php $index++; ?>
                  <?php endif; ?>
                <?php endforeach; ?>


                <div class="modal fade" id="image<?= $component->getIdComponent() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= URL ?>image/l" method="POST" enctype="multipart/form-data">

                          <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
                          <div class="form-group">

                            <input class="form-control-file" type="file" id="image" name="image">
                          </div>

                          <button type="submit" class="btn btn-primary">ajouter</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>



                <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
                  <?php if ($bool == true) : ?>
                    <div class="text-center py-3">
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#image<?= $component->getIdComponent() ?>" data-bs-whatever="biybib">ajouter image</button>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              </div>


              <button class="carousel-control-prev " type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
              </button>
            </div>
            <?php $bool = true; ?>
          </div>
          <?php if ($nb % 2 == 0) : ?>
            <div class="col-lg-6">
              <?php foreach ($descriptions as $description) : ?>
                <?php if ($component->getIdComponent() == $description->getIdComponent()) : ?>
                  <div class="description-block">
                    <p class="text-center"><?= $description->getDescription() ?></p>
                    <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
                      <div class="text-center pb-3">
                        <a href="<?= URL ?>description/supp/<?= $description->getIdDescription() ?>" class="btn btn-danger text-center">Supprimer la description</a>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#description<?= $description->getIdDescription() ?>" data-bs-whatever="biybib">Modifier le description</button>
                      </div>
                      <div class="modal fade" id="description<?= $description->getIdDescription() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="<?= URL ?>description/mv">
                                <div class="mb-3">
                                  <label for="description">description :</label>
                                  <input type="text" class="form-control" id="description" name="description" value="<?= $description->getDescription() ?>">
                                </div>
                                <div class="mb-3">


                                </div>
                                <input type="hidden" name="idDescription" value="<?= $description->getIdDescription(); ?>">
                                <input type="hidden" name="idComponent" value="<?= $component->getIdComponent(); ?>">
                                <button type="submit" class="btn btn-primary">Valider</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if (isset($_SESSION['Pseudo']) && $_SESSION['Role'] == 1) : ?>
                <form action="<?= URL ?>description/l" method="POST" class="description-form">
                  <input type="hidden" name="idComponent" value="<?= $component->getIdComponent() ?>">
                  <div class="mb-3">
                    <textarea class="form-control" name="description" rows="5" placeholder="Ajouter une description" required></textarea>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-success" type="submit">Ajouter une description</button>
                  </div>
                </form>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

    <?php
      $nb++;
    endforeach; ?>
  </div>
</section>

<div class="d-flex align-items-center justify-content-center mt-5">
  <?php
  if (isset($_SESSION['Pseudo'])) {
    if ($_SESSION['Role'] == 1) { ?>

      <form action="<?= URL ?>component/l" method="POST" class="col-lg-6">
        <div class="mb-3">

          <textarea class="form-control" name="titre" rows="5" required></textarea>
        </div>

        <div class="text-center">
          <input class="btn btn-success" type="submit" value="Ajouter un titre">
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