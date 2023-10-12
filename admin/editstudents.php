<?php require('../config/autoload.php'); ?>
<?php
	

include("oghead.php");
$dao=new DataAccess();
$info=$dao->getData('*','student','sid='.$_GET['id']);

$elements=array(
        "sname"=>$info[0]['sname'],"sage"=>$info[0]['sage'],"ssex"=>$info[0]['ssex'],"deptno"=>$info[0]['dno'],"sdob"=>$info[0]['sdob']);

	$form = new FormAssist($elements,$_POST);

$labels=array('sname'=>"Student Name","sage"=>"Student Age","ssex"=>"Student Gender","deptno"=>"Dept name","sdob"=>"Student Date Of Birth" );

$rules=array(
    "sname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
    "sage"=>array("required"=>true,"minlength"=>2,"maxlength"=>2,"integeronly"=>true),
    "ssex"=>array("required"=>true,"exist"=>array("m","f")),
 "deptno"=>array("required"=>true),
"sdob"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

        'sname'=>$_POST['sname'],
        'sage'=>$_POST['sage'],
          'ssex'=>$_POST['ssex'],
	'dno'=>$_POST['deptno'],
        'sdob'=>$_POST['sdob'],
          //'simage'=>$_POST['simage'],
    );
  $condition='sid='.$_GET['id'];

    if($dao->update($data,'student',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewstudents.php');
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

<?= $form->textBox('sname',array('class'=>'form-control')); ?>
<?= $validator->error('sname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Age:

<?= $form->textBox('sage',array('class'=>'form-control')); ?>
<?= $validator->error('sage'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Sex:

<?php
                    $options=array('Male'=>"m","Female"=>"f");
                    echo $form->radioGroup('ssex',array(),$options); ?>
<?= $validator->error('ssex'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Dept name:

<?php
                    $options = $dao->createOptions('dname','dno',"dept");
                    echo $form->dropDownList('deptno',array('class'=>'form-control'),$options); ?>
<?= $validator->error('deptno'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
DOJ:

<?= $form->inputBox('sdob',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('sdob'); ?></span>

</div>
</div>







<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>