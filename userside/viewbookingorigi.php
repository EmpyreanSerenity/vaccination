<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px",style="width:200%;height:500px;">
                    <tr>
                        <th>Booking ID</th>
                        <th>Child Name</th>
                        <th>Vaccine Name</th>
                        <th>Healthcenter</th>
                        <th>Book Date</th>
                        <th>Book Time</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    //'edit'=>array('label'=>'Edit','link'=>'editvacc.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success')),
    
    //'delete'=>array('label'=>'Delete','link'=>'deletevacc.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bookid'),
		'actions_td'=>false,
        
        
        
    );
      $condition="book_email='".$_SESSION['email']."'";
      $join=array(
        'vacc as v'=>array('v.vid=b.vid','join'),'health as h'=>array('h.hid=b.hid','join'),
        );  
    $fields=array('bookid','cfirstname','vname','hname','book_date','book_time');


    $users=$dao->selectAsTable($fields,'booking as b',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
