let objetXHR;

function requete(){

    objetXHR = new XMLHttpRequest();

    objetXHR.onreadystatechange = reponse;

    objetXHR.open('get', 'expositions.json', true);

    objetXHR.send(null);

    document.querySelector('tfoot').style.display = 'block';
}

function reponse(){
    //XMLHttpRequest.DONE constante qui vaut 4
    if (objetXHR.readyState === 4 && objetXHR.status === 200) {
        
        document.querySelector('tfoot').style.display = 'none';

        let rep = objetXHR.responseText;
        console.log(rep);

        let expos = JSON.parse(rep);
        console.log(expos);
        let tr = '';
        for (const expo of expos) {
            console.log(expo);

            tr += `<tr><td>${expo.nomClub}</td><td>${expo.theme}</td><td>${expo.date}</td></tr>`
        }
        console.log(tr);
        let tbody = document.querySelector('tbody').innerHTML = tr;

    }
     

}