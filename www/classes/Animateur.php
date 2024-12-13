<?php
// On récupère la classe mère "Personne"

require("Personne.php");

// Création de la classe "Animateur" (qui hérite de la classe "Personne")

class Animateur extends Personne {
    public $description = "";
    public $photo = "";

    public function __construct($nom, $prenom, $age, $telephone, $description, $photo) {
        parent::__construct($nom, $prenom, $age, $telephone);
        $this->description = $description;
        $this->photo = $photo;

        // On récupère les attributs (définits dans la BDD) et les valeurs actuelles => pour pouvoir les utiliser dans plusieurs méthodes (au lieu de les déclarer à chaque fois)

        $this->attributs = ["nom", "prenom", "age", "telephone", "description", "photo"];
        $this->valeurs = [$this->nom, $this->prenom, $this->age, $this->telephone, $this->description, $this->photo];
    }

    public function afficher() {
        echo($this->nom." ".$this->prenom." ".$this->age." ".$this->telephone." ".$this->description." ".$this->photo);
    }

    public function ajouter() {
        // On réalise une requête préparée (en utilisant la variable globale "$bdd_gestion_stages") => Ajouter

        $requete_preparee = $GLOBALS["bdd_gestion_stages"]->prepare("INSERT INTO `animateur` (nom, prenom, age, telephone, description, photo) VALUES (:nom, :prenom, :age, :telephone, :description, :photo);");

        for ($index = 0; $index < count($this->attributs); $index = $index + 1) {
            if ($this->attributs[$index] == "age") {
                $requete_preparee->bindValue(":".$this->attributs[$index], $this->valeurs[$index], PDO::PARAM_INT);
            }
            else {
                $requete_preparee->bindValue(":".$this->attributs[$index], $this->valeurs[$index], PDO::PARAM_STR);
            }
        }

        // On exécute la requête préparée et on stocke l'état de cette-dernière (1 = réussie, 0 = échec)

        $etat = $requete_preparee->execute();

        // Si la requête échoue, l'administrateur est automatiquement redirigé vers la page "redirection.php"

        if ($etat == 0) {
            header("Location: ../redirection.php?raison=requete_erreur");
        }
        else {
            header("Location: ../redirection.php?raison=requete_reussie");
        }
        exit();
    }
}

// Test de l'instanciation et des différentes méthodes

$test = new Animateur("nom", "prenom", 25, "0647541214", "description", "photo.png");
$test->afficher();
$test->ajouter();
?>