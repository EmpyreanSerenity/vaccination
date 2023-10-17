<?php

 require('../config/autoload.php');
include("oghead.php");

$file=new FileUpload();
$elements=array("d_name"=>"","f_date"=>"","t_date"=>"","description"=>"");


$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array('d_name'=>"Doctor Name",'f_date'=>"Leave from",'t_date'=>"Leave to",'description'=>"Description");

$rules=array("d_name"=>array("required"=>true),
"f_date"=>array("required"=>true),
"t_date"=>array("required"=>true),
"description"=>array("required"=>true,"minlength"=>2,"maxlength"=>15,"alphaspaceonly"=>true));
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
  
    {
$data=array(
'd_id'=>$_POST['d_name'],
'f_date'=>$_POST['f_date'],
't_date'=>$_POST['t_date'],
'description'=>$_POST['description'],
'status'=>1);

print_r($data);
    if($dao->insert($data,'docleave'))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:docleave.php');
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

 <form action="" method="POST">

     <H1><U>DOCTOR LEAVE DETAILS  </U></H1>
  
<div class="row">
                    <div class="col-md-6">
Doctor Name :
<?php
                    $options = $dao->createOptions('d_name','d_id',"doctor");
                    echo $form->dropDownList('d_name',array('class'=>'form-control'),$options); ?>
		    <span style="color:red;"><?= $validator->error('d_name'); ?></span>
</div>
</div>

<div class="row">
                    <div class="col-md-6">
Leave From :

	<?= $form->inputBox('f_date',array('class'=>'form-control'),"date") ?>
	<span style="color:red;"><?= $validator->error('f_date'); ?></span>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Leave To :
	
         <?= $form->inputBox('t_date',array('class'=>'form-control'),"date") ?>
	<span style="color:red;"><?= $validator->error('t_date'); ?></span>


</div>
</div>


<div class="row">
                    <div class="col-md-6">

Desription:

	<?= $form->textBox('description',array('class'=>'form-control','placeholder'=>'description')); ?>
	<span style="color:red;"><?= $validator->error('description'); ?></span>
</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>
