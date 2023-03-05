/* 
 fichier js du TP : 322-TP04_JS_Dom_Style : version V03
 322-TP04_JS_Dom_Style_V03.js : utilisation event comme paramètre des fonctions
 modification du style et d'attribut en JS
 Didier Bonneau CDI Afpa Créteil
 */
function press(ev)
{
    // la variable ev référence l'objet Event 
    if (ev.target) {  // test de l'existance de la propriété target : nescape
        var baliseImg = ev.target; // récupération de la cible <img> depuis l'objet Event
    } else {
        // sous Internet Explorer < v8, la propriété se nomme srcElement
        var baliseImg = ev.srcElement; // récupération de la cible <img> depuis l'objet Event
    }
    baliseImg.src = "images/shadow-proof.jpg";
    let baliseDiv = document.getElementById("idDivPreuve");
    baliseDiv.style.display = "block";
}

function depress(ev)
{
    if (ev.target) {
        var baliseImg = ev.target;
    } else {
        var baliseImg = ev.srcElement;// sous IE ev.srcElement
    }
    baliseImg.src = "images/shadow-illusion.jpg";
    document.getElementById("idDivPreuve").style.display = "none";
}



