<?php 
require '../classes/User.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/inscription.css">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bodyinscription">
    <?php require '../require/header.php'; ?>

    <main class="maininscription">

        <div class="conteneurinscription">
            <div class="formconteneur">
                <section class="blockcreervotrecompte">
                    <p>créer votre compte</p>
                </section>
                <div class="divformflex">
                    <div class="cardform1">
                        <p class="fontcustomform">En quelques clics avec ...</p>
                        <section class="blockfb">
                            <a href="https://www.facebook.com/login.php?skip_api_login=1&api_key=174357836676839&kid_directed_site=0&app_id=174357836676839&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fdialog%2Foauth%3Fresponse_type%3Dcode%26client_id%3D174357836676839%26redirect_uri%3Dhttps%253A%252F%252Faccount.ankama.com%252Fauth%252Ffacebook%26scope%3Demail%26state%3DHA-QPE21ZUJWRNAM34OKHG9V7F5TY8DLXB0CS6I%26ret%3Dlogin%26fbapp_pres%3D0%26logger_id%3D0b9b5b42-9c73-4688-8bca-ef48afe785db%26tp%3Dunspecified&cancel_url=https%3A%2F%2Faccount.ankama.com%2Fauth%2Ffacebook%3Ferror%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%26state%3DHA-QPE21ZUJWRNAM34OKHG9V7F5TY8DLXB0CS6I%23_%3D_&display=page&locale=fr_FR&pl_dbl=0"><img width="55%" src="../assets/img/logofb.jpg" alt="facebook"></a>
                            <a href="https://www.facebook.com/login.php?skip_api_login=1&api_key=174357836676839&kid_directed_site=0&app_id=174357836676839&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fdialog%2Foauth%3Fresponse_type%3Dcode%26client_id%3D174357836676839%26redirect_uri%3Dhttps%253A%252F%252Faccount.ankama.com%252Fauth%252Ffacebook%26scope%3Demail%26state%3DHA-TA9Q2LC5B4FPUX0MWKEZYID1G7RHV83S6JON%26ret%3Dlogin%26fbapp_pres%3D0%26logger_id%3Ded61f488-1324-454f-88fd-7479f9168b99%26tp%3Dunspecified&cancel_url=https%3A%2F%2Faccount.ankama.com%2Fauth%2Ffacebook%3Ferror%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%26state%3DHA-TA9Q2LC5B4FPUX0MWKEZYID1G7RHV83S6JON%23_%3D_&display=page&locale=fr_FR&pl_dbl=0">
                                <p class="fontcustomfb">facebook</p>
                            </a>
                        </section>
                    </div>
                       
                    <div class="cardform2">
                        <div class="forminscription">
                            <form action="../traitements/formulaire-inscription.php" method="POST">
                                <div>
                                    <label>E-mail*</</label>
                                </div>
                                <div >
                                    <input type="email" placeholder="E-mail" name="email" required>
                                </div>
                                <div class="padding">
                                    <label>Login*</label>
                                </div>
                                <div class="padding">
                                    <input type="text" placeholder="Entrer le login d'utilisateur" name="login" required>
                                </div>

                                <div class="padding">
                                    <label>Mot de passe*</label>
                                </div>
                                <div class="padding">
                                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                                </div>
                                <div class>
                                    <label>Confirmation du passe*</label>
                                </div>
                                <div>
                                    <input type="password" placeholder="Confirmer le mot de passe" name="password2" required>
                                </div>
                                <div>
                                    <input type="submit" id='submit' name="submit" value='inscription'>
                                </div>

                            </form>
                            
                            
                        </div>
                      
                    </div>
                   
                </div>
                <?php 
                if (isset($_GET['err1'])) { ?>
                    <section class="boxerreuravatar">
                    <p>Inscription impossible, login ou email déjà existant !</p>
                    </section>
               <?php } elseif (isset($_GET['err2'])){?>
                <section class="boxerreur">
                    <p>Inscription impossible, erreur sur le mot de passe!</p>
                </section>
                 <?php }?>
               
            </div>

        </div>
        </div>



    </main>
    <?php require '../require/footer.php'; ?>
</body>

</html>