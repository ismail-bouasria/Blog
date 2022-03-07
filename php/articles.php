<?php
session_start();
require '../classes/Article.php';
require '../classes/Categorie.php';
$article = new Article('', '', '', '', '', '');
$categorie = new Categorie('');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/article.css">
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

        <div class="conteneurmain2">
            <div class="cardmain2">
                <?php 
                 // On détermine sur quelle page on se trouve
                 if (isset($_GET['start']) && !empty($_GET['start'])) {

                    $pageActuelle = (int) strip_tags($_GET['start']);
                } else {
                    $pageActuelle = 1;
                }

                // On détermine le nombre de commentaires par page
                $pararticle = 5;
                // On calcule le nombre de page total arrondie au supérieur
                if (isset($_GET['categorie'])) {
                    $pages = ceil($article->nb_ArticlesCategorie($_GET['categorie']) / $pararticle);
                }else {
                    $pages = ceil($article->nb_ArticlesCategorie(0) / $pararticle);
                }
                
                // Calcul du commentaire de la page
                $premier = ($pageActuelle * $pararticle) - $pararticle;
                
                // Afficher les articles 
                if (isset($_GET['categorie'])) {
                    $AfficheArticles = $article->selectArticleCategorie(intval($_GET['categorie']),$premier,$pararticle);
                }else {
                    $AfficheArticles = $article->selectAllArticleCategorie($premier,$pararticle);
                }
                foreach ( $AfficheArticles as $key => $value) {
                    $date = strtotime($value['date']);
                    $datefr = date('d-m-Y', $date); ?>
                    <div class="cardarticlemain2">
                        <div class="imagearticle">
                            <a href="article.php?article=<?php echo $value['id']; ?>"><img class="imgsize" src="<?php echo $value['image']; ?>" alt=""></a>
                        </div>
                        <div class="boxtitre">
                            <?php  ?>
                            <div class="imgcategorie">
                                <a href="article.php?article=<?php echo $value['id']; ?>"><img class="imgsize" src="../assets/img/imgcat<?php echo $value['id_categorie']  ?>.png" alt=""></a>
                            </div>
                            <div class="titrearticle">
                                <a href="article.php?article=<?php echo $value['id']; ?>"> <?php echo $value['titre']; ?></a>
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
                            <button class="buttonsupprimer"><a href="creer-article.php?supprimer=<?php echo $value['id']; ?>">supprimer</a></button>
                            <?php } } ?>
                        </div>
                    </div>
                    
                <?php } ?>
                    <!-----------------------------------------BOX PAGINATION-------------------------------------------->
                    <div class="boxpajicommentaire">

                        <nav>
                            <ul class="pagination">
                                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                                
                                <li class="page-item <?= ($pageActuelle == 1) ? "disabled" : "" ?>">
                                    <?php if (isset($_GET['categorie'])) {?>
                                        <a href="articles.php?categorie=<?= $_GET['categorie'] ?>&start=<?= $pageActuelle - 1 ?>" class="page-link">Précédente</a>
                                    <?php }else { ?>
                                        <a href="articles.php?start=<?= $pageActuelle - 1 ?>" class="page-link">Précédente</a>
                                    <?php } ?>
                                </li>
                                
                                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                    <li class="page-item <?= ($pageActuelle == $page) ? "active" : "" ?>">
                                        <?php if (isset($_GET['categorie'])) {?>
                                            <a href="articles.php?categorie=<?= $_GET['categorie'] ?>&start=<?= $page ?>" class="page-link"><?= $page ?></a>
                                        <?php }else { ?>
                                            <a href="articles.php?start=<?= $page ?>" class="page-link"><?= $page ?></a>
                                        <?php } ?>
                                    </li>
                                <?php endfor ?>
                                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                                <li class="page-item <?= ($pageActuelle == $pages) ? "disabled" : "" ?>">
                                    <?php if (isset($_GET['categorie'])) {?>
                                        <a href="articles.php?categorie=<?= $_GET['categorie'] ?>&start=<?= $pageActuelle + 1 ?>" class="page-link">Suivante</a>
                                    <?php }else { ?>
                                        <a href="articles.php?start=<?= $pageActuelle + 1 ?>" class="page-link">Suivante</a>
                                        <?php } ?>
            
                                </li>
                            </ul>
                        </nav>
    
                    </div>
            </div>
            
        </div>



    </main>
    <?php require '../require/footer.php'; ?>
</body>

</html>