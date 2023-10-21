
<?php require('../config/autoload.php'); ?>
<?php include("header.php");	?>




<?php
$dao=new DataAccess();



?>
<?php    
if(isset($_SESSION['email']))
{ 

   $name=$_SESSION['email'];

?>


<?php } ?>

     <div class="page-head"  data-bg-image="images/5570834.jpg">
		   <div class="container">
				 <h2 class="page-title" style="color: white">Available Vaccines</h2>
			   <p style="color: white">Choose the vaccine according to your convenience</p>
	       </div>
      </div>


<div class="fullwidth-block">
					<div class="container">
						<div class="row">
       
            <?php
			
	
							$childid = isset($_GET['id4']) ? $_GET['id4'] : '';
							$dob = isset($_GET['dob']) ? $_GET['dob'] : '';
						
							 $_SESSION['ch_id']=$childid;
							$dob1 = new DateTime($dob);
							$now = new DateTime();
							$diff = $now->diff($dob1);
							$months = $diff->format('%m') + 12 * $diff->format('%y');

							 $_SESSION['dob']=$months;
					
							
							
							 $q="select * from vaccine";
							 

$info=$dao->query($q);

//print_r($info);

			$i=0;          
			 while($i<count($info))
			
                {
	
		                 ?>
							<div class="col-md-6">
								<div class="checked-box">
                              <h3 class="project-title" style="color: black"></h3> 
							  
								<a href="displayhealthcenter.php ">
								<img style="width:250; height:250" src="<?php echo "../upload/".$info[$i]["vimage"]; ?>" alt=" " class="img-responsive" />
								<h2><?php echo $info[$i]["vname"]?></h2></a>
								<h2><?php echo $info[$i]["vage"]?></h2></a>	

								
							</div>
						</div>
				
		
				<?php 
				$i++;
				} ?>
			</div>
		</div>
	</div>
	
	
		<?php include("footer.php");	?>