<?php  
include("connect.php");
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>

  <!-- CSS to format the page -->
  <style>
    .container 
    {
      width: 300px;
      clear: both;
    }
    .container input
    {
      width: 300px;
      clear: both;
    }
  </style>

  <!-- javascript code for field validations -->
  <script>
    function validateForm() 
    {
      var a = document.forms["menu"]["itemname"].value;
      if (a == "") 
      {
        alert("Item Name can't be empty");
        return false;
      }
      var b = document.forms["menu"]["price"].value;
      if (b == "") 
      {
        alert("Price can't be empty");
        return false;
      }
    }
  </script>


</head>

<body bgcolor="C9EC3C">

<h3>Add Item to Your Restaurant's Menu </h3>
<h2>
<?php
  // Echo session variables that were set on previous page
  echo "Welcome " . $_SESSION["name"] . "<br>";
  ?>
</h2>

<div class="container">
  <form name="menu", action="item_router.php", onsubmit="return validateForm()", method="post">
    Item Name: <input type="text" name="itemname"><br> <br>
    Price: <input type="number" step="0.1" name="price"><br><br>
</div>
    <input type="submit" value = "Add Item">
  </form>

  <br><br>
  <form action="admin-page.php">
        <input type="submit" value="Back to Admin Page" />
  </form>
 
  
</body>

</html>