/* 
 * Fichier Javascript du TP : 322-TP08_JS_Dom_Valid_Form
 * Didier Bonneau
 * Afpa DWWM Créteil maj 29-07-2021
 */

function validForm(ev) {
    //alert('validation');
    let erreur = false;
    let requis = document.querySelectorAll('.requi');
    for (let indexLabel = 0; indexLabel < requis.length; indexLabel++) {
        let input = requis[indexLabel].nextElementSibling;
        if (input.value === '') {
            input.style.backgroundColor = 'red';
            erreur = true;
            input.addEventListener('focus', function (){
                this.style.background = '#eaeaea';
            }, false);
            input.addEventListener('blur', function (){
                this.style.background = 'white';
            }, false);
        }
    }
    let caches = document.querySelectorAll('.cache');
    for (let indexDiv = 0; indexDiv < caches.length; indexDiv++) {
        if(caches[indexDiv].style.display === 'block') {
            let textArea = caches[indexDiv].lastElementChild;
            if (textArea.value === ''){
                textArea.style.background = 'red';
                erreur = true;
                textArea.addEventListener('focus', function (){
                    this.style.background = '#eaeaea';
                }, false);
                textArea.addEventListener('blur', function (){
                    this.style.background = 'white';
                }, false);
            }
        }
    }
    
    if(erreur){
        ev.preventDefault();
    }
}

function montrer(ev) {
	
        let radio = ev.target;
        switch (radio.id){
            case 'revueOui' :
                infoRevues.style.display = 'block';
                break;
            case 'revueNon' :
                infoRevues.style.display = 'none';
                listeRevue.value = '';
                listeRevue.style.background = 'white';
                break;
            case 'siteOui' :
                infoSites.style.display = 'block';
                break;
            case 'siteNon' :
                infoSites.style.display = 'none';
                listeSite.value = '';
                listeSite.style.background = 'white';
                break;
        }
}

function miseFormeTel(ev){
    
    let input = ev.target;
    let val = input.value;
    let expReg = /^0[1-9]\d{8}$/;
    if (expReg.test(val)){
        //alert(val.length);
        let tel = '';
        for(let i=0; i<val.length; i++){

            if (i % 2 === 0){
                tel += ' ';
            }
            tel += val.charAt(i);
        }
        //alert(tel);
        //alert(tel.length);
        input.value = tel.trim();
    } else {
        input.value = '';
        input.placeholder = '10 chiffres attendus';
    }
}

function deMiseFormeTel(ev){
    let input = ev.target;
    let val = input.value;
        let tel = '';
        for(let i=0; i<val.length; i++){

            if (val.charAt(i) !== ' '){
                tel += val.charAt(i);
            }
            
        }
        input.value = tel;

}

function resetForm(){
    let formul = document.getElementById('renseigne');
    //alert(typeof formul);
    formul.reset();
    let listeInput = document.querySelectorAll('input[type=text]');
    for (index=0; index < listeInput.length; index++){
        listeInput[index].style.background = 'white';
    }
    let caches = document.querySelectorAll('.cache');
    caches[0].style.display = 'none';
    caches[0].lastElementChild.style.background = 'white';
    caches[1].style.display = 'none';
    caches[1].lastElementChild.style.background = 'white';
}
 
function init() {

    document.querySelector('form').onsubmit = validForm;
    document.querySelector('form').onsubmit = resetForm;
    inputs = document.querySelectorAll('input[type="radio"]');
    for (let i = 0; i < inputs.length; i++) {
            inputs[i].onchange = montrer;
    }
    /*inputs.forEach(function(input) {
        input.onchange = montrer;
    });*/
}

window.onload = init;