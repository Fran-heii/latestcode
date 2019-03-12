<?php  
include("connect.php");
session_start(); 

$menuitem = $_POST['menu'];

if(empty($menuitem)) 
{
  //echo("You didn't select any memu Items.");
  header ("location: ./menu.php");
} 
else 
{
  // how many items selected
  $N = count($menuitem);

  echo("You selected $N Menu(s): ");

  for($i=0; $i < $N; $i++)
  {
    echo($menuitem[$i] . " ");
        
    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    } 
  
    /* RJH Start */

    $result = mysqli_query($con, "SELECT * FROM items WHERE name = '$menuitem[$i]';");
    while($row = mysqli_fetch_array($result))    
    {

      if ($row['isavailable'] == 'Available')
      {
        $sql = "UPDATE items SET isavailable = 'Not Available'  WHERE name = '$menuitem[$i]';";
      }
      else
      {
        $sql = "UPDATE items SET isavailable = 'Available'  WHERE name = '$menuitem[$i]';";
      }
    
      if ($con->query($sql) === TRUE) 
      {
          echo "Record updated successfully";
      } else 
      {
          echo "Error updating record: " . $con->error;
      }
      
    }
    /* RJH Ends */


    /* Original Starts 

    $sql = "UPDATE items SET isavailable = 'Not Available'  WHERE name = '$menuitem[$i]';";
    if ($con->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } else 
    {
        echo "Error updating record: " . $con->error;
    }
    
    Original Ends */

    header("location: menu.php");    
  }

}

//header("location: menu.php");

?>