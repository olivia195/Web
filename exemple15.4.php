<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table article</title>
<style type="text/css" >
table {border-style:double;border-width: 3px;border-color: red;background-color:
yellow;}
</style>
</head>
<body>
<?php
include("exemple15.2.php"); 
$idcom=connexobjet("essaiebdd"); 
$requete="SELECT * FROM article ORDER BY categorie"; 
$result=$idcom->query($requete); 
if(!$result) 
{
echo "Lecture impossible"; 
}
else 
{
$nbart=$result->num_rows; 
echo "<th>Prix</th>";
echo "<h3>Tous nos articles par catégorie</h3>";
echo "<h4>Il y a $nbart articles en magasin</h4>"; 
echo "<table border=\"1\">";
echo 
"<tr><th>Code 
article</th> 
<th>Description</th> 
<th>Catégorie</th></tr>";
while($ligne=$result->fetch_array(MYSQLI_NUM)) 
{
echo "<tr>";
foreach($ligne as $valeur) 
{
echo "<td> $valeur </td>";
}
echo "</tr>";
}
echo "</table>";
}
$result->free(); 
$idcom->close(); 
?>
</body>
</html>
