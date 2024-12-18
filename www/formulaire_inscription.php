<?php
// On se connecte à la base de données

require("config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

$resultats = $bdd_gestion_stages->query("SELECT * FROM `categorie`;");
$donnees = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <?php include("ressources/ressourcesCommunes.php");?>
</head>
<body>
    <header><?php include("navbars/navbarutilisateur.php");?></header>
    <main class="container d-flex flex-column">
        <form action="" method="get">
            <section class="d-flex flex-column col-8 ms-5">
                <h3 class="font">Responsable Legal</h3>
                <label for="NomPrenom">Nom/Prenom</label>
                <input class="m-3" type="text" placeholder="Nom et Prénom" name="NomPrenom" id="NomPrenom">
                <label for="tel">Téléphone</label>
                <input class="m-3" type="tel" placeholder="xx xx xx xx xx" name="mail" id="mail">
                <label for="mail">Mail</label>
                <input class="m-3" type="email" placeholder="" name="mail" id="mail">
                <label for="tel">Salaire du foyer net</label>
                <input class="m-3" type="number" placeholder="" name="" id="">
                <label for="tel">Nombre d'enfants a inscrire</label>
                <input class="m-3" type="number" placeholder="1" name="nbenfant" id="nbenfant">
                <input class="m-3" type="Button" value="Suivant">
            </section>

            <section class="d-flex flex-column col-8 ms-5">
                <h3 class="font">L'enfant</h3>
                <label for="Nom">Nom</label>
                <input class="m-3" type="text" placeholder="Nom et Prénom" name="Nom" id="Nom">
                <label for="Prenom">Prenom</label>
                <input class="m-3" type="text" placeholder="Nom et Prénom" name="Prenom" id="Prenom">
                <label for="age">Age</label>
                <input class="m-3" type="number" placeholder="Age" name="age" id="age">
                <div>
                <label for="id_categorie">Catégorie :</label>
                    <select id="id_categorie" name="id_categorie" required="required">
                        <?php
                        for ($index = 0; $index < count($donnees); $index = $index + 1) {
                            echo("<option value='".$donnees[$index]["id"]."'>".$donnees[$index]["intitule"]."</option>");
                        }
                        ?>
                    </select>
                </div>
                <label for="mail">Mail</label>
                <input class="m-3" type="email" placeholder="" name="mail" id="mail">
            </section>
        </form>
    </main>
    <?php include("navbars/footer.php");?>
</body>
</html>