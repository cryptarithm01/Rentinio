<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/contact.css">
  <script src="../js/navbar.js" defer></script>
  <title>Contact Us</title>
</head>
<body>

<div class="sticky">
<div class="topnav" id="myTopnav">

  <a href="http://localhost/ProiectOOP/public/">Register</a>
  <a href="http://localhost/ProiectOOP/public/login">Login</a>
  <a href="http://localhost/ProiectOOP/public/about">About</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>   
</div>

<div id="showcase">
  <div class="showcase-content">
  <h1 class="intro">Please use the form below to contact us</h1>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email">
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
      </div>
      <button type="submit" class="btn">Send</button>
    </form>
  </div>
  </div>
</div>
  
</body>
</html>