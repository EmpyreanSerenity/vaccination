

<?php	
include("dbcon.php");
$bid = $_GET['id'];
$date1=date('Y-m-d',time());
$sql = "update booking set status=4 where bid=".$bid;

$conn->query($sql);

 header('location:patientconsult.php');



?>

