<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
$name=$_SESSION['email'];

?>
<?php include('header1.php'); ?>

<br>
    <h4><center>CANCEL DETAILS</center></h4>
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <th>Sl No</th>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Booking Date</th>
                        
                    </tr>
<?php
    
    $actions=array(
    //'Sanction'=>array('label'=>'Sanction','link'=>'approvebooking.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );
   $condition="status=3 and email='$name'";

   
     $fields=array('bid','fname','d_name','bdate');

    $users=$dao->selectAsTable($fields,'booking as b',$condition,null,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    