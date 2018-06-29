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
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM billet WHERE id_billet = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edition = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if(isset($_POST['titre'], $_POST['contenu'])) {
   if(!empty($_POST['titre']) AND !empty($_POST['contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['titre']);
      $article_contenu = htmlspecialchars($_POST['contenu']);
       $article_tags= $_POST['tags'];
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO billet (titre, contenu, tags, date_de_creation) VALUES (?, ?, ?, NOW())');
         $ins->execute(array($article_titre, $article_contenu, $article_tags));
         $lastid = $bdd->lastInsertId();
         
         if(isset($_FILES['img']) AND !empty($_FILES['img']['name'])) {
            if(exif_imagetype($_FILES['img']['tmp_name']) == 2) {
               $chemin = 'membre/img/'.$lastid.'.jpg';
               move_uploaded_file($_FILES['img']['tmp_name'], $chemin);
                header('Location: index.php');
            } else {
               echo 'Votre image doit être au format jpg';
                
            }
         } else {
         $update = $bdd->prepare('UPDATE billet SET titre = ?, contenu = ?, date_de_modification = NOW() WHERE id_billet = ?');
         $update->execute(array($article_titre, $article_contenu, $edit_id));
         header('Location: article.php?id_billet='.$edit_id);
         echo 'Votre article a bien été mis à jour !';
      }
   } 
       else {
      echo 'Veuillez remplir tous les champs';
   }
}
}
?>
    <h2>Rediger un article / Edition d'un article</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Titre" <?php if ($mode_edition==1 ) { ?>value="
        <?php echo $edition['titre'];?>"
        <?php } ?> name="titre">
        <input type="text" placeholder="Entrez vos tags" <?php if ($mode_edition==1 ) { ?>value="
        <?php echo $edition['tags']; ?>"
        <?php } ?> name="tags">
        <textarea rows="18" cols="80" name="contenu"><?php if ($mode_edition == 1) {echo $edition['contenu']; }?></textarea>
        <input type="file" name="img">
        <input type="hidden" name="id_billet">
        <input type="submit" value="Envoyer">
    </form>

    <?php
		
	?>
    <?php
include 'html/footer.php';
?>
