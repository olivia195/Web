<?php

if(isset($_POST['connexion'])){

    header("Location: accueil.php");
    exit();
}

?>
<?php
session_start();

include("exemple15.2.php");

$idcom = connexobjet("essaiebdd");

if(isset($_POST['connexion']))
{
    $login = $_POST['username'];
    $password = $_POST['password'];

    // Recherche utilisateur
    $requete = "SELECT * FROM user WHERE login='$login'";
    $result = mysqli_query($idcom, $requete);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        // Vérification mot de passe
        if(password_verify($password, $user['password']))
        {
            // Création session
            $_SESSION['user'] = $user['login'];

            // Redirection
            header("Location: accueil.php");
            exit();
        }
        else
        {
            echo "Mot de passe incorrect.";
        }
    }
    else
    {
        echo "Utilisateur introuvable.";
    }
}
?>