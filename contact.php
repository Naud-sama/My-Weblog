<?php

include 'html/naviguation.php';
		if (isset($_SESSION["pseudo"])) 
			{	
?>

    <h2>Une question ?</h2>
    <form method="post">
        <input type="text" placeholder="Nom" name="nom">
        <input type="text" placeholder="Prénom" name="prenom">
        <input type="text" placeholder="Email" name="mail">
        <textarea rows="8" cols="40" name="message" placeholder="Entrez votre texte ici..."></textarea>
        <input type="submit" value="Envoyer">
        <?php  }
else
{
    header("Location: connexion.php");
}
?>
    </form>
