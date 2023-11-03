<?php $conn = new mysqli("localhost","root", "", "vaccination"); ?>
<?php
include("header2.php");
$cid = $_GET['cid'];

$sql = "delete from child where cid=$cid";
echo $sql;
$conn->query($sql);


//header('location:viewleaves.php');
echo "<script> alert('Child details dropped'); </script>";
    echo "<script> location.replace('viewchilds.php'); </script>";
?>