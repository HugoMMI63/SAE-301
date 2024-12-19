<?php
if (isset($_GET['id'])) {
    $id_resa = $_GET['id'];
    $idStage=$_GET['id_stage'];

    // Connexion à la base de données
    require("../config/config.php");

    try {
        $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete='SELECT * FROM `reservation` WHERE id='.$id_resa;
        $res=$dbh->query($requete);
        $reservation_data=$res->fetch(PDO::FETCH_ASSOC);
        $res->closeCursor();

         // Si des données ont été récupérées
        if ($reservation_data) {
            // Créer une instance de la classe Reservation
            require_once("../classes/Reservation.php");

            // Crée l'objet Reservation avec les valeurs retournées par la requête
            $reservation = new Reservation(
                $reservation_data['id'],            
                $reservation_data['nom'],           
                $reservation_data['prenom'],        
                $reservation_data['age'],          
                $reservation_data['telephone'],     
                $reservation_data['email'],         
                $reservation_data['nom_prenom_RL'], 
                $reservation_data['pb_medicaux'],    
                $reservation_data['prescriptions'],  
                $reservation_data['etat_paiement'],  
                $reservation_data['id_stage']        
            );

            // Préparer les valeurs à passer à la méthode modifierBDD
            $tab_valeurs = array(
                $reservation_data['nom'],
                $reservation_data['prenom'],
                $reservation_data['age'],
                $reservation_data['telephone'],
                $reservation_data['email'],
                $reservation_data['nom_prenom_RL'],
                $reservation_data['pb_medicaux'],
                $reservation_data['prescriptions'],
                // On met l'état du paiement à 1 ce qui veut dire que le paiement est validé
                1, 
                $reservation_data['id_stage']
            );

            // Appeler la méthode modifierBDD 
            $reservation->modifierBDD($tab_valeurs);  
            // Rediriger après avoir modifié la base de données
            header("Location: ../admin_details_stage.php?id=".$idStage); 
            exit(); 
    
        } else {
            echo "Aucune réservation trouvée pour cet ID.";
        }
    }
    catch (PDOException $e) {
        echo 'Échec lors de la connexion : '.$e->getMessage();
    }

}
else {
    header("Location: ../redirection.php?raison=requete_erreur");
    exit();
}
?>
