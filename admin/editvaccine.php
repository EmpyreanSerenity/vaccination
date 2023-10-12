<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','vaccine','vid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "vname"=>$info[0]['vname'],"vage"=>$info[0]['vage'],"vimage"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('vname'=>"Vaccination name","vage"=>" Vaccination age");
$rules=array(
    "vname"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,),
    "vage"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,),
    
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
    );
  $condition='vid='.$_GET['id'];
  if(isset($flag))
  {	$data['vimage']=$fileName;

  }
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
Name:

<?= $form->textBox('vname',array('class'=>'form-control')); ?>
<?= $validator->error('vname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Age:

<?= $form->textBox('vage',array('class'=>'form-control')); ?>
<?= $validator->error('vage'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
IMAGE:


<?= $form->fileField('vimage',array('class'=>'form-control')); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">



<button type="submit" name="update"  >UPDATE</button>
</form>

</body>
</html>