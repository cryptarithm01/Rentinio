<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/mobile.css">
    
    <script src="../js/navbar.js" defer></script>
    <script src="../js/showOffers.js" defer></script>

    <title>Home</title>
</head>
<body>
<div class="sticky">
<div class="topnav" id="myTopnav">

  <div class="dropdown active">
    <button class="dropbtn active">Offers
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="http://localhost/ProiectOOP/public/cars">Cars</a>
      <a href="http://localhost/ProiectOOP/public/boats">Boats</a>
    </div>
  </div>
  <a href="http://localhost/ProiectOOP/public/rentals">My Rentals</a>
  <a href="http://localhost/ProiectOOP/public/contact">Contact</a>
  
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>   
</div>


<div id="showcase">
    <div class="showcase-content"> 
    <h1 id="offers-header" class = "offers-header">Check Offers </h1>
    <button id="offers-btn"><h3>Get Started</h3></button>

    <div id="showcase-offers">
     <div id="car-offers"><h1 id="car-label">Cars</h1></div>
     <div id="boat-offers"><h1 id="boat-label">Boats</h1></div>
    </div>
            
       
 </div>
</div>
</body>
</html>