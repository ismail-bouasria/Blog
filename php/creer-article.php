<?php
session_start();
require "../classes/Categorie.php";
$categorie = new Categorie('');
require '../classes/Article.php';
$article = new Article('', '', '', '', '', '');
$_SESSION['editer'] = intval($_GET['editer']);
if ($_SESSION['droit'] == 'utilisateur') {
    header ('Location:accueil.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un article</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/article.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bodyarticle">
    <?php require '../require/header.php'; ?>

    <main class="mainarticle">
        <div class="conteneurarticle">
            <div class="formarticle">
                <div class="conteneurformarticle">
                    <section class="boxcreerarticle">
                        <?php if (isset($_GET['editer'])) {
                            echo "<p> Modifier l'article</p>";
                        } else{
                            echo '<p> créer un article</p>';
                        }
                        ?>

                    </section>
                    <div class="boxformarticle">
                        <div class="cardform">
                            <?php if (isset($_GET['editer'])) { 
                                    
                                // <!-- -----------------------------PARTIE UPDATE ------------------------------------------->
                                 $id_article=$_GET['editer'];

                                 $update_Article = $article->selectUpdateArticle($id_article);

                                foreach ($update_Article as $key => $value) {
                                    ?>
                               
                                <form action="../traitements/formulaire-article.php" method="post" enctype="multipart/form-data">
                                    <?php if (isset($_GET['succ'])) {?>
                                        <section class="cardarticle">
                                        <p>votre article a été posté !</p>
                                        </section>
                                    }
                                   
                                    <div class="cardarticle">
                                    <label>Choisir une catégorie:</label>

                                        <select class="select-style" name="categorie" required>
                                            <option value="<?php echo strval($value['id_categorie']); ?>"> <?php echo strval($categorie->getCategorie($value['id_categorie'])); ?></option>
                                            <?php $categorie->getAllCategorie(); ?>
                                        </select>
                                    </div>
                                    <div class="cardarticle">

                                        <label>Titre:</label>

                                        <input type="text" value="<?php echo $value['titre']; ?>" name="titre" required>

                                    </div>
                                    <div class="cardarticle">

                                        <label>Image de l'article: </label>
                                        <input type="file" value="<?php echo $value['image']; ?>" name="image">
                                    </div>
                                    <div class="cardarticle">
                                        <label>Description :</label>

                                        <textarea name="description"  cols="160" rows="5" required><?php echo $value['description'];?></textarea>
                                    </div>
                                    <div class="cardarticle">
                                        <label>Contenu de l'article:</label>

                                        <textarea name="article"  cols="160" rows="15" required><?php echo $value['article'];?></textarea>
                                    </div>

                                    <div class="cardarticle">

                                        <input type="submit" name="editer" value='editer'>
                                    </div>
                                </form>
                             <?php }
                                } 
                                else{ ?>
                                    
                                    
                                   <form action="../traitements/formulaire-article.php" method="post" enctype="multipart/form-data">
                                   <section class="cardarticle">
                                       <p>Remplissez tout les champs pour enregister votre article !</p>
                                   </section>
                                   <div class="cardarticle">
                                       <label>Choisir une catégorie:</label>
                                       <div>
                                           <select class="select-style" name="categorie" required>
                                               <option value="">catégories</option>
                                               <?php $categorie->getAllCategorie() ?>
                                           </select>
                                       </div>
                                       <div class="cardarticle">

                                           <label>Titre:</label>

                                           <input type="text" placeholder="Titre de l'article" name="titre" required>

                                       </div>
                                       <div class="cardarticle">

                                           <label>Image de l'article: </label>


                                           <input type="file" name="image">


                                       </div>
                                       <div class="cardarticle">
                                           <label>Description :</label>

                                           <textarea name="description" cols="160" rows="5" required></textarea>
                                       </div>
                                       <div class="cardarticle">
                                           <label>Contenu de l'article:</label>

                                           <textarea name="article" cols="160" rows="15" required></textarea>
                                       </div>

                                       <div class="cardarticle">

                                           <input type="submit" name="poster" value='Poster'>
                                       </div>
                                   </div>
                               </form>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>



    </main>
    <?php require '../require/footer.php'; ?>
</body>

</html>