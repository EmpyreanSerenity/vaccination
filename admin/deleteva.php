

<?php	
include("dbcon.php");
$vid = $_GET['id'];
$sql = "update vaccine  set flage=2 where  vid=".$vid;

$conn->query($sql);

 header('location:viewvaccination.php');



?>

