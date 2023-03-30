<?php
require_once "./models/model.class.php";
require_once "./models/Component/component.class.php";

class ComponentManager extends Model{
    private $listeComponent;

    public function ajoutComponent($Component){
        $this->listeComponent[]=$Component;
    }
    public function getListeComponent(){return $this->listeComponent;}

    public function chargementListeComponent(){
        $req=$this->getBdd()->prepare("SELECT * FROM Component");
        $req->execute();
        $mesComponent=$req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesComponent as $Component){
            // genere Component de la classe Component
            $l=new Component($Component["idComponent"],$Component["titre"]);
            $this->ajoutComponent($l);
        }
    }
}


?>