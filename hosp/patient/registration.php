



<!DOCTYPE html>
<html lang="en">



<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="reg/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="reg/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="reg/css/main.css" rel="stylesheet" media="all">



</head>

<body>

<style type="text/css">
            .valErr{
                color:red!important;
            }
        </style>

<?php
require('../config/autoload.php'); 
$dao=new DataAccess();
$elements=array(
        "fname"=>"","lname"=>"","email"=>"","page"=>"","phone"=>"","password"=>"","cpassword"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('fname'=>"First Name","lname"=>"Last Name","email"=>"Email Id","page"=>"Age","phone"=>"Phone Number","password"=>"Password","cpassword"=>"Confirm Password");

$rules=array(
    "fname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "lname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
    "email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"email","table"=>"patient")),
     "page"=>array("required"=>true,"integeronly"=>true,"minlength"=>1,"maxlength"=>3),
    "phone"=>array("required"=>true,"integeronly"=>true,"minlength"=>10,"maxlength"=>10),
    
    "password"=>array("required"=>true),
    "cpassword"=>array("required"=>true,"compare"=>array("comparewith"=>"password","operator"=>"=")),
);
    
    
$validator = new FormValidator($rules,$labels);
$rdate=date('Y-m-d',time());
if(isset($_POST['home']))
{

echo"<script> location.replace('index.php'); </script>";
}
if(isset($_POST['register']))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		
        $data=array(
				'fname'=>$_POST['fname'],
				'lname'=>$_POST['lname'],
				'page'=>$_POST['page'],
				'phone'=>$_POST['phone'],
				'email'=>$_POST['email'],
				//'rdate'=>$rdate,
				'password'=>$_POST['password'],
				//'status'=>1
				
			);
			if($dao->insert($data,'patient'))
			{
				echo "<script> alert('registration Sucess');</script> ";
   echo"<script> location.replace('index.php'); </script>";
			}
			else
				$msg="insertion failed";
		}
		
		
		
		
    }

if(isset($_POST['home']))
{
echo "<script> alert('Login Sucess');</script> ";
   echo"<script> location.replace('login.php'); </script>";

}

?>




    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">REGISTRATION</h2>
                    <form method="POST">
                    
				
					<p><?php if(isset($msg)) echo $msg; ?></p>
                        <div class="input-group">
                             <?= $form->textBox('fname',array("placeholder"=>"First Name")); ?>
                           <span class="valErr"><?= $validator->error('fname'); ?></span>
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->textBox('lname',array("placeholder"=>"Last Name")); ?>
                           <span class="valErr"><?= $validator->error('lname'); ?></span>
                               
                        </div>
                       
                          <div class="input-group">
                             <?= $form->textBox('page',array("placeholder"=>"Age")); ?>
                           <span class="valErr"><?= $validator->error('page'); ?></span>
                               
                        </div>
                        
                         <div class="input-group">
                             <?= $form->textBox('email',array("placeholder"=>"Email")); ?>
                           <span class="valErr"><?= $validator->error('email'); ?></span>
                               
                               
                        </div>
                        
                         <div class="input-group">
                             <?= $form->textBox('phone',array("placeholder"=>"Phone Number")); ?>
                           <span class="valErr"><?= $validator->error('phone'); ?></span>
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->passwordbox('password',array("placeholder"=>"Password")); ?>
                           <span class="valErr"><?= $validator->error('password'); ?></span>
                               
                               
                        </div>
                        
                          <div class="input-group">
                             <?= $form->passwordbox('cpassword',array("placeholder"=>"Confirm Password")); ?>
                           <span class="valErr"><?= $validator->error('cpassword'); ?></span>
                               
                        </div>
                        
                        
                        
                        
                        
                        
                      
                         
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" name="register" type="submit">Register</button>
                               </div>
                                <div class="p-t-10">
                              <button class="btn btn--pill btn--green" name="home" type="submit">Home</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="reg/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="reg/vendor/select2/select2.min.js"></script>
    <script src="reg/vendor/datepicker/moment.min.js"></script>
    <script src="reg/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="reg/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->