<?php
session_start();
include('connect.php');

$name = $_POST['itemname'];
$price = $_POST['price'];
$id = $_SESSION['user_id'];

$sql = "INSERT INTO items (res_id, name, price) VALUES ($id,'$name', $price)";
$con->query($sql);
header("location: menu.php");

?>
