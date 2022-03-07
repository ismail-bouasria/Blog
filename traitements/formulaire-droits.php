<?php
require '../classes/User.php';
require '../classes/Droit.php';
$user = new User('','','');
$droit = new Droit('');

if (isset($_POST['changer'])) {

    $membre = $_POST['membre'];
    $id_membre = intval($membre);
    $role = $_POST['droit'];
  
    if (!empty($id_membre)) {
        if (!empty($role)) {
            $getDroit = $droit->getDroit($role);
            $id_getDroit = intval($getDroit);
           
            $user->updateDroit($id_getDroit,$id_membre);
            if ( $id_getDroit  == 1) {
                $_SESSION['droit'] =  'utilisateur' ;
            }elseif (  $id_getDroit  == 42) {
                $_SESSION['droit'] =  'moderateur';
            }elseif(  $id_getDroit  == 1337){
                $_SESSION['droit'] = 'administrateur';
            }
            header('Location: ../php/profil.php?droit=droitchanger');
        }
    } else {
        header('Location: ../php/profil.php?errd=errordroit');
    }
    
}



if (isset($_POST['supprimer'])) {

    $membre = $_POST['membre'];
    $id_membre = intval($membre);
    $user->deleteUser($id_membre);
    header('Location: ../php/profil.php');
    
    
}
?>