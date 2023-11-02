<<?php
require('../../config/autoload.php');
$a=$_SESSION['user_id'];
if(!isset($a))
header('Location: /projectbca21016/user/login.php');
echo $_SESSION['user_id'];
$dao=new DataAccess();
if(isset($a)){
  $fields2=array('id','status');
  $bookstat=$dao->getDataJoin($fields2,'booking','user_id='.$a.' LIMIT 1');
  

   
    if($bookstat[0]['status']=='paymentpending'){

      header('Location: /projectbca21016/user/payment/pendingpayment.php'); 
    }
  
}
include("header.php") ;
function convertToTimeSlots($start, $end) {
  $timeSlots = array();
  $currentTime = strtotime($start);
  $endTime = strtotime($end);

  while ($currentTime <= $endTime) {
      $timeSlot = date('H:i', $currentTime);
      $timeSlots[] = $timeSlot;
      $currentTime = strtotime('+15 minutes', $currentTime);
  }

  return $timeSlots;
}
$doctorid=$_GET['id'];
$elements=array(
  'appo_date'=>"",'appo_time'=>"","doctor_id"=>"","slot"=>"","user_id"=>"","booked_datetime"=>"","status"=>"");

      
        $fields=array('name','department','qualification','image','description');
        $info=$dao->getDataJoin($fields,'doctor','id='.$_GET['id']);
        
        $fields2=array('id','name');
    $depname=$dao->getDataJoin($fields2,'department',1);
    $departmentname=array();
    foreach ($depname as $depid=>$depnamee){
      $departmentname+=$depnamee;
    }
    foreach ($info as $key => $row) {
      $img=$row['image'];
      $name=$row['name'];
      $dept=$departmentname['name'];
      $q=$row['qualification'];
      $des=$row['description'];
    }

    $d=array('date');
    $dateavailable=$dao->getDataJoin($d,'schedule','doctor_id='.$_GET['id'].' LIMIT 7');
    $times=array('m_start','m_end','e_start','e_end','date');
    $timeslots=$dao->getDataJoin($times,'schedule','doctor_id='.$_GET['id'].' LIMIT 7');
    $bookedtimes=array('appo_date','appo_time','status','slot');
    $bookedslots=$dao->getDataJoin($bookedtimes,'booking','doctor_id='.$_GET['id'].' AND status="confirm"');
    
$form=new FormAssist($elements,$_POST);




$labels=array("doctor_id"=>"doctor id","user_id"=>"user id","booked_datetime"=>"booked date and time",'appo_date'=>"Date of appointment",'appo_time'=>'appointment time',"status"=>"status of booking","slot"=>"Appointment slot");

$rules=array(
    "appo_date"=>array("required"=>true,"minlength"=>1,"maxlength"=>30),
    "appo_time"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
    
    "doctor_id"=>array("required"=>true),
    "slot"=>array("required"=>true,"minlength"=>1,"maxlength"=>1),
    "user_id"=>array("required"=>true),
    "booked_datetime"=>array("required"=>true),
    "status"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
 
  if($validator->validate($_POST))
  {
    
	

  
  
$data=array(

       
        "user_id"=>$_SESSION['user_id'],
        "doctor_id"=>$_POST['doctor_id'],
        "booked_datetime"=>$_POST['booked_datetime'],
        'appo_date'=>$_POST['appo_date'],
        "appo_time"=>$_POST['appo_time'],
        "slot"=>$_POST['slot'],
        "status"=>$_POST['status'],
        
        
         
    );
    
    if($dao->insert($data,"booking"))
    {
      $fields3=array('id');
      $info2=$dao->getDataJoin($fields3,'booking','user_id='.$a.' ORDER BY id DESC LIMIT 1');
      $_SESSION['booking_id']=$info2[0]['id'];
      $book_id=$_SESSION['booking_id'];
      echo "<script>location.replace('/projectbca21016/user/payment/pay.php');</script>";
      

    }
    else echo "<p style=color:red;>ALREADY EXIST</p>";

   // print_r($data);
  
   
}

else
echo "Error occured";

}





?>
<html>



