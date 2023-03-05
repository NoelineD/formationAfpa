/* 
fichier js du TP : 322-TP04_JS_Dom_Style : version V02
322-TP04_JS_Dom_Style_V02.js : utilisation this comme paramètre des fonctions
modification du style et d'attribut en JS
Didier Bonneau DWWM Afpa Créteil 29-07-2020
 */
function press(baliseImg)
{
    // la variable baliseImg référence la balise <img>
    console.log(baliseImg);
    baliseImg.src = "images/shadow-proof.jpg";
    let baliseDiv = document.getElementById("idDivPreuve");
    //var baliseDiv = baliseImg.parentNode.nextElementSibling;
    baliseDiv.style.display = "block";
}

function depress(baliseImg)
{
    baliseImg.src = "images/shadow-illusion.jpg";
    document.getElementById("idDivPreuve").style.display = "none";
}



