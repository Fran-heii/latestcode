<?php  
include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>

<script>
    function showMenu(str) 
        {
            if (str == "") 
            {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } 
            else 
            { 
                if (window.XMLHttpRequest) 
                {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
                else 
                {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                // calling orderfood.php with restaurant id (q) as a parameter
                xmlhttp.open("GET","orderfood.php?q="+str,true);
                xmlhttp.send();
            }
        }       
</script>

</head>


<body bgcolor="C9EC3C">

<h2>Select Restaurant and Menu: </h2>

<?php
    $result = mysqli_query($con, "SELECT id, name FROM restaurants;");

    // showMenu function written in script above gets called when we select restaurant
    echo "<select name='reslist' id='resdropdown' onchange = 'showMenu(this.value)'>";
    echo "<option value= ''> Choose Restaurant for Your Order </option>";

    while ($row = mysqli_fetch_array($result))
    {
        echo "<option value='" . $row['id'] ."'>" . $row['name'] . "</option>";
    }
    echo "</select>";

?>
 
<br> <br>
<div id="txtHint"><b>Menu items for selected Restaurant will be listed below </b></div>

<br>
<form action="index.php">
    <input type="submit" value="Back to Home Page" />
</form>

</body>

</html>