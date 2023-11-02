
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="healthworklogin/css/style.css">
    
</head>


<body style="background-image: url('images/loginhealth4.jpg');background-size:100% 100%;">

<?php require('../../config/autoload.php'); ?>
<?php
$dao=new DataAccess();

 //include('header.php');

//if(isset($_SESSION['name']))
  // header('location:childs/index.php');

  

$elements=array("email"=>"","password"=>"");
$form=new FormAssist($elements,$_POST);
$rules=array(
    'email'=>array('required'=>true),
    'password'=>array('required'=>true)
);
$validator=new FormValidator($rules);

if(isset($_POST['submit']))
{
    if($validator->validate($_POST))
    {
        $data=array('email'=>$_POST['email'],'password'=>$_POST['password']);
        if($info=$dao->login($data,'healthcenter'))
        {
           
            $_SESSION['email']=$info['email'];
            $_SESSION['hid']=$info['hid'];
            
  //echo $_POST['email'];
			

$a=$info['email'];
//$q="select * from healthcenter where email='$a'";
//$info1=$dao->query($q);
//$_SESSION['hwid']=$info1[0]['hwid'];
//$_SESSION['hid']=$info1[0]['hid'];
//$_SESSION['usertype']="healthcenter";



	echo "<script> alert('$a');</script> ";	
		
  echo"<script> location.replace('../.php'); </script>";
			
           // header('location:childs/index.html');
       


 }
        else{
            $msg="invalid username or password";
			
				echo "<script> alert('Invalid username or password');</script> ";
        }
    }

    
}


?>





<body>


    <div class="main">

        <div class="container">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                    <h2>Sign in </h2>
                    
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                
					</div>
                    
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit submit" value="Sign in"/>
                        
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>