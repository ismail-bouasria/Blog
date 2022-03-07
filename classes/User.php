<?php 
session_start();
class User
{
    private $id;
    public $login;
    public $email;
    public $password;
    public $bdd;
    

   
   public function __construct($login,$email,$password)
    {
        
        
        try {
                $this->bdd= new PDO(
            "mysql:host=localhost;dbname=blog",
            "root",
            "");
            // echo 'connecté';
        } catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
            echo 'pas connecté';
        }

        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    // Méthode register pour s'enregistrer dans la base de donnée. 
   public function register($login,$password,$email)
    {
         
        // si la connexion à la base de donnée est établie alors :

        $register = $this->bdd->prepare("INSERT INTO `utilisateurs`( `login`, `password`,`email`) VALUES (:login, :password, :email)");
        $array = [':login'=>$login,':password'=>$password,':email'=>$email];
        $register->execute($array);
         
    }


    // Méthode ne pas enregister le meme login dans la base de donnée. 
    public function registerSameloginemail($login,$email)
   {
        $registerSameloginemail =  $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login=:login");
       // si la connexion à la base de donnée est établie alors :
       $array = [':login'=>$login];
       $registerSameloginemail->execute($array);
       $nosameloginemail = $registerSameloginemail->fetch();
       if (isset($nosameloginemail)) {
           if ($login != $nosameloginemail['login'] && $email != $nosameloginemail['email'] ) {
               return true;
           }else {
               return false;
           }
       }
      
    }
 

 // Méthode connect pour se connecter  au site via la base de donnée.
    public function connect($email,$password)
    {
        // si la connexion à la base de donnée est établie alors :

        $connect = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email=:email");
        $connect->execute([':email'=>$email,]);
        $user = $connect->fetch();
        

        if (!empty($email) && !empty($password)) {

            if ($email == $user['email'] && $password == $user['password']) {
    
                $_SESSION['id']= $user['id'];
                $_SESSION['username'] = $user['login'];
                $_SESSION['avatar'] = $user['avatar'];
                if ($user['id_droits'] == 1) {
                    $_SESSION['droit'] = 'utilisateur';
                }elseif ($user['id_droits'] == 42) {
                    $_SESSION['droit'] = 'moderateur';
                }elseif($user['id_droits'] == 1337){
                    $_SESSION['droit'] = 'administrateur';
                }
                 header('location: ../php/accueil.php');
                
            }else {
                header('Location: ../php/connexion.php?err1=errormailpassword');
            }
        }
        
        
    } 
  
  
    // Méthode pour upload un avatar 
    public function avatar($path,$id)
    {
            
        $avatar = $this->bdd->prepare("UPDATE `utilisateurs` SET `avatar`=? WHERE `id`=?");
        $avatar->execute([$path,$id]);
        $avatar = $avatar->fetch();
            
    } 

    // Méthode pour supprimer un utilisateurun avatar 
    public function deleteUser($id)
    {
        $sql= "DELETE FROM `utilisateurs` WHERE `id`=?";
        $deleteUser = $this->bdd->prepare($sql);
        $deleteUser->execute([$id]);
        $deleteUser= $deleteUser->fetch();
            
    } 

    // Méthode pour récuperer le login et l'id des utilisateurs
    public function getAllLogin()
    {
             
         $getAll = $this->bdd->prepare("SELECT * FROM utilisateurs");
         $getAll->execute();
         $getAllLogin = $getAll->fetchAll();
             
         foreach ($getAllLogin as $value) {
             
             echo '<option value="'.$value['id'].'">'.$value['login'].'</option>';
        }
    } 
 
  

    // Méthode pour afficher  les informations de la table utilisateurs.
    public function getAllInfosUser ($login,$email)
    {
       $id = $_SESSION['id'];
        $getinfos =$this->bdd->prepare("SELECT * FROM utilisateurs WHERE id != ?");
        $getinfos->execute([$id]);
        $getinfos = $getinfos->fetchAll();
             
        foreach ($getinfos as $getvalue) {
             // requête pour garder le même login et ne pas utiliser un login et email déjà existant.
             if ( $getvalue['login'] != $login &&  $getvalue['email'] != $email) {
           
            // if (empty($getvalue) ||) {
                
                return true; 
            // }
        } 
       
        }
       
    } 

    // methode pour afficher le login 
    public function getLogin($id)
    {
        $getlogin= $this->bdd->prepare("SELECT login FROM utilisateurs WHERE id=?");
        $getlogin->execute([$id]);
        $log= $getlogin->fetch();

        return $log['login'];
    }
    // methode pour afficher tout les infos 
    public function getEmail($id)
    {
    
     $getmail= $this->bdd->prepare("SELECT email FROM utilisateurs WHERE id=?");
     $getmail->execute([$id]);
     $mail= $getmail->fetch();
     
     return $mail['email'];
    }

    // Méthode modifier les informations de la base de donnée.
    public function updateProfil($login,$password,$email,$id)
    {
       
        $updateProfil =$this->bdd->prepare("UPDATE `utilisateurs` SET `login`=?,`password`=?,`email`=? WHERE `id`=?");
        $array = [$login,$password,$email,$id];
        $updateProfil->execute($array);
        $updateProfil = $updateProfil->fetch();
         if (isset($updateProfil)) {
                    $_SESSION['username'] = $updateProfil['login'];
                    $_SESSION['email'] = $updateProfil['email'];
                    $_SESSION['password'] = $updateProfil['password'];
                   
        }
       
    } 


    //  Methode pour update les droits des utilisateurs 
 public function updateDroit($id_droits,$id)
 {   
     
     $updateDroit= $this->bdd->prepare("UPDATE `utilisateurs`  SET `id_droits`=? WHERE `id` =?");
     $updateDroit->execute([$id_droits,$id]);
 }


    
}

// $user = new User ('','','');
// $user->updateDroit(42,'isma');
?>
