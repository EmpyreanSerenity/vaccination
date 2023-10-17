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
<?php include("header1.php");    ?>
<?php   
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
    
$name=$_SESSION['email'];
echo $name;
$q5="select * from patient where email='".$name."'" ;

$info5=$dao->query($q5);

$pname=$info5[0]["fname"];

//0000000000000000000000000000000
$cdate = $_POST["cdate"];
$timestamp = strtotime($cdate);

$day = date('D', $timestamp);


echo $day;
if($day =='Sun')
{
  echo "<script> alert('Sorry Sunday Holiday Select Another Day');</script> ";
  
  echo"<script >location.href = 'booking.php?id=$did'</script>";
  }
  else
  {
  $cdate = $_POST["cdate"];
  
  $sq22="select date from hoilday where '$cdate'=date";

 $result = $conn->query($sq22);
 if ($result->num_rows > 0) {
   
   echo "<script> alert('Sorry Hospital Holiday Select Another Day');</script> ";
   
   echo"<script >location.href = 'booking.php?id=$did'</script>";
 }
  
  else
  {
  
  $sql1="select d_id from docleave where d_id=$did and '$cdate' between f_date and t_date";

 $result = $conn->query($sql1);
 if ($result->num_rows > 0) {
   
   echo "<script> alert('Sorry Doctor Leave Select Another Day');</script> ";
   
   echo"<script >location.href = 'booking.php?id=$did'</script>";
 }

else
{

//0000000000000000000000000000000

echo "hai";

 $q1="select * from doctor where d_id=".$did ;

$info1=$dao->query($q1);

$bid=$info1[0]["sp_id"];

$q2="select * from specilization where sp_id=".$bid ;

$info2=$dao->query($q2);
$bname=$info2[0]["sp_name"];

$dname=$info1[0]["d_name"];
$did=$info1[0]["d_id"];
$fees = $_POST["fees"];
$_SESSION['amount']=$fees;
$cdate = $_POST["cdate"];
$ctime = $_POST["ctime"];
$status=1;
$bdate=date('Y-m-d',time());
$sql = "INSERT INTO booking(email,d_id,d_name,d_fee,bdate,cdate,status,ctime,sp_name,fname) VALUES ('$name','$did' ,'$dname','$fees ','$bdate','$cdate','$status','$ctime','$bname','$pname')";
echo $sql;
$conn->query($sql);
 header('location:payments.php');

}}}}


?>


<?php
$dao=new DataAccess();
?>

<?php   $iid=$_GET['id']; 



             $q="select * from doctor where d_id=".$iid;

$info=$dao->query($q);
$iname=$info[0]["d_name"];
?>
 
   

<form action="" method="POST" enctype="multipart/form-data" >

 <div class="upper" style="background-color: whitesmoke;">

        <div class="upper-left">
<?php 
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
    
    
?>



<?php } ?>
            <h3></h3><input type="hidden" id="doid" value="<?php echo $iid; ?>">
            <img style="width:300px; height:300px" src=<?php echo BASE_URL."uploads/".$info[0]["d_image"]; ?> alt=" " class="img-responsive" />
        </div>
        <div class="content">
            <h3>Details</h3>
            <div style="display: block;">
                <label for="name">Doctor Name:</label><br>
                
                <label for="name"><?php echo $info[0]["d_name"]; ?></label><br>
                 <label for="price">Fees:</label><br>
                <input id="price" name="fees" type="text" value="<?php echo $info[0]["d_fee"];  ?>" readonly style="margin-top: 8px;"><br>
                <label for="qty">Consulting  Date</label><br>
                <input id="cdate" min="<?php echo date("Y-m-d");?>" name="cdate" type="date"  style="margin-top: 8px;"><br>
               Time
<div class="row">
                    <div class="col-md-6">
<select name="ctime" id="ctimei">
<option>-Select-</option>

<?php


 //$sql="SELECT * FROM schedule";
//$result = $conn->query($sql);;
// while($row = $result->fetch_assoc()
// {
?>
  <!-- <option value='<?php// echo $row["ctime"];?>'><?php// echo $row["ctime"]; ?></option> -->
<?php
// }
?>
  </select>
<div class="btn-grp">
                <button class="buttons" name="btn_insert" id="btn-1" style="width: 50px;">Book</button>
               
    </div>

</div>
</div>

<br>
                
                
            </div>
        </div>
    </div>
</div>
    <div class="lower" style="background-color:whitesmoke;">
        
    </form>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function () {

$('#cdate').change(function() {
    var date = $(this).val();
    var doid=$("#doid").val();
    alert(doid);
alert(date);
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
