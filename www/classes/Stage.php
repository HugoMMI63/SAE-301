<?php
// On se connecte à la base de données

//require("../config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

// Création de la classe "Stage"

class Stage {
    public $id = null;
    public $miniature = "";
    public $titre = "";
    public $date = "";
    public $horaire_debut = "";
    public $horaire_fin = "";
    public $description = "";
    public $nb_places = 0;
    public $lieu = "";
    public $tarif_min = 0;
    public $tarif_max = 0;
    public $id_categorie = 0;

    public function __construct($id, $miniature, $titre, $date, $horaire_debut, $horaire_fin, $description, $nb_places, $lieu, $tarif_min, $tarif_max, $id_categorie) {
        $this->id = $id;
        $this->miniature = $miniature;
        $this->titre = $titre;
        $this->date = $date;
        $this->horaire_debut = $horaire_debut;
        $this->horaire_fin = $horaire_fin;
        $this->description = $description;
        $this->nb_places = $nb_places;
        $this->lieu = $lieu;
        $this->tarif_min = $tarif_min;
        $this->tarif_max = $tarif_max;
        $this->id_categorie = $id_categorie;

        // On récupère les attributs (définits dans la BDD) et les valeurs actuelles => pour pouvoir les utiliser dans plusieurs méthodes (au lieu de les déclarer à chaque fois)

        $this->attributs = ["miniature", "titre", "date", "horaire_debut", "horaire_fin", "description", "nb_places", "lieu", "tarif_min", "tarif_max", "id_categorie"];
        $this->valeurs = [$this->miniature, $this->titre, $this->date, $this->horaire_debut, $this->horaire_fin, $this->description, $this->nb_places, $this->lieu, $this->tarif_min, $this->tarif_max, $this->id_categorie];
    }

    public function afficher() {
        if ($this->id == null) {
            echo("ID : Null <br>");
        }
        else {
            echo("ID : ".$this->id."<br>");
        }
        echo("Miniature : ".$this->miniature."<br>");
        echo("Titre : ".$this->titre."<br>");
        echo("Date : ".$this->date."<br>");
        echo("Horaire (Début) : ".$this->horaire_debut."<br>");
        echo("Horaire (Fin) : ".$this->horaire_fin."<br>");
        echo("Description : ".$this->description."<br>");
        echo("Nombre de places : ".$this->nb_places."<br>");
        echo("Lieu : ".$this->lieu."<br>");
        echo("Tarif (minimum) : ".$this->tarif_min."<br>");
        echo("Tarif (maximum) : ".$this->tarif_max."<br>");
        echo("Catégorie : ".$this->id_categorie."<br>");
    }

