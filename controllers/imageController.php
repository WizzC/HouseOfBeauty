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
    public function ajoutImageValidation(){

        $this->imageManager->ajoutImageBD($_POST["image"],$_POST["idComponent"]);
        header("Location: " .URL. "avis");
        exit();
    }
    public function supprimerImage($idImage){
        $this->imageManager->suppressionImageBd($idImage);
        header("Location: " .URL. "image");
    }
    public function modificationImage($idImage){
        $this->imageManager->getImageById($idImage);
        header("Location: " . URL . "image");
    }
    public function modificationImageValidation(){
        $this->imageManager->modificationImageBD($_POST["idImage"],$_POST["image"],$_POST["idComponent"]);
        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Modification Réalisé"
        ];
        header("Location: ".URL."image");
    }
     
}
?>