<?php
session_start();
require '../classes/Article.php';
$article = new Article('', '', '', '', '', '');
if (isset($_GET['supprimer'])) {
    $id_delete = intval($_GET['supprimer']);
    $article->deleteArticle($id_delete);
    header('location:accueil.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php require '../require/header.php'; ?>

    <main>
        <div class="conteneurbouton">
            <div class="cardtelechargement">
                <a href="https://apps.apple.com/fr/app/dofus-touch/id1041406978"><img src="../assets/img/app-store-fr.png" alt="télécharger sur apple store"></a>
            </div>

            <div>
                <a href="https://play.google.com/store/apps/details?id=com.ankama.dofustouch"><img src="../assets/img/google-play-fr.png" alt="télécharger sur google play"></a>
            </div>

        </div>

        <div class="conteneurmain">
            <div class="cardmain">
                <?php foreach ($article->selectArticle() as $key => $value) {
                    $date = strtotime($value['date']);
                    $datefr = date('d-m-Y', $date); ?>
                    <div class="cardarticlemain">
                        <div class="imagearticle">
                            <a href="article.php?article=<?php echo $value['id']; ?>"><img class="imgsize" src="<?php echo $value['image']; ?>" alt=""></a>
                        </div>
                        <div class="boxtitre">
                            <?php  ?>
                            <div class="imgcategorie">
                                <a href="article.php?article=<?php echo $value['id']; ?>"><img class="imgsize" src="../assets/img/imgcat<?php echo $value['id_categorie']  ?>.png" alt=""></a>
                            </div>
                            <div class="titrearticle">
                                <h3><a href="article.php?article=<?php echo $value['id']; ?>"> <?php echo $value['titre']; ?></a></h3>
                            </div>
                            <div class="date">
                                <p><?php echo $datefr; ?></p>
                            </div>
                        </div>
                        <section class="description">

                            <div>
                                <p>
                                    <?php echo $value['description']; ?>
                                </p>
                            </div>

                        </section>
                        <div class="droitarticle">
                            <?php
                                if (isset($_SESSION['droit'])) {
                                if ($_SESSION['droit'] == 'administrateur') { ?>
                            <button class="buttonedit"><a href="creer-article.php?editer=<?php echo $value['id']; ?>">editer</a></button>
                            <button class="buttonsupprimer"><a href="accueil.php?supprimer=<?php echo $value['id']; ?>">supprimer</a></button>
                            <?php } } ?>
                        </div>
                    </div>
                <?php } ?>






            </div>
            <div class="cardmain2">
                <div class="boxtuto">
                    <a href="https://www.dofus-touch.com/fr/mmorpg/tutoriels"><img class="imgsize" src="../assets/img/dofus-tutoriel.jpg" alt="" srcset=""></a>
                </div>
                <div class="boxtuto">
                    <a href="articles.php?categorie=1"><img class="imgsize" src="../assets/img/toutlesmaj.jpg" alt="" srcset=""></a>
                </div>
                <div class="boxtuto">
                    <a href="articles.php?categorie=2"><img class="imgsize" src="../assets/img/toutlesdevblog.jpg" alt="" srcset=""></a>
                </div>
                <div class="boxtuto">
                    <a href="articles.php?categorie=3"><img class="imgsize" src="../assets/img/toutlespatch.jpg" alt="" srcset=""></a>
                </div>
                <div class="boxtuto">
                    <a class="twitter-timeline" data-lang="fr" data-width="100%" data-height="422" data-dnt="true" data-theme="dark" href="https://twitter.com/DofusTouch?ref_src=twsrc%5Etfw">Tweets by DofusTouch</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

            </div>
        </div>



    </main>
    <?php require '../require/footer.php'; ?>
</body>

</html>