<?php
include 'html/naviguation.php';
try
		{
			$bdd = new PDO('mysql:host=127.0.0.1;dbname=starwars', 'root', '');
		}
		catch(Exceptions $e)
		{
			die('Erreur :' . $e->getMessage());
		}
?>
    <h2>Rechercher par tags :</h2>
    <form method="post" action="index.php">
        <input type="text" name="tags" placeholder="Recherche par tags">
        <input type="submit" value="Rechercher">
    </form>
    <?php

        if (isset($_POST["tags"])) 
        {
	   $sqlbillet = "SELECT titre, contenu, tags, pseudo, id_billet, FROM billet LEFT JOIN membre WHERE tags LIKE '". $_POST["tags"] . "'";

        }
        else
        {
	       $sqlbillet = "SELECT titre, contenu, tags, pseudo, id_billet FROM billet";

        }
        $reqbillet = $bdd->prepare($sqlbillet);
        $reqbillet->execute();
        $billet = $reqbillet->fetchAll();

$pagination = 5;
$pagireq = $bdd->query('SELECT id_billet FROM billet');
$paginationtotal = $pagireq->rowCount();
$pagitotal = ceil($paginationtotal/$pagination);

if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0){
    $_GET['page'] = intval($_GET['page']);
    $pagecourante = $_GET['page'];
    
}
else {
    $pagecourante = 1;
}

$depart = ($pagecourante-1)*$pagination;

if (isset($_GET['supprimer']) && !empty($_GET['supprimer'])) {
    $supp = (int) $_GET['supprimer'];
    
    $reqsupp = $bdd->prepare('DELETE FROM billet WHERE id_billet = ?');
    $reqsupp->execute(array($supp));
}


$sql = $bdd->query('SELECT * FROM billet ORDER BY date_de_creation DESC LIMIT '.$depart.','.$pagination);
			?>
        <h2>Les articles</h2>
        <table>
            <tr class="titre">
                <td></td>
                <td>Titre</td>
                <td>Sujet</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <?php
			while($donnees = $sql->fetch()){
			?>
                <tr class="donnees">

                    <td>
                        <img src="membre/img/<?php echo $donnees['id_billet']; ?>.jpg" width="200" />
                    </td>
                    <td>
                        <a href="article.php?id_billet=<?php echo $donnees['id_billet']; ?>">
                            <?php
					 echo $donnees['titre'];?>
                        </a>
                    </td>
                    <td>
                        <?php
					 echo $donnees['contenu'];?>
                    </td>

                    <td>
                        <?php
					 echo $donnees['tags'];?>
                    </td>
                    <td>
                        <?php
					 echo $donnees['date_de_creation'];?>
                    </td>
                    <?php if (isset($_SESSION["pseudo"]))
			 {
            ?>
                    <td>
                        <a href="index.php?supprimer=<?php echo $donnees['id_billet']?>">Supprimer l'article</a>
                    </td>
                    <td>
                        <a href="articles.php?edit=<?php echo $donnees['id_billet']?>">Modifier l'article</a>
                    </td>
                    <?php } ?>
                </tr>

                <?php
			}
            
            for($i=1;$i<=$pagitotal;$i++){
                if($i == $pagination) {
                    echo $i.' ';
                }
                else {
                echo '<a href="index.php?page=' . $i .'">' . $i . ' <a/>';
            }
            }
			?>
        </table>
        <?php
include 'html/footer.php';
?>
