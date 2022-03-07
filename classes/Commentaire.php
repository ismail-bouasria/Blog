 <?php 
 
 class Commentaire
 {
    private $id;
    public $commentaire;
    public $id_aticle;
    public $id_utilisateur;
    public $bdd;


    public function __construct($commentaire,$id_article,$id_utilisateur) 
    {
        $this->bdd= new PDO(
            "mysql:host=localhost;dbname=blog",
            "root",
            "");
    
        $this->commentaire = $commentaire;
        $this->id_article = $id_article;
        $this->id_utilisateur = $id_utilisateur;
    }
    //  Methode pour inserer un commentaire dans la base de donnée : 
    public function insertCommentaire($commentaire,$id_article,$id_utilisateur)
    {
        $sql= "INSERT INTO commentaires (`commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES (?, ?, ?,NOW())";
        $insertCommentaire= $this->bdd->prepare($sql);
        $insertCommentaire->execute([$commentaire,$id_article,$id_utilisateur]);

    }

    //  Methode pour récuperer le nombre de commentaires 
    public function nb_Commentaire($id_article)
    {
        $sql= 'SELECT COUNT(*) AS nb_commentaires FROM `commentaires` WHERE `id_article`=?';
        $nb_Commentaire= $this->bdd->prepare($sql);
        $nb_Commentaire->execute([$id_article]);
        $nb_Commentaire= $nb_Commentaire->fetch();
         
        return $nb_Commentaire = (int) $nb_Commentaire['nb_commentaires'];
    }

    //  Methode pour récuperer les 5 derniers commentaires poster 
    public function selectCommentaire($id_article,$premiercom,$parcom)
   {
   
     $sql= 'SELECT * FROM commentaires INNER JOIN utilisateurs ON commentaires.`id_utilisateur` = utilisateurs.id 
     WHERE `id_article`= :id ORDER BY commentaires.date DESC LIMIT :premiercom,:parcom';
     $selectCommentaire= $this->bdd->prepare($sql);
     $selectCommentaire->bindValue(':id', (int) $id_article, PDO::PARAM_INT); 

     $selectCommentaire->bindValue(':premiercom', (int) $premiercom, PDO::PARAM_INT); 
     $selectCommentaire->bindValue(':parcom', (int) $parcom, PDO::PARAM_INT); 
     $selectCommentaire->execute();
     $selectCom = $selectCommentaire->fetchAll(PDO::FETCH_ASSOC);

     return $selectCom;
    }


}

// $commentaire= new Commentaire('','','');
// $commentaire->selectCommentaire(9,0,5);
 ?>