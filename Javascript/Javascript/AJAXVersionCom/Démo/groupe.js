// JavaScript Document

function loadXML() {

    objXHR = new XMLHttpRequest();
    objXHR.onreadystatechange = xmlFin;
    objXHR.open("get", "groupe.xml", true);
    objXHR.send(null);
}

function xmlFin() {
    console.log('XmlFin');
    if (objXHR.readyState === 4) {
        if (objXHR.status === 200) {

            alert("fin chargement");
            console.log(objXHR.responseText);
            console.log(objXHR.responseXML);
            var respXml = objXHR.responseXML;
            // récupération des objets balises nom
            var noms = respXml.getElementsByTagName("nom");
            // récupération des objets balises profil
            var profils = respXml.getElementsByTagName("profil");
            //document.write(nom.length);
            var tr = "";
            for (i = 0; i < noms.length; i++) {
                //groupe[i] = "Nom : " + personne[i].firstChild.nodeValue + " Profil : " + profil[i].firstChild.nodeValue +"<br>";
                //document.write(groupe[i]);
                tr += "<tr><td>" + noms[i].firstChild.nodeValue + "</td><td>" + profils[i].firstChild.nodeValue + "</td></tr>";
            }
            console.log(tr);
            document.querySelector("tbody").innerHTML = tr;
        }
    }
}

window.onload = loadXML;