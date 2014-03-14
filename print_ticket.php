<?php
session_start();
include 'configs/config_database.php';
if(!$_SESSION['user_email_session']){

	 echo "<script type='text/javascript'>
		alert('Please login first for booking your movie tickets');
		location = 'index.php';
		</script>";
		exit;
}
 $sql = "select * from ticket_details where ticket_number='".$_SESSION['ticket_number']."'";

 $result = mysql_query($sql);
		$seat_numbers = array();
        while($row = mysql_fetch_array($result)){
            $ticket_number = $row['ticket_number'];
        $event_timing_id = $row['event_timing_id'];
        $seating_id = $row['seating_id'];
        $payment_status = $row['payment_status'];

        $date_of_registration = $row['date_of_registration'];
        $event_timing = "select * from event_timing where id='" . $event_timing_id . "'";
        $event_timing_detail = mysql_query($event_timing);
        while ($event_timing = mysql_fetch_array($event_timing_detail)) {

            $date = $event_timing['Event_Timings']."<br>".$event_timing['time'].$event_timing['ampm'];
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
?>

<script type="text/javascript">
    function PrintContent(){
    var DocumentContainer = document.getElementById("printoption");
    var WindowObject = window.open("", "PrintWindow","width=1200,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.write('<html><head><title>Punarjanimunnar Show</title>');
    WindowObject.document.write('<link rel="stylesheet" href="style.css">');
    WindowObject.document.write('</head><body>');
    WindowObject.document.writeln(DocumentContainer.innerHTML);
    WindowObject.document.write('</body></html>');
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    WindowObject.close();
    }
</script>

<div id="printoption">
<div class="center_content">
    <div class="center_title_bar">Congratulation  <?php echo strtoupper($_SESSION['user_email_session']); ?> </div>


        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
            <div class="contact_form">

                <table   id="gradient-style"  border="1px" style="width:'100%'; border-color:white"><thead><tr><th>Ticket #</th><th>Seat #</th><th>Show Name</th><th>Auditorium</th><th>Show Time</th><th>Payment Status</th><th>Print Ticket</th></tr></thead><tbody>


        <tr><td><?=$ticket_number?></td><td><?php
foreach($seat_numbers as $item)
{
    echo $item.",";
}
        ?></td><td><?=$event_Name?></td><td><?=$Auditorium_Name?></td><td><?=$date?></td><td><?=$payment_status?></td><td><a href="#" onclick="PrintContent();">Print</a></td></tr>
                    </tbody>
    </table>



            </div>
        </div>
        <div class="bottom_prod_box_big"></div>


</div>
</div>