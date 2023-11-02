<?php $conn = new mysqli("localhost","root", "", "vaccine"); ?>
<?php
include("header.php");
$id = $_GET['id'];

$sql = "delete from child where cid=".$id;
echo $sql;
$conn->query($sql);


//header('location:viewleaves.php');
echo "<script> alert('Child details dropped'); </script>";
    echo "<script> location.replace('viewchilds.php'); </script>";
?>