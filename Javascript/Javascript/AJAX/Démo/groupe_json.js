// JavaScript Document
let objXHR; // référence l'objet XMLHttpRequest

function loadJSON() {

    objXHR = new XMLHttpRequest();
    objXHR.onreadystatechange = jsonFin;
    objXHR.open("get", "groupe_json.json", true);
    objXHR.send(null);
}

function jsonFin() {
    if (objXHR.readyState === 4) {
        if (objXHR.status === 200) {

            alert("fin chargement");
            console.log(objXHR.responseText);
            let respJson = JSON.parse(objXHR.responseText);
            //let respJson = objXHR.response;
            //console.log(objXHR.responseType);
            console.log(respJson);
            // récupération des objets balises nom
            let tr = "";
            for (let i = 0; i < respJson.length; i++) {
                tr += "<tr><td>" + respJson[i].nom + "</td><td>" + respJson[i].profil + "</td></tr>";
            }
            console.log(tr);
            document.querySelector("tbody").innerHTML = tr;
        }
    }
}

window.onload = loadJSON;