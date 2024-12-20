<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ka'fête ô mômes - Connexion</title>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <main class="d-flex flex-column vh-100 justify-content-center">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <img class="col-4 col-lg-2 mb-3" src="img/logo.png" alt="Logo de l'association">
                </div>
                <div class="row justify-content-center">
                    <form action="executable/verificationLogin.php" method="POST" class="d-flex flex-column col-8 col-lg-3">
                        <div class="d-flex flex-column">
                            <label for="login">Identifiant :</label>
                            <input class="my-3 rounded text-center" id="login" name="login" type="text" required="required">
                        </div>
                        <div class="d-flex flex-column">
                            <label for="mdp">Mot de passe :</label>
                            <input class="my-3 rounded text-center" id="mdp" name="mdp" type="password" required="required">
                        </div>
                        <div>
                            <input class="my-3 btn btn-warning fw-bold px-4 py-2" type="submit" value="Se connecter">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>