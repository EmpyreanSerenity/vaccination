
<?php require('../config/autoload.php'); ?>
<?php include("header.php");	?>

<style>
div.a {
  text-transform: uppercase;
}
</style>
<?php
$dao=new DataAccess();
?>
  <div class="page-head"  data-bg-image="images/5570834.jpg">
		   <div class="container">
				 <h2 class="page-title" style="color: white">View your child details</h2>
	       </div>
      </div>
<?php
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>
<?php } ?>
<div class="fullwidth-block">
					<div class="container">
						<div class="row">
            <?php
							
					$_SESSION['pid']	=$_SESSION['pid'];
					$pid=$_SESSION['pid'];
			 $q="select * from child c where pid=".$pid. "";
             $_SESSION['hid']=$_GET['id'];

$info=$dao->query($q);

			$i=0;  
				if(is_countable($info))
		        {
			 while($i<count($info))
			{ 
			 if($info[$i]["gender"]=='m'  )
			 {
				 ?>
				 <div class="col-md-6">
				 <div class="boxed-icon">
							<img src="images/boy.jpg" alt="" class="icon" style="width:100px; height:100px;">
                              <h3 style="color: black"><?php echo $info[$i]["ch_firstname"]?> <?php echo $info[$i]["ch_lastname"]?></h3> 
					         <table style="color: black;"> 
					        <tr><td><b>DOB:</b></td><td> <?php echo $info[$i]["dob"]?></td></tr>
							<tr><td><br></td></tr>
						 <tr><td><b>Sex:</b></td><td><div class="a"><?php echo $info[$i]["gender"]?></td></tr>
				             <tr><td><br></td></tr>
							</table>
						      <a href="booking.php?id=<?= $info[$i]["cid"];?>" class="button" style="background-color: lightskyblue ;color: black" >select</a>
					         
							</div>
						</div>
				<?php 
			 }
			 
			
			 else if($info[$i]["gender"]=='f' )
			 {
				  ?>
					 <div class="col-md-6">
				 <div class="boxed-icon">
							<img src="images/girl.jpg" alt="" class="icon" style="width:100px; height:100px;">
                              <h3 style="color: black"><?php echo $info[$i]["ch_firstname"]?> <?php echo $info[$i]["ch_lastname"]?></h3> 
							<table style="color: black;"> 
					        <tr><td><b>DOB:</b></td><td> <?php echo $info[$i]["dob"]?></td></tr>
							<tr><td><br></td></tr>
						 <tr><td><b>Sex:</b></td><td><div class="a"> <?php echo $info[$i]["gender"]?></td></tr>
				             <tr><td><br></td></tr>
							</table>
							 <a href="booking.php?id=<?= $info[$i]["cid"];?>" class="button" style="background-color: lightskyblue ;color: black" >select</a>
					         		
							</div>
						</div>
				<?php 		
			 }
				 
		         
				$i++;
				} 
		
		}
		else
		{
			?><div class="fullwidth-block">
					<div class="container">
						<div class="row">
							 <div class="col-md-14 col-sm-16">
				                <div class="feature" style="color: black">
                  <h3 style="color: black">Please add your child details first.</h3>
			
								 </div>
							</div>
						</div>
					</div>
				</div>
			<?php				
		}
						?>
						
						
			
			</div>
		</div>
	</div>
	
	
		<?php include("footer.php");	?>