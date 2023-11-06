<?php require('../config/autoload.php'); ?>
<?php
$dao=new DataAccess();
?>
 <html lang="en">

 

<head>

 

 

              <!-- Bootstrap -->
              <!-- Custom stlylesheet -->
                           <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
                           <link type="text/css" href="css/table.css" rel="stylesheet">

</head>
<?php
include('header1.php');
$dao=new DataAccess();
$file=new FileUpload();
$hid_id=$_SESSION['hid'];

if(isset($_SESSION['cdate']))

{

  $date=$_SESSION['cdate'];
}

else

  {

$date=date('Y-m-d',time());

}

$q="select bookid,vname,ch_firstname,hname,dname,book_date,book_time,b.status from health h,book b,vacc v,district d where h.hid = b.hid and v.vid=b.vid and h.did=d.did and h.hid=".$hid_id;
$info=$dao->query($q);
?> <body style="background-color:#E5F4F6">
<div class="container_gray_bg" id="home_feat_1">

  <div class="container">
    <div class="row">
     <div class="col-md-12"style="margin-top:125px;">                                                                        
       <form action="" method="POST" enctype="multipart/form-data">
           <?php if(is_countable($info))
            {

             $count=count($info);

           ?>
              <table  border="0" class="table" style="margin-top:100px;margin-left:88px;background-color:#ffffff;" id="app">
              <center>

            <tr>
            <tr>
                        <th>Booking ID</th>
                        <th>Child Name</th>
                        <th>Vaccine Name</th>
                        <th>Book Date</th>
                        <th>Book Time</th>
                        <th>Actions</th>

                    </tr>
              </center>
                    <?php
                         $i=0;
                         $c=0;

                    while ($i<$count)

                    {
                      ?>

                   <tr style="color:black;height:50px;" id=<?php echo $info[$i]["bookid"] ?>>
                   <td>  <?php echo $c+1; ?> </td>
                   <td> <?php echo $info[$i]["ch_firstname"]; ?> </td>
                   <td>  <?php echo $info[$i]["vname"]; ?></td>
                   <td> <?php echo $info[$i]["book_date"]; ?></td>
                   <td> <?php echo $info[$i]["book_time"]; ?></td>
                        <?php  if($info[$i]["status"]==1)

         { ?>

               <td>  <button type="submit" onclick="return function()" name="status"  id="status" style="background-color:  #4b49aa ;color:#fff;"><b> Mark as completed</b></button></td>

 <?php }else{  ?>

              <td><i class="fa fa-check-square-o"> Completed </i></td>

 <?php } ?>
              </tr>
              <?php

                  $c++;
                   $i++;
                   }
            ?>
              </table>
              </div>
              </div><!-- End row -->
              </div><!-- End container -->
              </div>
              <?php
   }

      ?><!-- End container_gray_bg -->


                           </body>
                            <script>
                          $(document).on("click", "#app tr #vp", function() {
                           var appid = $(this).closest('tr').attr('id');
                          window.location.href="viewpresc.php?id="+appid;
                          return false;
                         });

                        $(document).on("click", "#app tr #status", function() {
                        var appid = $(this).closest('tr').attr('id');
                        window.location.href="complete.php?id="+appid;
                         return false;
                        });

                      $(document).on("click", "#app tr #status", function() {
                      var appid = $(this).closest('tr').attr('id');
                                                                       window.location.href="complete.php?id="+appid;

                                                                        return false;

                                                                         });

 

 

                                                                      $(document).on("click", "#app tr #scan", function() {

                                                                      var appid = $(this).closest('tr').attr('id');

 

                                                                               window.location.href="viewscan.php?id="+appid;

                                                                                           return false;

                                                                                            });

 

 

 

 

 

 

                                                                                                                                                  </script>

 

                           </html>
	
	
	
