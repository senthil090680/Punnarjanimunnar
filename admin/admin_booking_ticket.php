<?php
session_start();
include '../configs/config_database.php';
if($_SESSION['user_email_session']){
    echo "<script type='text/javascript'>

		location = 'book_your_ticket.php';
		</script>";
		exit;
}
if(!$_SESSION['admin_email_session']){

	 echo "<script type='text/javascript'>
		alert('You are not authorized person to visit thia area. Please login first');
		location = 'index.php';
		</script>";
		exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_location_master'] == "Save") {
    $err = array();

    //performing all validations and raising corresponding errors
    if (empty($_POST['auditorium_name']) || $_POST['auditorium_name'] =='null') {
        $err[] = "Auditorium name is required";
    }
    if (empty($_POST['event_name']) || $_POST['event_name'] =='null') {
        $err[] = "Show name is required";
    }
    if (empty($_POST['event_date']) || $_POST['event_date'] =='null') {
        $err[] = "Event date is required";
    }

    if(empty($_SESSION['tickets'])){
        $err[] = "Please Select Seat Numbers";
    }
	$_SESSION['auditorium_name'] = $auditorium_name = mysql_real_escape_string($_POST["auditorium_name"]);
        $event_name = $_SESSION['event_name'] = mysql_real_escape_string($_POST["event_name"]);
		$event_time =  $_SESSION['event_time'] =mysql_real_escape_string($_POST["event_date"]);
    if (empty($err)) {
        
        echo$sql = "select * from event_timing where Event_ID='".$event_name."' AND Location_ID='".$auditorium_name."'";
                echo $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)){
           echo $event_timing_id = $row['id'];
         }
       if($event_timing_id){
        
        $total_tickets = count($_SESSION['tickets']);
        $ticket_number = rand(1000,4000);
		foreach($_SESSION['tickets'] as $seat){
			echo $sql = "insert into seating_a (seating_id,event_timing_id,seating_place)
                 values('','$event_timing_id','$seat')";

        mysql_query($sql);
        $seat_id = mysql_insert_id();


        $event_timing_remarks = mysql_real_escape_string($_POST["event_timing_remarks"]);

        echo $sql = "insert into ticket_details (id,seating_id,ticket_number,event_timing_id,payment_status,date_of_registration)
                 values('','$seat_id','$ticket_number','$event_timing_id','not paid',now())";
        $sucess = mysql_query($sql, $link) or die("Insertion Failed:" . mysql_error());
       
}
}
 if ($sucess) {
            
			$added_details = "You have successfully booked" . count($_SESSION['tickets'])."tickets.";
            $_SESSION['ticket_number'] = $ticket_number;
            echo "<script type='text/javascript'>
		
		location = 'admin_book_myshow.php';
		</script>";
		exit;
        } else {
            $added_details = "You have an error while booking tickets. Please check all details";
        }
    } else {
        $err = $err;
    }
}
?>
<?php include 'admin_header.php'; ?> 
<div class ="wrapper col4" style="height:800px;">
      <div id="container">
      <div id="content" style="border:1px solid #FFFFFF;" >
  <div class="center_title_bar">Add Punnarjanimunnar Show and Place Details	  <?php echo strtoupper($_SESSION['user_email_session']); ?></div>
                <form method="POST" action="admin_booking_ticket.php">
				
                    
<div class="form_row">
                            <label class="contact"><strong>Show Timings:</strong></label>



<script type="text/javascript">
function sendIt(value){

$.ajax({
        url: "seat.php",
        type: "POST",
		dataType: "JSON",
		data:{info:value},
        success: function(data)
        {
            $("#showNames").show();

        }
    });

}
</script>

 <select name="event_date" class="datetest" id="dropDownId" onchange="sendIt(this.value)">
 <option value="null">Choose...</option>
			  <?php

			$event_details = mysql_query("select * from $event_timing_registration_table");
                    while ($row = mysql_fetch_array($event_details)) {
					echo "<option value='" . $row['id'] . "'";
					if($row['id'] == $_SESSION['event_time'] || $row['id'] == $_SESSION['event_seat_timing']){
									echo 'SELECTED';
						}
						echo ">" .$row['Event_Timings']. "  ,  ".$row['time'] ." ". $row['ampm'] . "</option>";


                    }
			  ?>
		  </select>
			

                  </div>
                    <div id="showNames" style="display:none;">

<script type="text/javascript">
function sendItrate(value){

$.ajax({
        url: "ticket_rate.php",
        type: "POST",
		dataType: "JSON",
		data:{info:value},
        success: function(data)
		{
		$("#rate").html(data);
                $("#a_names").show();

        }
    });

}
</script>
                        <div class="form_row">
                            <label class="contact"><strong>Show Name:</strong></label>
							
						<select name="event_name" class="contact_input_select" onchange="sendItrate(this.value)">
                                <option value="null">Choose...</option>
<?php
                   $event_details = mysql_query("select * from $event_registration_table");
                    while ($row = mysql_fetch_array($event_details)) {
					echo "<option value='" . $row['id'] . "'";
						
						echo ">" . $row['Event_name'] . "</option>";

                    }
?>			  </select>	
                           
                        </div></div>
						
                    
                        <div id="a_names" style="display: none;">
						
						<div class="form_row">
<div id="rate"></div>
</div>
                        <div class="form_row">
                            <label class="contact"><strong>Auditorium Name:</strong></label>
                            <select name="auditorium_name" class="contact_input_select" onchange="Aname(this.value)">
                                <option value="null">Choose...</option>
<?php
                    $location_details = mysql_query("select * from $location_registration_table");
                    while ($row = mysql_fetch_array($location_details)) {
                        echo "<option value='" . $row['id'] . "'";
						if($row['id'] == $_SESSION['auditorium_name'] || $row['id'] == $_SESSION['auditorium_id']){
									echo 'SELECTED';
						}
						echo ">" . $row['Auditorium_Name'] . "</option>";
                    }
?>			  </select>
                        </div>
                  </div>
                 
                         <div class="form_row">
						
                            <label class="contact"><strong>Select Your Seats:</strong></label><!--<input type="text"  class="contact_input" name="event_time" id="event_time">-->
<a href="seat.php?height=600&width=800" class="thickbox" title="" style="border:none;" >
    <p class="seat_numbers" >Click Here<p></a>
                        </div>
                            <?php
if(count($_SESSION['tickets'])){
                            echo '<div class="form_row">
                            <label class="contact"><strong>Total Seats Selected:</strong></label>';
                            echo '<p class="seat_numbers">'.count($_SESSION['tickets']).'</p>';
   echo "</div>";
              echo '<div class="form_row">
                            <label class="contact"><strong>Seat Numbers:</strong></label>';


echo '<p class="seat_numbers">';
foreach($_SESSION['tickets'] as $item)
{
    echo $item.",";
}
echo '</p>';
echo "</div>";
}
?> <div class="form_row"> <label class="contact"><strong></strong></label><input type="submit" class="contact_button" name="add_location_master" value="Save"> </div></form>

 </div>




<div id="content" style="border:1px solid #FFFFFF; padding-left:50px;" ></div>
 
 
  </div>
         </div>
  <?php include 'admin_footer.php';?>
<script>
function changeSrc()
  {
  document.getElementById("myImage").src="../upload/kalari.jpg";
  }
function changeSrc1()
  {
  document.getElementById("myImage").src="../upload/kathagali.jpg";
  }
</script>
</BODY>
</html>