// Recupération des divs via leur classe avec une constante (et ne peut donc pas être changées => cela évite des changements inutiles)

const MenuBurger = document.querySelector('.menuBurger');
const horsChamps = document.querySelector('.horsChamps');

// Sur un clic, on "toggle" l'ajout des classe actives pour notre burger menu et notre classe "horschamps"

MenuBurger.addEventListener('click', () =>{ MenuBurger.classList.toggle('active'); horsChamps.classList.toggle('active');})