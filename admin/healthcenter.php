<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "hname"=>"","hregion"=>"","himage"=>"");
$form=new FormAssist($elements,$_POST);
$dao=new DataAccess();
$labels=array('hname'=>"healthcenter name",'hregion'=>"healthcenter region",'himage'=>"healthcenter image");

$rules=array(
    "hname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "hregion"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,"alphaonly"=>true),
    "himage"=> array('filerequired'=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
    if($fileName=$file->doUploadRandom($_FILES['himage'],array('.jpg','.png','.jpeg','.jfif','.webp','.pdf'),100000,1,'../upload'))
    {


$data=array(

       
        'hname'=>$_POST['hname'],
        'hregion'=>$_POST['hregion'],
        'himage'=>$fileName,
         
    );

    print_r($data);
  
    if($dao->insert($data,"healthcenter"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
  ?>

<?php
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

<div class="row">
                    <div class="col-md-6">
Healthcenter Name:

<?= $form->textBox('hname',array('class'=>'form-control')); ?>
<?= $validator->error('hname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Healthcenter Region:

<?= $form->textBox('hregion',array('class'=>'form-control')); ?>
<?= $validator->error('hregion'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Healthcenter Image:

<?= $form->fileField('himage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('himage'); ?></span>

</div>
</div>


<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
