<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','vaccine','vid='.$_GET['vid']);
$file=new FileUpload();
$elements=array(
        "vname"=>$info[0]['vname'],"vage"=>$info[0]['vage'],"vimage"=>"","description"=>$info[0]['description']);

	$form = new FormAssist($elements,$_POST);

$labels=array('vname'=>"Vaccination name","vage"=>" Age Requirements",'description'=>"vaccine description");
$rules=array(
    "vname"=>array("required"=>true,"minlength"=>1,"maxlength"=>50,),
    "vage"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,),
    "description"=>array("required"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["update"]))
{
if($validator->validate($_POST))
{
  if(isset($_FILES['vimage']['name'])){
  if($fileName=$file->doUploadRandom($_FILES['vimage'],array('.jpg','.png','.jpeg','.jfif','.webp','.pdf'),100000,1,'../upload'))
  {
    $flag=true;
  }
}

$data=array(

        'vname'=>$_POST['vname'],
        'vage'=>$_POST['vage'],
        'vimage'=>$_POST['vimage'],
        'description'=>$_POST['description'],
    );
    $condition='vid='.$_GET['vid'];

    if($dao->update($data,'vaccine',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
}

	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
Vaccination Name:

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

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Vaccine Description:

<?= $form->textBox('description',array('class'=>'form-control')); ?>
<?= $validator->error('description'); ?>

</div>
</div>



<button type="submit" name="update"  >UPDATE</button>
</form>

</body>
</html>