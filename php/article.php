<?php
session_start();
require '../classes/Article.php';
require '../classes/Categorie.php';
require '../classes/Commentaire.php';
$article = new Article('', '', '', '', '', '');
$categorie = new Categorie('');
$commentaire = new Commentaire('', '', '');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/article.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap" rel="stylesheet">
    

</head>

<body>
    <?php require '../require/header.php'; ?>

    <main>
        <!-- ----------------------------------------ARTICLE----------------------------------------------->
        <div class="conteneurarticle">

            <div class="formarticle">
                <div class="conteneurformarticle">
                    <?php
                    $_SESSION['article'] = intval($_GET['article']);

                    foreach ($article->getArticle($_SESSION['article']) as $key => $value) {
                        $date = strtotime($value['date']);
                        $datefr = date('- d-m-Y - H:i', $date); ?>
                        <div class="boxlarticle">

                            <section class="readtitre">
                                <p> <?php echo $value['titre']; ?></p>
                            </section>
                            <section class="readcategorie">
                                <p><?php echo $categorie->getCategorie($value['id_categorie']); ?> </p>
                            </section>
                            <section class="readdate">
                                <p><?php echo $datefr; ?></p>
                            </section>

                        </div>
                        <div class="boxformlarticle">
                            <section class="readdescription">
                                <p><?php echo $value['description']; ?></p>
                            </section>
                            <section class="readimage">
                                <img class="imgsize" src="<?php echo $value['image']; ?>" alt="">
                            </section>
                            <section class="readarticle">
                                <p>
                                    <?php echo $value['article']; ?>
                                </p>
                            </section>

                        </div>
                    <?php } ?>
                    <!-----------------------------------------COMMENTAIRES-------------------------------------------->

                    <div class="boxcommentaire">
                        <section class="titrecommentaire">
                            <p>commentaires</p>
                        </section>
                        <?php
                        // On détermine sur quelle page on se trouve
                        if (isset($_GET['page']) && !empty($_GET['page'])) {

                            $pageActuelle = (int) strip_tags($_GET['page']);
                        } else {
                            $pageActuelle = 1;
                        }

                        // On détermine le nombre de commentaires par page
                        $parCom = 5;
                        // On calcule le nombre de page total
                        $pages = ceil($commentaire->nb_Commentaire($_SESSION['article']) / $parCom);
                        // Calcul du commentaire de la page
                        $premier = ($pageActuelle * $parCom) - $parCom;

                        foreach ($commentaire->selectCommentaire($_SESSION['article'], $premier, $parCom) as $key => $value) {
                            $date = strtotime($value['date']);
                            $datefr = date('d-m-Y - H:i', $date); ?>
                            <div class="conteneurcom">

                                <div class="cardimagecom">
                                    <section class="imagecom">
                                        <img class="imgsize" src="<?php echo $value['avatar']; ?>" alt="">
                                    </section>

                                </div>
                                <div class="cardcom">
                                    <section class="pseudocom">
                                        <p>
                                            <?php echo $value['login']; ?>
                                        </p>
                                    </section>
                                    <section class="datecom">
                                        <p> <?php echo $datefr; ?></p>
                                    </section>
                                    <section class="commentaire">
                                        <p>
                                            <?php echo $value['commentaire']; ?>
                                        </p>
                                    </section>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                    <!-----------------------------------------BOX PAGINATION-------------------------------------------->
                    <div class="boxpajicommentaire">

                        <nav>
                            <ul class="pagination">
                                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                                <li class="page-item <?= ($pageActuelle == 1) ? "disabled" : "" ?>">
                                    <a href="article.php?article=<?= $_SESSION['article'] ?>&page=<?= $pageActuelle - 1 ?>" class="page-link">Précédente</a>
                                </li>
                                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                    <li class="page-item <?= ($pageActuelle == $page) ? "active" : "" ?>">
                                        <a href="article.php?article=<?= $_SESSION['article'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                    </li>
                                <?php endfor ?>
                                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                                <li class="page-item <?= ($pageActuelle  == $pages) ? "disabled" : "" ?>">
                                    <a href="article.php?article=<?= $_SESSION['article'] ?>&page=<?= $pageActuelle + 1 ?>" class="page-link">Suivante</a>
                                </li>
                            </ul>
                        </nav>

    
                    </div>

                    <!-----------------------------------------FORMULAIRE COMMENTAIRE-------------------------------------------->


                    <div class="conteneurformcom">
                        <div class="cardimagecom">
                            <?php if (isset($_SESSION['id'])) { ?>
                           
                            
                            <section class="imagecom">
                                <img class="imgsize" src="<?php echo $_SESSION['avatar'] ?>" alt="">
                            </section>
                           <?php  } ?>
                        </div>
                        <div class="cardcom">
                            <form action="../traitements/formulaire-commentaire.php" method="POST">
                                <div class="cardarticle">

                                    <textarea name="commentaire" placeholder="Commenter..." cols="110" rows="5" required></textarea>
                                </div>
                                <input type="submit" name="commenter" value="commenter">

                            </form>
                        </div>
                    </div>




                </div>
            </div>
        </div>

    </main>
    <?php require '../require/footer.php'; ?>
</body>

</html>