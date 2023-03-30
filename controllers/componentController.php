<?php 
require_once "./models/Component/componentManager.class.php";

class ComponentController{
    private $componentManager;

    public function __construct(){

        $this->componentManager=new ComponentManager;
        $this->componentManager->chargementListeComponent();
    }
   public function afficherComponent(){
    return $this->componentManager->getListeComponent();

   } 
}
?>  