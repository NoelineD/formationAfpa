let objetXHR;

function requete(){

    objetXHR = new XMLHttpRequest();

    objetXHR.onreadystatechange = reponse;

    objetXHR.open('get', 'expositions.csv', true);

    objetXHR.send(null);
}

function reponse(){
    //XMLHttpRequest.DONE constante qui vaut 4
    if (objetXHR.readyState === 4 && objetXHR.status === 200) {
        
        let rep = objetXHR.responseText;
        let expos = rep.split('\r\n');
        console.log(expos);

        let tr = '';
        for (const expo of expos) {
            let items = expo.split(';');
            console.log(items);
            tr += `<tr><td>${items[0]}</td><td>${items[1]}</td><td>${items[2]}</td></tr>`;
        }

        let tbody = document.querySelector('tbody').innerHTML = tr;

    }
     

}