<?php require('../config/autoload.php'); 

?>
<?php
$dao=new DataAccess();

$elements=array(
    "fdate"=>"","tdate"=>"");


$form=new FormAssist($elements,$_POST);

$labels=array('fdate'=>"From Date",'tdate'=>"To Date");


$rules=array(


"fdate"=>array("required"=>true,'date'=>array('from'=>'-100 days 12 am','to'=>'today')),
      "tdate"=>array("required"=>true,'datecompare'=>array('comparewith'=>'fdate','operator'=>'>=')),

);
$_SESSION['fdate']='2016-01-01';
$_SESSION['tdate']=date('Y-m-d',time());

$validator = new FormValidator($rules,$labels);

if(isset($_POST["filter"]))
{
if($validator->validate($_POST))
{
$_SESSION['fdate']=$_POST['fdate'];
$_SESSION['tdate']=$_POST['tdate'];


}
else {

}
}


?>




?>
<?php include('header1.php'); ?>
<body style="background-color:#E5F4F6;">

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12" style="color:000;"><br><br>
            Filter by:
            <form action=""method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-6" style="color:#000;">
                    <br>
            From Date:
            <input name="fdate" type="date" ++ style="margin-top:8px;">
            
            To Date:
            <input name="tdate" type="date" max=<?php echo date('Y-m-d',time()); ?> style="margin-top:8px;">
            
            <button type="submit" name="filter"> submit</button>
            <br>
           
</div>
</div>
<br>

<br>

                <table  border="0" class="table" style="width:100%;height:100px;">

                <style>
table, th, td {}
th, td {
  background-color: #fff;
  height:50px;
  text-align:center;
}
</style>


                    <tr style="color:black;">

                        <th>SL No</th>
                        <th>Child Name</th>
                        <th>Vaccine Name</th>
                        
                       
                        <th>Book Date</th>
                        <th>Book Time</th>
                        

                     
                      
                    </tr>



<?php
    
    $actions=array(
   // 'edit'=>array('label'=>'Vaccinated','link'=>'updatebook.php','params'=>array('id'=>'bookid'),'attributes'=>array('class'=>'button button2')),
    
    //'delete'=>array('label'=>'Delete','link'=>'deletevacc.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bookid'),
		'actions_td'=>false,
        
        
        
    );

   

    if(isset($_SESSION['fdate']))
     {
        $condition="b.status=2 and book_date between '".$_SESSION['fdate']."' and '".$_SESSION['tdate']."' and h.hid=".$_SESSION['hid'];
     }
     else{
      $condition="b.status=2";
     }
      $join=array(
        'health as h'=>array('h.hid=b.hid','join'),'vacc as v'=>array('v.vid=b.vid','join'),
        );  


    $fields=array('bookid','ch_firstname','vname','book_date','book_time');

    $users=$dao->selectAsTable($fields,'booking as b',$condition,$join,$actions,$config);
    echo $users
    ?>
    
                
                    
                   
    

             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    </body>