    public function ajouterBDD() {
        /* On réalise une requête préparée (en utilisant la variable globale "$bdd_gestion_stages") mais uniquement si :
        - L'attribut "id" est égal à "null"
        */

        if ($this->id == null) {
            $requete_preparee = $GLOBALS["bdd_gestion_stages"]->prepare("INSERT INTO `stage` (miniature, titre, date, horaire_debut, horaire_fin, description, nb_places, lieu, tarif_min, tarif_max, id_categorie) VALUES (:miniature, :titre, :date, :horaire_debut, :horaire_fin, :description, :nb_places, :lieu, :tarif_min, :tarif_max, :id_categorie);");
            
            for ($index = 0; $index < count($this->attributs); $index = $index + 1) {
                if ($this->attributs[$index] == "nb_places" || $this->attributs[$index] == "tarif_min" || $this->attributs[$index] == "tarif_max" || $this->attributs[$index] == "id_categorie") {
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
                header("Location: ../redirection.php?raison=requete_erreur&contexte=stages&action=ajouter");
            }
            else {
                header("Location: ../redirection.php?raison=requete_reussie&contexte=stages&action=ajouter");
            }
            exit();
        }
        else {
            header("Location: ../redirection.php?raison=requete_erreur&contexte=stages&action=ajouter");
            exit();
        }
    }

    public function modifierBDD($tab_valeurs, $animateurs_selectionnes) {
        // Inclusion du fichier de configuration
        include_once('../config/config.php'); 
    
        global $dbh;
    
        if (!$dbh) {
            echo 'Échec lors de la connexion à la base de données';
            return;
        }
    
        // Vérifie si l'attribut "id" n'est pas null et si le nombre d'éléments dans $tab_valeurs correspond à celui attendu
        if ($this->id != null && count($tab_valeurs) == count($this->attributs)) {
    
            // Crée la requête SQL préparée pour la mise à jour des informations du stage
            $requete_preparee = $dbh->prepare("
                UPDATE `stage` 
                SET miniature = :miniature, 
                    titre = :titre, 
                    date = :date, 
                    horaire_debut = :horaire_debut, 
                    horaire_fin = :horaire_fin, 
                    description = :description, 
                    nb_places = :nb_places, 
                    lieu = :lieu, 
                    tarif_min = :tarif_min, 
                    tarif_max = :tarif_max, 
                    id_categorie = :id_categorie 
                WHERE id = :id
            ");
    
            // Lier les paramètres à partir du tableau associatif
            $requete_preparee->bindValue(":id", $this->id, PDO::PARAM_INT);
            $requete_preparee->bindValue(":id_categorie", $tab_valeurs['id_categorie'], PDO::PARAM_INT);
            $requete_preparee->bindValue(":miniature", $tab_valeurs['miniature'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":titre", $tab_valeurs['titre'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":date", $tab_valeurs['date'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":horaire_debut", $tab_valeurs['horaire_debut'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":horaire_fin", $tab_valeurs['horaire_fin'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":description", $tab_valeurs['description'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":nb_places", $tab_valeurs['nb_places'], PDO::PARAM_INT);
            $requete_preparee->bindValue(":lieu", $tab_valeurs['lieu'], PDO::PARAM_STR);
            $requete_preparee->bindValue(":tarif_min", $tab_valeurs['tarif_min'], PDO::PARAM_INT);
            $requete_preparee->bindValue(":tarif_max", $tab_valeurs['tarif_max'], PDO::PARAM_INT);
    
            // Supprimer les anciennes associations d'animateurs
            $requete_delete = "DELETE FROM anime WHERE id_stage = :id_stage";
            $stmt = $dbh->prepare($requete_delete);
            $stmt->bindParam(':id_stage', $this->id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Insérer les nouveaux animateurs associés au stage
            foreach ($animateurs_selectionnes as $id_animateur) {
                $requete_insert = "INSERT INTO anime (id_stage, id_animateur) VALUES (:id_stage, :id_animateur)";
                $stmt = $dbh->prepare($requete_insert);
                $stmt->bindParam(':id_stage', $this->id, PDO::PARAM_INT);
                $stmt->bindParam(':id_animateur', $id_animateur, PDO::PARAM_INT);
                $stmt->execute();
            }
    
            // Exécuter la requête de mise à jour du stage
            $etat = $requete_preparee->execute();
            
            // L'administrateur est automatiquement redirigé vers la page "redirection.php" avec un message lié à la raison de la redirection (échec ou réussite)

            if ($etat == 0) {
                header("Location: ../redirection.php?raison=requete_erreur&contexte=stages&action=modifier");
            }
            else {
                header("Location: ../redirection.php?raison=requete_reussie&contexte=stages&action=modifier");
            }
            exit();
        }
        else {
            header("Location: ../redirection.php?raison=requete_erreur&contexte=stages&action=modifier");
            exit();
        }
    }

    public function supprimerBDD() {
        /* On réalise une requête préparée (en utilisant la variable globale "$bdd_gestion_stages") mais uniquement si :
        - L'attribut "id" est différent de "null"
        */

        if ($this->id != null) {
            $requete_preparee = $GLOBALS["bdd_gestion_stages"]->prepare("DELETE FROM `stage` WHERE id = ".$this->id.";");

            // On exécute la requête préparée et on stocke l'état de cette-dernière (1 = réussie, 0 = échec)

            $etat = $requete_preparee->execute();
            exit();
        }
        else {
            header("Location: ../redirection.php?raison=requete_erreur&contexte=stages&action=supprimer");
            exit();
        }
    }
}

// Récupération des stages depuis la BDD, conversion en tant qu'objets de la classe "Stage" et tests des différentes méthodes

$resultats = $bdd_gestion_stages->query("SELECT * FROM `stage`;");
$donnees = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$stages = [];

foreach($donnees as $stage) {
    $stages[] = new Stage(
        $stage["id"],
        $stage["miniature"],
        $stage["titre"],
        $stage["date"],
        $stage["horaire_debut"],
        $stage["horaire_fin"],
        $stage["description"],
        $stage["nb_places"],
        $stage["lieu"],
        $stage["tarif_min"],
        $stage["tarif_max"],
        $stage["id_categorie"]
    );
}
?>
