<!----------------------------------------------------FORMULAIRE PROFIL---------------------------------------->
<?php
require '../classes/User.php';
// CONDITION DE L'EDITE
if (isset($_POST['modifier'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    $profil = new User ('','','');
    
    if (!empty($login) && !empty($email) && !empty($pass) && !empty($pass2)) {
        if ($profil->getAllInfosUser($login, $email) == true) {
            if ($pass2 == $pass) {
                $profil->updateProfil($login,$pass,$email,$_SESSION['id']);
                header('location: ../php/profil.php');
            }else {
                header('location: ../php/profil.php?errorp2=nopassword');
            }
        }else {
            header('location: ../php/profil.php?errorp1=nosameloginemail');
        }
    } 
                         
} ?>