/* 
 fichier js du TP : 322-TP04_JS_Dom_Style : version V04
 322-TP04_JS_Dom_Style_V04.js : utilisation event comme paramètre de la fonction preuve unique
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


