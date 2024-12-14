<?php
// On récupère la classe mère "Personne"

require("Personne.php");

// Création de la classe "Animateur" (qui hérite de la classe "Personne")

class Animateur extends Personne {
    public $description = "";
    public $photo = "";

    public function __construct($id, $nom, $prenom, $age, $telephone, $description, $photo) {
        parent::__construct($id, $nom, $prenom, $age, $telephone);
        $this->description = $description;
        $this->photo = $photo;

        // On récupère les attributs (définits dans la BDD) et les valeurs actuelles => pour pouvoir les utiliser dans plusieurs méthodes (au lieu de les déclarer à chaque fois)

        $this->attributs = ["nom", "prenom", "age", "telephone", "description", "photo"];
        $this->valeurs = [$this->nom, $this->prenom, $this->age, $this->telephone, $this->description, $this->photo];
        $this->requete_ajouter = "INSERT INTO `animateur` (nom, prenom, age, telephone, description, photo) VALUES (:nom, :prenom, :age, :telephone, :description, :photo);";
        $this->requete_modifier = "UPDATE `animateur` SET nom = :nom, prenom = :prenom, age = :age, telephone = :telephone, description = :description, photo = :photo WHERE id = ".$this->id.";";
        $this->requete_supprimer = "DELETE FROM `animateur` WHERE id = ".$this->id.";";
    }

    public function afficher() {
        if ($this->id == null) {
            echo("ID : Null <br>");
        }
        else {
            echo("ID : ".$this->id."<br>");
        }
        echo("Nom : ".$this->nom."<br>");
        echo("Prénom : ".$this->prenom."<br>");
        echo("Âge : ".$this->age."<br>");
        echo("Téléphone : ".$this->telephone."<br>");
        echo("Description : ".$this->description."<br>");
        echo("Photo : ".$this->photo."<br>");
    }
}

// Récupération des animateurs depuis la BDD, conversion en tant qu'objets de la classe "Animateur" et tests des différentes méthodes

$resultats = $bdd_gestion_stages -> query("SELECT * FROM `animateur`;");
$donnees = $resultats -> fetchAll(PDO::FETCH_ASSOC);
$resultats -> closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$animateurs = [];

foreach($donnees as $animateur) {
    $animateurs[] = new Animateur(
        $animateur["id"],
        $animateur["nom"],
        $animateur["prenom"],
        $animateur["age"],
        $animateur["telephone"],
        $animateur["description"],
        $animateur["photo"]
    );
}
?>