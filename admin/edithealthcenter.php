<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','healthcenter','hid='.$_GET['hid']);
$file=new FileUpload();
$elements=array(
        "hname"=>$info[0]['hname'],"hregion"=>$info[0]['hregion'],"himage"=>"","description"=>$info[0]['description']);

	$form = new FormAssist($elements,$_POST);

$labels=array('hname'=>"healthcenter name",'hregion'=>"healthcenter region",'description'=>"healthcenter description");
$rules=array(
    "hname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
    "hregion"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,"alphaonly"=>true),
    "description"=>array("required"=>true),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["update"]))
{
if($validator->validate($_POST))
{
    
  if(isset($_FILES['himage']['name'])){
    if($fileName=$file->doUploadRandom($_FILES['himage'],array('.jpg','.png','.jpeg','.jfif','.webp','.pdf'),100000,1,'../upload'))
    {
      $flag=true;
    }
  }
$data=array(

        'hname'=>$_POST['hname'],
        'hregion'=>$_POST['hregion'],
        'himage'=>$_POST['himage'],
        'description'=>$_POST['description'],
    );
  $condition='hid='.$_GET['hid'];

    if($dao->update($data,'healthcenter',$condition))
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

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Healthcenter Description:

<?= $form->textBox('description',array('class'=>'form-control')); ?>
<?= $validator->error('description'); ?>

</div>
</div>



<button type="submit" name="update"  >UPDATE</button>
</form>

</body>
</html>