/* 
 fichier js du TP : 322-TP04_JS_Dom_Style_V07
 322-TP04_JS_Dom_Style_V07.js : utilisation event comme paramètre de la fonction preuve unique
 modification du style et d'attribut en JS
 Didier Bonneau DWWM Afpa Créteil maj 17-10-2022
 */
var divPreuve;


// fonction de callback appelée en fin de chargement du DOM
function initWindow() {

    //let image = document.getElementById("idImage");
    let image = document.querySelector("#idImage");
    image.src = "images/shadow-illusion.jpg";
    
    let divPreuve = document.querySelector("#idDivPreuve");
    divPreuve.style.display = "none";
    
    image.onmousedown = preuve;
    image.onmouseup = preuve;
}

function preuve(event) {

    let image = event.target;
    let divPreuve = document.querySelector("#idDivPreuve");

    if (event.type === 'mousedown') {
        image.src = "images/shadow-proof.jpg";
        divPreuve.style.display = "block";
        //idDivPreuve.style.display = "block";
    } else {
        image.src = "images/shadow-illusion.jpg";
        divPreuve.style.display = "none";

    }
}

// mise en place du gestionnaire de fin de création du dom sur l'objet window
// appel de la fonction initWindow
window.onload = initWindow;
//initWindow();