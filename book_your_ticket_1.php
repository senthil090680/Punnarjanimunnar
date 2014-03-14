<html>
    <head>
    
 
<script type="text/javascript" src="ajax/auditoriumajax.js"></script>
<script type="text/javascript" src="ajax/timeajax.js"></script>


        </head>
<body>

<?php
@session_start();
include 'configs/config_database.php';
if(!$_SESSION['user_email_session']){


	 echo "<script type='text/javascript'>
		alert('Please login first for booking your show tickets');
		location = 'login.php';
		</script>";
		exit;
}
?>
<?php include "header.php" ?>


            <div >Welcome  <?php echo strtoupper($_SESSION['user_email_session']); ?><?php $a=  $_SESSION['id'];// echo $a; ?>  </div>

  <form method="get" action="book_seats.php">
 <label class="contact"><strong>Choose Auditorium:</strong></label>
                 
          <select  name="auditoriumid" class="searchfield" id="auditoriumid"  style="width: 200px;" onChange="auditorium(this.value)">
         <option value="">-- Select auditorium --</option>
         <?php	

	 $result = mysql_query("SELECT distinct(auditorium) FROM team_auditorium where status = 'E' order by auditorium");   		
	      while($row = mysql_fetch_array($result))
	      {	      
		  	  	 echo"<option value='". $row[0] . "' >". $row[0]. "</option>";
				
			}
?>
       </select>
    <br/>
     <label class="contact"><strong>Choose Event:</strong></label>
                   <span id="auditorium">
                   <select  name="eventid" class="searchfield" id="eventid" style="width: 200px;" onChange="sendItrate(this.value)">
          <option value="">-- Select event --</option>
          <option value="" style="background:#333; color:#FFF;">Anywhere</option>
          <?php	
					 $result = mysql_query("SELECT distinct(event) FROM team_show where status = 'E' order by event");   		
						  while($row = mysql_fetch_array($result))
						  {	      
								 echo"<option value='". $row[0] . "' >". $row[0]. "</option>";
								
							}
				?>
        </select>
                      </span>
                   <br/>   
     <label class="contact"><strong>Choose Event Timing:</strong></label>
   
    <span id="fetchtime">
    <select name="timeid" class="searchfield" id="timeid" style="width: 200px;" >
                          <option value="">-- Select time --</option>
      </select>
    </span>  
                      
                   <br/>    
  <?php	


	$query_total = "SELECT SUM(rate)as Total  FROM team_booked_ticket_rates where user_id='".$a."'"; 
	$result_total = mysql_query($query_total) or die(mysql_error());
	while($row_total = mysql_fetch_array($result_total)){
		echo "Rs . ". $row_total['Total'];
		echo "<br />";
	}
?>
	<?php  $res = mysql_query("SELECT seat_no FROM team_booked_details where user_id='".$a."'");   		
	     
		 	  $count=mysql_num_rows($res);
			  echo "Total seats Booked :";
			  echo $count;
			 
			  echo "<br>";
			  echo "seat No : ";
			  
			   $results = mysql_query("SELECT seat_no FROM team_booked_details where user_id='".$_SESSION[id]."'");
		while($rows = mysql_fetch_array($results)){
		  	  	 echo $rows['seat_no']; echo "  ,  ";
				
			}
?>

	   <div class="form_row">
                            <label class="contact"><strong>check the Show Rate:</strong></label>
                            
                            <select name="event_name" class="contact_input_select" onChange="sendItrate(this.value)">
 <option value="">-- Select event --</option>
<?php
                    $event_details = mysql_query("select * from $event_registration_table");
                    while ($row = mysql_fetch_array($event_details)) {
					echo "<option value='" . $row['id'] . "'";
						if($row['id'] == $_SESSION['event_name'] || $row['id'] == $_SESSION['event_id']){
									echo 'SELECTED';
						}
						echo ">" . $row['Event_name'] . "</option>";

                    }
?>			  </select>

                        </div>
                    </div>
                   

<script type="text/javascript">
function sendItrate(value){

$.ajax({
        url: "admin/ticket_rate.php",
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
<div id="rate"></div>
</div>
    <input name="Book Your Tickets" type="submit" value="Book Your Tickets" id="Book Your Tickets" />                  
               
</form>
         
         
</body>
</html>
