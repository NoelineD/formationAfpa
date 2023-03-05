let objetXHR;

function requete(){

    objetXHR = new XMLHttpRequest();

    objetXHR.onreadystatechange = reponse;

    objetXHR.open('get', 'expositions.xml', true);

    objetXHR.send(null);

    document.querySelector('tfoot').style.display = 'block';
}

function reponse(){
    //XMLHttpRequest.DONE constante qui vaut 4
    if (objetXHR.readyState === 4 && objetXHR.status === 200) {
        
        document.querySelector('tfoot').style.display = 'none';

        let rep = objetXHR.responseXML;
        console.log(rep);
        //let expos = rep.getElementsByTagName('expo');
        //on va chercher les éléments du ficher xml toutes les balises expo
        let expos = rep.querySelectorAll('expo');
        console.log(expos);
        let tr = '';
        for (const expo of expos) {
            console.log(expo);
            let nomClub = expo.querySelector('nomClub').textContent; //pour retourner le text de l'élément séléctionné
            let theme = expo.querySelector('theme').textContent;
            let date = expo.querySelector('date').textContent;

            tr += `<tr><td>${nomClub}</td><td>${theme}</td><td>${date}</td></tr>`
        }
        // moins rapide que json car on crée 3variables pour récupérer les valeurs de nom club etc. avant de les appeler dans le tab au lieu de expo.
        let tbody = document.querySelector('tbody').innerHTML = tr;
        // on execute dans le doc 

    }
     

}