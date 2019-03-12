<?php  
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- javascript code for field validations -->
  <script>
    function validateForm() 
    {
      var a = document.forms["order"]["custname"].value;
      if (a == "") 
      {
        alert("Customer Name can't be empty");
        return false;
      }
      var b = document.forms["order"]["custaddress"].value;
      if (b == "") 
      {
        alert("Customer Address can't be empty");
        return false;
      }
      var c = document.forms["order"]["custnumber"].value;
      if (c == "") 
      {
        alert("Mobile Number is Mandatory");
        return false;
      }

    }
  </script>

  <style>
    table 
    {
        width: 50%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    table, td, th 
    {
        border: 1px solid black;
        padding: 5px;
    }
    th {text-align: left;}
  
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

</head>

<body bgcolor = 'C9EC3C'>
    
<h2>Confirm Your Order</h2>

  <form name ="order", action="orderplaced.php", onsubmit = "return validateForm()", method="post">

    <?php
    $total = 0;
    $res_id = $_POST['q'];

    $orderedmenuitem = $_POST['ordereditem'];

    if(empty($orderedmenuitem)) 
    {
      echo("You have not selected any menu items.");
    } 
    else 
    {
      $N = count($orderedmenuitem);

      echo("You have selected $N Menu Item(s): "); 

      echo "<table>
      <tr>
      <th>Item Name</th>
      <th>Price (€)</th>
      <th>Quantity</th>
      </tr>
      </table>";
          

      for($i=0; $i < $N; $i++)
      {
        
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        } 
        
        $sql="SELECT name,price FROM items WHERE name = '$orderedmenuitem[$i]';";
        $result = mysqli_query($con,$sql);
 
    
        while($row = mysqli_fetch_array($result)) 
        {
            echo "<table>";
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . '1' . "</td>";
            echo "</tr>";
          
        }
        echo "</table>";
        
        $sql1="SELECT name,price FROM items WHERE name = '$orderedmenuitem[$i]';";
        $result1 = mysqli_query($con,$sql1);
        while($row = mysqli_fetch_array($result1)) 
        {
            $total = $total + $row['price'];            
        }
      
        //header("location: menu.php");
        
      }

    echo "<div class='container'>";

    echo "<br>";
    echo "<label>Enter your Name : </label>";
    echo "<input type='text' name = 'custname'>";

    echo "<br>";
    echo "<br>";
    echo "<label>Enter your Address : </label>";
    echo "<input type='text' name = 'custaddress'>";

    echo "<br>";
    echo "<br>";
    echo "<label>Your Mobile Number : </label>";
    echo "<input type='number' name = 'custnumber'>";

    echo "</div>";
   
    echo "<h2 name ='total'> Total Cost :" . $total . "</h2> ";

    }


    ?>

    <br>

    <input type="hidden" name="total" value="<?php echo $total;?>">
    
    <input type="hidden" name="resid" value="<?php echo $res_id;?>">
    
    <input type="submit" value="Confirm order">
  
  </form>

</body>
</html>