/* 
 * Fichier Javascript de l'ECF : ECF_JS_CalculateHtml.js
 * Didier Bonneau
 * Afpa DWWM Créteil maj 29-07-2021
 */
let op1 = '', op2 = '', oper = '';
let resultat = '';

/**
 * fonction appelée sur un click d'un des boutons de la calculate
 * @param {Event} event
 */
function btnClick(event) {
    let touche = event.target.textContent; // récupération du contenu de la balise button cliquée

    // à faire

    // envoi des 3 variables dans l'input text du resultat
    document.querySelector('input').value = op1 + oper + op2;
}

/**
 * fonction de remise à zéro des 4 variables globales
 * et effacement de l-input résultat
 */
function btnClear() {
    
    // à faire
}

/**
 * fonction de calcul du résultat
 * @param {Number} operande1
 * @param {Number} operande2
 * @param {String} operateur
 * @returns {Number}
 */
function effectuerCalcul(operande1, operande2, operateur) {

    let resultat = 0;

    // selon operateur faire le bon calcul dans resultat
    
    // à faire
 
    // retourner resultat
}

function init() {
    // la balise input pour l'affichage du résultat est dans une div de classe "resultat"
    // chaque balise button est dans une div de classe "bouton"

    // déclaration d'un tableau des codes de touche
    let codeTouches = ['C','','','+','7','8','9','-','4','5','6','x','1','2','3','/','0','','','='];
    // création du html pour l'affichage et les boutons
    let divs = '<div class="resultat"><input type="text" readonly="readonly" value=""/></div>';
    for (let codeTouche of codeTouches) {
        if (codeTouche === '') {    // pas de bouton
            divs += '<div class="bouton"></div>';
        } else {
            divs += '<div class="bouton"><button>'+codeTouche+'</button></div>';   
        }
    }
    // envoi de ce code html dans la div
    document.querySelector('div[class="grid-calculate calculate"]').innerHTML = divs;

    // récupération de tout les boutons pour leur assigner le gestionnaire d'évènement click
    boutons = document.querySelectorAll('button'); 
    for(let bouton of boutons){
        bouton.onclick = btnClick;
    }
}

document.addEventListener('DOMContentLoaded', function(){
    init();
});