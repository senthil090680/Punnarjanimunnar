<?php
session_start();
include '../configs/config_database.php';
if(!$_SESSION['admin_email_session']){

	 echo "<script type='text/javascript'>
		alert('Please login first for searching your show tickets');
		location = 'index.php';
		</script>";
		exit;
}

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['paid'] == "Pay Amount") {
    $ticket_number = mysql_real_escape_string($_POST["pay_amount"]);
    $sql = "update ticket_details set payment_status='paid' where ticket_number='" . $ticket_number . "'";
    mysql_query($sql);
$success = TRUE;

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['search_ticket'] == "Search Ticket" || $success) {

    $ticket_number = mysql_real_escape_string($_POST["ticket_number"]);
    if($success){
    $ticket_number = mysql_real_escape_string($_POST["pay_amount"]);
    }
    $sql = "select * from ticket_details where ticket_number='" . $ticket_number . "'";

    $result = mysql_query($sql);
    $seat_numbers = array();
    while ($row = mysql_fetch_array($result)) {
        $ticket_number = $row['ticket_number'];
        $event_timing_id = $row['event_timing_id'];
        $seating_id = $row['seating_id'];
        $payment_status = $row['payment_status'];

        $date_of_registration = $row['date_of_registration'];
        $event_timing = "select * from event_timing where id='" . $event_timing_id . "'";
        $event_timing_detail = mysql_query($event_timing);
        while ($event_timing = mysql_fetch_array($event_timing_detail)) {

            $date = "Date: ".$event_timing['Event_Timings']."<br>Time:".$event_timing['time'].$event_timing['ampm'];
        $auditorium = "select * from location_master where id='" . $event_timing['Location_ID'] . "'";
        $auditorium_id = mysql_query($auditorium);
        while ($auditorium_name = mysql_fetch_array($auditorium_id)) {
           $Auditorium_Name = $auditorium_name['Auditorium_Name'];
        }
        $event = "select * from event_master where id='" . $event_timing['Event_ID'] . "'";
        $event_id = mysql_query($event);
          while ($event_name = mysql_fetch_array($event_id)) {
           $event_Name = $event_name['Event_name'];
        }
        }
        $seating = "select * from seating_a where seating_id='" . $seating_id . "' and Event_timing_id='" . $event_timing_id . "'";
        $seating_place = mysql_query($seating);
        while ($seating_row = mysql_fetch_array($seating_place)) {
            array_push($seat_numbers, $seating_row['seating_place']);

        }

       $test = TRUE;
    }
}

include 'admin_header.php';

?>
    <div class ="wrapper col4" style="height:800px">
      <div id="container">
      <div id="content" >
	<div class="center_title_bar">Search Your Tickets  - [ <?php echo ucfirst($_SESSION['admin_email_session']);?> ]</div>
	  <div class="contact_form">
		  
  
		  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form_row">
              <label class="contacts"><strong>Enter Your Ticket Number:</strong></label>
              <input type="text" name="ticket_number" class="contact_input" />
         <input type="submit" class="contact" name="search_ticket" value="Search Ticket"> </div></form>
            
          </div>
        
      
   <?php if($test){?>

          <div class="center_title_bar"> Ticket Details</div>
<br><br>
<br>
<table border="1" width="100%"><thead><tr><th>Ticket #</th><th>Seat #</th><th>Show Name</th><th>Auditorium</th><th>Show Time</th><th>Payment Status</th><th>Print Ticket</th></tr></thead>


    <tbody> <tr><td><?=$ticket_number?></td><td><?php
        foreach($seat_numbers as $item)
{
    echo $item.",";
}
        ?></td><td><?=$event_Name?></td><td><?=$Auditorium_Name?></td><td><?=$date?></td><td><?=$payment_status?></td><td><a href="#" onclick="window.print();">Print</a></td></tr>
</tbody>
    </table>
<br><br>

<center><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <input type="hidden" value="<?=$ticket_number?>" name="pay_amount">
    <?php if($payment_status != "paid"){ ?>
    <input type="submit" value="Pay Amount" name="paid">
    <?php }?>
    </form>
</center>
  <?php }?>

 </div>
          </div>
         </div>
  <?php include 'admin_footer.php';?>

</BODY>
</html>