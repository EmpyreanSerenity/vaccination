<?php 

 require('../config/autoload.php'); 
	include("header.php");
	$dao=new DataAccess();
$elements=array(
	"vid"=>"","date"=>"","cid"=>""
        );
$form=new FormAssist($elements,$_POST);

$id= $_GET['id'];
$hid=$_SESSION['hid'];
$vid=$_SESSION['vid'];

$q3="select * from child where cid=$id";
$info3=$dao->query($q3);
$q="select * from schedule where hid=$hid and vid=$vid";
//echo $q;
$info=$dao->query($q);
$q1="Select * from healthcenter where hid=$hid";
$info1=$dao->query($q1);
$q2="Select * from vaccine where vid=$vid";
$info2=$dao->query($q2);



$date1=date('Y-m-d',time());
$elements=array(
        "cid"=>"","vid"=>"","slotid"=>"","hid"=>"","cfirstname"=>"","book_date"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('cid'=>"child Id",'vid'=>"vaccine Id",'hid'=>"healthcenter Id",'cfirstname'=>"Child firstname",'cur_date'=>"current date",'book_date'=>"booking date");

$rules=array(
  
	"vid"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
	"hid"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
	"cfirstname"=>array("required"=>true),
       
    "book_date"=>array("required"=>true),


	 
    

);
	
$validator = new FormValidator($rules,$labels);
if(isset($_POST["book"]))
{
$q4="Select * from book where cid=$id and vid=$vid";
$count=$dao->query($q4);
$q5="Select * from book where cid=$id and vid=$vid and status=2";
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
                'cfirstname'=>$_POST['cfirstname'],
				'cur_date'=>$date1,
				'book_date'=>$_POST['book_date'],
                //'book_time'=>$_POST['s_time'],
				//'book_email'=>$_SESSION['email'],
                
				
			);
        
           
			if($dao->insert($data,"book"))
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
											<input class="form-control" name="cfirstname" type="text" value=<?php  echo $info3[0]['cfirstname'];  ?> required readonly >
											<?= $validator->error('cfirstname'); ?>

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
											<input class="form-control"  type="text" value= <?php  echo $info[0]['qnty'];  ?> required readonly>
											

										</div>
									</div>
                        </div>

								<div class="form-btn">
								<button class="submit-btn" name="book">Book</button>
								
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