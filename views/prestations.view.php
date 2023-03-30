<?php
ob_start();
?>

<section class="main-section d-flex align-items-center justify-content-center" style="margin-top: 100px;">
  <div class="container">
    <?php foreach ($components as $component) { ?>
      <div class="col m-0 mb-5 " >
        <h3 class="container text-center"><?= $component->getTitre() ?></h3>
        <div class="row">
        <?php if ($component->getIdComponent() % 2 == 0) { ?>
            <div class="col">
          <?php foreach ($descriptions as $description) {
                    if ($component->getIdComponent() == $description->getIdComponent()) { ?>
                    <p class="w-75"><?= $description->getPrix() ?></p>
                    <?php }
          } ?></div><?php
                foreach($images as $image){ 
                    if($image->getIdComponent() == $component->getIdComponent() ){?> 
                <img src="/public/images/<?=$image->getNomImage()?>" style="height:200px; width :200px; " alt="">
                <?php }}} 
            else {
                foreach($images as $image){ 
                    if($image->getIdComponent() == $component->getIdComponent() ){?> 
                <img src="/public/images/<?=$image->getNomImage()?>" style="height:200px; width :200px;" alt="">
                <?php }} 
                ?><div class="col"><?php 
                foreach ($descriptions as $description) {
                    if ($component->getIdComponent() == $description->getIdComponent()) { ?>
                    <p  class="w-75"><?= $description->getPrix() ?></p>
                    <?php }}
                ?> </div> <?php } ?>
                </div>
      </div>
    <?php } ?>
  </div>
</section>

<?php
$content = ob_get_clean();
require "template.php";
?>
