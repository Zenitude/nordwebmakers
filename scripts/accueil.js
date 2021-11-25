// Variables
const animJS = document.querySelector('#animJS');

// Événements
setInterval(createbulle, 150);

// Fonctions
function createbulle()
{
    const bulle1 = document.createElement('span');
    bulle1.setAttribute('id', 'bulle1');
    bulle1.setAttribute('class', 'bulle');

    let size1 = Math.random() * 50;

    bulle1.style.width = `${20 + size1}px`;
    bulle1.style.height = `${20 + size1}px`;
    
    bulle1.style.left = `${Math.random() * innerWidth}px`;
    bulle1.style.top = `${Math.random() * innerHeight}px`;

    const bulle2 = document.createElement('span');
    let size2 = Math.random() * 30;

    bulle2.setAttribute('id', 'bulle2');
    bulle2.setAttribute('class', 'bulle');

    bulle2.style.width = `${15 + size2}px`;
    bulle2.style.height = `${15 + size2}px`;
    
    bulle2.style.left = `${Math.random() * innerWidth}px`;
    bulle2.style.top = `${Math.random() * innerWidth}px`;
    
    bulle1.appendChild(bulle2);
    animJS.appendChild(bulle1);

    setTimeout(() => 
    {
        bulle1.remove();
        bulle2.remove();
    }, 5000);
}
