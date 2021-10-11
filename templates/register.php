<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/register.css">

    <script src="../js/navbar.js" defer></script>

    <title>Register</title>
</head>
<body>
<div class="sticky">
<div class="topnav" id="myTopnav">
    
  <a href="http://localhost/ProiectOOP/public/login" class="active">Login</a>
  <!-- <a href="http://localhost/ProiectOOP/public/home" >Home</a> -->
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
        <div class="container-register">
            <h1>Register</h1>
            <form action="http://localhost/ProiectOOP/public/register" method="POST">
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
                  <input type="submit" class="btn-register" name="register" value="Send">
                </div>
            </form>
        </div>
 </div>
</div>



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    -->
</body>
</html>