<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 	

    <!-- Page Title -->
    <title>Dublin Food Ordering Services</title>
    <!-- Favicon - Title page icon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- css for formatting table -->
    <style>
    table 
    {
        width: 100%;
        border-collapse: collapse;
        width: 50%
    }

    table, td, th 
    {
        border: 1px solid black;
        padding: 5px;
    }
        th {text-align: left;}
    </style>

</head>

<body bgcolor="C9EC3C">
    
    <form action="admin-page.php">
        <input type="submit" value="Back to Admin Page" />
    </form>

    <h2>    
    <?php
    // Echo session variables that were set on previous page
    echo "Restaurant Name: " . $_SESSION["name"] . "<br>";
    ?>
    </h2>

    <h3>Manage your Restuarant Menu Here: </h3>

    <form action="add_item.php">
        <input type="submit" value="Add Menu Items" />
    </form>
    
    <br>

    <form action="deleteitem.php" method="post">

        <?php

            $resname = $_SESSION["name"];
            $id = $_SESSION['user_id'];
    
            // fetching all menu items in result variable for specific restaurant
            $sql="SELECT * FROM items WHERE res_id = '".$id."'";
            $result = mysqli_query($con,$sql);
        
            // tr = table row, th = table header, td = table data
            echo "<table width=300>
            <tr>
            <th>Select</th>
            <th>Menu Item Name</th>
            <th>Price per Unit (€)</th>
            <th>Item Availability</th>
            </tr>";
    
            // for as many rows as number of items
            while($row = mysqli_fetch_array($result)) 
            {
                echo "<tr>";
                echo "<td> <input type='checkbox' name='menu[]' value=" . $row['name'] ."> </td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['isavailable'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>  

        <br>
        
        <input type="submit" name="formSubmit" value="Select item(s) & Click Here to Change Availablity" /> <br> <br>

    </form>

    <br>
    

</body>

</html>