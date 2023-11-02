<?php 

 require('../config/autoload.php'); 
include("oghead.php");


$elements=array(
        "apname"=>"","jdate"=>"","cdate"=>"","countryid"=>"","stateid"=>"","districtid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('apname'=>"Applicant Name","jdate"=>"Join Date","cdate"=>"Closing Date","countryid"=>"Country name","stateid"=>"State name","districtid"=>"District name" );

$rules=array(
    "apname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
    "jdate"=>array('required'=>true,'date'=>array('from'=>'-5 days 12 am','to'=>'today')),
    "cdate"=>array('required'=>true,'datecompare'=>array('comparewith'=>'jdate','operator'=>'>')),
 "districtid"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
$data=array(

        'apname'=>$_POST['apname'],
        'jdate'=>$_POST['jdate'],
          'cdate'=>$_POST['cdate'],
		  'districtid'=>$_POST['districtid'],
        
    );
  
    if($dao->insert($data,"applicant"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:applicantdetails.php');
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

 <form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
Name:

<?= $form->textBox('apname',array('class'=>'form-control')); ?>
<?= $validator->error('apname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Joint Date:
<?= $form->inputBox('jdate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('jdate'); ?></span>


</div>
</div>


<div class="row">
                    <div class="col-md-6">
Closing Date:

<?= $form->inputBox('cdate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('cdate'); ?></span>

</div>
</div>

<?php
					
						$start='<div class="form-group">';
						$end='</div>';
					
						$country_options=$dao->ajaxCreateOptions('countryname','countryid','country');
						
						$state_options=$dao->ajaxCreateOptions('statename','stateid','state',1,'countryid');
						
						$city_options=$dao->ajaxCreateOptions('districtname','districtid','district',1,'stateid');
						
						$list=array(
							'countryid'=>array(array(),$country_options,'Select Country'),
							
							'stateid'=>array(array(),$state_options,'Select State'),
							
							'districtid'=>array(array(),$city_options,'Select City'),
							
						);
						
						echo $form->ajaxDropDownList($list,$start,$end);
					?>















<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


