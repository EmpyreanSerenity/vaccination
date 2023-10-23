<?php require('../config/autoload.php'); ?>
<?php //include('header.php'); ?> 
<?php
$dao=new DataAccess();
$labels=array('pname'=>"Parent Name","username"=>"Username","password"=>"Password",'phone'=>"Phone",);
$rules=array(
	'pname'=>array('required'=>true),
    'username'=>array('required'=>true),
    'password'=>array('required'=>true),
    'phone'=>array('required'=>true),
	
);
$validator=new FormValidator($rules);
$elements=array(

    'pname' =>'',
	'username'=>'',
	'password' =>'',
    'phone' =>'',
   
    
	);
$form = new FormAssist($elements,$_POST);

if(isset($_POST['signup']))
{
	
	if($validator->validate($_POST))
	{
	$data=array(
        'pname'=>$_POST['pname'],
		'username'=>$_POST['username'],
		'password'=>$_POST['password'],
        'phone'=>$_POST['phone'],
  
		);
		$table='registration';
		if($dao->insert($data,$table))
        {
        	//$msg="Registered successfully";
		echo "<script> alert('New record created successfully');</script> ";
        header('Location: login.php');
        exit;
		}
		
		else
			echo "<script> alert('Something went wrong');</script> ";
		//$msg="error";
		header('location:index.php');	
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="registration/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="registration/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                               <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="pname" id="pname" placeholder="Parent Name"/>--><h5>PARENT NAME:<?php echo $form->textBox('pname'); ?> </h5>
			<?php echo $validator->error('pname') ?>
                            </div>
                            <div class="form-group">
                               <!-- <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>--><h5>USER NAME:<?php echo $form->textBox('username'); ?> </h5>
			<?php echo $validator->error('username') ?>
                            </div>
                            <div class="form-group">
                               <!-- <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>--><h5>PASSWORD:<?php echo $form->passwordBox ('password'); ?></h4>
			<?php echo $validator->error('password') ?>
                            </div>
                            <div class="form-group">
                               <!-- <label for="phone"><i class="zmdi zmdi-account material-icons-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number"/>--><h5>PHONE NUMBER:<?php echo $form->textBox('phone'); ?> </h5>
			<?php echo $validator->error('phone') ?>
                            </div>
                           <!-- <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>-->
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                <?php if(isset($msg))echo "<script>alert(msg);</script> "; ?>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="registration/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a><a href="index.php" class="signup-image-link">Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
        </div>

    <!-- JS -->
    <script src="registration/vendor/jquery/jquery.min.js"></script>
    <script src="registration/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!--<html>

            		<head>
<style>
	body{background-image:url("user.png");  
		background-position: top;
    
  		background-repeat: no-repeat;
  		background-size: cover;
		}
</style>
	</head>
	<body>
<form method="POST">
				<center>
			<table  style="margin-top:100px;">
           
			<tr><h1>REGISTER DETAILS</h1></tr>
            <tr>
			<td><h4>PARENT NAME:<?php echo $form->textBox('pname'); ?> </h4><br/></td>
			<td><?php echo $validator->error('pname') ?></td>
			</tr>
            <tr>
			<td><h4>PHONE NUMBER:<?php echo $form->textBox('phone'); ?> </h4><br/></td>
			<td><?php echo $validator->error('phone') ?></td>
			</tr>
			<tr>
			<td><h4>USER NAME:<?php echo $form->textBox('username'); ?> </h4><br/></td>
			<td><?php echo $validator->error('username') ?></td>
			</tr>
			<tr>
			
			<td><h4>PASSWORD:<?php echo $form->passwordBox ('password'); ?></h4> <br/></td>
			<td><?php echo $validator->error('password') ?></td>
			</tr>
			<tr>
			<td><h4>CHILD NAME:<?php echo $form->textBox('name'); ?> </h4><br/></td>
			<td><?php echo $validator->error('name') ?></td>
			</tr>
			<tr>
			<td></td>
                <td><h4><input type="submit" name="submit" value="REGISTER"/></h4></td>
			<td> <?php if(isset($msg))echo $msg; 
	?></td>
			</tr>
		</table><tr>
			<td><h4>DATE OF BIRTH:<?= $form->inputBox('date',array('class'=>'form-control'),"date") ?> </h4><br/></td>
			<td><?php echo $validator->error('date') ?></td>
			</tr>
				</center>
		<div style="color:green;"></div>	
		</form>
    </body>
</html>-->
 <?php //include('footer.php'); ?>