/* 
fichier js du TP : 322-TP05_JS_Password
322-TP05_JS_Password.js : 
Didier Bonneau DWWM Afpa Créteil maj 29-07-2020
 */
let visible = false;

function verif() {

	let input1 = document.getElementById('motdepasse');
	let input2 = document.getElementById('confirmation');

	if (input1.value === input2.value) {
		alert('Vérification ok');
	} else {
		alert('Erreur');
		input1.value = '';
		input2.value = '';
	}
}

function voir(event) {
        let image = event.target;
    /*  if (visible == false) {
		image.src = 'images/oeil_ferme.jpg';
		input = document.getElementById('motdepasse');
		input.type = 'text';
		visible = true;
	} else {
		image.src = 'images/oeil_ouvert.jpg';
		input = document.getElementById('motdepasse');
		input.type = 'password';
		visible = false;
	}
    */
        let input = image.previousElementSibling;
        image.src = !visible ? 'images/oeil_ferme.jpg' : 'images/oeil_ouvert.jpg';
        input.type = !visible ? 'text' : 'password';
        
        visible = !visible;
}

function test(){
    //alert('le texte à changé');
    let input1 = document.getElementById('motdepasse');
    let input2 = document.getElementById('confirmation');
    
    if(input1.value !== '' && input2.value !== ''){
        document.querySelector('button').disabled = false;
    } else {
        document.querySelector('button').disabled = true;
    }
}

function init() {
    document.querySelectorAll('input[type="password"]')[0].onkeyup = test;
    document.querySelectorAll('input[type="password"]')[1].onkeyup = test;

    document.querySelector('img.psw').onmousedown = voir;
    document.querySelector('img.psw').onmouseup = voir;
    document.querySelector('img.psw_conf').onclick = voir;
    
    document.querySelector('button').onclick = verif;
}

window.onload = init;