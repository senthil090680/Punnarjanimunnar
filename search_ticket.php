<?php
session_start();
include 'configs/config_database.php';
if(!$_SESSION['user_email_session']){

	 echo "<script type='text/javascript'>
		alert('Please login first for searching your show tickets');
		location = 'index.php';
		</script>";
		exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['search_ticket'] == "Search Ticket") {

    $ticket_number = mysql_real_escape_string($_POST["ticket_number"]);
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


include 'header.php';
?>
<div class="left_content">
<?php include 'left_content.php'; ?>
</div>
<!-- end of left content -->
<div class="center_content">


    <div class="center_title_bar">Search Your Tickets  -  <?php echo ucfirst($_SESSION['user_email_session']); ?> </div>


    <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
            <div class="contact_form">


                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form_row">
                        <label class="contacts"><strong>Enter Your Ticket Number:</strong></label>
                        <input type="text" name="ticket_number" class="contact_input" />
                    </div>
                    <div class="form_row"> <input type="submit" class="contact" name="search_ticket" value="Search Ticket"> </div></form>

            </div>
        </div>
        <div class="bottom_prod_box_big"></div>
    </div>
    <?php if($test){?>
    <br><br><br><br><br><br><br><br><br>
    <b>Your Show details</b>
<br><br>

    <table border="1" width="100%"><tr><th>Ticket #</th><th>Seat #</th><th>Show Name</th><th>Auditorium</th><th>Show Time</th><th>Payment Status</th><th>Print Ticket</th></tr>


        <tr><td><?=$ticket_number?></td><td><?php
        foreach($seat_numbers as $item)
{
    echo $item.",";
}
        ?></td><td><?=$event_Name?></td><td><?=$Auditorium_Name?></td><td><?=$date?></td><td><?=$payment_status?></td><td><a href="#" onclick="window.print();">Print</a></td></tr>

    </table>
<?php }?>


</div>

<div class="footer">
<?php include 'footer.php'; ?>
</div>
</html>
