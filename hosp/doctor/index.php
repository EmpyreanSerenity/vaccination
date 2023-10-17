<?php 

 require('../config/autoload.php'); 
include("loginhead.php");

$file=new FileUpload();
$elements=array("email"=>"","password"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('email'=>"Email",'password'=>"Password");

$rules=array(
    'email'=>array('required'=>true),
    'password'=>array('required'=>true),
    );
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
 $data=array('d_email'=>$_POST['email'],
            'd_password'=>$_POST['password']);

        if($info=$dao->login($data,'doctor'))
        {
          // print_r($info);
            $_SESSION['did']=$info['d_id'];
		//$a=$_SESSION['email'];

	echo "<script> alert('login successfully');</script> ";	
		
   echo"<script> location.replace('oghead.php'); </script>";
			
            //header('location:patientconsult.php');
       


 }
        else{
            $msg="invalid username or password";
			
				echo "<script> alert('Invalid username or password');</script> ";
        }
    }

    



    

else
echo $file->errors();
}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 <H1><U>LOGIN </U></H1>
<div class="row">
                    <div class="col-md-6">
Email:

<?= $form->textBox('email',array('class'=>'form-control')); ?>
<?= $validator->error('email'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Password:

<?= $form->passwordbox('password',array('class'=>'form-control')) ?>
<span style="color:red;"><?= $validator->error('password'); ?></span>

</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


