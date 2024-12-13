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

    public function __construct($nom, $prenom, $age, $telephone, $email, $nom_prenom_RL, $pb_medicaux, $prescriptions, $etat_paiement) {
        parent::__construct($nom, $prenom, $age, $telephone);
        $this->email = $email;
        $this->nom_prenom_RL = $nom_prenom_RL;
        $this->pb_medicaux = $pb_medicaux;
        $this->prescriptions = $prescriptions;
        $this->etat_paiement = $etat_paiement;
    }

    public function afficher() {
        echo($this->nom." ".$this->prenom." ".$this->age." ".$this->telephone." ".$this->email." ".$this->nom_prenom_RL." ".$this->pb_medicaux." ".$this->prescriptions." ".$this->etat_paiement);
    }
}
?>