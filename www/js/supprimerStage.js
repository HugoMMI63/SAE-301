// Déclaration des variables globales

let inputs;

// Déclaration des fonctions et récupération des éléments du DOM

function init() {
    inputs = document.getElementsByClassName("suppr");
    for (let index = 0; index < inputs.length; index = index + 1) {
        inputs[index].addEventListener("click", function() {
            supprimerStage(inputs[index]);
        })
    }
}

function supprimerStage(element) {
    let idStage = element.value;  // Utilisez element.value pour obtenir la valeur du bouton
    // Confirmer la suppression

    if (confirm("Êtes-vous sûr de vouloir supprimer ce stage ?")) {
        // Créer la requête AJAX

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "API/tousStage.php?id=" + idStage, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Si la suppression est réussie, on peut supprimer l'élément et rediriger l'administrateur
                        
                window.location.href = 'http://localhost/www/executable/supprimerStage.php?id='+idStage;
                alert("Stage supprimé avec succès.");
                location.reload();  // Recharger la page pour voir les changements
            }
        };
        xhttp.send();
    }
}

// Initialisation

window.addEventListener('load', init);