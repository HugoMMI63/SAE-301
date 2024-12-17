<?php
// On se connecte à la base de données

//require("../config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

// Création de la classe "Personne"

class Personne {
    public $id = null;
    public $nom = "";
    public $prenom = "";
    public $age = 0;
    public $telephone = "";

    public function __construct($id, $nom, $prenom, $age, $telephone) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->telephone = $telephone;

        /* On ajoute des attributs permettant d'identifier les champs nécessaires à leur ajout, modification et suppression dans la BDD
        L'objectif est d'éviter de devoir déclarer pour chaque classe fille une fonction "ajouter", "modifier" et "supprimer"
        => On les déclare une seule fois (sur la classe mère)
        */

        $this->attributs = [];
        $this->valeurs = [];
        $this->requete_ajouter = "";
        $this->requete_modifier = "";
        $this->requete_supprimer = "";
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
    }

    public function ajouterBDD() {
        /* On réalise une requête préparée (en utilisant la variable globale "$bdd_gestion_stages") mais uniquement si :
        - L'attribut "id" est égal à "null"
        - L'attribut "requete_ajouter" contient une chaîne de caractères
        */

        if ($this->id == null && $this->requete_ajouter != "") {
            $requete_preparee = $GLOBALS["bdd_gestion_stages"]->prepare($this->requete_ajouter);

            for ($index = 0; $index < count($this->attributs); $index = $index + 1) {
                if ($this->attributs[$index] == "age" || $this->attributs[$index] == "etat_paiement" || $this->attributs[$index] == "id_stage") {
                    $requete_preparee->bindValue(":".$this->attributs[$index], $this->valeurs[$index], PDO::PARAM_INT);
                }
                else {
                    $requete_preparee->bindValue(":".$this->attributs[$index], $this->valeurs[$index], PDO::PARAM_STR);
                }
            }

            // On exécute la requête préparée et on stocke l'état de cette-dernière (1 = réussie, 0 = échec)

            $etat = $requete_preparee->execute();

            // L'administrateur est automatiquement redirigé vers la page "redirection.php" avec un message lié à la raison de la redirection (échec ou réussite)

            if ($etat == 0) {
                header("Location: ../redirection.php?raison=requete_erreur");
            }
            else {
                header("Location: ../redirection.php?raison=requete_reussie");
            }
            exit();
        }
        else {
            header("Location: ../redirection.php?raison=requete_erreur");
            exit();
        }
    }

    public function modifierBDD($tab_valeurs) {
        /* On réalise une requête préparée (en utilisant la variable globale "$bdd_gestion_stages") mais uniquement si :
        - L'attribut "id" est différent de "null"
        - L'attribut "requete_modifier" contient une chaîne de caractères
        - La taille de la liste rentrée en paramètre est égale à celle du nombre de valeurs attendu
        */

        if ($this->id != null && $this->requete_ajouter != "" && count($tab_valeurs) == count($this->attributs)) {
            $requete_preparee = $GLOBALS["bdd_gestion_stages"]->prepare($this->requete_modifier);

            for ($index = 0; $index < count($this->attributs); $index = $index + 1) {
                if ($this->attributs[$index] == "age" || $this->attributs[$index] == "etat_paiement" || $this->attributs[$index] == "id_stage") {
                    $requete_preparee->bindValue(":".$this->attributs[$index], $tab_valeurs[$index], PDO::PARAM_INT);
                }
                else {
                    $requete_preparee->bindValue(":".$this->attributs[$index], $tab_valeurs[$index], PDO::PARAM_STR);
                }
            }

            // On exécute la requête préparée et on stocke l'état de cette-dernière (1 = réussie, 0 = échec)

            $etat = $requete_preparee->execute();

            // L'administrateur est automatiquement redirigé vers la page "redirection.php" avec un message lié à la raison de la redirection (échec ou réussite)

            if ($etat == 0) {
                header("Location: ../redirection.php?raison=requete_erreur");
            }
            else {
                header("Location: ../redirection.php?raison=requete_reussie");
            }
            exit();
        }
        else {
            header("Location: ../redirection.php?raison=requete_erreur");
            exit();
        }
    }

    public function supprimerBDD() {
        /* On réalise une requête préparée (en utilisant la variable globale "$bdd_gestion_stages") mais uniquement si :
        - L'attribut "id" est différent de "null"
        - L'attribut "requete_supprimer" contient une chaîne de caractères
        */

        if ($this->id != null && $this->requete_ajouter != "") {
            $requete_preparee = $GLOBALS["bdd_gestion_stages"]->prepare($this->requete_supprimer);

            // On exécute la requête préparée et on stocke l'état de cette-dernière (1 = réussie, 0 = échec)

            $etat = $requete_preparee->execute();

            // L'administrateur est automatiquement redirigé vers la page "redirection.php" avec un message lié à la raison de la redirection (échec ou réussite)

            if ($etat == 0) {
                header("Location: ../redirection.php?raison=requete_erreur");
            }
            else {
                header("Location: ../redirection.php?raison=requete_reussie");
            }
            exit();
        }
        else {
            header("Location: ../redirection.php?raison=requete_erreur");
            exit();
        }
    }
}
?>