<?php 

 require('../config/autoload.php'); 
include("oghead.php");
include("dbcon.php");
$bid = $_GET['id'];

$sql11 = "SELECT * FROM booking where bid=".$bid;
$result11 = $conn->query($sql11);

if ($result11->num_rows > 0) {
$row = $result11->fetch_assoc();
 $_SESSION['bid']=$row["bid"];
 $_SESSION['email']=$row["email"];
 $_SESSION['d_id']=$row["d_id"];
}

$file=new FileUpload();
$elements=array(
        "medicine"=>"","findings"=>"","nextvisit"=>"","remark"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("medicine"=>"Medicine","findings"=>"Findings","nextvisit"=>"Next Visit Date","remark"=>"Remark");

$rules=array(
   
   "medicine"=>array("minlength"=>3,"maxlength"=>30),
 "findings"=>array("required"=>true,"minlength"=>3,"maxlength"=>100,"alphaspaceonly"=>true),
 "nextvisit"=>array(),
 "remark"=> array("alphaspaceonly"=>true)
);
    
    $date1=date('Y-m-d',time());
$validator = new FormValidator($rules,$labels);


$bid=$_SESSION['bid'];
$email= $_SESSION['email'];


if(isset($_POST["btn_insert"]))
{
 
if($validator->validate($_POST))
{

$data=array(
        'bid'=>$bid,
         'email'=> $email,
         'd_id'=>$_SESSION['d_id'],
        'medicine'=>$_POST['medicine'],
          'findings'=>$_POST['findings'],
           'cdate'=> $date1,
          'nextvisit'=>$_POST['nextvisit'],
          'remark'=>$_POST['remark'],
          
    );

  
    if($dao->insert($data,"prescription"))
    {
       
       $sql = "update booking set status=4 where bid=".$bid;

$conn->query($sql);
        echo "<script> alert('Updated successfully');</script> ";
        
header('location:consultant.php');
    }
    else
        {$msg="Registration failed"; ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
}    
}
else
echo $file->errors();
}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 <H1><U>PRESCRIPTION DETAIL  </U></H1>





<div class="row">
                    <div class="col-md-6">
Medicine:

<?= $form->textBox('medicine',array('class'=>'form-control')); ?>
<?= $validator->error('medicine'); ?>

</div>
</div>



<div class="row">
                    <div class="col-md-6">

Findings:

<?= $form->textarea('findings',array('class'=>'form-control')) ?>
<span style="color:red;"><?= $validator->error('findings'); ?></span>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Next Visit Date:
<?= $form->inputBox('nextvisit',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('nextvisit'); ?></span>


</div>
</div>


<div class="row">
                    <div class="col-md-6">
Remark:

<?= $form->textarea('remark',array('class'=>'form-control')); ?>
<?= $validator->error('remark'); ?>

</div>
</div>







<button type="submit" name="btn_insert">Submit</button>
</form>


</body>

</html>
