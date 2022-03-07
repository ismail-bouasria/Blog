<!-- =========================== TRAITEMENT CONNEXION ========================== -->   

<?php 
require "../classes/User.php";

//    Condition de connexion
if (isset($_POST['connexion'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User('','','');
    $user->connect($email,$password);
   
}
?>