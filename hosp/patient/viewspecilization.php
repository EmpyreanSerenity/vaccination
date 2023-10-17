
<?php 

require('../config/autoload.php'); 
include("dbcon.php");




$dao=new DataAccess();



?>

<div class="plans-section" id="rooms">
				 <div class="container">
<?php    
//if(isset($_SESSION['email']))
//{ 
include("header.php");
	include("userheader2.php");
//   $name=$_SESSION['email'];

?>

 <h7 class="title-w3-agileits title-black-wthree"><?php // echo $name ?></h7>

<?php  ?>
				
						<div class="priceing-table-main">
							<br>
							<br>
            <h1><center>SPECALIZATION</center></h1>

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

							<div style="margin:10px;">
						<img style="width:300px; height:300px" src=<?php echo BASE_URL."uploads/".$info[$i]["s_image"]; ?> alt=" " class="img-responsive" />
						
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["sp_name"]?></h4> 
							
                             
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>

								     </ul><br>
								     <br><br><br>
							</div>
							
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
	