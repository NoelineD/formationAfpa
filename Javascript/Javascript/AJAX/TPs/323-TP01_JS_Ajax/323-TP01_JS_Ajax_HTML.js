let objetXHR;

function requete(){

    objetXHR = new XMLHttpRequest();

    objetXHR.onreadystatechange = reponse;

    objetXHR.open('get', 'expositions.html', true);

    objetXHR.send(null);

    document.querySelector('tfoot').style.display = 'block';
}

function reponse(){
    //XMLHttpRequest.DONE constante qui vaut 4
    if (objetXHR.readyState === 4 && objetXHR.status === 200) {
        
        document.querySelector('tfoot').style.display = 'none';

        let tr = objetXHR.responseText;
        console.log(tr);

        let tbody = document.querySelector('tbody').innerHTML = tr;

    }
     

}