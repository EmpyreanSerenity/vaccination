<?php 

 require('../config/autoload.php'); 
	include("header.php");
	$dao=new DataAccess();
$elements=array(
	"s_time"=>"","v_id"=>"","date"=>"","cid"=>""
        );
$form=new FormAssist($elements,$_POST);

$id= $_GET['id'];
$vid=$_SESSION['vid'];
$hid=$_SESSION['hid'];

$q="select * from booking b, vacc v, health h where b.vid=v.vid and h.hid=b.hid and bookid=".$id;
$info=$dao->query($q);




$date1=date('Y-m-d',time());
$elements=array(
        "cid"=>"","vid"=>"","s_time"=>"","slotid"=>"","hid"=>"","ch_firstname"=>"","book_date"=>"","book_time"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('cid'=>"child Id",'vid'=>"vaccine Id",'hid'=>"healthcenter Id",'ch_firstname'=>"Child firstname",'cur_date'=>"current date",'book_date'=>"booking date",'book_time'=>"booking time");

$rules=array(
  
	"vid"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
	"hid"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
	"ch_firstname"=>array("required"=>true),
       
    "book_date"=>array("required"=>true),

	"s_time"=>array("required"=>true),
	 
    

);
	
$validator = new FormValidator($rules,$labels);
if(isset($_POST["booking"]))
{
    echo"<script> location.replace('cancel.php?id=$id'); </script>";
		    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="cssb/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="cssb/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-cta">
							<h1>Confirm Cancel</h1>
							
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form method="POST">
								
								<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">child name</span>
											<input class="form-control" value= "<?php  echo $info[0]["ch_firstname"] ?>" name="ch_firstname" type="text"  required readonly >
											<?= $validator->error('ch_firstname'); ?>

										</div>
									</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Vaccine</span>
											<input class="form-control" name="vid" type="text" value=<?php  echo $info[0]['vname'];  ?> required readonly >
											<?= $validator->error('vid'); ?>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Healthcenter</span>
											<input class="form-control" name="hid" type="text" value=<?php  echo $info[0]['hname'];  ?> required readonly>
											<?= $validator->error('hid'); ?>

										</div>
									</div>

                          

									<div class="col-md-6">
                           <div class="form-group">
											<span class="form-label">Booking date</span>
											<input class="form-control" name="book_date" type="date" required value=<?php  echo $info[0]['book_date'];?>>
											<?= $validator->error('book_date'); ?>

										</div>
									</div>
								</div>
								
                        <div class="row">



									<div class="col-md-6">
                              <b><p style="color: #558dd8;"> Time</p><b>
										<div class="form-group">
                           
                                        <span class="form-label">Booking Time</span>
											<input class="form-control" name="book_time" type="text" required value=<?php  echo $info[0]['book_time'];?>>
											

										</div>
									</div>
   </div>

								<div class="form-btn">
								<button class="submit-btn" name="booking">Cancel</button>
					         		
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>