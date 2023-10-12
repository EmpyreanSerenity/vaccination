<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','schedule','sid='.$_GET['id']);

$elements=array(
    "date"=>$info[0]['date'],"hname"=>$info[0]['hname'],"vname"=>$info[0]['vname'],"quantity"=>$info[0]['quantity']);

$form=new FormAssist($elements,$_POST);

$labels=array('date'=>"DATE",'hname'=>"Healthcenter name",'vname'=>" Vaccination name",'quantity'=>" Quantity");

$rules=array(
    "date"=>array("required"=>true),
    "hname"=>array("required"=>true),
    "vname"=>array("required"=>true),
    "quantity"=>array("required"=>true,"minlength"=>1,"maxlength"=>4,"integeronly"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["update"]))
{

if($validator->validate($_POST))
{
$data=array(

        'date'=>$_POST['date'],
        'hname'=>$_POST['hname'],
        'vname'=>$_POST['vname'],
        'quantity'=>$_POST['quantity'],
         
    );

    $condition='sid='.$_GET['id'];
  
    if($dao->update($data,'schedule',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
    {$msg="Failed";} ?>

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

<?= $form->textBox('quantity',array('class'=>'form-control')); ?>
<?= $validator->error('quantity'); ?>

</div>
</div>

<button type="submit" name="update">update</button>
</form>


</body>

</html>
