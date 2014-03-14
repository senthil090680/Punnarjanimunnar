<?php
session_start();
include 'configs/config_database.php';

//unset($_SESSION['event_seat_timing']);
$event_details1 = $_POST["info"];

?>
<div class="form_row">
                            <label class="contact"><strong>Show Timings:</strong></label>
                            <select name="event_name" class="contact_input_select" onChange="sendItrate(this.value)">

<?php
                    $event_details = mysql_query("SELECT  Event_ID as id, Event_Timings
FROM event_timing ET
LEFT JOIN event_master EM ON EM.id = ET.Event_ID
WHERE Event_ID =  '$event_details1'");

                    while ($row = mysql_fetch_array($event_details)) {
                        if(!empty($row['id'])){
					echo "<option value='" . $row['id'] . "'";
					if($row['id'] == $_SESSION['event_time'] || $row['id'] == $_SESSION['event_seat_timing']){
									echo 'SELECTED';
						}
						//echo ">" .$row['Event_Timings']. "  ,  ".$row['time'] ." ". $row['ampm'] . "</option>";
						echo ">" .$row['Event_Timings']. "</option>";


                    }
                    }
?>			  </select>

                        </div>