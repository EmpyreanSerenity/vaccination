<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>
<body style="background-image: url('images/health12.jpg');background-size:100% 100%;">

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12"><br><br>
                <table  border="1" class="table" style="width:100%;height:100px;">

                <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  background-color: #fff;
}
</style>


                    <tr style="color:black;height:50px;">

                        <th>Booking ID</th>
                        <th>Child Name</th>
                        <th>Vaccine Name</th>
                        <th>Healthcenter</th>
                        <th>Book Date</th>
                        <th>Book Time</th>
                        <th>Actions</th>

                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Vaccinated','link'=>'updatebook.php','params'=>array('id'=>'bookid'),'attributes'=>array('class'=>'button button2')),
    
    //'delete'=>array('label'=>'Delete','link'=>'deletevacc.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bookid'),
		'actions_td'=>false,
        
        
        
    );

    $hid=$_SESSION['hid'];
      $condition="b.status=2 and hid=.$hid." ;
      $join=array(
        'health as h'=>array('h.hid=b.hid','join'),'vacc as v'=>array('v.vid=b.vid','join'),
        );  


    $fields=array('bookid','ch_firstname','vname','hname','book_date','book_time');

    $users=$dao->selectAsTable($fields,'booking as b',1,$join,$actions,$config);
    echo $users
    ?>
    
                
                    
                   
    

             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    </body>
