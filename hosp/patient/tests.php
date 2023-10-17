<?php 
include("dbcon.php");
require('../config/autoload.php'); 
$dao=new DataAccess();
echo "hai";
$date = $_POST['id'];
$doid = $_POST['doid'];
$q1="SELECT * from schedule WHERE ctime not IN (SELECT ctime FROM `booking` WHERE `d_id` =".$doid." AND `cdate`='".$date."');";

$info1=$dao->query($q1);
echo json_encode($info1);
// echo $q1;
// echo $date.$doid."sa";
?>