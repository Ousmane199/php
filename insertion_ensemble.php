<?php
    
    $affichage=<<<cisse
    
    <table>
        <form action="#" method="post">
            <tr>
                <td>
                    <label for="name">Nom:</label>
                </td>
                <td>
                    <input name="nom" id="name" type="text">
                </td>
            </tr>
            <tr>
            <td>
                <label for="name">Prenom:</label>
            </td>
            <td>
                <input name="prenom" id="name" type="text">
            </td>
            </tr>
            <tr>
                <td>
                    <label for="age">Age:</label>
                </td>
                <td>
                    <input name="age" id="age" type="number">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="btnsuppr">Envoyer</button>
                </td>
            </tr>
        
        
        </form>
    </table>
    cisse;
    echo $affichage;


    function alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }



    function db_connect()
    {
        $sgbd = "mysql";
        $host = "localhost";
        $port = 3306;
        $charset = "UTF8";
        $user = "cisse";
        $pass = "cisse";
        $db = 'personne';
    
        try {
            $pdo = new PDO("$sgbd:host=$host;port=$port;dbname=$db;charset=$charset", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } 
        catch (PDOException $e) 
        {
            displayException($e);
        }
    
        return $pdo;
    }
    
    if (isset($_POST["btnsuppr"])) {
        if (empty($_POST["nom"])) {
            alert("Vous avez bien saisi un contenu qui n'a pas été envoyé.");
        } else {
            // Traitement du formulaire
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $age = $_POST["age"];
    
            
            $dbco = db_connect();
            $dbco->beginTransaction();
            
            try 
            {
                $sql = "INSERT INTO inscription (nom, prenom, age) VALUES ('$nom', '$prenom', $age)";
                $dbco->exec($sql);
                echo 'Entrée ajoutée dans la table';
                $dbco->commit();
            } 
            catch (PDOException $e) 
            {
                $dbco->rollBack();
                displayException($e);
            }
            alert("Formulaire soumis avec succès");
        }
    }
    
    function displayException($e)
    {
        alert("Erreur : " . $e->getMessage());
    }
    
?>