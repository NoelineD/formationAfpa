/* 
 fichier js du TP : 322-TP04_JS_Dom_Style : version V05 et V06
 322-TP04_JS_Dom_Style_V05_V06.js : utilisation du fonction init()
 modification du style et d'attribut en JS
 Didier Bonneau DWWM Afpa Créteil maj 29-07-2020
 */
function preuve(ev)
{
    // la variable ev référence l'objet Event
    // recherche de la cible
    let baliseImg = ev.target;
    // test du type de l'évènement
    if (ev.type === 'mousedown') {

        baliseImg.src = "images/shadow-proof.jpg";
        document.getElementById("idDivPreuve").style.display = "block";
    } else {
        baliseImg.src = "images/shadow-illusion.jpg";
        document.getElementById("idDivPreuve").style.display = "none";
    }
}

function init() {
    // modification de la source par défaut de l'image preuve -> illlusion
    document.getElementById("idImage").src = "images/shadow-illusion.jpg";
    // modification dela propriété display de la div preuve block -> none
    document.getElementById("idDivPreuve").style.display = "none";
}



