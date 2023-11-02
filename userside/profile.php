<head>
<link rel="stylesheet" href="pcss.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<?php 


require('../config/autoload.php'); 
   include("header.php");
   $dao=new DataAccess();
$q1="Select * from parent where email='".$_SESSION['email']."'";
$info1=$dao->query($q1);
$q2="Select * from child where pid=".$info1[0]['pid'];
$info2=$dao->query($q2);
?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12" >
                                                <div class="card user-card-full"  style="height:500px;width:800px;">
                                                    <div class="row m-l-0 m-r-0"  style="width:800px;height:500px;">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img src="images/pro.jpg" class="img-radius" alt="User-Profile-Image">
                                                                </div>
                                                                <h2 class="f-w-600"><?php  echo $info1[0]['parent_name'];  ?> </h2>
                                                                <p>Web Designer</p>
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8" >
                                                            <div class="card-block" >
                                                                <h2 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h2>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <h2 class="m-b-10 f-w-600">Email</h2>
                                                                        <h4 class="text-muted f-w-400"><?php  echo $info1[0]['email'];  ?></h4>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h2 class="m-b-10 f-w-600">Phone</h2>
                                                                        <h4 class="text-muted f-w-400"><?php  echo $info1[0]['phone'];  ?></h4>
                                                                    </div>
                                                                </div>
                                                                <h2 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Children</h2>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <?php 
                                                                        $i=0;
                                                                        if(is_countable($info2))
                                                                        {

                                                                        $count= count($info2);
                                                                        while($i<$count)
                                                                        { ?>
                                                                        <h4 class="text-muted f-w-400"><?php  echo $info2[$i]['ch_firstname'];?> &nbsp;<?php echo $info2[0]['ch_lastname']; ?> </h4>
                                                                        <?php $i++; } }?>
                                                                    </div>
                                                                        

                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>