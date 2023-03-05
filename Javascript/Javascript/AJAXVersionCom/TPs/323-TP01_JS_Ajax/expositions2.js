var xhr = new XMLHttpRequest(); 

xhr.open('GET','expositions.json', true);

var btn = document.getElementById('btnInfosClub');
text= document.getElementById('infosClub');
btn.addEventListener('click', function (){
    xhr.onload = function () {
        // console.log(JSON.parse(xhr.responseText)[1]);
        var donnee =JSON.parse(xhr.responseText);
        console.log(donnee);
        expo(donnee);
    };
    xhr.send();
}
)

function expo (data){
    
     for (let i=0; i<data.length; i++){
        var stringData="";
        stringData += `<tr><td>${data[i].nomClub}</td> <td> ${data[i].theme}</td> <td>${data[i].date}</td></tr> `;
        text.insertAdjacentHTML('beforeend',stringData);
        // var stringData="" ET += sinon toutes les phrases ne s'affichent pas seulement la 1ère
    }
   
}