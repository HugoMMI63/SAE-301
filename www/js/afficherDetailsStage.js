// Fonction pour remplacer le contenu de la page "detailStage.php" par un autre + 3 nouveaux stages générés aléatoirement (depuis la BDD)

function afficherInfoStage(){
	let idstage = this.value;
    
	// Requête AJAX

	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "API/remplacerContenuStage.php?id="+idstage, true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// Response
            
			let response = JSON.parse(this.responseText); 
			if(response.status=="OK"){
                // Ajout des nouveaux éléments d'un stage

                document.getElementById("titreStage").innerHTML=response.stage[0].titre;
                document.getElementById("categorieStage").innerHTML="<strong>Catégorie : </strong>"+response.stage[0].intitule;
                document.getElementById("periodeStage").innerHTML="<strong>Période : </strong>"+response.stage[0].date;
                document.getElementById("lieuStage").innerHTML="<strong>Lieu : </strong/>"+response.stage[0].lieu;
                document.getElementById("horaireStage").innerHTML="<strong>Horaires : </strong/> De "+response.stage[0].horaire_debut+" à "+response.stage[0].horaire_fin;
                document.getElementById("nbplaceStage").innerHTML="<strong>Nombre de places : </strong/>"+response.stage[0].nb_places;
                document.getElementById("tarifStage").innerHTML="<strong>Tarif : </strong/>"+response.stage[0].tarif_min+" à "+response.stage[0].tarif_max+"€ selon le quotient familial";
                document.getElementById("miniatureStage").src = response.stage[0].miniature;
                document.getElementById("descriptionStage").innerText = response.stage[0].description;
		        history.pushState(null, '', '/www/details_stage.php?id='+idstage);
                document.title='Stage - '+response.stage[0].titre;

                // Réinitialisation des animateurs

                let animateurs = document.getElementById("animateurs");
                animateurs.innerHTML = ''; 

                // Ajout des animateurs

                response.stage.forEach(function(stage, index) {
                    let animateurNouveau = `
                        <div class='col-md-4 text-center'>
                            <img src="${stage.photo}" alt="Photo de ${stage.prenom}" class='img-fluid rounded-circle mb-3' style='width: 150px; height: 150px; object-fit: cover;'>
                            <h3>${stage.prenom}</h3>
                        </div>
                    `;
                    animateurs.innerHTML += animateurNouveau;
                });
			}
		}
	};
    xhttp.send();

    // Deuxième requête AJAX pour regénérer 3 stages aléatoires

    var xhttp2 = new XMLHttpRequest();
	xhttp2.open("GET", "API/stagesAleatoires.php?id="+idstage, true);
	xhttp2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp2.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// Response

			let response = JSON.parse(this.responseText); 
			if(response.status=="OK"){

                // Réinitialisation de la section des autres stages

                let autresStages = document.getElementById("autresStages");
                autresStages.innerHTML = ''; 

                // Ajout des 3 stages aléatoires

                response.randStage.forEach(function(randStage, index) {
                    let nouveauStages = `
                        <div class='col-xl-3 col-10'>
                        <div class='card shadow-sm h-100'>
                        <img src="${randStage.miniature}" alt='Image du stage' class='card-img-top' style='height: 200px; object-fit: cover;'>
                        <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>${randStage.titre}</h5>
                        <p class='text-muted'><small>${randStage.date}</small></p>
                        <p class='card-text flex-grow-1'>${randStage.description}</p>
                        <button class='btn btn-warning w-100 mt-auto plusInfo' value="${randStage.id}">Découvrir ce stage ></button>
                        </div>
                        </div>
                        </div>
                    `;
                    autresStages.innerHTML += nouveauStages;
                });
                
                // Scroller en haut de la page une fois tous les éléments remplacés

                window.scrollTo({ top: 0, behavior: 'smooth' });
			}
		}
	};
	xhttp2.send();
}

function init() {
    // Sélectionne tous les boutons "plusInfo" à partir du parent "autresStages"

    document.getElementById("autresStages").addEventListener("click", function(event) {
        // Si l'élément cliqué possède la classe "plusInfo", on appelle la fonction

        if (event.target.classList.contains("plusInfo")) {
            afficherInfoStage.call(event.target); 
        }
    });
}

window.addEventListener('load', init);