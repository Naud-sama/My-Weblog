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

if(isset($_GET['id_billet']) && !empty($_GET['id_billet'])) {
    $get_id = htmlspecialchars($_GET['id_billet']);
    
    $article = $bdd->prepare('SELECT * FROM billet WHERE id_billet = ?');
    $article->execute(array($get_id));
    
    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $titre = $article['titre'];
        $contenu = $article['contenu'];
        $img = $article['id_billet'];
        
        $commentaires = $bdd->prepare('SELECT * FROM commentaire WHERE id_commentaire = ? ORDER BY id DESC');
        $commentaires->execute(array($img));
        
        if(isset($_POST['envoyer_avis'])) {
    if(isset($_POST['pseudo'], $_POST['avis']) && !empty($_POST['pseudo']) && !empty($_POST['avis'])) {
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $commentaire = htmlspecialchars($_POST['avis']);
        if(strlen($pseudo) < 25) {
            $ins = $bdd->prepare('INSERT INTO commentaire (pseudo, avis, id_commentaire, date_avis) VALUES (?, ?, ?, NOW())');
            $ins->execute(array($pseudo, $commentaire, $img));
        }
    }
    else{
        
        echo "Veuillez completer tous les champs";
    }
}
    } 
    else {
        die('Cet article n\'existe pas.');
    }
    
}


?>
    <table>
        <tr class="donnees">
            <td>
                <?php
					 echo $titre;?>
            </td>
            <td>
                <?php
					 echo $contenu;?>
            </td>
            <td>
                <img src="membre/img/<?php echo $img; ?>.jpg" width="300" />
            </td>
        </tr>
    </table>
    <?php 

while($donnees = $commentaires->fetch()) {

?>
    <table>
        <tr class="donnees">
            <td>
                <?php
					 echo $donnees['pseudo'];?>
            </td>
            <td>
                <?php
					 echo $donnees['avis'];?>
            </td>
            <td>
                <?php
					 echo $donnees['date_avis'];?>
            </td>
        </tr>
    </table>
    <?php } 
if (isset($_SESSION["pseudo"]))
			 {
            ?>
    <h2>Un avis ?</h2>
    <form method="POST">
        <input type="text" name="pseudo" placeholder="Votre pseudo" />
        <textarea name="avis" placeholder="Votre avis..."></textarea>
        <input type="submit" value="Poster mon avis" name="envoyer_avis" />
    </form>

    <?php
}
include 'html/footer.php';
?>
