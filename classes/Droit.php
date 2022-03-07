<?php

class Droit 
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
   

    //  Methode pour récuperer les droits
    public function getDroit($nom)
    {
        $getDroit= $this->bdd->prepare(" SELECT `id` FROM `droits` WHERE nom=?");
        $getDroit->execute([$nom]);
        $getDroit= $getDroit->fetch();
        
        return $getDroit['id'];
    
    }


 
}

// $droit = new Droit('');
// $droit->getDroit('administrateur')

?>
