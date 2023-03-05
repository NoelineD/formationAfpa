const BTN_NEW_JEU = 0;
const BTN_SOLUTION = 1;
const BTN_PROPOSE = 2;

const TXT_PROPOSE = 0;
const TXT_COUP = 1;
const TXT_MESSAGE = 2;
const TXT_REPONSES = 3;

let nbrMyster;
let nbrCoup;
let inputTexts;
let reponses = '';
let timeOut;

window.onload = function () {
    inputTexts = document.querySelectorAll('input[type="text"]');
    let inputButtons = document.querySelectorAll('input[type="button"]');
    inputButtons[BTN_NEW_JEU].onclick = newJeu;
    inputButtons[BTN_SOLUTION].onclick = solution;
    inputButtons[BTN_PROPOSE].onclick = propose;

    initJeu();

}

function initJeu(){
    nbrMyster = Math.floor(Math.random()*100) + 1;
    console.log(nbrMyster);
    nbrCoup = 0;
    reponses = '';

    inputTexts[TXT_PROPOSE].value = '';
    inputTexts[TXT_COUP].value = 0;
    inputTexts[TXT_MESSAGE].value = '';
    inputTexts[TXT_REPONSES].value = '';

    setEtatBoutons(true, false, false);

    timeOut = setTimeout(solution, 30000);
}

function newJeu() {
    initJeu();
}

function solution() {
    inputTexts[TXT_MESSAGE].value = `La solution était : ${nbrMyster}`;
    setEtatBoutons(false, true, true);
}

function propose() {
    let nbrPropose = inputTexts[TXT_PROPOSE].value;

    nbrCoup++;
    inputTexts[TXT_COUP].value = nbrCoup;

   if (nbrCoup == 7) {
        solution();
    } else {
        if (nbrPropose == nbrMyster ) {
            inputTexts[TXT_MESSAGE].value = `Bravo : vous avez  gagné !`;
            clearTimeout(timeOut);
            setEtatBoutons(false, true, true);
        } else {
            if (nbrPropose > nbrMyster) {
                inputTexts[TXT_MESSAGE].value = `Trop grand !`;
            } else {
                inputTexts[TXT_MESSAGE].value = `Trop petit !`;
            }
        }
    }
 
    inputTexts[TXT_PROPOSE].value = ``;

    reponses += nbrPropose + ' - ';
    inputTexts[TXT_REPONSES].value = reponses;
}

function setEtatBoutons(etatNewjeu, etatSolution, etatPropose) {
    let inputButtons = document.querySelectorAll('input[type="button"]');
    inputButtons[BTN_NEW_JEU].disabled = etatNewjeu;
    inputButtons[BTN_SOLUTION].disabled = etatSolution;
    inputButtons[BTN_PROPOSE].disabled = etatPropose;
}