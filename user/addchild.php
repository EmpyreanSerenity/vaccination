<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Child Registration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Additional Custom CSS -->
    <style>
        body {
            background-image: url('../upload/background.jpg'); /* Path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
        }
        .signup-content {
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
        }
        .blur-background {
            backdrop-filter: blur(5px); /* Adjust the blur level as needed */
        }
    </style>
</head>
<?php
require('../config/autoload.php'); 
$dao=new DataAccess();
$elements=array(
        "cid"=>"","cfirstnamenane"=>"","clastname"=>"","gender"=>"","dob"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('pid'=>"Parent Id",'cfirstname'=>"Child firstname",'clastname'=>"child lastname",'gender'=>"Gender",'dob'=>"Date of Birth");

$rules=array(
    
	 "cfirstname"=>array("required"=>true,"alphaonly"=>true),
    "clastname"=>array("required"=>true,"alphaonly"=>true),     
    "gender"=>array("required"=>true),
    "dob"=>array("required"=>true),
    

);
	
$validator = new FormValidator($rules,$labels);
if(isset($_POST["submit"]))
{
    
       if($validator->validate($_POST))
		{
        $data=array(
				'cid'=>$_SESSION['cid'],
                'cfirstname'=>$_POST['cfirstname'],
				'clastname'=>$_POST['clastname'],
				'gender'=>$_POST['gender'],
                'dob'=>$_POST['dob']
                
				
			);
        
         
			if($dao->insert($data,"child"))
			{
			echo "<script> alert('Registeration Sucess');</script> ";
            echo"<script> location.replace('displayvaccine1.php'); </script>";
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

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                <center><h1 style="font-size:35px;"> ADD CHILD </h1> </center>
                    <form method="POST" id="signup-form" class="signup-form">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-input" name="cfirstname" id="first_name" required/>
                                <span style="color:red;">
							<?= $validator->error('cfirstname'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-input" name="clastname" id="last_name" required/>
                                <span style="color:red;">
							<?= $validator->error('clastname'); ?></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-icon">
                                <label for="birth_date">Birth date</label>
                                <input name="dob" type="date" max=<?php echo date('Y-m-d',time()); ?> style="margin-top:8px;">
                                <span style="color:red;">
							<?= $validator->error('dob'); ?></span>
                            </div>

                            

                            <div class="form-row" >
                                <div class="form-group">
                                <label for="birth_date">Gender:</label>
                                </div>

                            <div class="form-group" style="margin-top:30px;">
                            Male
                            <input class="form-input" type="radio" id="gender" name="gender" value="m" required>
                           
</div> 
                            <div class="form-group" style="margin-top:30px;">
                                Female
                            <input class ="form-input"type="radio" id="gender" name="gender" value="f" required>

                            <?= $validator->error('gender'); ?></span>
                            </div >    
                          
                        
</div >
                            
                         
                        </div>
                        
                                
</div>
                        
                        <div class="form-row" style="margin-left:300px;margin-top:-100px;">
                            
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" style="margin-bottom:18px;"/>
                            
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>