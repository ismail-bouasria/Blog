 
<!-- --------------------------------------------------FORMULAIRE AVATAR--------------------------------------->
<?php 
require '../classes/User.php';
    // Vérifier si le formulaire a été soumis
    if(isset($_POST['upload'])){
              
        // Vérifie si le fichier a été uploadé sans erreur.
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
     
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $_FILES["photo"]["name"] = uniqid().'.jpg';
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die(header('Location: ../php/profil.php?err1=errorfilename'));

                // Vérifie la taille du fichier - 5Mo maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die(header('Location: ../php/profil.php?err2=errorfilesize'));

                    // Vérifie le type MIME du fichier
                    if(in_array($filetype, $allowed)){
                    // Vérifie si le fichier existe avant de le télécharger.
                        
                    $path ='../upload/'.$filename;
                    $user = new User ('','','');
                    $user->avatar($path,$_SESSION['id']);
                    $_SESSION['avatar'] = $path;
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/" . $_FILES["photo"]["name"]);
                    header('location:../php/profil.php');
                        
                    
                } 
            } else{
                header('Location: ../php/profil.php?err3=errornofile');
        }
    }
        
    
?>