
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

<?php require('../config/autoload.php'); ?>
<?php
$dao=new DataAccess();

 //include('header.php');

//if(isset($_SESSION['name']))
  // header('location:childs/index.php');

  

$elements=array("h_email"=>"","password"=>"");
$form=new FormAssist($elements,$_POST);
$rules=array(
    'h_email'=>array('required'=>true),
    'password'=>array('required'=>true)
);
$validator=new FormValidator($rules);

if(isset($_POST['submit']))
{
    if($validator->validate($_POST))
    {
        $data=array('h_email'=>$_POST['h_email'],'password'=>$_POST['password']);
        if($info=$dao->login($data,'healthworker'))
        {
           
            $_SESSION['h_email']=$_POST['h_email'];
            
  echo $_POST['h_email'];
			

$a=$info['h_email'];
$q="select * from healthworker where h_email='$a'";
$info1=$dao->query($q);
$_SESSION['hwid']=$info1[0]['hwid'];
$_SESSION['hid']=$info1[0]['hid'];
$_SESSION['usertype']="healthworker";



	echo "<script> alert('$a');</script> ";	
		
  echo"<script> location.replace('h.php'); </script>";
			
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
                        <input type="email" class="form-input" name="h_email" id="h_email" placeholder="Email"/>
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