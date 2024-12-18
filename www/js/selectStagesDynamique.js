// Déclaration des variables globales

let select_categorie;

let stages_ados;
let stages_petits;

let etat_stages_petits;

// Déclaration des fonctions et récupération des éléments du DOM

function init() {
    select_categorie = document.getElementById("id_categorie");

    stages_ados = document.getElementsByClassName("stages_ados");
    stages_petits = document.getElementsByClassName("stages_petits");

    etat_stages_petits = true;

    if (stages_ados.length > 0 && stages_petits.length > 0) {
        select_categorie.addEventListener("change", switchStages);
    }
}

function switchStages() {
    // On inverse la valeur de la variable ("true" => "false" et "false" => "true")

    etat_stages_petits = !etat_stages_petits;

    for (let index = 0; index < stages_ados.length; index = index + 1) {
        stages_ados[index].classList.toggle("d-none");
    }

    for (let index = 0; index < stages_petits.length; index = index + 1) {
        stages_petits[index].classList.toggle("d-none");
    }

    if (etat_stages_petits == true) {
        stages_ados[0].setAttribute("selected", "selected");
        stages_petits[0].removeAttribute("selected");
    }
    else {
        stages_petits[0].setAttribute("selected", "selected");
        stages_ados[0].removeAttribute("selected");
    }
}

// Initialisation

window.addEventListener("load", init);