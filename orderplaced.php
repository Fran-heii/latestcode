<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body bgcolor="C9EC3C">
    
    <?php
    include('connect.php');

    $amount = $_POST['total'];
    $custname = $_POST['custname'];
    $custaddress = $_POST['custaddress'];
    $phone = $_POST['custnumber'];
    $rest_id = $_POST['resid'];

    $sql = "INSERT INTO orders (res_id, cust_address, cust_name, cust_mobile,total) VALUES ($rest_id,'$custaddress', '$custname', $phone, $amount)";

    if ($con->query($sql) === TRUE) {
        $last_id = $con->insert_id;
        echo "Order Placed successfully. Order ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    echo "<br>";
    echo "<br>";
    echo "<a href='track.php'>Track your order</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='placeorder.php'>Place another order</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='index.php'>Go to Home</a>";

    ?>

</body>
</html>