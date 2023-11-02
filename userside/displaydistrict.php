
<?php require('../config/autoload.php'); ?>
<?php include("header.php");	?>




<?php
$dao=new DataAccess();

$_SESSION['vid']=$_GET['id'];

?>
<?php    
$_SESSION['vid']=$_GET['id'];
if(isset($_SESSION['email']))
{ 

   $name=$_SESSION['email'];

?>


<?php } ?>

     <div class="page-head"  data-bg-image="images/5570834.jpg">
		   <div class="container">
				 <h2 class="page-title" style="color: white">Select District</h2>
			   <p style="color: white">Choose the district of the healthcenter according to your convenience</p>
	       </div>
      </div>


<div class="fullwidth-block">
					<div class="container">
						<div class="row">
       
            <?php
			
	
							$childid = isset($_GET['id4']) ? $_GET['id4'] : '';
							$dob = isset($_GET['dob']) ? $_GET['dob'] : '';
						
							 $_SESSION['cid']=$childid;
							$dob1 = new DateTime($dob);
							$now = new DateTime();
							$diff = $now->diff($dob1);
							$months = $diff->format('%m') + 12 * $diff->format('%y');

							 $_SESSION['dob']=$months;
							
							
							 $q="select * from district";

$info=$dao->query($q);
//print_r($info);

			$i=0;          
			 while($i<count($info))
			
                {
	
		                 ?>
							<div class="col-md-6">
								<div class="checked-box">
                              <h3 class="project-title" style="color: black"></h3>
							  
								<a href="displayhealths.php?id=<?= $info[$i]["did"]?> ">
								<h2><?php echo $info[$i]["dname"]?></h2></a>	
								
							</div>
						</div>
				
		
				<?php 
				$i++;
				} ?>
			</div>
		</div>
	</div>
	
	
		<?php include("footer.php");	?>