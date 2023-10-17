<?php include("userheader.php");	?>
<?php include("header1.php");	?>

<?php require('../config/autoload.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $name=$_SESSION['email'];
   if(isset($_SESSION['email']))
   {
     
 if(isset($_POST["book"]))
{
    // echo "hai";
	header('location:displayspec.php');
}
else if(isset($_POST["home"]))
{
     header('location:header.php');
}
  
	   
	    ?>
         
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> BOOKING DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Doctor Name</th>
                        <th>Consulting Date</th>
                        <th>CANCEL</th>
                    
                    </tr>
<?php
    
    $actions=array(
    
    
    'delete'=>array('label'=>'CANCEL','link'=>'cancel.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );

   $condition="email='".$name."' and status=2";
   
   $join=array(
       
    );  
	$fields=array('bid','d_name','cdate');

    $users=$dao->selectAsTable($fields,'booking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


          
<form action="" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="home" >Home</button>
<button class="btn btn-success" type="submit" style="margin-right: 2px;"  name="book" >New Booking</button>
</form>


            
            
         
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

 <?php }
        ?>  