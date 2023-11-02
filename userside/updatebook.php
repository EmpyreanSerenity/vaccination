<?php require('../config/autoload.php');
include("dbcon.php");
$id=$_GET['id'] ;
$sql="update booking set status=2 where bookid=".$id;
$conn->query($sql);
echo"<script> location.replace('healthworkerview.php'); </script>";
?>
