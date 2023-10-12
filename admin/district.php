<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "distname"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('distname'=>"district name");

$rules=array(
    "distname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true)
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       
        'distname'=>$_POST['distname'],

        
         
    );
  
    if($dao->insert($data,"district"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:district.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
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

<div class="row">
                    <div class="col-md-6">
district name:

<?= $form->textBox('distname',array('class'=>'form-control')); ?>
<?= $validator->error('distname'); ?>

</div>
</div>

<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