<body>
<section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
        <h2 style='visibility:hidden;'>gf</h2>
          <p><h2>Make an Appointment</h2></p>
        </div>

        
          <div class="row">
            <div class="col-md-4 form-group">
           <!--    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div> 
            -->
          </div>
          <div class="row">
            
            <div class="col-md-4 form-group mt-3">
           
          

    
<!--
              <select name="department" id="department" class="form-select">
                <option value="">Select Department</option>
                <option value="Department 1">Department 1</option>
                <option value="Department 2">Department 2</option>
                <option value="Department 3">Department 3</option>
              </select>
             
-->     
<div class="validate"></div>
            </div>   
          <!--  <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Select Doctor</option>
                <option value="Doctor 1">Doctor 1</option>
                <option value="Doctor 2">Doctor 2</option>
                <option value="Doctor 3">Doctor 3</option>
              </select> 
              <div class="validate"></div>
            </div>-->
            
            <!-- old card 
              
            <div class="doctors col-xl-4 d-flex align-items-stretch">
                  <div class="member icon-box mt-4 mt-xl-0">
                  <div class='pic'><img src=/projectbca21016/doctorimage/<?php echo $img;?> class='img-fluid' alt=></div>
                    <h4><?php echo $name;?></h4>
                    <p><?php echo$dept;?></p>
                    <p><?php echo $q;?></p>
                   
                  </div>
                </div> -->
                
             <!-- new card -->
                <div class="ttm-team-member-single-content">
                                <div class="ttm-social-links-wrapper">
                                   
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                        <!-- ttm-featured-wrapper -->
                                        <div class="ttm-featured-wrapper"> 
                                            <div class="featured-thumbnail padding_left20">
                                                <img class="img-fluid" src="/projectbca21016/doctorimage/<?php echo $img;?>" width="370" height="380" alt="image">
                                            </div> 
                                        </div><!-- ttm-featured-wrapper end--> 
                                    </div>
                                    <div class="ttm-team-member-single-content-area col-md-12 col-lg-7">
                                        <div class="ttm-team-member-content shadow-box">
                                            <div class="ttm-team-member-single-list">
                                                <h2 class="ttm-team-member-single-title"><?php echo $name;?></h2>
                                                <h5 class="ttm-team-member-single-position"><?php echo$dept;?></h5>
                                                <div class="ttm-team-member-appointment-btn-wrapper">
                                                </div>
                                                <div class="ttm-team-data">
                                                    <div class="ttm-team-details-wrapper">
                                                       
                                                           
                                                              
                                                                <div class="ttm-team-list-value"><?php echo $q;?><br/><br/><?php echo $des;?></div>
                                                          
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- new card end -->
            
              <div class="validate"></div>
            </div>
              <div class="validate"></div>
            </div>
          </div>

         
          <div class="col-xl-4 d-flex align-items-stretch">
