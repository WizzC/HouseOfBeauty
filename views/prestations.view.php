<?php
ob_start();
?>
<?php
$index = 0;
?>
<section class="main-section d-flex align-items-center justify-content-center" style="margin-top: 150px;">
  <div class="container">
    <?php foreach ($components as $component) { 
      $index = 0;
      ?>
      <div class="col m-0 mb-5">
        <h3 class="text-center"><?= $component->getTitre() ?></h3>
        <div class="row">
          <?php if ($component->getIdComponent() % 2 == 0) { ?>
          <div class="col">
            <?php foreach ($descriptions as $description) {
              if ($component->getIdComponent() == $description->getIdComponent()) { ?>
              <p class="text-center w-100"><?= $description->getPrix() ?></p>
              <?php }
            } ?>
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <div id="carousel-<?= $component->getIdComponent() ?>" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php foreach($images as $image) {
                  if($image->getIdComponent() == $component->getIdComponent()) { ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="/public/images/<?= $image->getNomImage() ?>" class="d-block " style="width: 400px;height: 400px;" alt="">
                  </div>
                 
                <?php  $index++; }
              } ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <?php } else { ?>
            <div class="col d-flex align-items-center justify-content-center">
            <div id="carousel-<?= $component->getIdComponent() ?>" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php foreach($images as $image) {
                  if($image->getIdComponent() == $component->getIdComponent()) { ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="/public/images/<?= $image->getNomImage() ?>" class="d-block " style="width: 400px;height: 400px;" alt="">
                  </div>
                 
                <?php  $index++; }
              } ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
      <div class="col">
        <?php foreach ($descriptions as $description) {
          if ($component->getIdComponent() == $description->getIdComponent()) { ?>
          <p class="w-100 text-center "><?= $description->getPrix() ?></p>
          <?php }
        } ?>
      </div>
      <?php } ?>
    
  </div>
<?php } ?>
</div>
</section>


<div class="col d-flex align-items-center justify-content-center">
            <div id="carousel-<?= $component->getIdComponent() ?>" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php foreach($images as $image) {
                  if($image->getIdComponent() == $component->getIdComponent()) { ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="/public/images/<?= $image->getNomImage() ?>" class="d-block " style="width: 200px;" alt="">
                  </div>
                 
                <?php  $index++; }
              } ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $component->getIdComponent() ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>




<?php
$content = ob_get_clean();
require "template.php";
?>
