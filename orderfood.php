<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table 
        {
            width: 50%;
            border-collapse: collapse;
        }

        table, td, th 
        {
            border: 1px solid black;
            padding: 5px;
        }
        th {text-align: left;}
    </style>
</head>

<body>
    <form action="confirmorder.php" method="post">
    
        <?php
            // q is restaurant id received as session parameter from placeorder.php page
            $q = $_GET['q'];

            if (!$con) 
            {
                die('Could not connect: ' . mysqli_error($con));
            }

            // only available menu items will be displayed to customer
            $sql="SELECT * FROM items WHERE res_id = '".$q."' and isavailable = 'Available'";
            $result = mysqli_query($con,$sql);

            echo "<table>
            <tr>
            <th>Select</th>
            <th>Item Name</th>
            <th>Price (€)</th>
            </tr>";
            while($row = mysqli_fetch_array($result)) 
            {
                echo "<tr>";
                echo "<td> <input type='checkbox' name='ordereditem[]' value=" . $row['name'] ."> </td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>

        <input type="hidden" name="q" value="<?php echo $q;?>">            
        <br>
        <input type="submit" name="formSubmit" value="Place Your Order" />

    </form>

</body>

</html>