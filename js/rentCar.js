var carRent = document.querySelectorAll('.car_rent');

for(var i = 0; i < carRent.length; i++){
  carRent[i].addEventListener('submit', rental);
}






function rental(e){
  e.preventDefault();
  console.log('Rent Button Pressed!');
  // attribute name can be accessed with target.name
  var car_id = e.target.car_id.value;
  var car_price = e.target.car_price.value;

  let params = [
    car_id,
    car_price
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

