let objetXHR = null;

function requete(codePost) {
    const url = `https://geo.api.gouv.fr/communes?codePostal=${codePost}`;
    objetXHR.open('get', url);
    objetXHR.send(null);
}

function reponse() {
    console.log(objetXHR.response);
    let selectVille = document.querySelector('#ville'); 
    selectVille.innerHTML = '';
    if (objetXHR.response.length > 0) {
        for (const ville of objetXHR.response) {
            let option = new Option(ville.nom, ville.code);
            selectVille.add(option);
        }
    } else {
        let option = new Option('Selection de la ville');
        selectVille.add(option);
    }

}

//window.onload = function(){};
document.addEventListener('DOMContentLoaded', function(){
    objetXHR = new XMLHttpRequest();
    objetXHR.responseType = 'json';
    objetXHR.onload = function (){
        reponse();
    };

    document.querySelector('#code_post').addEventListener('keyup', function(ev){
        let input = ev.target;
        console.log(input.validity.patternMismatch);// true si non correspondance avec le pattern 
        //if(!input.validity.patternMismatch){ // false si ok
        //if(input.validity.valid){ // true si ok 
        // La fonction checkvalidity compare si c'est la meme chose et pattermis. dit dans la console si c'est true ou false eT le tableau correspondant
        //ensuite le resultat apparait dans la console si les deux sont pareil, False si correspond true si ne correspondpas
        if(input.checkValidity()){ // verifie la validité true si ok false si pas ok
            console.log(input.value);
            requete(input.value);
        }
    });
});