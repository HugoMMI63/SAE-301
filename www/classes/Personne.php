<?php
// On se connecte à la base de données

require("../config/config.php");
$bdd_gestion_stages = new PDO("mysql:host=".$hote."; port=".$port."; dbname=".$nom_bdd, $identifiant, $mot_de_passe, $options);

// Création de la classe "Personne"

class Personne {
    public $nom = "";
    public $prenom = "";
    public $age = 0;
    public $telephone = "";

    public function __construct($nom, $prenom, $age, $telephone) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->telephone = $telephone;
    }

    public function afficher() {
        echo($this->nom." ".$this->prenom." ".$this->age." ".$this->telephone);
    }
}
?>