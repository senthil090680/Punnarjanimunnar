<?php
session_start();
include '../configs/config_database.php';
if(!$_SESSION['admin_email_session']){

	 echo "<script type='text/javascript'>
		alert('You are not authorized person to visit thia area. Please login first');
		location = 'index.php';
		</script>";
		exit;
}

       
        $sql = "select * from ticket_details where ticket_number='".$_SESSION['ticket_number']."'";
        
        $result = mysql_query($sql);
		$seat_numbers = array();
        while($row = mysql_fetch_array($result)){
            echo $ticket_number = $row['ticket_number'];
			echo $event_timing_id = $row['event_timing_id'];
			echo $seating_id = $row['seating_id'];
			echo $payment_status = $row['payment_status'];

			echo $date_of_registration = $row['date_of_registration'];
			echo $seating= "select * from seating_a where seating_id='".$seating_id."' and Event_timing_id='".$event_timing_id."'";
			$seating_place = mysql_query($seating);
			while($seating_row = mysql_fetch_array($seating_place)){
			array_push($seat_numbers,$seating_row['seating_place']);
			
			}
			
         }
?>
<?php include 'admin_header.php'; ?>
<div class ="wrapper col4" style="height:800px">
      <div id="container">
      <div id="content" >

    <div class="center_title_bar">Your Show and Place Details	  <?php echo strtoupper($_SESSION['user_email_session']); ?></div>

    	
			    <form method="POST" action="admin_book_myshow.php">
                    

 <div class="form_row">
                            <label class="contact"><strong>Ticket Number:</strong></label>
                            <?php 
							echo '<p class="seat_numbers">';echo $_SESSION['ticket_number']; echo "</p>";?>
                        </div>

					
                        <div class="form_row">
                            <label class="contact"><strong>Auditorium Name:</strong></label>
                            <?php 
							echo '<p class="seat_numbers">';
							 $sql = "select * from location_master where id='".$_SESSION['auditorium_name']."'";
							$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)){
									echo $Auditorium_Name = $row['Auditorium_Name'];
									}
									echo "</p>";
			?>
                        </div>

                        <div class="form_row">
                            <label class="contact"><strong>Show Name:</strong></label>
            <?php 
			echo '<p class="seat_numbers">';
			 $sql = "select * from event_master where id='".$_SESSION['event_name']."'";
							$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)){
									echo $Event_name = $row['Event_name'];
									}
									echo "</p>";
			?>
                        </div>
                        <div class="form_row">
                            <label class="contact"><strong>Show Timings:</strong></label>
                           
<?php 
echo '<p class="seat_numbers">';
$sql = "select * from event_timing where id='".$_SESSION['event_time']."'";
$event_details = mysql_query($sql);
                    while ($row = mysql_fetch_array($event_details)) {
					echo  "Date: ".$row['Event_Timings']. "  ,  Time: ".$row['time'] ." ". $row['ampm'] ;
						
                        
                    }
					echo "</p>";
?>
                        </div>

                         <div class="form_row">
						
                            <label class="contact"><strong>Your Seat Numbers:</strong></label>
							
							<?php echo '<p class="seat_numbers">';
							foreach($seat_numbers as $val){
							echo $val.",";
							}
							echo "</p>";
							?>
						</div>

                            


                        
                        <div class="form_row"> <label class="contact"><strong></strong></label><input type="submit" class="contact_button" name="add_location_master" value="Print Your Ticket" onClick="window.print()"> </div></form>


 </div>
          </div>
         </div>
  <?php include 'admin_footer.php';?>

</BODY>
</html>