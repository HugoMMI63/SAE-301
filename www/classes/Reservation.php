<?php
// On récupère la classe mère "Personne"

require("Personne.php");

// Création de la classe "Reservation" (qui hérite de la classe "Personne")

class Reservation extends Personne {
    public $email = "";
    public $nom_prenom_RL = "";
    public $pb_medicaux = "";
    public $prescriptions = "";
    public $etat_paiement = 0;
    public $id_stage = 0;

    public function __construct($id, $nom, $prenom, $age, $telephone, $email, $nom_prenom_RL, $pb_medicaux, $prescriptions, $etat_paiement, $id_stage) {
        parent::__construct($id, $nom, $prenom, $age, $telephone);
        $this->email = $email;
        $this->nom_prenom_RL = $nom_prenom_RL;
        $this->pb_medicaux = $pb_medicaux;
        $this->prescriptions = $prescriptions;
        $this->etat_paiement = $etat_paiement;
        $this->id_stage = $id_stage;

        // On récupère les attributs (définits dans la BDD) et les valeurs actuelles => pour pouvoir les utiliser dans plusieurs méthodes (au lieu de les déclarer à chaque fois)

        $this->attributs = ["nom", "prenom", "age", "telephone", "email", "nom_prenom_RL", "pb_medicaux", "prescriptions", "etat_paiement", "id_stage"];
        $this->valeurs = [$this->nom, $this->prenom, $this->age, $this->telephone, $this->email, $this->nom_prenom_RL, $this->pb_medicaux, $this->prescriptions, $this->etat_paiement, $this->id_stage];
        $this->requete_ajouter = "INSERT INTO `reservation` (nom, prenom, age, telephone, email, nom_prenom_RL, pb_medicaux, prescriptions, etat_paiement, id_stage) VALUES (:nom, :prenom, :age, :telephone, :email, :nom_prenom_RL, :pb_medicaux, :prescriptions, :etat_paiement, :id_stage);";
        $this->requete_modifier = "UPDATE `reservation` SET nom = :nom, prenom = :prenom, age = :age, telephone = :telephone, email = :email, nom_prenom_RL = :nom_prenom_RL, pb_medicaux = :pb_medicaux, prescriptions = :prescriptions, etat_paiement = :etat_paiement, id_stage = :id_stage WHERE id = ".$this->id.";";
        $this->requete_supprimer = "DELETE FROM `reservation` WHERE id = ".$this->id.";";
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
        echo("Email : ".$this->email."<br>");
        echo("Nom et prénom du responsable légal : ".$this->nom_prenom_RL."<br>");
        echo("Problèmes médicaux : ".$this->pb_medicaux."<br>");
        echo("Prescriptions : ".$this->prescriptions."<br>");
        echo("État du paiement : ".$this->etat_paiement."<br>");
        echo("Stage réservé : ".$this->id_stage."<br>");
    }
}

// Récupération des animateurs depuis la BDD, conversion en tant qu'objets de la classe "Animateur" et tests des différentes méthodes

$resultats = $bdd_gestion_stages -> query("SELECT * FROM `reservation`;");
$donnees = $resultats -> fetchAll(PDO::FETCH_ASSOC);
$resultats -> closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$reservations = [];

foreach($donnees as $reservation) {
    $reservations[] = new Reservation(
        $reservation["id"],
        $reservation["nom"],
        $reservation["prenom"],
        $reservation["age"],
        $reservation["telephone"],
        $reservation["email"],
        $reservation["nom_prenom_RL"],
        $reservation["pb_medicaux"],
        $reservation["prescriptions"],
        $reservation["etat_paiement"],
        $reservation["id_stage"]
    );
}
?>