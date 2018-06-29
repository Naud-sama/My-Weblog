<?php
include 'html/naviguation.php';
?>

    <?php
	try
		{
			$bdd = new PDO('mysql:host=127.0.0.1;dbname=starwars', 'root', '');
		}
		catch(Exceptions $e)
		{
			die('Erreur :' . $e->getMessage());
		}
if (isset($_GET['supprimer']) && !empty($_GET['supprimer'])) {
    $supp = (int) $_GET['supprimer'];
    
    $reqsupp = $bdd->prepare('DELETE FROM membre WHERE id_membre = ?');
    $reqsupp->execute(array($supp));
}

if (isset($_SESSION["pseudo"]))
			 {
$sql = $bdd->query("SELECT * FROM membre");
			?>
        <table>
            <tr class="titre">
                <td>Nom</td>
                <td>Prenom</td>
                <td>Date de Naissance</td>
                <td>Pseudo</td>
                <td>Mail</td>
            </tr>
            <?php
			while($donnees = $sql->fetch()){
			?>
                <tr class="donnees">
                    <td>
                        <?php
					 echo $donnees['nom'];?>
                    </td>
                    <td>
                        <?php
					 echo $donnees['prenom'];?>
                    </td>
                    <td>
                        <?php
					 echo $donnees['date_de_naissance'];?>
                    </td>
                    <td>
                        <?php
					 echo $donnees['pseudo'];?>
                    </td>
                    <td>
                        <?php
					 echo $donnees['mail'];?>
                    </td>
                    <td>
                        <a href="membre.php?supprimer=<?php echo $donnees['id_membre']?>">Bannir</a>
                    </td>
                </tr>
                <?php
			}
			?>
        </table>
        <?php }
         else {
             header('Location: connexion.php');
         }
?>
        <?php
include 'html/footer.php';
?>
