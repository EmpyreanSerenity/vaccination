
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
                        
                        <th>Id</th>
                        <th>Healthcenter name</th>
                        <th>Healthcenter region</th>
                        
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'edithlthcenter.php','params'=>array('id'=>'hid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletehl.php','params'=>array('id'=>'hid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('hid'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('hid','hname','hregion');

    $users=$dao->selectAsTable($fields,'healthcenter','flage=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
