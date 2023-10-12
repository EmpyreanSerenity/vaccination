<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "vname"=>"","vage"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();
$labels=array('vname'=>"Vaccination name",'vage'=>" Vaccination age");

$rules=array(
    "vname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaonly"=>true),
    "vage"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"integeronly"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       
        'vname'=>$_POST['vname'],
        'vage'=>$_POST['vage'],
        
         
    );

    print_r($data);
  
    if($dao->insert($data,"vaccine"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
  ?>

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
Vaccination name:

<?= $form->textBox('vname',array('class'=>'form-control')); ?>
<?= $validator->error('vname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
vaccination Age:

<?= $form->textBox('vage',array('class'=>'form-control')); ?>
<?= $validator->error('vage'); ?>

</div>
</div>



<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
