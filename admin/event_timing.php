<?php
session_start();
include '../configs/config_database.php';



if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_location_master'] == "Save Show Details") {
  $err = array();
  
  //performing all validations and raising corresponding errors
  if (empty($_POST['auditorium'])){
	$err[] = "Auditorium name is required";  
	}
  if (empty($_POST['event'])){
	$err[] = "Show name is required"; 
	}
	 if (empty($_POST['Class_one_rate'])){
	$err[] = "CLASS I rate is required"; 
	}
	if (empty($_POST['Class_two_rate'])){
	$err[] = "CLASS II rate is required";  
	}
  if (empty($_POST['Class_three_rate'])){
	$err[] = "CLASS III rate is required";  
	}
	
if(empty($err)){
      
	  $auditorium=$_POST['auditorium'];
	   $event=$_POST['event'];
	   	 // $event_req=$_REQUEST['event'];

	     $event_date=$_POST['event_date'];
	    $Class_two_rate=$_POST['Class_two_rate'];
			    $Class_one_rate=$_POST['Class_one_rate'];
	    $Class_three_rate=$_POST['Class_three_rate'];

		  $minute=$_POST['minute'];
		  		  $hour=$_POST['hour'];
				  	 $ampm=$_POST['ampm'];
					 
					 $event_date1=$_REQUEST['event_date'];
	     $time=$_POST['time'];
		  $minute1=$_REQUEST['minute'];
		  		  $hour1=$_REQUEST['hour'];
				  	 $ampm1=$_REQUEST['ampm'];
					  $event_timing_remarks=$_POST['event_timing_remarks'];
	
	 
	 $times=mysql_query("insert into team_timing(time)values('$time')");
	 

	 $rate_update=mysql_query("UPDATE event_master SET Class_one_rate='$Class_one_rate',Class_two_rate='$Class_two_rate',Class_three_rate='$Class_three_rate' WHERE Event_name ='".$event."'");
	 
	 	 $sql_event_team=mysql_query("insert into team_event(time,event,Class_one_rate,Class_two_rate,Class_three_rate,event_timing_remarks)values('$time','$event','$Class_one_rate','$Class_two_rate','$Class_three_rate','$event_timing_remarks')");
		 
		 

	 $sql=mysql_query("insert into team_show(event,time)values('$event','$time')");
	 
	 	 $sql_booking=mysql_query("insert into team_booking_details(auditorium,event,time)values('$auditorium','$event','$time')");

//$sucess = mysql_query($sql,$link) or die("Insertion Failed:" . mysql_error());
if($sucess){
$added_details = "You have successfully added all details";
}else{
$added_details = "You have an error while adding all details. Please check all details";
}
}else{
$err = $err;
  }
}

?>
<?php include 'admin_header.php';?>
<script type="text/javascript">
function checksettime() {


}


</script>

     <div class ="wrapper col4" style="height:800px">
      <div id="container">
      <div id="content" >
      <form method="post" action="" onSubmit="return checksettime();">
      			<div class="form_row">

              <label class="contact"><strong>Show Timings:</strong></label>

    
<?php include 'date.php';?>



 <select name="hour" class="dateFields">
			  <?php

			  $i = 1;
                          echo "<option value=''>Hour</option>";
			  for($i =1 ; $i<=12; $i++){
			  echo "<option value='".$i."'>".$i."</option>";
			  }
			  ?>
			  </select>
<select name="minute" class="dateFields">
	<?php
echo "<option value=''>Minutes</option>";
	for($seconds=0; $seconds <= 60; $seconds += 15){
		if($seconds < 10)
		{
			$seconds = "0".$seconds;
		}
		echo "<option value='".$seconds."'>".$seconds."</option>";
	}?>
</select>
<select name="ampm" class="dateFields">
	<option value="AM">AM</option>
	<option value="PM">PM</option>
</select>
			 		  
            </div>
             <div class="form_row"> <label class="contact"><strong></strong></label>
             <input type="submit" class="contact_button" name="add_location_master" value="set time"> </div></form>
	
	  <div class="center_title_bar">Add Punnarjanimunnar Movie and Place Details	  <?php echo strtoupper($_SESSION['user_email_session']);?></div>
  
		  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		 
          
	  
            <div class="form_row">
              <label class="contact"><strong>Auditorium Name:</strong></label>	
  <select  name="auditorium" class="searchfield" id="event"  style="width: 200px;" onchange="auditorium(this.value)">
         <option value="">-- Select auditorium --</option>
         <?php	

	 $result = mysql_query("SELECT distinct(auditorium) FROM team_auditorium_name ");   		
	      while($row = mysql_fetch_array($result))
	      {	      ?>
		  	  	  <option value="<?php echo $row['auditorium']  ?>"><?php echo $row['auditorium']  ?></option><?php 
				
			}
?>
       </select>
            </div>
			
			   <div class="form_row">
                <label class="contact"><strong>Event Name:</strong></label>	
               <select  name="event" class="searchfield" id="event"  style="width: 200px;" onchange="auditorium(this.value)">
         <option value="">-- Select event --</option>
         <?php	

	 $result1 = mysql_query("SELECT distinct(Event_name) FROM event_master");   		
	      while($row1 = mysql_fetch_array($result1))
	      {	      ?>
		  	  	  <option value="<?php echo $row1['Event_name']  ?>"><?php echo $row1['Event_name']  ?></option><?php 
				
			}
?>
       </select>

			  </div>
	
            <div class="form_row">
     	        <label class="contact"><strong>Show Timings:</strong></label>
             <input name="time" type="text" value="<?php echo   $event_date1=$_REQUEST['event_date']; echo  $minute1=$_REQUEST['minute']; echo $hour1=$_REQUEST['hour'];  echo   $ampm1=$_REQUEST['ampm']; ?>"/>
            </div>

            
			<div class="form_row">
              <label class="contact"><strong>Event Timing Remarks:</strong></label>
              <textarea class="contact_textarea" name="event_timing_remarks"></textarea>
            </div>
			<div class="form_row">
              <label class="contact"><strong>Class I Rate:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_one_rate">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>Class II Rate:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_two_rate">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>Class III Rate:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_three_rate">                   
            </div>
		

            <div class="form_row"> <label class="contact"><strong></strong></label><input type="submit" class="contact_button" name="add_location_master" value="Save Show Details"> </div></form>
	

    </div>
          </div>
         </div>
  <?php include 'admin_footer.php';?>

</BODY>
</html>