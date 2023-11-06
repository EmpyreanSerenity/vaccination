
<?php require('../config/autoload.php'); ?>
<?php include("header.php");	?>

<style>
div.a {
  text-transform: uppercase;
}
</style>

   <div class="page-head"  data-bg-image="images/5570834.jpg">
		   <div class="container">
				 <h2 class="page-title" style="color: white">Select District</h2>
			   <p style="color: white">Choose the district of the healthcenter according to your convenience</p>
	       </div>
      </div>

      <?php
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>
<?php } ?>
<?php
$dao=new DataAccess();
$elements=array(
        "pid"=>"","ch_firstname"=>"","ch_lastname"=>"","gender"=>"","dob"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('pid'=>"Parent Id",'ch_firstname'=>"Child firstname",'ch_lastname'=>"child firstname",'gender'=>"Gender",'dob'=>"Date of Birth");

$rules=array(
    "pid"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
	 "ch_firstname"=>array("required"=>true,"alphaonly"=>true),
    "ch_lastname"=>array("required"=>true,"alphaonly"=>true),     
    "gender"=>array("required"=>true),
    "dob"=>array("required"=>true)
    

);
	
$validator = new FormValidator($rules,$labels);
if(isset($_POST["submit"]))
{
    
       // if($validator->validate($_POST))
		{
        $data=array(
				'pid'=>$_SESSION['pid'],
                'ch_firstname'=>$_POST['ch_firstname'],
				'ch_lastname'=>$_POST['ch_lastname'],
				'gender'=>$_POST['gender'],
                'dob'=>$_POST['dob']
                
				
			);
        
           print_r($data);
			if($dao->insert($data,"child"))
			{
			echo "<script> alert('Registeration Sucess');</script> ";
            echo"<script> location.replace('displayvacc.php'); </script>";
			}
			else
			{
				$msg="insertion failed" ?>
                 <span style="color:red;"><?php echo $msg; ?></span>
	             <?php
			}
	
        }
}


?>
<body>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-row" style="margin-left:250px;">
           <div class="row">
                    <div class="col-md-6">
                     Child Firstname:

                     <?= $form->textBox('ch_firstname',array('class'=>'form-control')); ?>
                     <?= $validator->error('ch_firstname'); ?>

                    </div>
            </div>

        
            <div class="row">
                    <div class="col-md-6">
                     Child Lastname:

                     <?= $form->textBox('ch_lastname',array('class'=>'form-control')); ?>
                     <?= $validator->error('ch_lastname'); ?>

                    </div>
            </div>
                    

            <div class="form-row">
                    <div class="col-md-6">
                     Gender:
                     <?php $options=array('MALE'=>"m",'FEMALE'=>"f");
                     echo $form->radioGroup('gender',array(),$options); ?>
                    <span style="color:red;">
					<?= $validator->error('gender'); ?></span>
                                  
                    </div>    
            </div>
                      
            <style>
h1 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
</style>
            <div class="row">
                    <div class="col-md-6">             
                     Date of Birth:
                     <?= $form->inputBox('dob',array('class'=>'form-control'),"date"); ?>
                    <span style="color:red;">
	                <?= $validator->error('dob'); ?></span><br>
				
                    </div>
            </div>
</div>
                        
                        <div class="form-row" style="margin-left:250px;">
                            
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit"/>
                            
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>

    </div>
