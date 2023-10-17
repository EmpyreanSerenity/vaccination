<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible">
    <title>Document</title>
    <link rel="stylesheet" href="ui.css">
    
    
    
</head>

<body>
<?php include("header1.php");    
include("dbcon.php");

?>

<?php require('../config/autoload.php'); 

$iid = "";
$iname = "";
$name="";
$dao=new DataAccess();
$did = $_GET['id'];

?>


<?php
if(isset($_POST["btn_insert"]))
{
	
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
  }
  else
  {
$name=$_SESSION['email'];

$q5="select * from patient where email='".$name."'" ;

$info5=$dao->query($q5);

$pname=$info5[0]["pname"];

//0000000000000000000000000000000
$cdate = $_POST["cdate"];
$timestamp = strtotime($cdate);

$day = date('D', $timestamp);



if($day =='Sun')
{
  echo "<script> alert('Sorry Sunday Holiday Select Another Day');</script> ";
  
  echo"<script >location.href = 'booking.php?id=$did'</script>";
  }
  else
  {
  $cdate = $_POST["cdate"];
  
  $sq22="select date from holiday where '$cdate'=date";

 $result = $conn->query($sq22);
 if ($result->num_rows > 0) {
   
   echo "<script> alert('Sorry Hospital Holiday Select Another Day');</script> ";
   
   echo"<script >location.href = 'booking.php?id=$did'</script>";
 }
  
  else
  {
  
  $sql1="select docid from docleave where docid=$did and '$cdate' between f_date and t_date";

 $result = $conn->query($sql1);
 if ($result->num_rows > 0) {
   
   echo "<script> alert('Sorry Doctor Leave Select Another Day');</script> ";
   
   echo"<script >location.href = 'booking.php?id=$did'</script>";
 }

else
{

//0000000000000000000000000000000



 $q1="select * from doctor where docid=".$did ;

$info1=$dao->query($q1);

$bid=$info1[0]["deptid"];

$q2="select * from department where deptid=".$bid ;

$info2=$dao->query($q2);
$bname=$info2[0]["deptname"];

$dname=$info1[0]["docname"];
$did=$info1[0]["docid"];
$fees = $_POST["fees"];
$_SESSION['amount']=$fees;
$cdate = $_POST["cdate"];
$ctime = $_POST["ctime"];
$status=1;
$bdate=date('Y-m-d',time());
$sql = "INSERT INTO booking(email,docid,docname,fee,bookingdate,adate,status,ctime,deptname,pname) VALUES ('$name','$did' ,'$dname','$fees ','$bdate','$cdate','$status','$ctime','$bname','$pname')";

$conn->query($sql);
 header('location:payments.php');

}}}}}

?>


<?php
$dao=new DataAccess();
?>

<?php	$iid=$_GET['id']; 



			 $q="select * from doctor where d_id=".$iid ;

$info=$dao->query($q);
$iname=$info[0]["d_name"];
?>
 
   

<form action="" method="POST" enctype="multipart/form-data">

 <div class="upper">
        <div class="upper-left">
<?php 
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php } ?>
            <h3>Doctor Details</h3><input type="hidden" id="doid" value="<?php echo $did; ?>">
            <img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[0]["d_image"]; ?> alt=" " class="img-responsive" />
        </div>
        <div class="content">
            <h3>Details</h3>
            <div style="display: block;">
                <label for="name">Doctor Name:</label><br>
                
                <label for="name"><?php echo $info[0]["d_name"]; ?></label><br>
                 <label for="price">Fees:</label><br>
                <input id="price" name="fees" type="text" value="<?php echo $info[0]["d_fee"];  ?>" readonly style="margin-top: 8px;"><br>
                <label for="qty">Consulting  Date</label><br>
                <input id="cdate" name="cdate" type="date"  style="margin-top: 8px;"><br>
               Time
<div class="row">
                    <div class="col-md-6">
<select name="ctime" id="ctimei">
<option>-Select-</option>
<?php

// $sql="SELECT * FROM schedule";
// $result = $conn->query($sql);;
// while($row = $result->fetch_assoc()
// {
?>
  <!-- <option value='<?php// echo $row["ctime"];?>'><?php// echo $row["ctime"]; ?></option> -->
<?php
// }
?>
  </select>
<div class="btn-grp">
                <button class="buttons" name="btn_insert" id="btn-1">Book</button>
               
    </div>

</div>
</div>

<br>
                
                
            </div>
        </div>
    </div>
    <div class="lower">
        
    </form>
</body>
<?php include("userfooter.php");	?>
</html>

<script type="text/javascript">
  $(document).ready(function () {
    alert("hai");

$('#cdate').change(function() {
    var date = $(this).val();
    var doid=$("#doid").val();
    alert(doid);
//alert(date);
 // retrive data from table and set to input box  and scroll to top

       //alert(Editid);
       $.ajax({
         type: "POST",
         url:  "test.php", 
         data: {id:date,doid:doid},
         dataType: "json",  
         cache:false,
         success: 
         function(data){
          var htm='';
          alert("hh");
          for (var x = 0; x < data.length; x++) {

            htm+='<option value='+data[x].ctime+'>'+data[x].ctime+'</option>';
            // remarks=data[x].cdate;
         }
          $("#ctimei").html(htm);
           }
          });// you have missed this bracket

     // window.location.replace("<?php //echo base_url("home/editionEdit/") ?>"+Editid);
});
  
   });
</script>