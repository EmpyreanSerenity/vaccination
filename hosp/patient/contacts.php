<?php

 require('../config/autoload.php'); 
include("header1.php");

$file=new FileUpload();
$elements=array(
       
        "name"=>"",
        "email"=>"",
        "subject"=>"",
        "message"=>"",
       );



$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('name'=>"Name");
$labels=array('email'=>"Email");
$labels=array('subject'=>"subject");
$labels=array('message'=>"message");

$rules=array(

    
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>15,"alphaspaceonly"=>true),
    "email"=>array("required"=>true),
    "subject"=>array("required"=>true,"minlength"=>3,"maxlength"=>10,"alphaspaceonly"=>true),
     "message"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),

);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
  


$data=array(

         
        'name'=>$_POST['name'],
         'email'=>$_POST['email'],
         'subject'=>$_POST['subject'],
         'message'=>$_POST['message'],
         'status'=>1
    );
  
    if($dao->insert($data,"contact"))
    {
        echo "<script> alert('Your message has been sent. Thank you!');</script> ";
//header('location:eventdetails.php');


    }
    else
        {$msg="Insertion failed";} ?>

<!--<span style="color:red;"><?php echo $msg; ?></span>-->

<?php
    


}

}
?>
<html>
<head>
</head>
<body>
  <form action="" method="POST" enctype="multipart/form-data">
 <br><br><br><br><br><br>
 <h1><center><b>Contact Us</h1></b>
<div class="col-md-">
              <div class="form contact-form">
                <form action="" method="post" role="form" class="php-email-form">
                  <div class="form-group">
<div class="container ">

<div class="row">
    
  <div class="col-md-5">
Your Name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('name'); ?></span>
</div></div>
<div class="row">
    <!--<div class="form-group mt-3">-->
  <div class="col-md-5">
Your Email:

<?= $form->textBox('email',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('email'); ?></span>
</div></div>

 
 <div class="row">
      <!--<div class="form-group mt-3">-->
  <div class="col-md-5">
Subject:

<?= $form->textBox('subject',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('subject'); ?></span>
</div></div>
<div class="row">
      <!--<div class="form-group mt-3">-->
  <div class="col-md-5">
Message:

<?= $form->textBox('message',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('message'); ?></span>
</div></div>
 
    <!-- <div class="my-6">-->
              
                    <!--div class="error-message"></div>
                    <div class="sent-message">-->
                      

  <br><br><!--
   <div class="text-center"><button type="submit"  name="btn_insert" >Send Message</button></div>-->
</div></div></div>
<center><div id="center_button"> <button class="btn btn-primary" button onclick="location.href=''"name="btn_insert">Submit</button></td>
</form>



</body>

</html>
<?php
//include("stufooter.php");
?>

