
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
                        
                        <th>Parent Id</th>
                        <th>Parent name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone No</th>
                    </tr>
<?php
    
     $fields=array('pid','pname','username','password','phone');

    $users=$dao->selectAsTable($fields,'registration');
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->