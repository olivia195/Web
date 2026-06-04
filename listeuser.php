<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste des Utilisateurs</title>
<style>
* { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', sans-serif; }
body { background:#f0f4f8; padding:30px; }
.container { max-width:900px; margin:auto; background:#fff; padding:25px; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.2); }
h3 { text-align:center; margin-bottom:10px; color:#003087; font-size:22px; }
table { width:100%; border-collapse:collapse; margin-top:15px; }
th { background:linear-gradient(135deg, #6f42c1, #a855f7); color:#fff; padding:12px; text-align:center; }
td { padding:10px; text-align:center; border-bottom:1px solid #ddd; }
tr:nth-child(even) { background:#f9f9f9; }
tr:hover { background:#f3e8ff; transition:0.3s; }
.top-bar { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; }
.btn { padding:8px 18px; border-radius:20px; text-decoration:none; font-size:14px; font-weight:600; transition:0.3s; color:white; display:inline-block; }
.btn-retour { background:linear-gradient(135deg, #003087, #0057b7); }
.btn-retour:hover { transform:translateY(-2px); box-shadow:0 5px 15px rgba(0,48,135,0.3); }
.badge { background:#6f42c1; color:white; padding:3px 10px; border-radius:10px; font-size:12px; }
</style>
</head>
<body>
<div class="container">
<?php
include("exemple15.2.php");
$conn = connexobjet("essaiebdd");

// ✅ On sélectionne tout SAUF le mot de passe
$result = $conn->query("SELECT id, nom, prenom, contact, login FROM user ORDER BY nom");

if (!$result) {
    echo "<p style='color:red;text-align:center;'>Lecture impossible</p>";
} else {
    $nb = $result->num_rows;
    echo "<h3>👥 Liste des Utilisateurs</h3>";
    echo "<div class='top-bar'>
        <h4>Il y a <span class='badge'>$nb</span> utilisateur(s) enregistré(s)</h4>
        <a href='accueil.php' class='btn btn-retour'>🏠 Accueil</a>
    </div>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Contact</th>
                <th>Login</th>
            </tr>";
    while ($ligne = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($ligne['id'])      . "</td>
                <td>" . htmlspecialchars($ligne['nom'])     . "</td>
                <td>" . htmlspecialchars($ligne['prenom'])  . "</td>
                <td>" . htmlspecialchars($ligne['contact']) . "</td>
                <td>" . htmlspecialchars($ligne['login'])   . "</td>
              </tr>";
    }
    echo "</table>";
    $result->free();
}
$conn->close();
?>
</div>
</body>
</html>