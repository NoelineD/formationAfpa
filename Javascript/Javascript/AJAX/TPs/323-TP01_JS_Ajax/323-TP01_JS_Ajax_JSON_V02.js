let objetXHR;

function requete(){

    objetXHR = new XMLHttpRequest();

    objetXHR.open('get', 'expositions.json', true);

    objetXHR.responseType = 'json';

    //objetXHR.onreadystatechange = reponse;
    objetXHR.onload = reponse;

    objetXHR.send(null);

    document.querySelector('tfoot').style.display = 'block';
}

function reponse(){
            
        document.querySelector('tfoot').style.display = 'none';

        let expos = objetXHR.response;
        //console.log(rep);
        //let expos = JSON.parse(rep);
        console.log(expos);
        let tr = '';
        for (const expo of expos) {
            console.log(expo);

            tr += `<tr><td>${expo.nomClub}</td><td>${expo.theme}</td><td>${expo.date}</td></tr>`
        }
        console.log(tr);
        let tbody = document.querySelector('tbody').innerHTML = tr;

}