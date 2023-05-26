<?php
class Description {
    private $idDescription;
    private $description;
    private $idComponent;
  
    public function __construct($id, $description, $idComponent) {
      $this->idDescription = $id;
      $this->description = $description;
      $this->idComponent = $idComponent;
    }
  
    // Getter methods
    public function getIdDescription() {
      return $this->idDescription;
    }
  
    public function getDescription() {
      return $this->description;
    }
  
    public function getIdComponent() {
      return $this->idComponent;
    }
  
    // Setter methods
    public function setIdDescription($id) {
      $this->idDescription = $id;
    }
  
    public function setDescription($description) {
      $this->description = $description;
    }
  
    public function setIdComponent($idComponent) {
      $this->idComponent = $idComponent;
    }
  }
  
?>