<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update booking set status=3 where  bookingid=".$bid;

$conn->query($sql);

 header('location:viewbooking.php');



?>
