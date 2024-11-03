<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8" />
<title>Lecture de la table modele</title>
<style type="text/css">
table, tr, td, th 
{
	border-style: solid;
	border-color: red;
	background-color: yellow;
}
table 
{
	border-width: 3px;
	border-collapse: collapse;
}
tr, td, th 
{
	border-width: 1px;
}
</style>
</head>
<body>
<?php
// TODO

  require("test-connexion.php");

  
  $reponse = $objdb->query('SELECT * FROM modele');
  
  // On affiche chaque entrée une à une
  //$donnees = $reponse->fetch();
  
 $tab = <<<cisse
  <table>
  <tr>
  	<th>Code modele</th>
	<th>Modele</th>
	<th>Carburant</th>
  </tr>

cisse; 

while ($donnees = $reponse->fetch())

{
	
	$a=$donnees["id_modele"];
	$b=$donnees["modele"];
	$c=$donnees["carburant"];
$tab.=<<<cisse
	<tr>
	<td>$a</td>
  	<td>$b</td>
  	<td>$c</td>
	</tr>
cisse;
	
}

echo $tab;

echo "</table>";
  $reponse->closeCursor(); // Termine le traitement de la requête
  
  
  ?>
</body>
</html>