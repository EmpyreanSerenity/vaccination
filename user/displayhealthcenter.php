
<?php require('../config/autoload.php'); ?>
<?php include("header2.php");	?>




<?php
$dao=new DataAccess();



?>
<?php    
//$_SESSION['did']=$_GET['id']; 
if(isset($_SESSION['email']))
{ 

   $name=$_SESSION['email'];

?>


<?php } ?>



     <div class="page-head"  data-bg-image="images/5570834.jpg">
		   <div class="container">
				 <h2 class="page-title" style="color: white">Available Healthcenter</h2>
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
							
							
							 //$hid=$_GET['id']; 
							 //echo $_SESSION['vid'];
							 //echo $_SESSION['did'] ;
							 $q="SELECT * from healthcenter";
				
$info=$dao->query($q);
//print_r($info);

			$i=0;  
			if(empty($info))
			{
				echo "No Health Centre Available";
			}        

			else
			{
			 while($i<count($info))
			
                {
	
		                 ?>
							<div class="col-md-6">
    <h3 class="project-title" style="color: black"></h3>
    <div class="health-center-info">
      <a href="selectchild.php?id=<?= $info[$i]["hid"]?>">
        <img style="width:200px; height:200px" src=<?php echo BASE_URL."upload/".$info[$i]["himage"]; ?> alt="Health Center Image" class="img-responsive" />
      </a>
	  <br></br>
      <div class="health-center-details">
        <h3><?php echo $info[$i]["hname"]?></h3>
        <p><strong><?php echo $info[$i]["description"]?><s]</strong></p>
      </div>
    </div>
</div>

				
		
				<?php 
				$i++;
				}
			 } ?>
				
			</div>
		</div>
	</div>
	
	
		<?php include("footer.php");	?>