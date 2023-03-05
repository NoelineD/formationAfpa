window.onload = function (){
    document.querySelector('#id_btn_calcul').onclick = calculer;
}

function calculer(){
    let annee = document.querySelector('#id_txt_annee').value;
    let mois = document.querySelector('#id_txt_mois').value -1;
    let jour = document.querySelector('#id_txt_jour').value;

    console.log(annee);

    let dateAnniv = new Date(annee, mois, jour);
    console.log(dateAnniv);

    let dateAujourdhui = new Date();
    console.log(typeof(dateAujourdhui));

    let interval = (dateAujourdhui - dateAnniv) / 1000;
    console.log(interval);
    

    let choix = document.querySelector('input[type="radio"]:checked');
    console.log(choix);
    let diffAnnee = dateAujourdhui.getFullYear() - annee;
    let diffMois = dateAujourdhui.getMonth() - mois;
    switch(choix.id){
        case 'id_opt_annee':
            alert(`Nombre d'années : ${diffAnnee}`);
        break;
        case 'id_opt_mois':
            let nbrMois = diffAnnee * 12 + diffMois;
            alert(`Nombre de mois : ${nbrMois}`);
        break;
        case 'id_opt_jour':
            alert(`Nombre de jours : ${Math.round(interval/3600/24)}`);
        break;
    }
}