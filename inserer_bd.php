<?php
require("test-connexion.php");

$id = 23;
$modele = "bmw";
$carburant = "essence";

$dbco->beginTransaction();
                
$objdb = "INSERT INTO modele(id_modele,modele,carburant)
        VALUES($id,$modele,$carburant)";
$dbco->exec($sql);
echo 'Entrée ajoutée dans la table';


?>
