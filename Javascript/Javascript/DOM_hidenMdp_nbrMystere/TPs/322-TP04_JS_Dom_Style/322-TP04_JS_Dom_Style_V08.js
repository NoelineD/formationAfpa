/* 
 fichier js du TP : 322-TP04_JS_Dom_Style_V07
 322-TP04_JS_Dom_Style_V07.js : utilisation event comme paramètre de la fonction preuve unique
 modification du style et d'attribut en JS
 Didier Bonneau DWWM Afpa Créteil maj 29-07-2020
 */
var divPreuve;

// fonction utilitaire permettant d'affecté un gestionnaire d'évènement sur une balise
// emt : objet element sur lequel s'applique le gestionnaire
// evt : string représentant le type d'évènement
// fnc : fonction de callback qui sera déclenchée
// bbl : booléen false si non capture, true si capture
function addEvent(emt, evt, fnc, bbl)
{
    if ('attachEvent' in emt)   // test si la méthode attachEvent existe dans emt
    //if (emt.attachEvent)
        emt.attachEvent('on' + evt, fnc); //4 MSIE
    else if ('addEventListener' in emt) {
        emt.addEventListener(evt, fnc, bbl); //4 ECMA ex: MFF
    }
}

// fonction de callback appelée en fin de chargement du DOM
function initWindow() {

    // essai de suppression d'un gestionnaire d'évènement
    let balH1 = document.querySelector('h1');
    balH1.addEventListener('click', essai, false);

    //let image = document.getElementById("idImage");
    let image = document.querySelector("#idImage");
    image.src = "images/shadow-illusion.jpg";
    console.log(image.src);
    //imgIllusion = new Image();
    //imgIllusion.src = image.src;
    //imgPreuve = new Image();
    //imgPreuve.src = "images/shadow-proof.jpg"
    
    divPreuve = document.getElementById("idDivPreuve");
    divPreuve.style.display = "none";
    
    //addEvent(image, "mousedown", preuve, false);
    //addEvent(image, "mouseup", preuve, false);
    image.addEventListener("mousedown", preuve, false);
    image.addEventListener("mouseup", preuve, false);
}

function essai(){
    alert('test');
}

function preuve(event) {

    // essai de suppression d'un gestionnaire d'évènement
    let balH1 = document.querySelector('h1');
    balH1.removeEventListener('click', essai, false);
    
    //let cheminImage = image.getAttribute("src");
    let cheminImage = event.target.src;
    console.log(cheminImage);

    if (event.type === 'mousedown') {
        let image = event.target;
        image.src = "images/shadow-proof.jpg";
        //event.target.src = "images/shadow-proof.jpg";
        //event.srcElement.src = "images/shadow-proof.jpg";
        //this.src = "images/shadow-proof.jpg";
        console.log(this);
        //image.src = imgPreuve.src;
        divPreuve.style.display = "block";
    } else {
        //event.target.src = "images/shadow-illusion.jpg";
        // à l'intérieur du gestionnaire (fonction preuve()) mis par addEventListener, 
        // this représente la cible sur laquelle l'évènement s'est produit
        this.src = "images/shadow-illusion.jpg";
        //image.src = imgIllusion.src;
        divPreuve.style.display = "none";

    }
}
// mise en place du gestionnaire de fin de création du dom sur l'objet window
// appel de la fonction initWindow
// initWindow();
//addEvent(window, 'load', initWindow, false);
window.addEventListener('DOMContentLoaded', initWindow, false);