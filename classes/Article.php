<?php

class Article 
{
    private $id;
    public $titre;
    public $image;
    public $description;
    public $article;
    public $id_utilisateur;
    public $id_categorie;
    public $bdd;
   

    public function __construct($titre,$image,$description,$article,$id_utilisateur,$id_categorie) 
    {
        $this->bdd= new PDO(
            "mysql:host=localhost;dbname=blog",
            "root",
            "");
        
            $this->titre = $titre;
            $this->image = $image;
            $this->description = $description;
            $this->article = $article;
            $this->id_utilisateur = $id_utilisateur;
            $this->id_categorie = $id_categorie;
    }
   

    //  Methode pour inserer un article dans la base de donnée : 
    public function insertArticle()
    {
        $sql= "INSERT INTO articles (`titre`, `image`, `description`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES (?, ?, ?, ? , ?, ?,NOW())";
        $insertArticle= $this->bdd->prepare($sql);

        $insertArticle->execute([ $this->titre,$this->image,$this->description,$this->article,$this->id_utilisateur,$this->id_categorie]);

    }

    //  Methode pour modifier un article
    public function updateArticle($id_edit)
    {
     $updateArticle= $this->bdd->prepare(" UPDATE `articles` 
     SET `titre`=?,`image`=?,`description`=?,`article`=?,`id_categorie`=?,`date`= NOW() WHERE `id`=?");
     
     $updateArticle->execute(array($this->titre,$this->image,$this->description,$this->article,$this->id_categorie,$id_edit));
     
     var_dump($updateArticle);
 
    }


    
    

    //  Methode pour récuperer tout les articles poster 
    public function getArticle($id)
    {
        $sql= "SELECT * FROM `articles` WHERE `id`=?";
        $getArticle= $this->bdd->prepare($sql);
        $getArticle->execute([$id]);
        $getArticle= $getArticle->fetchAll();

        return $getArticle;

    }

    public function nb_ArticlesCategorie($id_categorie)
    {
        $sql= 'SELECT COUNT(*) AS nb_articles FROM `articles` WHERE `id_categorie`=? OR `id_categorie`';
        $nb_ArticlesCategorie = $this->bdd->prepare($sql);
        $nb_ArticlesCategorie->execute([$id_categorie]);
        $nb_ArticlesCategorie = $nb_ArticlesCategorie->fetch();
         
        return $nb_ArticlesCategorie = (int) $nb_ArticlesCategorie['nb_articles'];
    }

    //  Methode pour récuperer les informations de l'article à editer
    public function selectUpdateArticle($id)
    {
        $sql= "SELECT * FROM `articles` WHERE `id`=?";
        $selectUpdateArticle= $this->bdd->prepare($sql);
        $selectUpdateArticle->execute([$id]);
        $selectUpdateArticle= $selectUpdateArticle->fetchAll();

        return $selectUpdateArticle;

        
    }

    public function selectArticle()
    {
        $sql= "SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 4";
        $selectArticle= $this->bdd->prepare($sql);
        $selectArticle->execute();
        $selectArticle= $selectArticle->fetchAll();

        return $selectArticle;

        
    }

    //  Methode pour récuperer tous derniers article  poster 
    public function selectAllArticleCategorie($premierarticle,$pararticle)

    {

        $sql= 'SELECT * FROM articles ORDER BY articles.date DESC LIMIT :premiercom,:parcom';
        $selectAllArticleCategorie= $this->bdd->prepare($sql);
        
 
        $selectAllArticleCategorie->bindValue(':premiercom', (int) $premierarticle, PDO::PARAM_INT); 
        $selectAllArticleCategorie->bindValue(':parcom', (int) $pararticle, PDO::PARAM_INT); 

        $selectAllArticleCategorie->execute();
        $selectAllArticle = $selectAllArticleCategorie->fetchAll(PDO::FETCH_ASSOC);
        
        return $selectAllArticle;
    }
 
    //  Methode pour récuperer les 5 derniers article  poster 
    public function selectArticleCategorie($id_categorie,$premierarticle,$pararticle)

    {

        $sql= 'SELECT * FROM articles WHERE `id_categorie`= :id ORDER BY articles.date DESC LIMIT :premiercom,:parcom';
        $selectArticleCategorie= $this->bdd->prepare($sql);
        

        $selectArticleCategorie->bindValue(':id', (int) $id_categorie, PDO::PARAM_INT); 
        $selectArticleCategorie->bindValue(':premiercom', (int) $premierarticle, PDO::PARAM_INT); 
        $selectArticleCategorie->bindValue(':parcom', (int) $pararticle, PDO::PARAM_INT); 

        $selectArticleCategorie->execute();
        $selectArticle = $selectArticleCategorie->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $selectArticle;
    }

    public function deleteArticle($id)
    {
        $sql= "DELETE FROM `articles` WHERE `id`=?";
        $deleteArticle= $this->bdd->prepare($sql);
        $deleteArticle->execute([$id]);
        $deleteArticle= $deleteArticle->fetchAll();

        return $deleteArticle;

        
    }


}

$article = new Article('','','','','','');
$article->selectAllArticleCategorie(0,5);

?>