<?php 

 require('../config/autoload.php'); 
include("oghead.php");


$elements=array(
        "cdate"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("cdate"=>"Consult Date");

$rules=array(
   
"cdate"=>array("required"=>true),

);
    
    
$validator = new FormValidator($rules,$labels);


if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
 $_SESSION['cdate']=$_POST["cdate"];
header('location:patientconsult.php');
    }
}

?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" >
 <H1><U>Consulting Date  </U></H1>




<div class="row">
                    <div class="col-md-6">
Date:

<?= $form->inputBox('cdate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('cdate'); ?></span>

</div>
</div>




<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


