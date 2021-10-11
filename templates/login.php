<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/login.css">

    <script src="../js/navbar.js" defer></script>

    <title>Login</title>
</head>
<body>
<div class="sticky">
<div class="topnav" id="myTopnav">
    
  <a href="http://localhost/ProiectOOP/public/home" class="active">Home</a>
  <!-- <a href="http://localhost/ProiectOOP/public/login"></a> -->
  <a href="http://localhost/ProiectOOP/public/contact">Contact</a>
  <!-- <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> -->
  <a href="http://localhost/ProiectOOP/public/about">About</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>   
</div>

<div id="showcase">
    <div class="showcase-content"> 
        <div class="container-login">
            <h1>Login</h1>
            <form action="http://localhost/ProiectOOP/public/auth" method="POST">
                <div class="form-group">
                 <label for="username" ><h3>Username:</h3></label>
                 <input class="input-field" type="text" name="username" autocomplete="off" required>
                </div>
                
                <div class="form-group">
                  <label for="password" ><h3>Password:</h3></label>
                  <input class="input-field" type="password" name="password" autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label for="password-confirm" ><h3>Confirm Password:</h3></label>
                  <input class="input-field" type="password" name="password-confirm" autocomplete="off" required>
                </div> 
                
                <div class="form-group"> 
                  <input type="submit" class="btn-login" name="login" value="Login">
                </div>
            </form>
        </div>
 </div>
</div>


</body>
</html>