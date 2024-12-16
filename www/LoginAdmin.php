<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="Login" content="width=device-width, initial-scale=1.0">
    <title>Conexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex flex-column vh-100 justify-content-center">
        <div class="container text-center">
            <div class="row justify-content-center">
                <img class="col-2" src="https://www.kafeteomomes.fr/uploads/2016/10/logo.png" alt="logo de ka fête ô môme">
            </div>
            <div class="row justify-content-center">
                <form action="executable/verifLogin.php" method="post" class="d-flex flex-column col-6">
                    <p>Login</p>
                    <input class="mb-3 rounded" name="login" type="text" required="required">
                    <p>Mot de passe</p>
                    <input class="mb-3 rounded" name="mp" type="password" required="required">
                    <input class="rounded-pill" type="submit" value="conexion">
                </form>
            </div>
        </div>
    </div>
</body>
</html>