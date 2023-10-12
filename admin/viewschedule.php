
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <th>ID</th>
                        <th>DATE</th>
                        <th>Healthcenter name</th>
                        <th>Vaccination name</th>
                        <th>Quantity</th>
                        
                        
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editschedule.php','params'=>array('id'=>'sid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletesh.php','params'=>array('id'=>'sid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('sid'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('sid','date','hname','vname','qnty');

    $users=$dao->selectAsTable($fields,'schedule','flag=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
