<?php
include 'html/naviguation.php';
?>
    <h2>Inscription :</h2>

    <form method="POST" action="" enctype="multipart/form-data">

        <div>
            <tr> <input type="text" placeholder="Nom" name="nom" /></tr>
        </div>
        <div>
            <input type="text" placeholder="Prénom" name="prenom">
        </div>
        <div>
            <input type="text" placeholder="Pseudo" name="pseudo">
        </div>
        <div>
            <input type="password" placeholder="Entrez un mdp" name="pwd">
        </div>
        <div>
            <input type="password" placeholder="Confirmez votre mdp" name="confirmation">
        </div>
        <div>
            <input type="date" name="date_de_naissance" placeholder="aaaa-mm-jj">
        </div>
        <div>
            <input type="email" name="mail" placeholder="votrenom@premierordre.com">
            <br />
            <input type="file" name="avatar">
            <input type="submit" name="forminscription" value="S'inscrire">
        </div>
    </form>
    <?php 
try
		{
			$bdd = new PDO('mysql:host=127.0.0.1;dbname=starwars', 'root', '');
		}
		catch(Exceptions $e)
		{
			die('Erreur :' . $e->getMessage());
		}
if (isset($_POST['forminscription'])){
if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["pseudo"]) && !empty($_POST["pwd"]) && !empty($_POST["date_de_naissance"]) && !empty($_POST["mail"]))  
{
	$cryptage = md5($_POST["pwd"]);
	$sqlinscription = "INSERT INTO membre (mail, prenom, nom, date_de_naissance, pseudo, pwd, avatar, date_inscription) VALUES ('" . $_POST["mail"] . "', '" . $_POST["prenom"] . "', '" . $_POST["nom"] . "', '" . $_POST["date_de_naissance"] . "', '" . $_POST["pseudo"] . "', '" . $cryptage . "', 'default.jpg', NOW())";
	$reqinscription= $bdd->prepare($sqlinscription);
	$reqinscription->execute();
}
    else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

    <?php
include 'html/footer.php';
?>
