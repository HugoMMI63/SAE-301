<?php
// On récupère notre URL

$Url = $_SERVER['SCRIPT_NAME'];

// On prend depuis notre URL (seulement le nom du fichier avec son extension)

$fileName = basename($Url);
?>

<!-- Navigation mobile en dessous de 992px avec menu burger -->

<div class="container navMobile">
    <div class="row justify-content-between pe-3">
        <div class="col-3"><a href="index.php"><img class="w-100 h-100" src="https://www.kafeteomomes.fr/uploads/2016/10/logo.png" alt="Logo de l'association"></a></div>
        <div class="menuBurger col-2">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<div class="horsChamps shadow-lg navMobile">
    <?php 
    // Permet de savoir sur quelle page nous sommes (sans JS)

    if ($fileName == "index.php") {
    ?>
        <ul>
            <li><a class="nude" href="index.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">ACCUEIL</h6></div></a></li>
            <li><a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS STAGES</h6></div></a></li>
            <li><a class="nude" href="admin_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS ANIMATEURS</h6></div></a></li>
        </ul>
    <?php
    }
    elseif ($fileName == "nos_stages.php" || $fileName == "detailStage.php") {
        ?>
        <ul>
            <li><a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">ACCUEIL</h6></div></a></li>
            <li><a class="nude" href="nos_stages.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">NOS STAGES</h6></div></a></li>
            <li><a class="nude" href="admin_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS ANIMATEURS</h6></div></a></li>
        </ul>
        <?php
    }
    else {
    ?>
        <ul>
            <li> <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">ACCUEIL</h6></div></a></li>
            <li> <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS STAGES</h6></div></a></li>
            <li> <a class="nude" href="admin_animateurs.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">NOS ANIMATEURS</h6></div></a></li>
        </ul>
    <?php
    }
    ?>
</div>

<script src="js/scriptsNavbars.js"></script>

<!-- Navigation web avec menu standard -->

<div class="container text-center mt-5 navWeb d-none position-absolute">
    <div class="row justify-content-center">
        <div class="col-12 shadow-lg p-2 mb-5 bg-body-tertiary rounded-pill d-flex justify-content-between align-items-center pe-5 ps-5">
            <a class="nude" href="https://www.kafeteomomes.fr">
                <div class="d-flex  align-items-center">
                <img width="25" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAACA0lEQVR4nO3cu2tUQRhA8SOCFjYWERF8gCQqrgoiEoIK0XRqjKV/pa9GtLcRO0Es1DS+MIkm6wMTIjcsbEREzQw4zOfO+cH0H/dk927unXtBkiRJkiRJkiRJkiRJkiRVswPY7vGv7zDwAPg+XA+B87WHatU5YAXoflmrwIXaw7VmCuj/JsbmelR7wJZMAst/idENv7521R60BWeBj1vE2Ayys/awo+4M8CEhRjc80aug08BSYow+cMwa5ZwCFhJjfAGmjVHO4C/9XUaMi8Yo5yjwNiPGJWOUjfEmMcZXYMYY5RwBXifG+AZcNkY5ExkxVoErxihnHHiVEeOqMco5BMxnxJg1RjkHgZcZMa4Zo5wDwIuMGHPGKBvjeWKMNeB6wVmatz8jxjpwo/kjVtBe4KkxYtgHPEuMMWprBbgL9PgPPxmjvD4BJ2vH2AM8CXAwuiDrfs0Yu4HHAQ5CF2it1dxHZhBiBRkY8yuLn4PcIwBP6vw4qZ8giJZ/9i4Dd4DjBOM/hgF56SQgLy4G5OX3gLxBFZC3cANyk0NAbgMKyI1yAbmVNCA3Wwfk4wgB+cDOCDzS1qs9cAtyHvq8XXvYVqR+UhZrD9qSyYQXB3wGttUetCVTW7xaY3BnThVePtP/ww7BcLdJW9EDbg7PGe+BW8aQJEmSJEmSJEmSJEmSJEniH9sA55WtLsz50PAAAAAASUVORK5CYII=" alt="left">
                    <h6 class="m-0">REVENIR AU SITE WEB</h6>
                </div>
            </a>
            <img class="col-lg-1 col-3" src="https://www.kafeteomomes.fr/uploads/2016/10/logo.png" alt="logo de ka fête ô môme">
            <?php
            // Permet de savoir sur quelle page nous sommes sans JS

            if ($fileName == "index.php") {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">ACCUEIL</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS STAGES</h6></div></a>
                <a class="nude" href="admin_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS ANIMATEURS</h6></div></a>
                <?php
            }
            elseif ($fileName == "nos_stages.php" || $fileName == "detailStage.php") {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">ACCUEIL</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">NOS STAGES</h6></div></a>
                <a class="nude" href="admin_animateurs.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS ANIMATEURS</h6></div></a>
                <?php
            }
            else {
                ?>
                <a class="nude" href="index.php"><div class="rounded-4 p-3"><h6 class="mb-0">ACCUEIL</h6></div></a>
                <a class="nude" href="nos_stages.php"><div class="rounded-4 p-3"><h6 class="mb-0">NOS STAGES</h6></div></a>
                <a class="nude" href="admin_animateurs.php"><div class="rounded-4 text-decoration-underline p-3"><h6 class="mb-0">NOS ANIMATEURS</h6></div></a>
                <?php
            }
            ?>
            <a class="nude" href="">
                <div class="rounded-pill d-flex align-items-center fondJaune pe-2 ps-2 pt-3 pb-3">
                    <h6 class="mb-0 ms-3">S'INCRIRE A UN STAGE</h6>
                    <img width="25" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAABvUlEQVR4nO3du0okURRG4d/LmwijmbA3UvPMJgYihvoywiReMFAbgxahTUSxReyzhlofVL7pRZ2qZFcnkiRJP7Dlr8dwmOQ8yWOSRZLTJAejh5pzjPsky3fXbZJp9HBzdP5BjLfrziibtb06pj4LYpQBHr4IsvRO2ayTNYIsjbI5e6sHuFFAKsn1N6L8HT3wHBgFyChARgEyCpBRgIwCVL4S85RReMooPGUUnjIKTxmFp4zCU0bhKaPwlFF4yig8ZRSeMgpPGYWnjMJTRuEpo/CUUXjKKDxlFJ4yCk8ZhaeMwlNG4Smj8JRReMooPNNqQ2udTa7XNbw/oweeg+kbUY5HDzsXtebx9W/0oHPRSW7WCHI1etA5mDyyOCYf6v/fMbX0qxK/zxgg7Z3B0cbgaGNwtDE42hgcbQyONgZHG4OjjcHRxuBoY3C0MTjaGBxtDI42Bkcbg6ONwdHG4GhjcLQxONoYHG0MjjYGRxuDo43BYQwQY4AYA8QYIMYAMQaIMUD2/etVljPXyDh2kizc6ePYTfLsgiXLpduuLEdJHj/5uMvr3rgGRblYHV9PSU790g7nIb89eghJkqT8lhfcmbLovD1dtwAAAABJRU5ErkJggg==" alt="forward--v1">
                </div>
            </a>
        </div>
    </div>
</div>