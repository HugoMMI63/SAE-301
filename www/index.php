<?php include("ressources/ressourcesCommunes.php"); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil</title>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>

        <!-- Caroussel -->

        <section>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/photo1.jpg" class="d-block w-100" alt="Bannière 1">
                        <div class="carousel-caption d-block">
                            <h2>Vacances d'automne 2025 - Théâtre d'improvisation</h2>
                            <p>Plonge dans l'univers captivant du théâtre improvisé cet automne et libère ta créativité sur scène. Découvre des jeux scéniques drôles, dynamiques et pleins de surprises durant ce stage unique !</p>
                            <a href="details_stage.php?id=1"><button value="1" type="button" class="">DECOUVRIR LE STAGE</button></a>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <img src="img/photo2.jpg" class="d-block w-100" alt="Bannière 2">
                        <div class="carousel-caption d-block">
                            <h2>Vacances d'automne 2025 - Découverte de la sérigraphie</h2>
                            <p>Découvre l'art fascinant de la sérigraphie cet automne et crée des œuvres uniques avec tes propres mains ! Laisse libre cours à ton imagination lors de ce stage créatif !</p>
                            <a href="details_stage.php?id=3"><button value="3" type="button" class="">DECOUVRIR LE STAGE</button></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/photo3.jpg" class="d-block w-100" alt="Bannière 3">
                        <div class="carousel-caption d-block">
                            <h2>Vacances d'été 2025 - Cuisine</h2>
                            <p>La Ka'fête ô mômes ouvre ses portes aux gourmands ! Cet été, mets la main à la pâte et explore l'art de la cuisine dans un stage gourmand et plein de saveurs !</p>
                            <a href="details_stage.php?id=4"><button value="4" type="button" class="">DECOUVRIR LE STAGE</button></a>
                        </div>
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
            <!-- Section 1-arguments -->

            <section>
                <div>
                    <!-- Rajouter les bonnes images -->

                    <img src="" alt="">
                    <div>
                        <h4>Encadré</h4>
                        <p>Nos stages sont dirigés par des professionnels qualifiés, assurant un suivi personnalisé et un accompagnement de qualité pour vos enfants !</p>
                    </div>
                </div>
                <div>
                    <img src="" alt="">
                    <div>
                        <h4>Pédagogique</h4>
                        <p>Chaque activité est conçue pour stimuler la créativité et l'apprentissage des enfants, tout en respectant leur rythme et leurs besoins.</p>
                    </div>
                </div>
                <div>
                    <img src="" alt="">
                    <div>
                        <h4>Sécurisé</h4>
                        <p>La sécurité de vos enfants est notre priorité. Nos lieux d'activités sont sécurisés et nous veillons à une surveillance constante pour garantir leur bien-être.</p>
                    </div>
                </div>
                <div>
                    <img src="" alt="">
                    <div>
                        <h4>Ludique</h4>
                        <p>Les stages sont avant tout des moments de plaisir, où les enfants apprennent en s'amusant, dans une ambiance dynamique et conviviale.</p>
                    </div>
                </div>
            </section>
            <!-- Section 2-stages -->

            <section>
                <div>
                    <h2>Les stages des vacances scolaires</h2>
                    <p>Nos stages de vacances scolaires offrent à vos enfants une expérience unique alliant créativité, apprentissage et plaisir ! Animés par des professionnels passionnés, ces ateliers permettent aux jeunes de découvrir des activités ludiques et pédagogiques, telles que le théâtre ou encore la sérigraphie. </p>
                    <p>Chaque stage est conçu pour être sécurisé, épanouissant et adapté à l'âge de vos bouts de chou, leur offrant ainsi un cadre idéal pour grandir tout en s'amusant.</p>
                    <button>DECOUVRIR NOS STAGES ></button>
                </div>
                <img src="" alt="">
            </section>
            <!-- Section 3-Animateurs -->

            <section>
                <img src="" alt="">
                <div>
                    <h2>L'équipe de la Ka'fête</h2>
                    <p>Notre équipe d'animateurs est avant tout une grande famille de passionnés qui met un point d'honneur à créer une atmosphère bienveillante. Chaque membre est spécialement formé pour accompagner les enfants dans leur développement tout en favorisant leur créativité et leur épanouissement. Chacun apporte sa pierre personnelle à l'édifice Ka'fête ô mômes !</p>
                    <button>DECOUVRIR NOS ANIMATEURS ></button>
                </div>
            </section>
            <!-- Section 4-Nous contacter -->

            <section>
                <h2>NOUS CONTACTER</h2>
                <img src="img/barre_separation.png" alt="Barre de séparation">
                <div>
                    <div>
                        <!-- Mettre picto avec bootstrap d'une lettre pour mail -->

                        <h4>E-mail</h4>
                        <p>kafeteomomes@gmail.com</p>
                    </div>
                    <div>
                        <!-- Mettre picto avec bootstrap d'un telephone -->

                        <h4>Téléphone</h4>
                        <p>04.78.61.21.79</p>
                    </div>
                    <div>
                        <!-- Mettre picto avec bootstrap d'un point localisation -->

                        <h4>Adresse</h4>
                        <p>53 Montée de la Grande Côte 69001, Lyon</p>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <?php include("navbars/footer.php"); ?>
        </footer>
    </body>
</html>