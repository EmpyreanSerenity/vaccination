
<?php	
include("dbcon.php");
$id = $_GET['id'];
$sql = "update booking set status=3 where bookid=".$id;

$conn->query($sql);

 header('location:viewbooking1.php');



?>

