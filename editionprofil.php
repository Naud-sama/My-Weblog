<?php
include 'html/naviguation.php';
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=starwars', 'root', '');
}
catch(Exception $e)
{
   die('Erreur :' . $e->getMessage());  
}

if(isset($_SESSION['id_membre'])){
    $requser = $bdd->prepare("SELECT * FROM membre WHERE id_membre = ?");
    $requser->execute(array($_SESSION['id_membre']));
    $user = $requser->fetch();
    
    if(isset($_POST['newpseudo']) && !empty($_POST['newpseudo']) && $_POST['newpseudo'] != $user['pseudo'])
    {
       $insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE id_membre = ?");
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo->execute(array($newpseudo, $_SESSION['id_membre']));
         header("Location: profil.php?id_membre=" . $_SESSION['id_membre']);
    }
    
     if(isset($_POST['newmail']) && !empty($_POST['newmail']) && $_POST['newmail'] != $user['mail'])
    {
       $insertpseudo = $bdd->prepare("UPDATE membre SET mail = ? WHERE id_membre = ?");
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo->execute(array($newpseudo, $_SESSION['id_membre']));
         header("Location: profil.php?id_membre=" . $_SESSION['id_membre']);
    }
    
    if(isset($_POST['newpassword1']) && !empty($_POST['newpassword1']) && isset($_POST['newpassword2']) && !empty($_POST['newpassword2'])) 
    {
        $pwd1 = md5($_POST['newpassword1']);
        $pwd2 = md5($_POST['newpassword2']);
        if($pwd1 == $pwd2){
            $insertpwd = $bdd->prepare("UPDATE membre SET pwd = ? WHERE id_membre = ?");
             $insertpwd->execute(array($pwd1, $_SESSION['id_membre']));
             header("Location: profil.php?id_membre=" . $_SESSION['id_membre']);
        }
        else {
            echo "les mdp ne correspondent pas";
        }
    }

            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])){
            $taillemax = 2097152;
              $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
              if($_FILES['avatar']['size'] <= $taillemax){
                  $extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                  if(in_array($extensionupload, $extensionValide)){
                      $path = "membre/avatar/" . $_SESSION['id_membre'] . "." . $extensionupload;
                      $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
                      if($result){
                          $updateavatar = $bdd->prepare('UPDATE membre SET avatar = :avatar WHERE id_membre = :id_membre');
                          $updateavatar->execute(array('avatar' => $_SESSION['id_membre'] . "." . $extensionupload, id_membre => $_SESSION['id_membre']));
                          header("Location: profil.php?id_membre=" . $_SESSION['id_membre']);
                      }
                      else
                      {
                          echo "Erreur d'importation";
                      }
                  }
                  else 
                  {
                      echo "Mauvais format de photo.";
                  }
              }
              else 
              {
                  echo "Votre photo est trop lourde (2Mo max)";
                  
              }
        }
    
?>
    <h2>Edition du profil
    </h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="newpseudo" value="<?php echo $user['pseudo'];?>" placeholder="pseudo" />
        <input type="text" name="newmail" value="<?php echo $user['mail'];?>" placeholder="mail" />
        <input type="text" name="newpassword1" placeholder="Mdp" />
        <input type="text" name="newpassword2" placeholder="Confirmation" />
        <input type="file" name="avatar" />
        <input type="submit" value="Mise a jour du profil"> </form>
    <?php
    }

else {
    header("Location: connexion.php");
}
?>
        <?php
include 'html/footer.php';
?>
