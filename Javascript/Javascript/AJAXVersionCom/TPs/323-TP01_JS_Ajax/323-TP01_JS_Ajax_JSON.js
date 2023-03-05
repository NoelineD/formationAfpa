let objetXHR;

function requete(){

    objetXHR = new XMLHttpRequest();

    objetXHR.onreadystatechange = reponse;

    objetXHR.open('get', 'expositions.json', true);

    objetXHR.send(null);

    document.querySelector('tfoot').style.display = 'block';
}

function reponse(){
    //XMLHttpRequest.DONE constante qui vaut 4 et statut normal vaux 200 veut dire doc bien trouvé accessible à l'ouverture
    if (objetXHR.readyState === 4 && objetXHR.status === 200) {
        
        document.querySelector('tfoot').style.display = 'none';

        let rep = objetXHR.responseText;
        console.log(rep);

        let expos = JSON.parse(rep);
        //methode parse utilisée pour transformer en tableau séparé par des virgules
        console.log(expos);

        //création du tableau à afficher grace a for of on récupère chaque données expos faisant partie de la const expo pour replir les td
        let tr = '';
        for (const expo of expos) {
            console.log(expo);

            tr += `<tr><td>${expo.nomClub}</td><td>${expo.theme}</td><td>${expo.date}</td></tr>`
        }

        console.log(tr);
        let tbody = document.querySelector('tbody').innerHTML = tr;
        //pour que la boucle s'affiche on crée une variable tbody et on utilise innerhtml pour faire apparaitre notre tableau dans le doc

    }
     

}