<html>
    <head>
	<script type="text/javascript" src="ajax/catajax.js"></script>
  <script src="js-light/jquery-1.7.2.min.js"></script>
<script src="js-light/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js-light/jquery.smooth-scroll.min.js"></script>
<script src="js-light/lightbox.js"></script>
<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });
  </script>
 
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


<script type="text/javascript">

function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
</script>
	
	 <?php $res_query = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."'"); 
	$row_query = mysql_fetch_array($res_query); ?> 		
<br>

      <a href="payment.php"><input name="Submit" type="submit" value="Payment" style="border:#FFDF00; background-color:#FFDF00; color:#000000; height:24px;"></a><!-- <a href="javascript:confirmDelete('remove_delete.php?a=<?php //echo $row_query['user_id'];?>')" ></a>-->
<br>
<br>



  <form method="get" action="book_seats.php">
 <table width="366" border="0">
   <tr>
     <td><strong>Show Timing </strong></td>
     <td>   <select name="time" class="searchfield" id="time"  style="width:200px;" onChange="category(this.value)">
                          <option value="" >-- Select Main Category --</option>
                          <?php	

	 $result = mysql_query("SELECT distinct(time) FROM team_event");   		
	      while($row = mysql_fetch_array($result))
	      {	?>      
		  	<option value="<?php echo $row['time'] ?>"><?php echo $row['time'] ?></option>";
			
		<?php	}
?>
                        </select>&nbsp;</td>
    </tr>
   <tr>
     <td><strong>Show Name </strong></td>
     <td><span id="category">
	  <div class="form_row">
                   <select name="event_name" class="contact_input_select" onChange="sendItrate(this.value)">
 <option value="">-- Select event --</option>
<?php
                    $event_details = mysql_query("select * from $event_registration_table");
                    while ($row = mysql_fetch_array($event_details)) {?>
					<option value="<?php echo $row['time'] ?>"><?php echo $row['time'] ?></option>
						<?php if($row['id'] == $_SESSION['event_name'] || $row['id'] == $_SESSION['event_id']){
									echo 'SELECTED';
						} ?>
					<option value="<?php echo $row['event_name'] ?>"><?php echo $row['event_name'] ?></option>

             <?php        }
?>			  </select>
</div>
                  </span>    </td>
    </tr>
   <tr>
     <td width="139"> <label class="contact"></label></td>
     <td width="217">&nbsp;</td>
    </tr>
 </table>
            
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

     <input name="Book Your Tickets" type="submit" value="Book Your Tickets" id="Book Your Tickets" />                  
               
    <br>
  </form> 


<br>

      <?php	


	$query_total = "SELECT SUM(rate)as Total FROM team_booked_details where user_id='".$a."'"; 
	$result_total = mysql_query($query_total) or die(mysql_error());
	while($row_total = mysql_fetch_array($result_total)){
		echo "Total Amount . ". $row_total['Total'];
		echo "<br />";
	}
?><br>

	<?php  $res = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."' order by id  desc");   		
	     
		 	  $count=mysql_num_rows($res);
			  echo "Total seats Booked :";
			  echo $count;
			 echo "<br>";
			  echo "<br>";
			  echo "Details : "; ?>
				<br>

<br>

		  <table border="1" width="910">
		    <tr>
                <th align="left" valign="top">Auditorium</th>
                <th align="left" valign="top">Event</th>
                <th align="left" valign="top">Time</th>
                <th align="left" valign="top">Seat No</th>
                <th align="left" valign="top">Rate</th>
				
		  </tr> 

 <?php while($rows = mysql_fetch_array($res)){
		if($rows['expiry']!="BOOKED"){
?><tr>
	 
                <th align="left" valign="top"> <?php echo $rows['auditorium'] ?></th>
                <th align="left" valign="top"><?php echo $rows['event'] ?></th>
                <th align="left" valign="top"><?php echo $rows['time'] ?></th>
                <th align="left" valign="top"><?php echo $rows['seat_no'] ?></th>
                <th align="left" valign="top"><?php echo $rows['rate'] ?></th>
				
				</tr>
		
		<?php 	}else
		{ ?>
		<tr>
                <th align="left" valign="top"> <?php echo $rows['auditorium'] ?></th>
                <th align="left" valign="top"> <?php echo $rows['event'] ?></th>
                <th align="left" valign="top"><?php echo $rows['time'] ?></th>
                <th align="left" valign="top"><?php echo $rows['seat_no'] ?></th>
                <th align="left" valign="top"><?php echo $rows['rate'] ?></th>
				
				</th>
				
	
	<?php } ?><?php }
	
?></tr>
	</table>
<?php 
  $resexp = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."' order by id  desc");  
$rowexp = mysql_fetch_array($resexp);
 $rowexp['expiry'];	
 $curtimes = date("H:i:s");
if($rowexp['expiry']!="BOOKED" )
{
mysql_query("DELETE FROM team_booked_details where user_id='".$a."' and  expiry <'".$curtimes."'");
}

?> 

<?php

?>
</body>
</html>
