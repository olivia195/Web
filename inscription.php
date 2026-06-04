<?php

include("exemple15.2.php");

// Connexion à la base
$idcom = connexobjet("essaiebdd");

if(isset($_POST['inscription']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $contact = $_POST['contact'];
    $login = $_POST['username'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vérification du login
    $verif = "SELECT * FROM user WHERE login='$login'";
    $result = mysqli_query($idcom, $verif);

    if(mysqli_num_rows($result) > 0)
    {
        echo "Nom d'utilisateur déjà utilisé.";
    }
    else
    {
        // Insertion
        $requete = "INSERT INTO user(nom, prenom, contact, login, password)
                    VALUES('$nom', '$prenom', '$contact', '$login', '$password')";

        $resultat = mysqli_query($idcom, $requete);

        if($resultat)
        {
            // Redirection vers la page de connexion
            header("Location: index.html");
            exit();
        }
        else
        {
            echo "Erreur : " . mysqli_error($idcom);
        }
    }
}

?>