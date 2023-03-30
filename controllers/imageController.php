<?php
require_once "./models/Image/imageManager.class.php";

class ImageController {
    private $imageManager;

    public function __construct() {
        $this->imageManager = new ImageManager;
        $this->imageManager->chargementListeImages();
    }
    public function afficherImage(){
        return $this->imageManager->getListeImages();
    
       } 
}
?>