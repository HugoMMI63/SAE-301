<?php
// On récupère notre URL

$Url = $_SERVER['SCRIPT_NAME'];

// On prend depuis notre URL (seulement le nom du fichier avec son extension)

$fileName = basename($Url);
?>

<!-- Navigation mobile en dessous de 992px avec menu burger -->

<div class="container navMobile">
    <div class="row justify-content-between pe-3">
        <div class="col-3"><a href="index.php"><img class="w-100 h-100" src="img/logo.png" alt="Logo de l'association"></a></div>
        <div class="menuBurger col-2">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<div class="horsChamps shadow-lg navMobile font">
    <?php 
    // Permet de savoir sur quelle page nous sommes (sans JS)

    if ($fileName == "index.php" || $fileName == "mentions_legales.php" || $fileName == "politique_confidentialite.php") {
    ?>
        <ul>
            <li><a class="nude" href="index.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">Accueil</h6></div></a></li>
            <li><a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos stages</h6></div></a></li>
            <li><a class="nude" href="nos_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos animateurs</h6></div></a></li>
        </ul>
    <?php
    }
    elseif ($fileName == "nos_stages.php" || $fileName == "details_stage.php") {
        ?>
        <ul>
            <li><a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">Accueil</h6></div></a></li>
            <li><a class="nude" href="nos_stages.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">Nos stages</h6></div></a></li>
            <li><a class="nude" href="nos_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos animateurs</h6></div></a></li>
        </ul>
        <?php
    }
    else {
    ?>
        <ul>
            <li> <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">Accueil</h6></div></a></li>
            <li> <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos stages</h6></div></a></li>
            <li> <a class="nude" href="nos_animateurs.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">Nos animateurs</h6></div></a></li>
        </ul>
    <?php
    }
    ?>
    <a class="nude" href="formulaire_inscription.php">
                <div class="rounded-pill d-flex align-items-center fondJaune pe-2 ps-2 pt-3 pb-3">
                    <h6 class="mb-0 ms-3">S'inscrire à un stage</h6>
                    <img width="25" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAABvUlEQVR4nO3du0okURRG4d/LmwijmbA3UvPMJgYihvoywiReMFAbgxahTUSxReyzhlofVL7pRZ2qZFcnkiRJP7Dlr8dwmOQ8yWOSRZLTJAejh5pzjPsky3fXbZJp9HBzdP5BjLfrziibtb06pj4LYpQBHr4IsvRO2ayTNYIsjbI5e6sHuFFAKsn1N6L8HT3wHBgFyChARgEyCpBRgIwCVL4S85RReMooPGUUnjIKTxmFp4zCU0bhKaPwlFF4yig8ZRSeMgpPGYWnjMJTRuEpo/CUUXjKKDxlFJ4yCk8ZhaeMwlNG4Smj8JRReMooPNNqQ2udTa7XNbw/oweeg+kbUY5HDzsXtebx9W/0oHPRSW7WCHI1etA5mDyyOCYf6v/fMbX0qxK/zxgg7Z3B0cbgaGNwtDE42hgcbQyONgZHG4OjjcHRxuBoY3C0MTjaGBxtDI42Bkcbg6ONwdHG4GhjcLQxONoYHG0MjjYGRxuDo43BYQwQY4AYA8QYIMYAMQaIMUD2/etVljPXyDh2kizc6ePYTfLsgiXLpduuLEdJHj/5uMvr3rgGRblYHV9PSU790g7nIb89eghJkqT8lhfcmbLovD1dtwAAAABJRU5ErkJggg==" alt="forward--v1">
                </div>
    </a>
</div>

<script src="js/scriptsNavbars.js"></script>

<!-- Navigation web avec menu standard -->

<div class="container text-center mt-5 navWeb d-none font">
    <div class="row shadow-lg p-2 mb-5 bg-body-tertiary rounded-pill d-flex justify-content-between align-items-center pe-5 ps-5">
        <div class="col-3">
            <a class="nude" href="https://www.kafeteomomes.fr">
                <div class="d-flex gap-1 align-items-center">
                    <i class="iconFleche bi bi-arrow-left"></i>
                    <h6 class="m-0">Revenir au site web</h6>
                </div>
            </a>
        </div>
        <a class="col-1" href="index.php"><img class="w-100" src="img/logo.png" alt="Logo de l'association"></a>
        <div class="col-5 d-flex justify-content-center align-items-center gap-3">
            <?php
            // Permet de savoir sur quelle page nous sommes sans JS

            if ($fileName == "index.php" || $fileName == "mentions_legales.php" || $fileName == "politique_confidentialite.php") {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">Accueil</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos stages</h6></div></a>
                <a class="nude" href="nos_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos animateurs</h6></div></a>
                <?php
            }
            elseif ($fileName == "nos_stages.php" || $fileName == "details_stage.php") {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">Accueil</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">Nos stages</h6></div></a>
                <a class="nude" href="nos_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos animateurs</h6></div></a>
                <?php
            }
            elseif ($fileName == "formulaire_inscription.php") {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">Accueil</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos stages</h6></div></a>
                <a class="nude" href="nos_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos animateurs</h6></div></a>
                <?php
            }
            else {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">Accueil</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">Nos stages</h6></div></a>
                <a class="nude" href="nos_animateurs.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">Nos animateurs</h6></div></a>
                <?php
            }
            ?>
        </div>
        <div class="col-3">
            <a class="nude" href="formulaire_inscription.php">
                <div class="rounded-pill d-flex align-items-center justify-content-center fondJaune pe-2 ps-2 pt-3 pb-3">
                    <h6 class="mb-0 ms-3">S'inscrire à un stage</h6>
                    <i class="iconNoir bi bi-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>
</div>