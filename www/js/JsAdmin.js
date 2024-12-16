//recupération des divs via leur classe avec une variable constant et ne peut donc être changer (evite changement inutile)
const MenuBurger = document.querySelector('.menuBurger');
const horsChamps = document.querySelector('.horsChamps');
//sur un click on toggle l'ajout des classe active pour notre menuburger et notre horschamps
MenuBurger.addEventListener('click', () =>{ MenuBurger.classList.toggle('active'); horsChamps.classList.toggle('active');})