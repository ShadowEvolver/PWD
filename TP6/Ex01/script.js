const divElement = document.createElement('div');
const paragraph = document.createElement('p');

paragraph.textContent = 'Ceci est un paragraphe';

divElement.appendChild(paragraph);

document.body.appendChild(divElement);

setTimeout(function() {
    paragraph.textContent = 'Le texte a été modifié';
    paragraph.style.backgroundColor = 'lightblue';
    paragraph.style.textAlign = 'center';
    paragraph.style.padding = '20px';
    paragraph.style.borderRadius = '5px';
}, 3000);

divElement.addEventListener('click', function() {
    paragraph.textContent = 'Un clic a été détecté';
});