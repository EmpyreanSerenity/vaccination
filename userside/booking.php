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

$q3="select * from child where cid=$id";
$info3=$dao->query($q3);
$q="Select * from vaccslot where hid=$hid and vid=$vid";
$info=$dao->query($q);
$q1="Select * from health where hid=$hid";
$info1=$dao->query($q1);
$q2="Select * from vacc where vid=$vid";
$info2=$dao->query($q2);



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
$q4="Select * from booking where cid=$id and vid=$vid";
$count=$dao->query($q4);
$q5="Select * from booking where cid=$id and vid=$vid and status=2";
$count1=$dao->query($q5);
{ 
	if(!(is_countable($count1)))
	{
    if($validator->validate($_POST))
		{
	
      if(is_countable($count))
		
	  {
		echo "<script> alert('Already booked');</script> ";

	  } else{
			
        $data=array(
				'cid'=>$id,
				
				'vid'=>$vid,
				'hid'=>$hid,
                'ch_firstname'=>$_POST['ch_firstname'],
				'cur_date'=>$date1,
				'book_date'=>$_POST['book_date'],
                'book_time'=>$_POST['s_time'],
				'book_email'=>$_SESSION['email'],
                
				
			);
        
           
			if($dao->insert($data,"booking"))
			{
			echo "<script> alert('Booking Success');</script> ";
            echo"<script> location.replace('email.php'); </script>";
			}
			else
			{
				$msg="insertion failed" ?>
                 <span style="color:red;"><?php echo $msg; ?></span>
	             <?php
			}
		}	
		}	    
}
else{

	echo "<script> alert('Already Booked');</script> ";
}
}
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
							<h1>Book your vaccines</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p>
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form method="POST">
								
								<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">child name</span>
											<input class="form-control" name="ch_firstname" type="text" value=<?php  echo $info3[0]['ch_firstname'];  ?> required readonly >
											<?= $validator->error('ch_firstname'); ?>

										</div>
									</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Vaccine</span>
											<input class="form-control" name="vid" type="text" value=<?php  echo $info2[0]['vname'];  ?> required readonly >
											<?= $validator->error('vid'); ?>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Healthcenter</span>
											<input class="form-control" name="hid" type="text" value=<?php  echo $info1[0]['hname'];  ?> required readonly>
											<?= $validator->error('hid'); ?>

										</div>
									</div>

                          

									<div class="col-md-6">
                           <div class="form-group">
											<span class="form-label">Booking date</span>
											<input class="form-control" name="book_date" type="date"  min=<?php echo date('Y-m-d',time());?> required>
											<?= $validator->error('book_date'); ?>

										</div>
									</div>
								</div>
								
                        <div class="row">

                        <div class="col-md-6">
                           <div class="form-group">
											<span class="form-label">Slots</span>
											<input class="form-control"  type="text" value= <?php  echo $info[0]['availslot'];  ?> required readonly>
											

										</div>
									</div>


									<div class="col-md-6">
                              <b><p style="color: #558dd8;"> Time</p><b>
										<div class="form-group">
                              <?php
                       $options=$dao->createOptions('s_time','s_time',"schedule");
                       echo $form->dropDownList('s_time',array('class'=>'form control'),$options); ?>
					     <?= $validator->error('s_time'); ?>


										</div>
									</div>
   </div>

								<div class="form-btn">
								<button class="submit-btn" name="booking">Book</button>
								
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