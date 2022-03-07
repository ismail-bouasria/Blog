<?php
require '../classes/User.php';
$user = new User('', '', '');
$id = $_SESSION['id'];

if (!isset($id)) {
    header('location:accueil.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/profil.css">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap" rel="stylesheet">

    <style>
        .cardavatar {
            background-image: url(<?php echo $_SESSION['avatar']; ?>);
        }
    </style>
</head>


<body class="bodyprofil">
    <?php require '../require/header.php'; ?>

    <main class="mainprofil">
        <div class="boxtop">
            <img src="../assets/img/icon-profile.png" alt="profil">
            <div class="boxdarkprof">
                <p>PROFIL</p>
            </div>
        </div>
        <div class="boxprofil">
            <div class="boxprofiltop"></div>
            <div class="conteneurprofil">
                <div class="cardprofil">
                    <p> INFORMATIONS</p>
                    <div class="boxavatarinfo">
                        <!-- FORMULAIRE POUR CHANGER LA PHOTO -->
                        <form action="../traitements/formulaire-avatar.php" method="post" enctype="multipart/form-data">
                            <div class="cardavatar">
                                <input type="file" name="photo">
                                <input type="submit" name="upload" value="Modifier l'avatar">
                            </div>

                        </form>
                        <!-- FORMULAIRE POUR CHANGER LES INFORMATIONS -->
                        <div class="cardinfos">
                            <?php
                            if (isset($_GET['err1'])) { ?>
                                <section class="boxerreurprofil">
                                    <p> Veuillez sélectionner un format de fichier valide !</p>
                                </section>
                            <?php } elseif (isset($_GET['err2'])) { ?>
                                <section class="boxerreurprofil">
                                    <p> Selectionnez un image ne depassant pas les 5 Mo !</p>
                                </section>
                            <?php } elseif (isset($_GET['err3'])) { ?>
                                <section class="boxerreurprofil">
                                    <p> Veuillez sélectionner un fichier en cliquant sur l'image !</p>
                                </section>
                            <?php } elseif (isset($_GET['errd'])) { ?>
                                <section class="boxerreurdroit">
                                    <p> Veuillez sélectionner un membre pourchanger ses droits !</p>
                                </section>
                            <?php  } elseif (isset($_GET['droit'])) { ?>
                                <section class="boxreussidroit">
                                    <p> Les droits ont été correctement changés ! </p>
                                </section>
                            <?php }  elseif (isset($_GET['errorp1'])) { ?>
                                <section class="boxerreurprofil">
                                    <p> L'email ou le Login existe déjà ! </p>
                                </section>
                            <?php } elseif (isset($_GET['errorp2'])) { ?>
                                <section class="boxerreurprofil">
                                    <p> Le mot de passe est incorrecte ! </p>
                                </section>
                            <?php } ?>
                            <div class="cardform2">
                                <div class="formprofil">
                                    <form action="../traitements/formulaire-profil.php" method="POST">
                                        <div>
                                            <label>Login</label>
                                        </div>
                                        <div>
                                            <input type="text" value="<?php echo $user->getLogin($id); ?>" name="login" required>
                                        </div>
                                        <div>
                                            <label>E-mail </label>
                                        </div>
                                        <div>
                                            <input type="email" value="<?php echo $user->getEmail($id); ?>" name="email" required>
                                        </div>

                                        <div class>
                                            <label>Mot de passe</label>
                                        </div>
                                        <div class=>
                                            <input type="password" placeholder="Nouveau mot de passe" name="password" required>
                                        </div>
                                        <div class>
                                            <label>Confirmation du passe</label>
                                        </div>
                                        <div>
                                            <input type="password" placeholder="confirmation du mot de passe" name="password2" required>
                                        </div>
                                        <div>
                                            <input type="submit" id='submit' name="modifier" value='modifier'>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <?php 
                if ($_SESSION['droit'] ==  'administrateur') { ?>
                <div class="cardprofil2">
                    <p>GERER LES DROITS</p>
                    <div class="boxdroits">
                        <form action="../traitements/formulaire-droits.php" method="POST">

                            <select class="select-style" name="membre">
                                <option value="">membres</option>
                                <?php
                                $user->getAllLogin();
                                ?>

                            </select>
                            <div>
                                <input type="radio" id="utilisateur" name="droit" value="utilisateur">
                                <label for="utilisateur">Utilisateur</label>

                                <input type="radio" id="moderateur" name="droit" value="moderateur">
                                <label for="moderateur">Modérateur</label>

                                <input type="radio" id="administrateur" name="droit" value="administrateur">
                                <label for="administrateur">administrateur</label>
                            </div>
                            <div>
                                <button type="submit" name="changer">changer les droits</button>
                            </div>
                        </form>
                    </div>
                    <p>GERER LES MEMBRES</p>
                    <div class="boxdroits2">
                        <form action="../traitements/formulaire-droits.php" method="POST">

                            <select class="select-style" name="membre">
                                <option value="">membres</option>
                                <?php
                                $user->getAllLogin();
                                ?>

                            </select>
                           
                            <div>
                                <button  type="submit" name="supprimer">Supprimer le Membre</button>
                            </div>
                        </form>
                    </div>
                </div>

               <?php } ?>
            </div>
        </div>



    </main>
    <?php require '../require/footer.php'; ?>
</body>

</html>