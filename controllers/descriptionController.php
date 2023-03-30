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
}
?>  