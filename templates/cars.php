<?php
// counting displayed offers
  $counter = 0;
  $userObject = new View();
  $cars = $userObject->showCarOffers();
  
  $rents = $userObject->getUniqueOffers();

  $user = $userObject->showUser($_SESSION['username']);
  $currentUser = $user[0]['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/carRental.css">
  <link rel="stylesheet" href="../css/mobileCarRental.css">

  <script src="../js/navbar.js" defer></script>
  <script src="../js/rentCar.js" defer></script>
  <title>Car Rental</title>
</head>
<body>
 
  <div class="sticky">
<div class="topnav" id="myTopnav">
    
  <a href="http://localhost/ProiectOOP/public/home" class="active">Home</a>
  

  <div class="mydropdown">
    <button class="dropbtn">Offers
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="mydropdown-content">
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
  <div class="container">
      <div class="table-responsive-sm">

     
      <table class="table table-bordered">
      <thead>
      
    <h1>
      <?php 

        foreach($cars as $index => $car): ?>
          <?php 
          $rentedOffers = $userObject->showUniqueOffers($cars[$index]['id'], $currentUser);
          if($rentedOffers === null):
         ?>
          
          <tr>
            
            <td class="model">
              Model: <?php echo $car['model_name']?>
              
            </td>
            
            <td>
              Features: <?php echo $car['features']?>
            </td>

            <td>
              Rent Length: <?php echo $car['rent_length'] .' days'?>
            </td>

            <td>
             Price/Day: <?php echo $car['price_per_day'] . ' €'?>
            </td>

            <td><img src="../images/car_<?php echo $index?>.jpg"></td>
            <td>
              <form id="car_rent" class="car_rent" name="car_rent">
                <input type="hidden" name="car_id" value="<?php echo $car['id']?>">
                <button class="mybtn" name="mybtn" type="submit">Take Offer</button>
                <input type="hidden" name="car_price" value="<?php echo $car['price_per_day']?>">
              </form>
            </td>
        </tr>
      
        <?php $counter++;?>
      <?php endif;?>
      <?php endforeach;?>
      <?php if($counter === 0):?>
        <h1 style="text-align: center; color:#fff;">Waiting On New Offers...</h1>
      <?php endif;?>
    </h1>
    </thead>
    </table>
    </div>
  </div>
  </div>
</div>
</body>
</html>