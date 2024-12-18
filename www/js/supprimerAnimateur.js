function init() {
    document.getElementById("liste_animateur").addEventListener("click", function(event) {
        if (event.target.classList.contains("suppr")) {
            let idAnimateur = event.target.value;  // Utilisez event.target pour obtenir la valeur du bouton
    
            // Confirmer la suppression
    
            if (confirm("Êtes-vous sûr de vouloir supprimer ce stage ?")) {
                // Créer la requête AJAX
    
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "API/tousAnimateur.php?id=" + idAnimateur, true);
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Si la suppression est réussie, on peut rediriger ou supprimer l'élément de la page
                        window.location.href = 'http://localhost/www/executable/supprimerAnimateur.php?id='+idAnimateur;
                        alert("Animateur supprimé avec succès.");
                        location.reload();  // Recharger la page pour voir les changements
                    }
                };
                xhttp.send();
            }
        }
    });
    }
    window.addEventListener('load', init);