// Variables
const menu = document.querySelector('#menu');
const hamburgers = document.querySelectorAll('#hamburger');
const navHeader = document.querySelector('header ul');

// Événements
menu.addEventListener('click', activeHamburger);

// Fonctions
function activeHamburger()
{
    navHeader.classList.toggle('affiche');

    hamburgers.forEach(hamburger => 
    {
        hamburger.classList.toggle('active');
    });
}

