<?php 
// On se connecte à la base de données

require("config/config.php");

try {
  $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo "Échec lors de la connexion : ".$e->getMessage();
}

/* Récupération des stages par ordre décroissant (en fonction de l'ID) */

$requete = 'SELECT * FROM `stage` order by id DESC';
$resultats = $dbh->query($requete);
$stages = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$nb_stages = count($stages);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nos stages</title>
        <?php include "navbars/liensCommuns.php";?>
    </head>
    <body>
        <?php include "navbars/navbarUtilisateur.php";?>

        <main>
            <h1>NOS STAGES</h1>
            <img src="img/barre-sep.png" alt="Barre de séparation">
            
            <section>
            <!-- Boucle pour afficher l'ensemble des stages -->

                <?php for ($i = 0; $i < $nb_stages; $i++) {
                    // Requête pour récupérer le nombre d'enfants inscrit au stage en question grâce à l'id

                    $requete = 'SELECT COUNT(*) FROM `reservation` WHERE id_stage ='.$stages[$i]['id'];
                    $resultats = $dbh->query($requete);
                    $nbparticipant = $resultats->fetchAll(PDO::FETCH_ASSOC);
                    $resultats->closeCursor();?>
                    <div>
                    <h2><?php echo $stages[$i]['titre']; ?></h2>
                    <?php echo "<img src=".$stages[$i]['miniature']." alt='Miniature du stage' style='width: 300px; height: auto;'>";
                    echo "<p>".$nbparticipant[0]['COUNT(*)']."/".$stages[$i]['nb_places']." places restantes</p>";
                    echo "<p>".$stages[$i]['date']."</p>";?>
                    <p><strong>Description :</strong> <?php echo $stages[$i]['description']; ?></p>
                    <!-- Bouton avec un ID unique -->
                    <a href="detailStage.php?id=<?php echo $stages[$i]['id']; ?>"><button id="<?php echo $stages[$i]['id']; ?>">Voir plus</button></a>
                    </div>
                <?php }?>
            </section>
        <main>
    <!-- Ajout du footer -->

    </body>
</html>
