<?php  
include("connect.php");
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Registration</title>

  <!-- CSS to format Registration page -->
  <style>
    .container 
    {
      width: 400px;
      clear: both;
    }
    .container input
    {
      width: 400px;
      clear: both;
    }
  </style>

  <!-- javascript code for field validations -->
  <script>
    function validateForm() 
    {
      var a = document.forms["register"]["resname"].value;
      if (a == "") 
      {
        alert("Restaurant Name can't be empty");
        return false;
      }
      var b = document.forms["register"]["username"].value;
      if (b == "") 
      {
        alert("User ID can't be empty");
        return false;
      }
      var c = document.forms["register"]["password"].value;
      if (c == "") 
      {
        alert("Password can't be empty");
        return false;
      }
      var d = document.forms["register"]["phone"].value;
      if (d == "") 
      {
        alert("Mobile can't be empty");
        return false;
      }
      var e = document.forms["register"]["address"].value;
      if (e == "") 
      {
        alert("Address can't be empty");
        return false;
      }
    }
  </script>

</head>

<body bgcolor="C9EC3C">

<h3>Register Your Restaurant here: </h3>
  
  <div class="container">
    <form name="register", action="add_restaurant_route.php", onsubmit = "return validateForm()", method="post">
        Restaurant Name: <input type="text" name="resname"><br> <br>
        User Name: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        Phone: <input type="number" name="phone"><br><br>
        Address: <input type="text" name="address"><br><br>
  </div>
        <button type="submit" class="registerbtn">REGISTER</button>
    </form>
<br><br>

<label for="">Already Have Accoount?</label>
<a href="./login.php">Login</a>

</body>
</html>