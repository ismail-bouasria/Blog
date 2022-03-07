<?php

class Categorie 
{
    private $id;
    public $nom;
    public $bdd;
   

    public function __construct($nom) 
    {
        $this->bdd= new PDO(
            "mysql:host=localhost;dbname=blog",
            "root",
            "");
        
            $this->nom = $nom;
    }
   

    //  Methode pour récuperer le nom selon l'id de la catégorie'
    public function getCategorie($id)
    {
        $getCategorie= $this->bdd->prepare(" SELECT `nom` FROM `categories` WHERE id=?");
        $getCategorie->execute([$id]);
        $getCategorie= $getCategorie->fetch();
        
        return $getCategorie['nom'];
    
    }

    //  Methode pour récuperer le 'id selon l'id de la catégorie'
    public function getCategorieId($id)
    {
        $getCategorieId= $this->bdd->prepare("SELECT `id` FROM `categories` WHERE id=?");
        $getCategorieId->execute([$id]);
        $getCategorieId= $getCategorieId->fetch();
        
        return $getCategorieId['id'];
    
    }

 // Méthode pour récuperer le nom et l'id des categorie
 public function getAllCategorie()
 {
          
      $getAll = $this->bdd->prepare("SELECT * FROM categories");
      $getAll->execute();
      $getAllCategorie= $getAll->fetchAll();     
      foreach ($getAllCategorie as $value) {
      echo '<option value="'.$value['id'].'">'.$value['nom'].'</option>';
     }
 } 
 
 
}

// $droit = new Droit('');
// $droit->getDroit('administrateur')

?>