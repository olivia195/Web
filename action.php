<?php
include_once("exemple15.2.php"); 

$idcom = connexobjet("essaiebdd");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sécurisation
    $id_article = htmlspecialchars($_POST['id_article']);
    $design = htmlspecialchars($_POST['design']);
    $prix = floatval($_POST['prix']);
    $categorie = htmlspecialchars($_POST['categorie']);

    $sql = "INSERT INTO article (id_article, design, prix, categorie) VALUES (?, ?, ?, ?)";

    $stmt = $idcom->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssds", $id_article, $design, $prix, $categorie);

        if ($stmt->execute()) {
            echo "<script>
                alert('Article ajouté avec succès');
                window.location.href='formulaire.html'; // retourne au formulaire
            </script>";
        } else {
            echo "<script>alert('Erreur lors de l\\'insertion');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Erreur de préparation');</script>";
    }

    $idcom->close();
}
?>