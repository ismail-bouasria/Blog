<!-- --------------------------------------------------------FORMULAIRE COMMENTAIRE------------------------------------------------------------- -->
<?php
session_start();
require '../classes/Commentaire.php';
$id_article = $_SESSION['article'];

$id_utilisateur = intval($_SESSION['id']);


 $insertcommentaire = new Commentaire('','','');

 
if (isset($_POST['commenter'])) {
    if (isset($id_utilisateur)) {
        $commentaire=$_POST['commentaire'];
    
        if (!empty($commentaire)) {
        
            $insertcommentaire->insertCommentaire($commentaire,$id_article,$id_utilisateur);
            var_dump($insertcommentaire->insertCommentaire($commentaire,$id_article,$id_utilisateur));
            header('Location:../php/article.php?article='.$id_article.'');
        }

    }else {
        header('Location:connexion.php');
    }
    

}




?>

