<?php 
  $userObject = new View();

  $user = $userObject->showUser($_SESSION['username']);

  $currentUser = $user[0]['id'];

  $rents = $userObject->showUserRents($currentUser);

  // totalPrice = rent_length * price_per_day
  $totalPrice = 0.00;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/myRentals.css">
  <link rel="stylesheet" href="../css//mobileMyRentals.css">
  <script src="../js/navbar.js" defer></script>
  <script src="../js/cancelRent.js" defer></script>
  <title>My Rentals</title>
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
      <a href="http://localhost/ProiectOOP/public/cars">Cars</a>
      <a href="http://localhost/ProiectOOP/public/boats">Boats</a>
    </div>
  </div>
  <a href="http://localhost/ProiectOOP/public/contact">Contact</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>   
</div>

  <div id="showcase">
    <div class="showcase-content">
    <?php if(isset($rents[0]['PPD']) && $rents[0]['PPD'] !== null):?>
      <div class="intro">
        <h1>Hello, <span class="text-primary"><?php echo $rents[0]['username']?></span> check your rentals below</h1>
      </div>

      
      <div class="table-container">
        <table>
          <tr>
            <th>Nr.CRT</th>
            <th>Model</th>
            <th>Rent Length</th>
          </tr>

          <!-- foreach loop -->
          <?php foreach($rents as $index => $rent):?>
          <tr>
            <td><?php echo $index + 1?></td>
            <td><?php echo $rent['model_name']?></td>
            <td><?php echo $rent['rent_length'] .' days'?></td>
            <td>
              <form id="cancelRent" class="cancelRent">
                <input type="hidden" name="id_rent" value="<?php echo $rent['id'];?>">
                <input type="hidden" name="price_per_day" value="<?php echo $rent['price_per_day'];?>">
                <button type="submit" name="btn_cancel" class="btn-cancel">Cancel</button>
                <input type="hidden" name="id_user" value="<?php echo $currentUser ; ?>">
                <input type="hidden" name="user_ppd" value="<?php echo $rents[0]['PPD']; ?>">
              </form>
            </td>

          
          </tr>
          <?php $totalPrice += (double)$rent['rent_length'] * (double)$rent['price_per_day']?>
          
          <?php endforeach;?>
          <tr>
            <td>Price Per Day: <?php echo $rents[0]['PPD'] . ' €'?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Total Price: <?php echo $totalPrice . ' €'?></td>
            <td class="no-display"></td>
            <td class="no-display"></td>
          </tr>
        </table>
      </div>
      <?php endif;?>
      <?php if(!isset($rents[0]['PPD']) || $rents[0]['PPD'] === null): ?>
        <h1 class="intro">You have no current rentals</h1>
        <?php endif;?>
    </div>
  </div>
  
</body>
</html>