var cancelBtn = document.querySelectorAll('.cancelRent');
for(var i = 0; i < cancelBtn.length; i++){
  cancelBtn[i].addEventListener('submit', cancelRent);
}

function cancelRent(e){
  e.preventDefault();
  var idRent = e.target.id_rent.value;
  var idUser = e.target.id_user.value;
  var rentPPD = e.target.price_per_day.value;
  var userPPD = e.target.user_ppd.value;

  let params = [
    idRent,
    idUser,
    rentPPD,
    userPPD
  ];

  var xhr = new XMLHttpRequest();
    xhr.open('DELETE', 'http://localhost/ProiectOOP/public/rent', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        console.log(this.responseText);
    }

    
    xhr.send('params=' + encodeURIComponent(params));

    var btn = e.target.btn_cancel;
    btn.disabled = true;
    btn.style.background = '#000';
    btn.innerText = 'Canceled'
}