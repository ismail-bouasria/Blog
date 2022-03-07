<!-- --------------------------------------------------FORMULAIRE AVATAR--------------------------------------->

<?php
session_start();
require '../classes/Article.php';
require '../classes/Categorie.php';
if (isset($_POST['poster'])) {

    if (!empty($_POST['titre']) && !empty($_POST['categorie']) && !empty($_POST['description'])  && !empty($_POST['article']) && !empty($_FILES['image']) )
    
        // ------------------------------------------------ TELECHARGER IMAGE ---------------------------------------------
        // Vérifie si le fichier a été uploadé sans erreur.
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
     
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $_FILES["image"]["name"] = uniqid().'.jpg';
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            
            if(!array_key_exists($ext, $allowed)) die(header('Location: ../php/creer-article.php?err1=errorfilename'));

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die(header('Location: ../php/creer-article.php?err2=errorfilesize'));

            // Vérifie le type MIME du fichier
            if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.

                        
            $path ='../upload/'.$filename;

            move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
           
            // ------------------------------------------------ POSTER ARTICLE ---------------------------------------------
            $titre = $_POST['titre'];
            $categorie = $_POST['categorie'];
            $id_categorie = intval($categorie);
            $description = $_POST['description'];
            $article = $_POST['article'];
            $id_utilisateur = $_SESSION['id'];
            $image= $path;
            
            $article = new Article ($titre,$image,$description,$article,$id_utilisateur,$id_categorie);
            $article->insertArticle();
 
            header('Location: ../php/accueil.php');
            
                        
                    
        }  else{
            header('Location: ../php/creer-article.php?err3=errornofile');
        }
    }else {
        # code...
    }
  

} 
if (isset($_POST["editer"])) {
    
 var_dump($_SESSION['editer']);
    if (!empty($_POST['titre']) && !empty($_POST['categorie']) && !empty($_POST['description'])  && !empty($_POST['article']) && !empty($_FILES['image']) )

    // ------------------------------------------------ TELECHARGER IMAGE ---------------------------------------------
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
 
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $_FILES["image"]["name"] = uniqid().'.jpg';
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!array_key_exists($ext, $allowed)) die(header('Location: ../php/creer-article.php?err1=errorfilename'));

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die(header('Location: ../php/creer-article.php?err2=errorfilesize'));

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
        // Vérifie si le fichier existe avant de le télécharger.

                    
        $path ='../upload/'.$filename;

        move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
       
        // ------------------------------------------------ UPDATE ARTICLE ---------------------------------------------
        $titre = $_POST['titre'];
        $categorie = $_POST['categorie'];
        $id_categorie = intval($categorie);
        $description = $_POST['description'];
        $article = $_POST['article'];
        $image= $path;
        $id_utilisateur = $_SESSION['id'];
        $id_edit = $_SESSION['editer'];
        
        
        $article = new Article ($titre,$image,$description,$article,$id_utilisateur,$id_categorie);
        $article->updateArticle($id_edit);
        header('Location: ../php/accueil.php');
                        
    } 

}
}


?>