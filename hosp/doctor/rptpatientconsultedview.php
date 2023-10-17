<?php include("oghead.php");	?>
<?php require('../config/autoload.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $name=$_SESSION['did'];
   $cdate=$_SESSION['cdate'];

if(!isset($_SESSION['cdate']))
   {
	   header('location:oghead.php');

	   }
	   else
	   { 
	   ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-8">
            
            <H1><center> Patient Details</center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Patient Name</th>
                       
                         
                        <th>Mail id</th>
                       
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );
$condition="cdate='".$cdate."' and status=4 and d_id=".$name."";

   //$condition="did=".$name."and cdate="'".$cdate."'"  and status=2";
   
   $join=array(
      
    );  
	$fields=array('bid','fname','email');

    $users=$dao->selectAsTable($fields,'booking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


            <div class="row">
 

</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php } ?>