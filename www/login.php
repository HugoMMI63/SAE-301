<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="d-flex flex-column vh-100 justify-content-center">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <img class="col-2" src="https://www.kafeteomomes.fr/uploads/2016/10/logo.png" alt="Logo de l'association">
                </div>
                <div class="row justify-content-center">
                    <form action="executable/verificationLogin.php" method="POST" class="d-flex flex-column col-6">
                        <div class="d-flex flex-column">
                            <label for="login">Login :</label>
                            <input class="mb-3 rounded" id="login" name="login" type="text" required="required">
                        </div>
                        <div class="d-flex flex-column">
                            <label for="mdp">Mot de passe :</label>
                            <input class="mb-3 rounded" id="mdp" name="mdp" type="password" required="required">
                        </div>
                        <div>
                            <input class="rounded-pill" type="submit" value="Se connecter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>