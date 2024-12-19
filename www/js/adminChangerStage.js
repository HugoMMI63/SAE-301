function afficherInfoStage(){
  // On cache l'élément des reservations
  document.getElementById("reservation").classList.add("d-none");
      
  // On affiche l'élément du stage
  document.getElementById("stageInfo").classList.remove("d-none");
}

function afficherInfoParticipants(){
	 // On cache l'élément du stage
   document.getElementById("stageInfo").classList.add("d-none");
    
   // On affiche l'élément des reservations
   document.getElementById("reservation").classList.remove("d-none");
}

// Fonction pour ajouter des écouteurs d'événements à des éléments
function init() {
    document.getElementById("stage").addEventListener("click", afficherInfoStage);
    document.getElementById("participants").addEventListener("click",afficherInfoParticipants);

    document.getElementById("resa").addEventListener("click", function(event) {
       // Vérifier si l'élément cliqué est un bouton de valider_paiement
       if (event.target.classList.contains("valider_paiement")) {
        let idResa = event.target.value; 
        let idStage = event.target.getAttribute("id_stage");

        // Confirmer la suppression
        if (confirm("Voulez vous valider ce paiement ?")) {
            // Rediriger l'utilisateur vers la page de valdidation
            window.location.href = 'executable/validerPaiement.php?id=' + idResa + "&id_stage=" + idStage;
        }
    }
      
    });
    
}

window.addEventListener('load', init);

