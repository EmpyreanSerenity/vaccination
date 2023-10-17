
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php  
 //session_start();
include("dbcon.php");
require('../config/autoload.php');
$dao=new DataAccess();
?>
<div class="row">
 <div class="col-md-12">
 <div class="table-responsive">
                                <table border="1"  id="printTable" style="width:100%" >
                                    <thead>
                          <center> </center>
                           <center> Details </center>
                            <tr>
                             <th style="text-align:left">BillNo.1</th>
                               <th colspan="2" style="text-align:left"></th>
                              <th style="text-align:left" >Date:<?php echo  date("Y/m/d"); ?></th>
                            </tr>
                           <tr>
                    <th>Book id</th>
                    <th>Patient name</th>    
			              <th>Doctor Name</th>
                    <th>Consulting Date</th>
                    <th>Fees</th>
                            </tr>
                      
                                    </thead>
                                    <tbody>
                                   
 <?php
$name=$_SESSION['email'] ;

 

$sql = "SELECT * FROM booking WHERE status=1 and email='$name'";
$result = $conn->query($sql);


	
	
	
	


if ($result->num_rows > 0) {


 // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
      echo "<tr> <td> " . $row["bid"]. "</td> <td> " . $row["fname"]. "</td> <td> " . $row["d_name"]. "</td> <td>" . $row["cdate"]. "</td>  <td>" . $row["d_fee"]. "</td>  </tr>";
	  
	    
}
}


 ?>

 
       




</table>



<?php


$sql11 =" UPDATE booking SET status=2 WHERE status=1 and email='$name'" ;

if ($conn->query($sql11) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
	 
	
	 }
	 ?>
     <br /><br />

<input type="button" onclick="printData();" value="PRINT"  />

<a href="index1.php">HOME</a>
</div>
</div>
</div>

</form>




