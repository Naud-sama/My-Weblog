<?php
include 'html/naviguation.php';
?>
    <h2>Se connecter</h2>
    <form method="post">
        <input type="text" placeholder="Votre pseudo" name="pseudo">
        <input type="password" placeholder="Entrez votre mot-de-passe" name="pwd">
        <input type="submit" name="connect" value="Se Connecter">
    </form>
    <?php 
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=starwars', 'root', '');
}
catch(Exception $e)
{
   die('Erreur :' . $e->getMessage());  
}

if(isset($_POST['connect'])){
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = md5($_POST['pwd']);
    if(!empty($pseudo) && !empty($mdp)){
        $requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND pwd = ?");
        $requser->execute(array($pseudo, $mdp));
        $userexist = $requser->rowCount();
        if($userexist == 1){
            $userinfo = $requser->fetch();
            $_SESSION['id_membre'] = $userinfo['id_membre'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['id_droit'] = $userinfo['id_droit'];
            header("Location: profil.php?id_membre=" . $_SESSION['id_membre']);
        }
        else {
            echo "Mauvaise ";
        }
    }
    else {
        echo "Veuillez completer les champs !";
    }
}

?>
    <?php
include 'html/footer.php';
?>
