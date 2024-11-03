<?php

function connexpdo($bd)
{
     $sgbd = "mysql"; // choix de MySQL (fonctionnera aussi avec MariaDB !)
     $host = "localhost";
     $port = 3306; 
     $charset = "UTF8";
     $user = "cisse"; // user id
     $pass = "cisse"; // password
     $db = $bd;
   
    $pdo = new pdo("$sgbd:host=$host;port=$port;dbname=$db;charset=$charset", $user, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    //echo "connexion bien";
    //$pdo->query("This is no SQL!");
    return $pdo;
   
}


?>
