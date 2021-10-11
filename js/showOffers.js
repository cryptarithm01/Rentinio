var offers = document.getElementById('offers-btn');
var btn = document.getElementById('offers-btn');
var text = document.getElementById('offers-header');
var cars_label = document.getElementById('car-label'); 
var boats_label = document.getElementById('boat-label');


cars_label.style.color = 'white';
cars_label.style.display = 'none';

boats_label.style.color = 'white';
boats_label.style.display = 'none';

offers.addEventListener('click', getOffers);

function getOffers(e){
    e.preventDefault();

    // var offerList = document.getElementById('showcase-offers');
    var carOffers = document.getElementById('car-offers');
    var boatOffers = document.getElementById('boat-offers');

    // ajax request
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://localhost/ProiectOOP/public/offers', true);

    xhr.onload = function(){
        var data = JSON.parse(this.responseText);
        //console.log(data.cars[0].model_name); works..
        //console.log(data.boats.length);
        //console.log(data.cars.length);

         // for each offer build table to display offer to client
         for(var i = 0; i < data.length; i++){
            
            let offerTable = document.createElement('table');
            let thead = document.createElement('thead');
            let tbody = document.createElement('tbody');

            offerTable.appendChild(thead);
            offerTable.appendChild(tbody);

            /*
            let row_1 = document.createElement('tr');
            let heading_1 = document.createElement('th');
            

            row_1.appendChild(heading_1);
            thead.appendChild(row_1);
            heading_1.innerHTML = `${data[i].offer}`;
            */

            let row_2 = document.createElement('tr');
            let heading_2 = document.createElement('th');
            

            row_2.appendChild(heading_2);
            thead.appendChild(row_2);
            heading_2.innerHTML = `${data[i].model_name}`;

            let row_3 = document.createElement('tr');
            let heading_3 = document.createElement('th');
            

            row_3.appendChild(heading_3);
            thead.appendChild(row_3);
            heading_3.innerHTML = `${data[i].features}`;

            let row_4 = document.createElement('tr');
            let heading_4 = document.createElement('th');
            
           
            row_4.appendChild(heading_4);
            thead.appendChild(row_4);
            heading_4.innerHTML = `Per day: ${data[i].price_per_day} €`;


            let check_offer = document.createElement('form');
            let rent_type = document.createElement('input');
            rent_type.setAttribute("name", "rent_type");
            rent_type.setAttribute("type", "text");
            rent_type.setAttribute(`value`, `${data[i].rent_type}`);
            rent_type.style.visibility = 'hidden';

            let btn_check = document.createElement('input');
            btn_check.setAttribute("id", "check-offer");
            btn_check.setAttribute("type", "submit");
            btn_check.setAttribute("value", "Check");
            
            check_offer.addEventListener('submit', checkOffer);

            check_offer.appendChild(btn_check);
            check_offer.appendChild(rent_type);
            
             
            let row_5 = document.createElement('tr');
            let heading_5 = document.createElement('th');
            heading_5.appendChild(check_offer);

            row_5.appendChild(heading_5);
            thead.appendChild(row_5);
            
            

            if(data[i].rent_type === 'car'){
                // console.log(data[i].model_name);
                // carOffers.appendChild(offerTable);

            
                carOffers.appendChild(offerTable);
               
                // append to specific div
            }

            if(data[i].rent_type === 'boat'){
                //console.log(data[i].model_name);
                boatOffers.appendChild(offerTable);
            }
        }

        
    }

    
    
    xhr.send();

    // btn.disabled = true;
    // btn.style.visibility = 'hidden';

    // removing button
    btn.parentNode.removeChild(btn);
    text.parentNode.removeChild(text);

    cars_label.style.display = 'block';
    boats_label.style.display = 'block';
    
}

function checkOffer(e) {
    e.preventDefault();
    //window.location.href = "http://localhost/ProiectOOP/public/login";
   // console.log(e.target.rent_type.value);

    var show = e.target.rent_type.value;
    
    switch(show){
        case 'car':
            console.log('redirecting to cars page');
            window.location.href = "http://localhost/ProiectOOP/public/cars";
            break;
        
        case 'boat':
            console.log('redirecting to boats page');
            window.location.href = "http://localhost/ProiectOOP/public/boats";
            break;

        default:
            console.log('unknown request!');
            break;
    }
    
}