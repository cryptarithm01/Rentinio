var boatRent = document.querySelectorAll('.boat_rent');
//console.log(boatRent[0]);

for(var i = 0; i < boatRent.length; i++){
  boatRent[i].addEventListener('submit', rental);
}




function rental(e){
  e.preventDefault();
  console.log('Rent Button Pressed!');
  // attribute name can be accessed with target.name
  var boat_id = e.target.boat_id.value;
  //console.log(boat_id);

  var boat_price = e.target.boat_price.value;

  let params = [
    boat_id,
    boat_price
  ];

  var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/ProiectOOP/public/rent', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        console.log(this.responseText);
    }

    //xhr.send('offerParams=' + encodeURIComponent(params)); 
    xhr.send('offerParams=' + encodeURIComponent(params));

    var offerBTN = e.target.mybtn;
    offerBTN.innerText = 'Assigned';
    offerBTN.style.backgroundColor = 'red';
    offerBTN.style.color = '#fff';
    offerBTN.disabled = true;
}