

<?php	
include("dbcon.php");
$vid = $_GET['vid'];
$sql = "update vaccine  set status=2 where  vid=".$vid;

$conn->query($sql);

 header('location:viewvaccination.php');



?>

