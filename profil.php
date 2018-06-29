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

if(isset($_GET['id_membre']) && $_GET['id_membre'] > 0){
    $getid = intval($_GET['id_membre']);
    $requser = $bdd->prepare('SELECT * FROM membre WHERE id_membre = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    
?>
    <h2>Profil de
        <?php echo $userinfo['pseudo'];?>
    </h2>
    <table class="tbclient">
        <tr>
            <th>Avatar</th>
            <td>

                <?php if(!empty($userinfo['avatar']));
    {
                ?>
                <img src="membre/avatar/<?php echo $userinfo['avatar']  ?>" width="150" height="200" />
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th>Pseudo</th>
            <td>
                <?php
					 echo $userinfo['pseudo'];?>
            </td>
        </tr>
        <th>Nom</th>
        <td>
            <?php
					 echo $userinfo['nom'];?>
        </td>
        <tr>
            <th>Prénom</th>
            <td>
                <?php
					 echo $userinfo['prenom'];?>
            </td>
        </tr>
        <tr>
            <th>Date de Naissance</th>
            <td>
                <?php
					 echo $userinfo['date_de_naissance'];?>
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <?php
					 echo $userinfo['mail'];?>
            </td>
        </tr>
        <tr>
            <th>Date d'inscription</th>
            <td>
                <?php
					 echo $userinfo['date_inscription'];?>
            </td>
        </tr>
        <?php 
    if($userinfo['id_membre'] == $_SESSION['id_membre']){
                         ?>
        <a align="center" href="editionprofil.php">Editer mon profil</a>
        <?php
    }
    ?>

    </table>
    <?php

}
else {
    
}
?>
        <?php
include 'html/footer.php';
?>
