
<?php include("header1.php");	?>

<?php include("userheader.php");	?>



<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php				 
if(isset($_SESSION['email']))
{ 
  $name=$_SESSION['email'];
	$_SESSION['email']=$name;
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  //echo $name ?></h7>

<?php } ?>
					
<h3 class="title-w3-agileits title-black-wthree">DOCTORS</h3>
						<div class="priceing-table-main">
            <?php
			$d_id=$_GET['id']; 
			 $q="select * from doctor where sp_id=".$d_id ;

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["d_image"];
		?>		 
						
						<div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[$i]["d_image"]; ?> alt=" " class="img-responsive" />
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["d_name"]?></h4> 
                              
                             
						</div>
                        <h4>Qualification</h4>
                              <h4> <?php echo $info[$i]["d_qualification"]?></h4>
<h4>Fees</h4>
                              <h4> <?php echo $info[$i]["d_fee"]?></h4>
						<div class="price-gd-bottom">
							   
							<div class="price-selet">
                            
			<a href="booking.php?id=<?= $info[$i]["d_id"]?>" >BOOK NOW</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	
		
	