-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 mars 2022 à 09:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `image`, `description`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(3, 'vfdfvfdvdf', '../upload/621f82fa0dc15.jpg', 'vfdfvdfvfdv', 'vfdfvfdv', 1, 1, '2022-03-02 14:45:14'),
(4, 'fbdsdfbsfbsb', '../upload/621f8332d70d6.jpg', 'dsqfdgfhgjh', 'd<sfdgfdhgjh', 1, 2, '2022-03-02 14:46:10'),
(7, 'passage des groupes Ã  4 joueurs maximum !', '../upload/621f9de0ee507.jpg', 'Comme nous vous lâ€™avions annoncÃ© lors de la Krosmonote, puis plus rÃ©cemment dans la missive, lâ€™un de nos objectifs de cette annÃ©e est de pousser le jeu vers un format plus mobile. Afin de prÃ©parer la prochaine mise Ã  jour majeure', 'Comme nous vous lâ€™avions annoncÃ© lors de la Krosmonote, puis plus rÃ©cemment dans la missive, lâ€™un de nos objectifs de cette annÃ©e est de pousser le jeu vers un format plus mobile. Afin de prÃ©parer la prochaine mise Ã  jour majeure qui arrivera dans les prochains mois, nous vous expliquons tout cela dans ce nouveau devblog !\r\n\r\nCe chantier passe, comme on peut sâ€™y attendre, par des modifications dâ€™interfaces et dâ€™aspects visuels. Nous avons aussi le dÃ©sir dâ€™adapter le jeu dans son fonctionnement. Câ€™est pour cette raison que nous avons pris la dÃ©cision de modifier drastiquement certains aspects du jeu sur des points pourtant historiques et emblÃ©matiques.\r\n\r\nPASSAGE A 4 JOUEURS\r\nÃ€ compter de la mise Ã  jour 1.54, les combats dans DOFUS Touch seront limitÃ©s Ã  du 4 contre 4, câ€™est-Ã -dire 4 joueurs maximum contre 4 monstres maximum. Cela sera appliquÃ© Ã  lâ€™ensemble des contenus.\r\n\r\nCette rÃ©duction permet dâ€™avoir des combats plus digestes, que ce soit en termes de durÃ©e comme dâ€™informations et dâ€™Ã©lÃ©ments Ã  lâ€™Ã©cran (joueurs, monstres, invocations, timeline infinie, etc.). Câ€™est aussi un moyen pour les joueurs solitaires, ou qui jouent la plupart du temps en binÃ´me, de trouver plus facilement des groupes de monstres et des contenus (donjons, quÃªtes, etc.) adaptÃ©s Ã  leur maniÃ¨re de jouer.\r\n', 1, 2, '2022-03-02 16:40:00'),
(6, 'refonte du discord communautaire dofus touch !', '../upload/621f977c665e1.jpg', 'Comme DOFUS Touch, le serveur communautaire Discord DOFUS Touch fÃªte ses cinq ans. Câ€™est peut-Ãªtre lâ€™heure de lui refaire une beautÃ© ? Venez dÃ©couvrir en dÃ©tail toutes les nouveautÃ©s mises en place pour lâ€™occasion !', 'Comme DOFUS Touch, le serveur communautaire Discord DOFUS Touch fÃªte ses cinq ans. Câ€™est peut-Ãªtre lâ€™heure de lui refaire une beautÃ© ? Venez dÃ©couvrir en dÃ©tail toutes les nouveautÃ©s mises en place pour lâ€™occasion !\r\n\r\nCâ€™EST QUOI DÃ‰JÃ€ UN SERVEUR DISCORD ?\r\nPour les deux-trois personnes au fond de la salle qui ne connaissent pas ce service, Discord est un logiciel de messagerie instantanÃ©e vocale et Ã©crite, disponible sur PC (version bureau), sur smartphone et sur tablette (Ã§a tombe plutÃ´t bien nous direz-vous !). Accessible via votre navigateur web ou lâ€™application Ã©ponyme, Discord permet de se regrouper par communautÃ© autour dâ€™un thÃ¨me prÃ©cis, ici DOFUS Touch. Par ce biais, vous pouvez discuter quotidiennement avec le staff Ankama, rencontrer des joueurs avec qui jouer, participer Ã  des concours et bien sÃ»r suivre les informations de DOFUS Touch en temps rÃ©el !\r\n\r\nPOURQUOI DES MODIFICATIONS SUR LE DISCORD ?\r\nDurant lâ€™automne 2021, nous avons mis en place un sondage pour les utilisateurs franÃ§ais, espagnols et anglais du serveur communautaire DOFUS Touch afin dâ€™avoir des retours sur la qualitÃ© globale de celui-ci. Par ce biais, nous avons pu avoir une idÃ©e des modifications Ã  effectuer ainsi quâ€™une liste de suggestions pour lâ€™amÃ©liorer directement par les joueurs.  \r\n\r\nTout ceci a entrainÃ© les procÃ©dures que nous avons effectuÃ©es sur le Discord. Elles se sont concentrÃ©es sur des problÃ©matiques liÃ©es Ã  lâ€™ambiance gÃ©nÃ©rale, lâ€™intÃ©gration des nouveaux joueurs/membres du Discord ou encore lâ€™Ã©coute des attentes des diffÃ©rentes communautÃ©s Ã  travers des nouvelles options exclusives Ã  notre serveur Discord !', 1, 1, '2022-03-02 16:12:44'),
(8, '[shop] objets de prestige : mars attaque ! ', '../upload/621fa156cef11.jpg', 'Nos Ã©quipes ont mis le paquet dans cette rotation prestige du mois de mars : nouveau pack de classe, familier, apparat, bouclier, panoplie, attitudeâ€¦ il y en a pour tous les goÃ»ts. Certains disent mÃªme quâ€™il y en a un peu tropâ€¦\r\n\r\n', 'Nos Ã©quipes ont mis le paquet dans cette rotation prestige du mois de mars : nouveau pack de classe, familier, apparat, bouclier, panoplie, attitudeâ€¦ il y en a pour tous les goÃ»ts. Certains disent mÃªme quâ€™il y en a un peu tropâ€¦\r\n\r\nLassÃ©s des objets disponibles dans la boutique depuis fÃ©vrier ? La venue dâ€™un nouveau mois va tout changer : de nouveaux cosmÃ©tiques de prestige sont arrivÃ©s ! Mars, et Ã§a repart !\r\n \r\nSemaine #9\r\ndu mardi 22 fÃ©vrier Ã  9 h au mardi 1er mars Ã  9 h, heure de Paris\r\n\r\n \r\n\r\nLES COSMÃ‰TIQUES DE PRESTIGE\r\nVoici les objets de prestige qui seront disponibles durant tout le mois de mars :\r\n\r\nPack Eniripsa : panoplie dâ€™apparat + familier dâ€™apparat Enimilier (nouveau !)\r\nKramkram\r\nApparats KawaÃ¯Ã¯\r\nBouclirÃªve Imaginaire\r\nEliome\r\nPanoplie Chevalier AÃ©rien\r\nColÃ¨re de Bolgrot\r\n ', 1, 1, '2022-03-02 16:54:46'),
(9, 'l\'Ã®le de l\'ascension : Rotation #17', '../upload/621fa2e20f010.jpg', 'La dix-septiÃ¨me rotation de lâ€™Ã®le de lâ€™Ascension a commencÃ© avec l\'ouverture des serveurs ! DÃ©bloquez un maximum de rÃ©compenses et accÃ©dez Ã  la gloire !', 'Formez une Ã©quipe de trois et partez Ã  lâ€™aventure sur lâ€™Ã®le de lâ€™Ascension ! DÃ¨s maintenant et jusqu\'au 29 mars 2022, gravissez un maximum dâ€™Ã©tages pour dÃ©bloquer des rÃ©compenses en fonction de votre positionnement dans le classement Ã  lâ€™issue de la rotation.\r\n\r\nLâ€™Ã®le de lâ€™Ascension permet de dÃ©bloquer des Ã©quipements et des familiers, le Dofushu, mais aussi du cosmÃ©tique pour prouver votre valeur au zaap du village !\r\n\r\nLes joueurs du top 3 interserveur remporteront un bouclier d\'apparat Shuclier.\r\n\r\nLe dÃ©but des quÃªtes pour la zone d\'Orado se situe en [-33,-11] tandis que l\'entrÃ©e du donjon de l\'Ã®le de l\'Ascension est disponible en [-73,-17].\r\n\r\nPour en savoir plus, nâ€™hÃ©sitez pas Ã  lire le devblog sur le sujet.\r\n\r\nBonne ascension Ã  tous !', 1, 3, '2022-03-02 17:01:22');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'news'),
(2, 'devblog'),
(3, 'maj');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'super commentaire', 9, 1, '2022-03-04 14:33:41'),
(2, 'trop hate', 9, 1, '2022-03-04 14:34:15'),
(3, 'super article', 9, 1, '2022-03-04 14:34:31'),
(4, 'efefzfzrfzrf', 9, 1, '2022-03-04 14:51:19'),
(5, 'efefzfzrfzrf', 9, 1, '2022-03-04 14:51:19'),
(6, 'zefzfezfzfzeezfezf', 9, 1, '2022-03-04 14:51:24'),
(7, 'zefzfezfzfzeezfezf', 9, 1, '2022-03-04 14:51:24'),
(8, 'zefzefezfzefzefzefzefzefzef', 9, 1, '2022-03-04 14:51:53'),
(9, 'zefzefezfzefzefzefzefzefzef', 9, 1, '2022-03-04 14:51:53'),
(10, 'super site', 9, 1, '2022-03-04 15:54:01'),
(11, 'super site', 9, 1, '2022-03-04 15:54:01'),
(12, 'youhou', 9, 1, '2022-03-04 15:54:12'),
(13, 'youhou', 9, 1, '2022-03-04 15:54:12'),
(14, 'vsdgddh', 9, 0, '2022-03-07 08:18:42'),
(15, 'vsdgddh', 9, 0, '2022-03-07 08:18:42'),
(16, 'fgsgsfsfssssssssssssssssssssssssfgggfs', 9, 0, '2022-03-07 08:18:56'),
(17, 'fgsgsfsfssssssssssssssssssssssssfgggfs', 9, 0, '2022-03-07 08:18:56'),
(18, 'ezfzefzefzefsqfefez', 9, 0, '2022-03-07 08:21:10'),
(19, 'ezfzefzefzefsqfefez', 9, 0, '2022-03-07 08:21:10');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1338 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'moderateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT '../upload/imgprofil.jpg',
  `id_droits` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `avatar`, `id_droits`) VALUES
(1, 'admin', 'admin', 'admin@g.fr', '../upload/621f490b64b3b.jpg', 1337),
(3, 'isma', 'isma', 'isma', '../upload/62188e1f966d5.jpg', 1),
(4, 'a', 'a', 'a@g.com', '../upload/imgprofil.jpg', 1),
(5, 'l', 'l', 'l@gmail.com', '../upload/imgprofil.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
