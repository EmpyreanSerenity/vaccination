<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "vname"=>"","vage"=>"","vimage"=>"","description"=>"");

$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();
$labels=array('vname'=>"Vaccination name",'vage'=>" Age Requirements",'vimage'=>"Vaccination image",'description'=>"vaccine description");

$rules=array(
    "vname"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,),
    "vage"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,),
    "vimage"=> array('filerequired'=>true),
    "description"=>array("required"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['vimage'],array('.jpg','.png','.jpeg','.jfif','.webp','.pdf'),100000,1,'../upload'))
    {

$data=array(

       
        'vname'=>$_POST['vname'],
        'vage'=>$_POST['vage'],
        'vimage'=>$fileName,
        'description'=>$_POST['description'],
         
    );

    print_r($data);
  
    if($dao->insert($data,"vaccine"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
  ?>

<?php
    }
}
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
Age Requirements:

<?= $form->textBox('vage',array('class'=>'form-control')); ?>
<?= $validator->error('vage'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Vaccination Image:

<?= $form->fileField('vimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('vimage'); ?></span>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Vaccine Description:

<?= $form->textBox('description',array('class'=>'form-control')); ?>
<?= $validator->error('description'); ?>

</div>
</div>


<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
