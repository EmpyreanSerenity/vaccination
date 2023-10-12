

<?php	
include("dbcon.php");
$sid = $_GET['id'];
$sql = "update schedule  set flag=2 where  sid=".$sid;

$conn->query($sql);

 header('location:viewschedule.php');



?>

