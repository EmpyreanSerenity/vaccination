<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
    "pid"=>"","cfirstname"=>"","clastname"=>"","gender"=>"","dob"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('pid'=>"Parent Id",'cfirstname'=>"Child Firstname",'clastname'=>"Child Lastname",'gender'=>"Gender",'dob'=>"Date of Birth");

$rules=array(
    
    "pid"=>array("required"=>true),
    "cfirstname"=>array("required"=>true),
    "clastname"=>array("required"=>true),
    "gender"=>array("required"=>true),
    "dob"=>array("required"=>true)

);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

//if($validator->validate($_POST))
{
			


$data=array(
        
    'pid'=>$_POST['pid'],
    'cfirstname'=>$_POST['cfirstname'],
    'clastname'=>$_POST['clastname'],
    'gender'=>$_POST['gender'],
    'dob'=>$_POST['dob'],
    );
    print_r($data);
  
    if($dao->insert($data,"child"))
    {
        echo "<script> alert('New record created successfully');</script> ";
//header('location:insertslots.php');

$msg="";
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    


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
Parent Name:
<?php
$options = $dao->createOptions('pname','pid',"parent");
                    echo $form->dropDownList('pid',array('class'=>'form-control'),$options); ?>
            <?= $validator->error('pid'); ?>


</div>
</div>



<div class="row">
                    <div class="col-md-6">
Child Firstname:
<?= $form->textBox('cfirstname',array('class'=>'form-control')); ?>
<?= $validator->error('cfirstname'); ?>


</div>
</div>

<div class="row">
                    <div class="col-md-6">
Child Lastname:

<?= $form->textBox('clastname',array('class'=>'form-control')); ?>
<?= $validator->error('clastname'); ?>



</div>
</div>

<div class="row">
                    <div class="col-md-6">
Gender:

<?= $form->textBox('gender',array('class'=>'form-control')); ?>
<?= $validator->error('gender'); ?>


</div>
</div>

<div class="row">
                    <div class="col-md-6">
Date of Birth:

<?= $form->inputBox('dob',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('dob'); ?></span>

</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


