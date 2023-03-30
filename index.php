<?php 
session_start();
define("URL",str_replace("index.php","",(isset($_SERVER["HTTPS"])?"https":"http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "./controllers/commentaireController.php";
$commentaireController=new CommentaireController;

require_once "./controllers/componentController.php";
$componentController=new ComponentController;

require_once "./controllers/descriptionController.php";
$descriptionController=new DescriptionController;

require_once "./controllers/imageController.php";
$imageController=new ImageController;

require_once "./controllers/usersController.php";
$usersController=new UserController;

try{
    if(empty($_GET["page"])){
        require "views/accueil.view.php";
    }
    else{
        $url=explode("/",filter_var($_GET["page"],FILTER_SANITIZE_URL));

        switch($url[0]){
            case"accueil" :
                require "views/accueil.view.php";
            break;

            case"prestations":
                $components = $componentController->afficherComponent();
                $descriptions = $descriptionController->afficherDescription();
                $images = $imageController->afficherImage();
                require "./views/prestations.view.php";

            break;
            case"formation":

            break;
            case "avis":
                if(empty($url[1]))
                {
                    $aa = $commentaireController->afficherCommentaire();
                    require "views/commentaire.view.php";
                    
                }
                elseif($url[1]==="l"){
                  $commentaireController->ajoutCommentaireValidation();
                    
                }
                elseif($url[1]==="supp"){
                    $commentaireController->supprimerCommentaire($url[2]);
                      
                  }
            break;
            case "connexion":
                if (empty($url[1])) {
                    $usersController->connexion();
                } else if ($url[1] === "3") {
                    // afficher le Users concerner
                    $usersController->UsersValidation();
                };
            break;
            case "inscription":
                if (empty($url[1])) {
                    $usersController->inscription();
                } else if ($url[1] === "9") {
                    // afficher le Users concerner
                    $usersController->ajoutUsersValidation();
                };
            break;
            case "logout":
                session_destroy();
                header("Location: ".URL."accueil");
            break;
            case "contact":
                require "views/contact.view.php";
            break;
        }}
}
catch(Exception $e){  
    echo $e->getMessage();
}