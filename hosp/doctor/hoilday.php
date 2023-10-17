<?php

 require('../config/autoload.php');
include("oghead.php");

$file=new FileUpload();
$elements=array("date"=>"","reason"=>"");


$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array('date'=>"hoilday",'reason'=>"Reason");

$rules=array("date"=>array("required"=>true),
"reason"=>array("required"=>true,"minlength"=>2,"maxlength"=>15,"alphaspaceonly"=>true));
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
  
    {
$data=array(
'date'=>$_POST['date'],
'reason'=>$_POST['reason'],
);

print_r($data);
    if($dao->insert($data,'hoilday'))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:hoilday.php');
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

     <H1><U>HOILDAY DETAILS  </U></H1>
  
<div class="row">
                    <div class="col-md-6">
HOILDAY DATE :
<?php
                

	<?= $form->inputBox('date',array('class'=>'form-control'),"date") ?>
	<span style="color:red;"><?= $validator->error('date'); ?></span>

</div>
</div>



Reason:

	<?= $form->textBox('reason',array('class'=>'form-control','placeholder'=>'reason')); ?>
	<span style="color:red;"><?= $validator->error('reason'); ?></span>
</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>
