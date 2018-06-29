<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Starwars blog</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1 href="index.php"></h1>
    <?php

try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=starwars', 'root', '');
}
catch(Exception $e)
{
   die('Erreur :' . $e->getMessage());  
}

if(isset($_GET['id_membre']) && $_GET['id_membre'] > 0){
    $getid = intval($_GET['id_membre']);
    $requser = $bdd->prepare('SELECT * FROM membre WHERE id_membre = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    
?>
        <h2>Bienvenue
            <?php 
        echo $userinfo['pseudo'];
}?>
        </h2>
        <nav>
            <ul>
                <li id="zero"><a href="index.php">Accueil</a></li>
                <?php if (isset($_SESSION["pseudo"]))
			 {
            ?>
                <li id="un"><a href="articles.php">Article</a></li>
                <li id="deux"><a href="membre.php">Membre</a></li>
                <li id="trois"><a href="profil.php?id_membre=<?php echo  $_SESSION['id_membre'];?>">Mon profil</a></li>
                <li id="trois"><a href="deconnexion.php">Se Deconnecter</a></li>
                <?php
}
            else { ?>

                    <li id="trois"><a href="connexion.php">Se Connecter</a></li>
                    <li id="quatre"><a href="inscription.php">Inscription</a></li>
                    <?php } ?>
            </ul>
        </nav>
