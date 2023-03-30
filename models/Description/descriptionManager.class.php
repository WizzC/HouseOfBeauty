<?php
require_once "./models/model.class.php";
require_once "./models/Description/description.class.php";

class DescriptionManager extends Model{
    private $listeDescriptions;

    public function ajoutDescription($description){
        $this->listeDescriptions[] = $description;
    }

    public function getListeDescriptions(){
        return $this->listeDescriptions;
    }

    public function chargementListeDescriptions(){
        $req = $this->getBdd()->prepare("SELECT * FROM Description");
        $req->execute();
        $mesDescriptions = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesDescriptions as $description){
            // generate Description object of the Description class
            $d = new Description($description["idDescription"], $description["prix"], $description["idComponent"]);
            $this->ajoutDescription($d);
        }
    }
}
?>