<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table client</title>
<style type="text/css" >
table {border-style: double; border-width: 3px; border-color: red; background-color:
yellow;}
</style>
</head>
<body>
<?php
include("exemple15.2.php");
$idcom=connexobjet("magasin","myparam");
$requete="SELECT id_client AS 'Code_client',nom,prenom,adresse,age,mail FROM client
WHERE ville ='Paris' ORDER BY nom"; ←
$result=$idcom->query($requete);
if(!$result)
{
echo "Lecture impossible";
}
else
{
$nbart=$result->num_rows;
echo "<h3> Il y a $nbart clients habitant Paris</h3>";
// Affichage des titres du tableau
$titres=$result->fetch_object(); ←
echo "<table border=\"1\"> <tr>";
foreach($titres as $colonne=>$val) ←
{
  echo "<th>", $colonne ,"</th>"; ← 
}
echo "</tr>";
// Affichage des valeurs du tableau
  echo "<tr>";
$result->data_seek(0); ←
while ($ligne = $result->fetch_object()) ←
{
  echo"<td>", $ligne->Code_client,"</td>", "<td>", $ligne->nom,"</td>","<td>",
$ligne->prenom,"</td>","<td>", $ligne->adresse,"</td>","<td>", $ligne->age,
"</td>","<td>", $ligne->mail,"</td></tr>"; ←
}
  echo "</table>";
$result->free();
$idcom->close();
}
?>
</body>
</html>