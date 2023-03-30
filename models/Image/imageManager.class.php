<?php
require_once "./models/model.class.php";
require_once "./models/Image/image.class.php";

class ImageManager extends Model {
    private $listeImages;

    public function ajoutImage($image) {
        $this->listeImages[] = $image;
    }

    public function getListeImages() {
        return $this->listeImages;
    }

    public function chargementListeImages() {
        $req = $this->getBdd()->prepare("SELECT * FROM Image");
        $req->execute();
        $mesImages = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesImages as $image){
            // generate Image object of the Image class
            $i = new Image($image["idImage"], $image["nomImage"], $image["idComponent"]);
            $this->ajoutImage($i);
        }
    }
}
?>