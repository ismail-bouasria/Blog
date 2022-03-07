<?php


// <!-- =========================== TRAITEMENT INSCRIPTION ========================== -->

require "../classes/User.php";
// Requête d'inscription des utilisateurs dans la base de donnée.
if (isset($_POST['submit'])) {
  
  $login = $_POST['login'];
  $password = $_POST['password'];
  $confpass = $_POST['password2'];
  $email= $_POST['email'];
  $user = new User($login,$password,$email );
    
  // Requête pour ne pas inscrire plusieurs fois le même login/email. 
  if ($user->registersameloginemail($login,$email) == true) {
    // Requête pour verifier le mot de passe et sa confirmation 
    if ($confpass == $password) {
      $user->register($login,$password,$email);
      header('location:../php/connexion.php?inscription=reussi');

    }else{
      header('location: ../php/inscription.php?err2=errorpassword');
    }
    
  }else {
    header('location: ../php/inscription.php?err1=errorloginoremail');
  }
}
?>