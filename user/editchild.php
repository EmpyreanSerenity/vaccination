<?php require('../config/autoload.php'); ?>
<?php
include("header2.php");

$dao=new DataAccess();
$info=$dao->getData('*','child','cid='.$_GET['id']);
$elements=array(
       "cfirstname"=>$info[0]['cfirstname'],"clastname"=>$info[0]['clastname'],"gender"=>$info[0]['gender'],"dob"=>$info[0]['dob']
);
$form = new FormAssist($elements,$_POST);
$labels=array('cfirstname'=>"Child's first name",'clastname'=>"Child's last name","gender"=>"Gender","dob"=>"Date of Birth");
$rules=array(
    "cfirstname"=>array("required"=>true),
    "clastname"=>array("required"=>true),
	"gender"=>array("required"=>true,"exist"=>array("m","f")),
	"dob"=>array("required"=>true),
	);
$validator = new FormValidator($rules,$labels);
if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(
   
	'pid'=>$_SESSION['pid'],
	 'cfirstname'=>$_POST['cfirstname'],
        'clastname'=>$_POST['clastname'],
	 'gender'=>$_POST['gender'],
	'dob'=>$_POST['dob'],

    );
  $condition='cid='.$_GET['id'];
  if($dao->update($data,'child',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewchilds.php');
    }
    else
        {
		$msg="Failed";
	} ?>


<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}
?>
<html>
	<div class="page-head"  data-bg-image="images/5570834.jpg">
		   <div class="container">
				 <h2 class="page-title" style="color: white">Edit child information</h2>
			   <p style="color: white">Please do edit your child's details if necessary.</p>
	       </div>
      </div>
<body> 

	<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							 <div class="col-md-12 col-sm-12">
				<div class="feature" style="color: black">

     <form action="" method="POST"  >
 <table style="color: black; margin-left:auto;margin-right:auto;" >
	  <tr>
<div class="row">
              <div class="col-md-8">
				
					 <td> <label for="">Name:</label></td>
						<td ><?= $form->textBox('cfirstname',array('class'=>'form-control')); ?></td></tr>
				        <tr><td></td><td><span style="color:red;">
						   <?= $validator->error('cfirstname'); ?></td></tr></div></div>
	             
<tr><td><br></td></tr>
  <tr>
<div class="row">
              <div class="col-md-8">
				
					 <td> <label for="">Name:</label></td>
						<td ><?= $form->textBox('clastname',array('class'=>'form-control')); ?></td></tr>
				        <tr><td></td><td><span style="color:red;">
				         <?= $validator->error('clastname'); ?></td></tr></div></div>
	           
<tr><td><br></td></tr>

<tr>
	<div class="row">
                    <div class="col-md-8">

 <td> <label for="">Sex:</label></td>

<td><?php
                   $options=array('Male'=>"m","Female"=>"f");
                    echo $form->radioGroup('gender',array(),$options); ?></td></tr>
<tr><td></td><td><span style="color:red;">
<?= $validator->error('gender'); ?>
</td>
</tr>
</div>
</div>
<tr><td><br></td></tr>
			<tr>
				<div class="row">
                    <div class="col-md-8">


 <td> <label for="">Date of Birth:</label></td>

<td><?= $form->inputBox('dob',array('class'=>'form-control'),"date"); ?></td></tr>
<tr><td></td><td><span style="color:red;">
	<?= $validator->error('dob'); ?></span>
	</td></tr>			
</div>
</div>
 </tr>
<tr><td><br></td></tr>
	 <tr>
	<div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <td><input type="submit" name="btn_update" value="Save Changes" class="button" style="background-color: lightskyblue;color: black"> </td>
        </div>
      </div></div>
	 </tr></table>
		 </form>
</div></div></div></div>
		<?php include("footer2.php"); ?>
				
	</body>


</html>
		