/* 
fichier js du TP : 322-TP04_JS_Dom_Style : version V01
322-TP04_JS_Dom_Style_V01.js : utilisation du dom 0 et de 2 fonctions
modification du style et d'attribut en JS
Didier Bonneau DWWM Afpa Créteil 29-07-2020
 */
function press()
{
    // récupération de l'objet <img>
    let baliseImg = document.getElementById('idImage');
    // modification de son attribut src
    baliseImg.src = 'images/shadow-proof.jpg';
    //baliseImg.setAttribute('src', 'images/shadow-proof.jpg');
    // récupération de l'objet <div> preuve
    let baliseDiv = document.getElementById('idDivPreuve');
    // modification de son style display à block
    baliseDiv.style.display = 'block';
}

function depress()
{
    // modification de source de l'image sans variable intermédiaire
    document.getElementById('idImage').src = 'images/shadow-illusion.jpg';
    // modification du style de la div sans variable intermédiaire
    document.getElementById('idDivPreuve').style.display = 'none';
}

