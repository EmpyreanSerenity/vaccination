<?php include("userheader.php");	?>
<?php include("header1.php");	?>

<?php require('../config/autoload.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $name=$_SESSION['email'];
 if(isset($_POST["booking"]))
{
     
	 header('location:displayspec.php');
}
   if(isset($_POST["home"]))
{
     header('location:header.php');
}
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
	   }
	   else
	   { 
	  
	   
	    ?>
         
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> CONSULTING  DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Doctor Name</th>
                      
                        <th>Medicine</th>
                            <th>Findings</th>
                                <th>Conslt Date</th>
                                    <th>Next Visit</th>
                                    
                        <th>Remarks</th>
                    
                    </tr>
<?php
    
    $actions=array(
    
    
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array()
        
        
    );

   $condition="email='".$name."'";
   
   $join=array('doctor as d'=>array('d.d_id=c.d_id','join'),
       
    );  
	$fields=array('d.d_name','medicine','findings','cdate','nextvisit','remark');

    $users=$dao->selectAsTable($fields,'prescription as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


          
<form action="" method="POST" enctype="multipart/form-data">



</form>


            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php } ?>