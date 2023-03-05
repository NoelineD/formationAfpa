let objXHR = null;

(function(){
    document.querySelector('button').onclick = requete;

    objXHR = new XMLHttpRequest();
    objXHR.responseType = 'json';
    objXHR.timeout = 100;

    objXHR.onload = reponse;
    //objXHR.ontimeout = function(ev){
    //    let tr = '<tr><td colspan=3>Erreur : le site ne répond pas</td></tr>';
    //    document.querySelector('tbody').innerHTML = tr;
    //    document.querySelector('tfoot').style.display = 'none';
    //}
    objXHR.ontimeout = () => {
        let tr = '<tr><td colspan=3>Erreur : le site ne répond pas</td></tr>';
        document.querySelector('tbody').innerHTML = tr;
        document.querySelector('tfoot').style.display = 'none';
    }

})();

function requete() {
    const url = 'https://www.prevision-meteo.ch/services/json/creteil';

    objXHR.open('get', url, true);
    objXHR.send(null);

    document.querySelector('tfoot').style.display = 'block';
}

function reponse(){

    document.querySelector('tfoot').style.display = 'none';

    let meteo = objXHR.response;
    //console.log(meteo.fcst_day_0.hourly_data); correspond aux infos sur le jour qu'on veut et heure par heure
    let premierjour = meteo.fcst_day_1.hourly_data;

    let tr = '';
    for (const idx in premierjour) {
        console.log(premierjour[idx].TMP2m); //TMP2m est le format 10.3
        let temp = premierjour[idx].TMP2m;
        tr += `<tr><td>${idx}</td><td>${temp}</td><td><img src="${premierjour[idx].ICON}"></td></tr>`;
    }
    document.querySelector('tbody').innerHTML = tr;
}

 