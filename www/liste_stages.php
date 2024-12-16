<?php 
// pour se connecter à la base de données
include("config/config.php");

// connection
try {
  $dbh = new PDO($dsn, $identifiant, $mot_de_passe,$options);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Échec lors de la connexion : ' . $e->getMessage();
}

/* Récupération des Stage par ordre décroissant */
$requete='SELECT * FROM stage order by id DESC';
$resultats= $dbh -> query($requete);
$stage = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats -> closeCursor();

$nbstage=count($stage);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste stage</title>
  <?php include("navbars/liensCommuns.php");?>
</head>
<body>
  <?php include("navbars/navbarUtilisateur.php");?>
  <main>
    <h1>NOS STAGES</h1>
    <img src="Images/barre-sep.png" alt="barre séparation">
    
    <section>
      <!-- Boucle pour afficher l'ensemble des stages -->
      <?php for ($i=0; $i<$nbstage; $i++){
        // Requête pour récupérer le nombre d'enfants inscrit au stage en question grâce à l'id
        $requete='SELECT COUNT(*) FROM reservation WHERE id_stage ='.$stage[$i]['id'];
        $resultats= $dbh -> query($requete);
        $nbparticipant = $resultats->fetchAll(PDO::FETCH_ASSOC);
        $resultats -> closeCursor();?>
        <div>
          <h2><?php echo $stage[$i]['titre']; ?></h2>
          <?php echo "<img src=".$stage[$i]['miniature']." alt='Image du stage' style='width: 300px; height: auto;'>";
          echo "<p>".$nbparticipant[0]['COUNT(*)']."/".$stage[$i]['nb_places']." places restantes</p>";
          echo "<p>".$stage[$i]['date']."</p>";?>
          <p><strong>Description:</strong> <?php echo $stage[$i]['description']; ?></p>
          <!-- Bouton avec un ID unique -->
          <a href="detailstage.php?id=<?php echo $stage[$i]['id']; ?>"><button id="<?php echo $stage[$i]['id']; ?>">Voir plus</button></a>
        </div>
      <?php }?>
    </section>
  <main>
  <!-- Ajout du footer -->
</body>
</html>
