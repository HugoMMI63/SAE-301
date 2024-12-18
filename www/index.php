<?php include("ressources/ressourcesCommunes.php"); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ka'fête ô mômes - Stages</title>
        <meta name="description" content="La Ka'fête ô mômes propose des stages de vacances scolaires pour vos enfants ! Située à Lyon, notre équipe s'engage à apporter de la joie et de la bonne humeur à chaque instant !">
        <meta name="keywords" content="Ka'fête ô mômes, association, stages, vacances scolaires, vacances, enfants, parents, familles, Lyon, équipe, animateurs">
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>

        <!-- Caroussel -->

        <section class="py-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.zupimages.net/up/24/51/od2a.jpg" class="d-block w-100 img-fluid" alt="Bannière 1">
                        <div class="carousel-caption d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h2 class="text-uppercase fw-bold text-warning">Vacances d'automne 2025 - Théâtre d'improvisation</h2>
                        <p class="lead">Plonge dans l'univers captivant du théâtre improvisé cet automne et libère ta créativité sur scène. Découvre des jeux scéniques drôles, dynamiques et pleins de surprises durant ce stage unique !</p>
                        <a href="details_stage.php?id=1" class="btn btn-warning fw-bold px-4 py-2"><button value="1" type="button" class="btn-yellow">DÉCOUVRIR LE STAGE</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.zupimages.net/up/24/51/qwd4.jpg" class="d-block w-100 img-fluid" alt="Bannière 2">
                    <div class="carousel-caption d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h2 class="text-uppercase fw-bold text-warning">Vacances d'automne 2025 - Découverte de la sérigraphie</h2>
                        <p class="lead">Découvre l'art fascinant de la sérigraphie cet automne et crée des œuvres uniques avec tes propres mains ! Laisse libre cours à ton imagination lors de ce stage créatif !</p>
                        <a href="details_stage.php?id=3" class="btn btn-warning fw-bold px-4 py-2"><button value="3" type="button" class="btn-yellow">DÉCOUVRIR LE STAGE</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.zupimages.net/up/24/51/h4zo.png" class="d-block w-100 img-fluid" alt="Bannière 3">
                    <div class="carousel-caption d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h2 class="text-uppercase fw-bold text-warning">Vacances d'été 2025 - Cuisine</h2>
                        <p class="lead">La Ka'fête ô mômes ouvre ses portes aux gourmands ! Cet été, mets la main à la pâte et explore l'art de la cuisine dans un stage gourmand et plein de saveurs ! Rejoins nous vite !</p>
                        <a href="details_stage.php?id=4" class="btn btn-warning fw-bold px-4 py-2"><button value="4" type="button" class="btn-yellow">DÉCOUVRIR LE STAGE</button></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <main>
            
        <!-- Section 1-adjectifs -->
        <section class="container my-5">
            <div class="row g-4">
                    <div class="col-md-6 d-flex align-items-center text-center">
                        <img src="img/encadre.png" alt="Icône montrant un groupe d'adultes" class="img-fluid me-3" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 class="text-primary fw-bold">Encadré</h4>
                            <p>Nos stages sont dirigés par des professionnels qualifiés, assurant un suivi personnalisé et un accompagnement de qualité pour vos enfants !</p>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center text-center">
                        <img src="img/pedagogique.png" alt="Icône montrant une ampoule" class="img-fluid me-3" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 class="text-primary fw-bold">Pédagogique</h4>
                            <p>Chaque activité est conçue pour stimuler la créativité et l'apprentissage des enfants, tout en respectant leur rythme et leurs besoins.</p>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center text-center">
                        <img src="img/securise.png" alt="Icône montrant un bouclier" class="img-fluid me-3" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 class="text-primary fw-bold">Sécurisé</h4>
                            <p>La sécurité de vos enfants est notre priorité. Nos lieux d'activités sont sécurisés et nous veillons à une surveillance constante pour garantir leur bien-être.</p>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center text-center">
                        <img src="img/ludique.png" alt="Icône montrant un ballon" class="img-fluid me-3" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 class="text-primary fw-bold">Ludique</h4>
                            <p>Les stages sont avant tout des moments de plaisir, où les enfants apprennent en s'amusant, dans une ambiance dynamique et conviviale.</p>
                        </div>
                    </div>
            </div>
        </section>

            <!-- Section 2-stages -->

            <section class="container my-5">
                <div class="row align-items-center">
                    <div class="col-md-6 text-start">
                        <h2 class="fw-bold text-stage mb-4">Les stages des vacances scolaires</h2>                
                        <p class="mb-3">Nos stages de vacances scolaires offrent à vos enfants une expérience unique alliant créativité, apprentissage et plaisir ! Animés par des professionnels passionnés, ces ateliers permettent aux jeunes de découvrir des activités ludiques et pédagogiques, telles que le théâtre ou encore la sérigraphie.</p>
                        <p class="mb-4">Chaque stage est conçu pour être sécurisé, épanouissant et adapté à l'âge de vos bouts de chou, leur offrant ainsi un cadre idéal pour grandir tout en s'amusant.</p>
                        <a href="nos_stages.php"><button class="btn btn-warning fw-bold px-4 py-2">DÉCOUVRIR NOS STAGES ></button></a>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src=https://www.zupimages.net/up/24/51/4l41.png alt="Image montrant des enfants qui s'amusent" class="img-fluid img-custom">
                    </div>
                </div>
            </section>

            <!-- Section 3-Animateurs -->

            <section class="container my-5">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        <img src=https://www.zupimages.net/up/24/51/zsi6.png alt="Image montrant notre équipe" class="img-fluid img-custom">
                    </div>
                    <div class="col-md-6 text-start">
                        <h2 class="fw-bold text-stage mb-4">L'équipe de la Ka'fête</h2>                
                        <p class="mb-3">Notre équipe d'animateurs est avant tout une grande famille de passionnés qui met un point d'honneur à créer une atmosphère bienveillante. Chaque membre est spécialement formé pour accompagner les enfants dans leur développement tout en favorisant leur créativité et leur épanouissement. Chacun apporte sa pierre personnelle à l'édifice Ka'fête ô mômes !</p>
                        <a href="nos_animateurs.php"><button class="btn btn-warning fw-bold px-4 py-2">DECOUVRIR NOS ANIMATEURS ></button></a>
                    </div>
                </div>
            </section>

            <!-- Section 4-Nous contacter -->

            <section class="container text-center my-5">
                <h2 class="text-stage mb-3">NOUS CONTACTER</h2>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid mb-4" style="max-width: 150px;">

                <div class="row justify-content-center gy-4">
                    <!-- E-mail -->

                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="mb-2">
                            <i class="bi bi-envelope-fill" style="font-size: 50px;"></i>
                        </div>
                        <h4 class="fw-bold">E-mail</h4>
                        <p class="text-muted">kafeteomomes@gmail.com</p>
                    </div>
                    <!-- Téléphone -->

                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="mb-2">
                            <i class="bi bi-telephone-fill" style="font-size: 50px;"></i>
                        </div>
                        <h4 class="fw-bold">Téléphone</h4>
                        <p class="text-muted">04.78.61.21.79</p>
                    </div>
                    <!-- Adresse -->

                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <!-- Icône pour l'adresse -->
                        
                        <div class="mb-2">
                            <i class="bi bi-geo-alt-fill" style="font-size: 50px;"></i>
                        </div>
                        <h4 class="fw-bold">Adresse</h4>
                        <p class="text-muted">53 Montée de la Grande Côte<br>69001, Lyon</p>
                    </div>
                </div>
            </section>

        </main>
        <?php include("navbars/footer.php"); ?>
    </body>
</html>