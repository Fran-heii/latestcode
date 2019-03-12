<?php
include 'connect.php';

  // htmlspecialchars converts special characters entered in fields except phone to HTML characters
  $name = htmlspecialchars($_POST['resname']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $address = htmlspecialchars($_POST['address']);
  $phone = $_POST['phone'];

  // query to insert restaurant into table
  $sql = "INSERT INTO restaurants (name, username, password, address, contact) 
          VALUES ('$name', '$username', '$password', '$address', $phone);";

  if ($con->query($sql) === TRUE) 
  {
    echo "<script type='text/javascript'>
    alert('Restaurant Registered Successfully');
    window.location='login.php';
    </script>";
  } 

  else 
  {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

?>
