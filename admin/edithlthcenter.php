<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','healthcenter','hid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "hname"=>$info[0]['hname'],"hregion"=>$info[0]['hregion'],"himage"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('hname'=>"healthcenter name",'hregion'=>"healthcenter region");
$rules=array(
    "hname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
    "hregion"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,"alphaonly"=>true),
    
     
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
    );
  $condition='hid='.$_GET['id'];

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
Name:

<?= $form->textBox('hname',array('class'=>'form-control')); ?>
<?= $validator->error('hname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Health Center:

<?= $form->textBox('hregion',array('class'=>'form-control')); ?>
<?= $validator->error('hregion'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">



<button type="submit" name="update"  >UPDATE</button>
</form>

</body>
</html>