<?php 
require_once "./models/Commentaire/commentaireManager.class.php";

class CommentaireController{
    private $commentaireManager;

    public function __construct(){

        $this->commentaireManager=new CommentaireManager;
        $this->commentaireManager->chargementListeCommentaire();
    }
    public function afficherCommentaire(){
        return $this->commentaireManager->getListeCommentaire();
    
       } 
    public function ajoutCommentaireValidation(){

        $this->commentaireManager->ajoutCommentaireBD($_POST["commentaire"],$_SESSION["idUsers"]);


        // redirige lutilisateur vers la pages des animes
        header("Location: " .URL. "avis");
        exit();
    }
    public function supprimerCommentaire($idCommentaire){
        $this->commentaireManager->suppressionCommentaireBd($idCommentaire);
        header("Location: " .URL. "avis");
    }
}
?>  