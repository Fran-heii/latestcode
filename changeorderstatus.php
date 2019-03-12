<?php  
include("connect.php");
session_start(); 

$newstatus = $_POST['orderstatus'];
$orderID = $_POST['order'];

/* start
// Before using $_POST['value']
if (isset($_POST['order']))
{
// Instructions if $_POST['value'] exist
} 
else
{
	echo "<script type='text/javascript'>
        alert('You didn't select any orders, Please Try Again!');
        window.location='resorders.php';
	      </script>";
}

 ends
*/

if(empty($orderID)) 
{
  echo("You didn't select any orders.");
	echo "<script type='text/javascript'>
    alert('You didn't select any orders, Please Try Again!');
    window.location='resorders.php';
  </script>";
} 
else 
{

  $N = count($orderID);

  for($i=0; $i < $N; $i++)
  {
    echo($orderID[$i] . " ");
    
    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    } 

    $sql = "UPDATE orders SET status = '$newstatus' WHERE id = $orderID[$i];";
    if ($con->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $con->error;
    }
    
    header("location: resorders.php");
    
  }
}


?>