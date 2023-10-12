<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
    "date"=>"" ,"hname"=>"","vname"=>"","qnty"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();
$labels=array('date'=>"DATE",'hname'=>"Healthcenter name",'vname'=>" Vaccination name",'qnty'=>" Quantity");

$rules=array(
    "date"=>array("required"=>true),
    "hname"=>array("required"=>true),
    "vname"=>array("required"=>true),
    "qnty"=>array("required"=>true,"minlength"=>1,"maxlength"=>4,"integeronly"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'date'=>$_POST['date'],
        'hname'=>$_POST['hname'],
        'vname'=>$_POST['vname'],
        'qnty'=>$_POST['qnty'],
         
    );

    print_r($data);
  
    if($dao->insert($data,"schedule"))
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
Date:

<?= $form->inputBox('date',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('date'); ?></span>
</div>
</div>
 <div class="row">
                    <div class="col-md-6">
Healthcenter:

<?php
     $options = $dao->createOptions('hname','hname',"healthcenter");
     echo $form->dropDownList('hname',array('class'=>'form-control'),$options); ?>
<?= $validator->error('hname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Vaccination name:
<?php
     $options = $dao->createOptions('vname','vname',"vaccine");
     echo $form->dropDownList('vname',array('class'=>'form-control'),$options); ?>
<?= $validator->error('vname'); ?>


</div>
</div>
<div class="row">
                    <div class="col-md-6">
Quantity:

<?= $form->textBox('qnty',array('class'=>'form-control')); ?>
<?= $validator->error('qnty'); ?>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
