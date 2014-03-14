<?php
session_start();
include '../configs/config_database.php';



if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_location_master'] == "Save Show Details") {
  $err = array();
  
  //performing all validations and raising corresponding errors
  if (empty($_POST['auditorium_name'])){
	$err[] = "Auditorium name is required";  
	}
  if (empty($_POST['event_name'])){
	$err[] = "Show name is required"; 
	}
	if (empty($_POST['event_time'])){
	$err[] = "Event time is required";  
	}

        if (empty($_POST['event_time'])){
	$err[] = "Event Date is required";
	}
        if (empty($_POST['hour'])){
	$err[] = "Event Hours is required";
	}
        if (empty($_POST['minute'])){
	$err[] = "Event Minute is required";
	}
        if (empty($_POST['ampm'])){
	$err[] = "Event time is required";
	}
	
if(empty($err)){
       $auditorium_name = mysql_real_escape_string($_POST["auditorium_name"]);
       $movie_remevent_namearks = mysql_real_escape_string($_POST["event_name"]);
        $event_time = mysql_real_escape_string($_POST["event_time"]);
        $hour = mysql_real_escape_string($_POST["hour"]);
        $minute = mysql_real_escape_string($_POST["minute"]);
        $time = $hour. ":".$minute;
        $ampm = mysql_real_escape_string($_POST["ampm"]);
       $event_timing_remarks = mysql_real_escape_string($_POST["event_timing_remarks"]);
	        
	 $sql="insert into $event_timing_registration_table (id,Event_ID,Location_ID,Event_Timings,time,ampm,Remarks)values('','$movie_remevent_namearks','$auditorium_name','$event_time','$time','$ampm','$event_timing_remarks')";
$sucess = mysql_query($sql,$link) or die("Insertion Failed:" . mysql_error());
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
     <div class ="wrapper col4" style="height:800px">
      <div id="container">
      <div id="content" >
	  <div class="center_title_bar">Add Punnarjanimunnar Movie and Place Details	  <?php echo strtoupper($_SESSION['user_email_session']);?></div>
  
		  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		 
          
	  
            <div class="form_row">
              <label class="contact"><strong>Auditorium Name:</strong></label>	
<select name="auditorium_name" class="contact_input_select">
<option val="">Choose...<option>
<?php 

$location_details = mysql_query("select * from $location_registration_table");
while($row = mysql_fetch_array($location_details)){
echo "<option value='".$row['id']."'>".$row['Auditorium_Name']."</option>";
}

?>			  </select>
			  
            </div>
			
			   <div class="form_row">
              <label class="contact"><strong>Show Name:</strong></label>
			  <select name="event_name" class="contact_input_select">
			  <option val="">Choose...<option>
<?php 

$event_details = mysql_query("select * from $event_registration_table");
while($row = mysql_fetch_array($event_details)){
echo "<option value='".$row['id']."'>".$row['Event_name']."</option>";
}

?>			  </select>

			  </div>
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
			<div class="form_row">
              <label class="contact"><strong>Event Timing Remarks:</strong></label>
              <textarea class="contact_textarea" name="event_timing_remarks"></textarea>
            </div>

            <div class="form_row"> <label class="contact"><strong></strong></label><input type="submit" class="contact_button" name="add_location_master" value="Save Show Details"> </div></form>
	

    </div>
          </div>
         </div>
  <?php include 'admin_footer.php';?>

</BODY>
</html>