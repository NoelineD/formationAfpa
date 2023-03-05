/* 
 fichier js du TP : 322-TP05_JS_Password_1
 322-TP05_JS_Password.js : 
 Didier Bonneau DWWM Afpa Créteil maj 18-10-2022
 */
function verif() {

    let inputs = document.querySelectorAll('input[type="password"]');
    
    if (inputs[0].value === inputs[1].value) {
        alert('Vérification ok');
    } else {
        alert('Erreur');
        inputs[0].value = '';
        inputs[1].value = '';
        document.querySelector('button').disabled = true;
    }
}

function voir(evt) {
    let spanIcon = evt.target;
    let input = spanIcon.previousElementSibling;
    let visible = (input.type === 'text');
    
    spanIcon.className = !visible ? 'eye fa-solid fa-eye' : 'eye fa-solid fa-eye-slash';
    input.type = !visible ? 'text' : 'password';
    
}

function testInputVide() {
    let inputs = document.querySelectorAll('input[type="password"]');

    if (inputs[0].value !== '' && inputs[1].value !== '') {
        document.querySelector('button').disabled = false;
    } else {
        document.querySelector('button').disabled = true;
    }
}

function init() {
    document.querySelectorAll('input[type="password"]').forEach(function (input){
        input.onkeyup = testInputVide;
    });
    
    document.querySelector('span.psw').onmousedown = voir;
    document.querySelector('span.psw').onmouseup = voir;
    document.querySelector('span.conf').onclick = voir;
    
    document.querySelector('button').disabled = true;
    document.querySelector('button').onclick = verif;
    //document.querySelector('button').addEventListener('click', verif);
}

window.onload = init;
//window.addEventListener('load', init);