<?php 
require_once "./models/Description/descriptionManager.class.php";

class DescriptionController{
    private $descriptionManager;

    public function __construct(){

        $this->descriptionManager=new DescriptionManager;
        $this->descriptionManager->chargementListeDescriptions();
    }
    public function afficherdescription(){
        return $this->descriptionManager->getListeDescriptions();
    
       } 
    public function ajoutDescriptionValidation(){

        $this->descriptionManager->ajoutDescriptionBD($_POST["description"],$_POST["idComponent"]);
        header("Location: " .URL. "description");
        exit();
    }
    public function supprimerDescription($idDescription){
        $this->descriptionManager->suppressionDescriptionBd($idDescription);
        header("Location: " .URL. "description");
    }
    public function modificationDescription($idDescription){
        $this->descriptionManager->getDescriptionById($idDescription);
        header("Location: " . URL . "description");
    }
    public function modificationDescriptionValidation(){
        $this->descriptionManager->modificationDescriptionBD($_POST["idDescription"],$_POST["description"],$_POST["idComponent"]);
        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Modification Réalisé"
        ];
        header("Location: ".URL."description");
    }
    
}
?>  