<!-- <input type="date" name="date" > -->
</div>
          
          
          <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Time slots</h2>
          </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
                <a class="nav-link" >Available date</a>
              </li>
              <?php 
              
                foreach($dateavailable as $dates=>$dat){
                  $date=$dat['date'];
                 
                  $dateTime = new DateTime($date);
                  $day = $dateTime->format('d-m-y');
                  $dayOfWeek = $dateTime->format('l');

                 
                  echo "<li class=\"nav-item\">
                <a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#$date\">$day - $dayOfWeek </a>
              </li>";
                
                }
              ?>
            </ul><input type="hidden" id="selectedSlot" name="selectedSlot" value="">
            <form method="POST" role="form" id='sample-form' >
            
            <input type="hidden" id="user_id" name="user_id" value="">
            <input type="hidden" id="status" name="status" value="">
            <input type="hidden" id="booked_datetime" name="booked_datetime" value="">
            <input type="hidden" id="appo_date" name="appo_date" value="">
            <input type="hidden" id="appo_time" name="appo_time" value="">
            <input type="hidden" id="SlotTime" name="slot" value="">
            <input type="hidden" id="doctor_id" name="doctor_id" value="">
           
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
           
              <?php 
              $bookm=array();
              $booke=array();
              foreach($timeslots as $key=>$row){
                $booke;$bookm;
                $r=$row['date'];
                foreach($bookedslots as $bookkey=>$bookings){
                 
                  if(isset($r)){
                  if($r==$bookings['appo_date'] && $bookings['slot']=="m"){

                    
                 
                    array_push($bookm,$bookings['appo_time']);
                  }
                 
                  if($r==$bookings['appo_date'] && $bookings['slot']=="e"){

                    
                    array_push($booke,$bookings['appo_time']);
                  }
                 
                  
                  
                }
              }
                  
                  
                  
                  
                  $ms=$row['m_start'];
                  $me=$row['m_end'];
                  $es=$row['e_start'];
                  $ee=$row['e_end'];
                    $m_dates = convertToTimeSlots($ms,$me);
                    $e_dates = convertToTimeSlots($es,$ee);
                    echo "<div class=\"tab-pane\" id=\"$r\">
                    <div class=\"row gy-4\">
                    <div class=\"col-lg-8 details order-2 order-lg-1\">
                    <h3>Morning</h3>";
                    foreach($m_dates as $dat){
                      $isBooked = in_array($dat, $bookm);
                      $disabledAttribute = $isBooked ? 'disabled' : '';
                      echo "<button type=\"button\" name=\"slot\" value=\"$r,$dat,m\" id=\"Slot\"  class=\"slot btn btn-outline-success\" $disabledAttribute>$dat</button>";
                    }
                    echo "<h3>Evening</h3>";
                    foreach($e_dates as $dat){
                      $isBooked = in_array($dat, $booke);
                      $disabledAttribute = $isBooked ? 'disabled' : '';
                      echo "<button type=\"button\" name=\"slot\" value=\"$r,$dat,e\" id=\"Slot\"  class=\"slot btn btn-outline-success\" $disabledAttribute>$dat</button>";
                    }
                    $bookm=array();
                    $booke=array();
                    
                    echo "</div>
                    <div class=\"col-lg-4 text-center order-1 order-lg-2\">
                    
                    </div>
                    </div>
                    </div>";
                  }
              
              
            
              ?>
            </div>
          </div>
        </div>
       
      </div>
    </section>
   
    <div class="text-center"><input class="appointment-btn scrollto " type="button"  id="Book" name="booking" value="Book Appointment"  disabled></div>
    
        </form>

      </div>
    </section>
    <script type="text/javascript">
            const slots = document.querySelectorAll('.slot');
            const selectedSlotInput = document.getElementById('selectedSlot');
            slots.forEach(slot => {
            slot.addEventListener('click', () => {
              const selectedValue = slot.value;
              slots.forEach(s => s.classList.remove('active'));
              selectedSlotInput.value = selectedValue;
                // Toggle the selection by adding or removing a CSS class
                slot.classList.toggle('active');
                if(selectedSlotInput.value!=""){
          const button = document.getElementById('Book');
          button.disabled=false;
        }
            });
        });

      


        document.getElementById("Book").addEventListener("click", function () {

let user_id=document.getElementById('user_id');
user_id.value=1;
let doctor_id=document.getElementById('doctor_id');
doctor_id.value=<?php echo $doctorid?>;
let booked_datetime=document.getElementById('booked_datetime');
const currentDateTime = new Date();
const year = currentDateTime.getFullYear();
const month = currentDateTime.getMonth() + 1; // Months are 0-based
const day = currentDateTime.getDate();
const hours = currentDateTime.getHours();
const minutes = currentDateTime.getMinutes();
const seconds = currentDateTime.getSeconds();

const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
console.log(formattedDateTime);
booked_datetime.value=formattedDateTime;
let appo_date=document.getElementById('appo_date');
set=document.getElementById('selectedSlot');
slotarray = set.value.split(',');
appo_date.value=slotarray[0];
let appo_time=document.getElementById('appo_time');
appo_time.value=slotarray[1];
let slot=document.getElementById('SlotTime');
slot.value=slotarray[2];
let status=document.getElementById('status');
status.value="paymentpending";
// Trigger form submission
document.getElementById("sample-form").submit();


});  
          </script>
          
</body>
    </html>
