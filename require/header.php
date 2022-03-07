
<div class="conteneurtop">
    <a class="logoconteneur" href="accueil.php"><img width="100%" src="../assets/img/dtlogo.png" alt=""></a>
    <div class="boxmenu"> 
        <div class="boxlogoankama" > 
            <a href=""><img src="../assets/img/logoankama.png" alt=""></a>
        </div>
        <div class="cardsupport">
          <a href="">Support</a>
        </div>
    </div> 
    <?php if (!isset($_SESSION['id'])){?>
    <div class="boxmenu">
        <div class="cardinscription">
        <a href="inscription.php">inscription</a>
        </div>
        <div class="cardconnexion">
        <a href="connexion.php">connexion</a>
        </div>
    </div>
    <?php } ?>
</div>
<header>

    <nav>

        <ul>
            <li class="deroulant"><a href="#">l'univers &ensp;</a>

                <ul class="sous">
                    <div class="divmenuflex">
                        <div>
                            <li>
                                <h4>jeu en ligne</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/decouvrir">décourvir</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/tutoriels">apprendre à jouer</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/jouer">télécharger le jeu</a></li>
                        </div>
                        <div>
                            <li>
                                <h4>Animation</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/animation/univers">La série </a></li>
                            <li><a href="http://www.dofus-le-film.com/fr">le film</a></li>
                        </div>
                        <div>
                            <li>
                                <h4>éditions</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/editions/univers">découvrir</a></li>
                        </div>
                        <div>
                            <li>
                                <h4>dofus kromaster</h4>
                            </li>
                            <li><a href="http://www.krosmaster.com/fr/prehome">découvrir</a></li>
                        </div>
                    </div>
                </ul>

            </li>
            <li class="deroulant"><a href="#">actualités &ensp;</a>
                <ul class="sous">
                    <li><a href="#">news</a></li>
                    <li><a href="#">devblog</a></li>
                    <li><a href="#">mise à jours</a></li>
                </ul>
            </li>

            <li class="deroulant"><a href="#">encyclopédie &ensp;</a>
                <ul class="sous">
                    <div class="divmenuflex">
                        <div>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/classes">Classes</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/metiers">métiers</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/bestiaire">bestiaire</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/armes">armes</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/equipements">équipement</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/almanax">almanax</a></li>
                        </div>
                        <div>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/panoplies">panoplies</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/familiers">familiers</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/montures">montures</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/consommables">consommables</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/ressources">ressources</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/encyclopedie/objets">objets d'apparats</a></li>
                        </div>
                        <div>

                        </div>
                </ul>
            </li>
            <li class="logoconteneur2"><a href="accueil.php"><img src="../assets/img/logorespons.png" alt=""></a></li>
            <li class="deroulant"><a href="#">médias &ensp;</a>
                <ul class="sous">
                    <li><a href="https://www.dofus-touch.com/fr/jeu/medias">jeu en ligne </a></li>
                    <li><a href="https://www.dofus-touch.com/fr/plus/medias">+ de dofus touch</a></li>
                    <li><a href="https://www.dofus-touch.com/fr/fan/medias">fan création</a></li>
                </ul>
            </li>
            <li class="deroulant"><a href="#">communautés &ensp;</a>
                <ul class="sous">
                    <div class="divmenuflex">
                        <div>
                            <li>
                                <h4>tournois</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/tournois/la-joute-des-abimes">la joutes des âbimes</a></li>

                        </div>
                        <div>
                            <li>
                                <h4>informations</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/reglement">règles de conduites</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/serveurs">status des serveurs</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/phishing">sécurité</a></li>
                        </div>
                        <div>
                            <li>
                                <h4>annuaires</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/annuaires/pages-persos">pages persos</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/annuaires/pages-guildes">guildes</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/annuaires/pages-artisans">artisans</a></li>
                        </div>
                        <div>
                            <li>
                                <h4>le coin des joueurs</h4>
                            </li>
                            <li><a href="https://www.dofus-touch.com/fr/forum">forum</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/ladder">ladders</a></li>
                            <li><a href="https://www.dofus-touch.com/fr/mmorpg/communaute/codes">code cadeau</a></li>
                        </div>
                    </div>
                </ul>
            </li>
            <li class="deroulant"> <div class="pseudoprofil"><?php if (isset($_SESSION['username'])){ echo $_SESSION['username'];} ?>
            <img class="blockprofil"src="<?php if (isset($_SESSION['avatar'])) {
                 echo $_SESSION['avatar'];}else {
                     echo '../upload/imgprofil.jpg';
                 }?> " alt="avatar profil"> </div>
                <ul class="sous">
                <li><a href="https://github.com/ismail-bouasria/blog">GitHub</a></li>
                <?php if (isset($_SESSION['id'])){?>
                    <li><a href="profil.php">Profil </a></li>
                    <?php }else {?>
                       <li><a href="inscription.php">Inscription</a></li>
                       <li><a href="connexion.php">Connexion</a></li>
                    <?php } ?>
                    <?php 
                        if (isset($_SESSION['id'])){
                        if ($_SESSION['droit'] == 'administrateur' || $_SESSION['droit'] == 'moderateur'){?>
                    <li><a href="creer-article.php">Créer un article</a></li>
                    <?php } } ?>
                    <?php if (isset($_SESSION['id'])){?>
                    <li><a href="accueil.php?deconnexion=<?php echo $_SESSION['id']; ?>">Deconnexion</a></li>
                    <?php } 
                    if (isset($_GET['deconnexion'])) {
                        session_destroy();
                        header('location:accueil.php');
                    }?>
                    
                </ul>
            </li>
        </ul>
    </nav>
</header>