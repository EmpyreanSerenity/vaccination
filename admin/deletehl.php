

<?php	
include("dbcon.php");
$hid = $_GET['id'];
$sql = "update healthcenter  set flage=2 where  hid=".$hid;

$conn->query($sql);

 header('location:viewhlthcenter.php');



?>

