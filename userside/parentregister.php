<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parent Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="colorlib-regform-7 (1)/colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-7 (1)/colorlib-regform-7/css/style.css">
</head>
<?php
require('../config/autoload.php'); 
$dao=new DataAccess();
$elements=array(
        "parent_name"=>"","email"=>"","phone"=>"","password"=>"","cpassword"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('parent_name'=>"Parent Name",'email'=>"Email ID",'phone'=>"Phone Number",'password'=>"Password",'cpassword'=>"Confirm Password");

$rules=array(
    "parent_name"=>array("alphaspaceonly"=>"true","required"=>true,"minlength"=>2,"maxlength"=>20,),
	 "email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"email","table"=>"parent")),
    "phone"=>array("required"=>true,"integeronly"=>true,"minlength"=>10,"maxlength"=>10,"unique"=>array("field"=>"phone","table"=>"parent")),     
    "password"=>array("required"=>true,"minlength"=>4,"maxlength"=>20),
    "cpassword"=>array("required"=>true,"compare"=>array("comparewith"=>"password","operator"=>"=")),
);
	
$validator = new FormValidator($rules,$labels);
if(isset($_POST["registernow"]))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		
        $data=array(
				'parent_name'=>$_POST['parent_name'],
                 'email'=>$_POST['email'],
				'phone'=>$_POST['phone'],
				'password'=>$_POST['password'],
				
			);
            print_r($data);
			if($dao->insert($data,"parent"))
			{
			echo "<script> alert('Registeration Sucess');</script> ";
            echo"<script> location.replace('vacclogin.php'); </script>";
			}
			else
			{
				$msg="insertion failed" ?>
                 <span style="color:red;"><?php echo $msg; ?></span>
	             <?php
			}
	}

}


?>
	<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">REGISTRATION </h2>
                        <form action="" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="parent_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="parent_name" id="parent_name" placeholder="Parent Full Name"/>
								<span style="color:red;">
							<?= $validator->error('parent_name'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
								 <span style="color:red;">
							<?= $validator->error('email'); ?></span>
                            </div>
							<div class="form-group">
                                <label for="phone"><i style="font-style: normal; font-size: 16px;">+91</i></label>
                                <input type="text" name="phone" id="phone" placeholder="Your Phone Number"/>
								 <span style="color:red;">
							<?= $validator->error('phone'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
								 <span style="color:red;">
							<?= $validator->error('password'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="cpassword"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="Repeat your password"/>
								 <span style="color:red;">
							<?= $validator->error('cpassword'); ?></span>
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="registernow" id="registernow" class="form-submit" value="REGISTER"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="colorlib-regform-7 (1)/colorlib-regform-7/images/vaccinepic.jpg" alt="sing up image"></figure>
                        <a href="vacclogin.php" class="signup-image-link">I have already registered</a>
                        <a href="vacclogin.php">Login</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
       
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
