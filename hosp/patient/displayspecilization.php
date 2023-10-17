<?php
include('header.php');
?>


	

<?php// include("header.php");	?>



<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>


	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php    
if(isset($_SESSION['username']))
{ 
	include("userheader2.php");
   $name=$_SESSION['username'];

?>

 <h1 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h1>

<?php } ?>	<h3> <a href="viewspecilization.php">skip>>></a></h3></center>
				 <h3 class="title-w3-agileits title-black-wthree">Book </h3><h3> <center>  <a href="viewspecilization.php">skip>>></a></h3></center>

						<div class="priceing-table-main">
        
            <?php
			
			 $q="select * from specilization";

$info=$dao->query($q);
//print_r($info);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["s_image"];
	
		?>		
		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[$i]["s_image"]; ?> 
						alt=" " class="img-responsive" />
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["sp_name"]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4> 
							
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>

								     </ul>
							</div>
							<div class="price-selet">
                            <?php $_SESSION['username']=$name;?>
			<a href="viewspecilization.php"?id=<?= $info[$i]["sp_id"]?>">add</a>

							</div>
						</div>
					</div>
				</div>
				<?php
				$i++;
				} ?>
			<!--<h1>	<a href="viewspecilization.php">skip</a>-->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	
		<?php //include("footer.php");	?>
	
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+919847001063
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							mariyacatering@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							Vengoor-Piraroor Rd, Thevarmadam, Nedumbassery, Kerala 683574
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
<?php
include('user_footer.php');
?>  