<?php
ob_start(); // Début de la mise en mémoire tampon
?>

<form method="POST" action="" class="d-grid gap-2 col-12 col-md-8 mx-auto mt-5 rounded shadow p-5">
    <div class="form-group mb-3 mt-5 pt-5 px-5 mx-5">
        <label for="pseudo" class="form-label text-muted fs-5 mb-2">Pseudo :</label>
        <input type="text" class="form-control rounded-pill py-3 px-4 border-0 shadow-sm" id="pseudo" name="Pseudo" placeholder="Entrez votre pseudo">
        <div id="confirmepseudo"></div>
    </div>
    <div class="form-group mb-3 px-5 mx-5">
        <label for="email" class="form-label text-muted fs-5 mb-2">Email :</label>
        <input type="text" class="form-control rounded-pill py-3 px-4 border-0 shadow-sm" id="email" name="Email" placeholder="Entrez votre email">
        <div id="confirmeemail"></div>
    </div>
    <div class="form-group mb-4 px-5 mx-5">
        <label for="password" class="form-label text-muted fs-5 mb-2">Mot de passe :</label>
        <input type="password" class="form-control rounded-pill py-3 px-4 border-0 shadow-sm" id="password" name="Password" placeholder="Entrez votre mot de passe">
        <div id="confirmepassword"></div>
    </div>
    
    <div class="form-group mb-4 px-5 mx-5">
        <label for="confirmpassword" class="form-label text-muted fs-5 mb-2">Confirmez votre mot de passe :</label>
        <input type="password" class="form-control rounded-pill py-3 px-4 border-0 shadow-sm" id="confirmpassword" name="ConfirmPassword" placeholder="Confirmez votre mot de passe">
        <div id="confirmepasswordconfirmation"></div>
    </div>

    <div class="d-grid gap-2 mt-3 px-5 mx-5">
        <button type="submit" name="Sinscrire" class="btn btn-primary rounded-pill py-3 fs-5 fw-bold">S'inscrire</button>
    </div>
    <?php
    if (isset($_POST['Sinscrire'])) { // Vérifie si le formulaire a été soumis
        $pseudo = $_POST['Pseudo'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $confirmpassword = $_POST['ConfirmPassword'];

        $erreur = ''; // Variable pour stocker les éventuelles erreurs de validation

        if (empty($pseudo)) {
            $erreur .= "Le champ Pseudo est requis.<br>";
        } elseif (preg_match('/\s/', $pseudo)) {
            $erreur .= "Le pseudo ne doit pas contenir d'espaces.<br>";
        } elseif (ctype_digit($pseudo)) {
            $erreur .= "Le pseudo ne doit pas contenir que des chiffres.<br>";
        } elseif (!preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $pseudo)) {
            $erreur .= "Le pseudo doit commencer par une lettre et ne doit contenir que des lettres, des chiffres et des underscores.<br>";
        }

        if (empty($email)) {
            $erreur .= "Le champ Email est requis.<br>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreur .= "L'email saisi n'est pas valide.<br>";
        }

        if (empty($password)) {
            $erreur .= "Le champ Mot de passe est requis.<br>";
        }

        if (empty($confirmpassword)) {
            $erreur .= "Le champ Confirmez votre mot de passe est requis.<br>";
        } elseif ($password != $confirmpassword) {
            $erreur .= "Les mots de passe saisis ne correspondent pas.<br>";
        }

        if (empty($erreur)) { // Si aucune erreur de validation n'a été détectée
            $_SESSION['Pseudo'] = $pseudo; // Enregistre le pseudo dans la session
            $_SESSION['Email'] = $email; // Enregistre l'email dans la session
            $_SESSION['Password'] = $password; // Enregistre le mot de passe dans la session
            $_SESSION['Role'] = 0; // Définit le rôle de l'utilisateur (dans cet exemple, 0 pour un utilisateur normal)
            header("Location: " . URL . "inscription/9"); // Redirige l'utilisateur vers une autre page (URL à définir)
        }
    }
    ?>
</form>

<?php if (!empty($erreur)): // Si des erreurs sont présentes ?>
    <div class="alert alert-danger px-5 mx-5 text-center">
        <?= $erreur // Affiche les erreurs ?>
    </div>
<?php endif; ?>

<script src="/public/js/scriptInscription.js"></script>

<?php
$content = ob_get_clean(); // Récupère le contenu de la mémoire tampon et l'assigne à la variable $content
require "template.php"; // Inclut le fichier de template
?>
