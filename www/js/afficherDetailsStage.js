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
                document.getElementById("categorieStage").innerHTML="<strong> Catégorie : </strong>"+response.stage[0].intitule;
                document.getElementById("periodeStage").innerHTML="<strong>Période :</strong>"+response.stage[0].date;
                document.getElementById("lieuStage").innerHTML="<strong>Lieu :</strong/>"+response.stage[0].lieu;
                document.getElementById("horaireStage").innerHTML="<strong>Horaires :</strong/> De"+response.stage[0].horaire_debut+"à"+response.stage[0].horaire_fin;
                document.getElementById("nbplaceStage").innerHTML="<strong>Nombre de places :</strong/>"+response.stage[0].nb_places;
                document.getElementById("tarifStage").innerHTML="<strong>Prix :</strong/>"+response.stage[0].tarif_min+" à "+response.stage[0].tarif_max;
                document.getElementById("miniatureStage").src = response.stage[0].miniature;
                document.getElementById("descriptionStage").innerText = response.stage[0].description;

                // Réinitialisation des animateurs

                let animateurs = document.getElementById("animateurs");
                animateurs.innerHTML = ''; 

                // Ajout des animateurs

                response.stage.forEach(function(stage, index) {
                    let animateurNouveau = `
                        <div class="animateurs">
                            <img src="${stage.photo}" alt="Image de ${stage.prenom}" style="width: 300px; height: auto;">
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
                        <div>
                        <h2>${randStage.titre}</h2>
                        <p>${randStage.date}</p>
                        <img src="${randStage.miniature}" alt='Image du stage' style='width: 300px; height: auto;'>
                        <p>${randStage.description}</p>
                        <button class='plusInfo' value="${randStage.id}">PLUS D'INFO</button>
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