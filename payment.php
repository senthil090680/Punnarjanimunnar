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

       <a href="print.php"><img src="images/printer-icon.jpg"></a><!-- <a href="javascript:confirmDelete('remove_delete.php?a=<?php //echo $row_query['user_id'];?>')" ></a>-->
<br>
<br>
</td>
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
				<th align="left" valign="top">Payment</th>
		  </tr> 

 <?php while($rows = mysql_fetch_array($res)){
		if($rows['expiry']!="BOOKED"){
?><tr>
	 <form action="payment_confirm.php" method="get">
                <th align="left" valign="top"> <input name="auditorium" type="text" value="<?php echo $rows['auditorium'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"> <input name="event" type="text" value="<?php echo $rows['event'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"><input name="time" type="text" value="<?php echo $rows['time'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"><input name="seat_no" type="text" value="<?php echo $rows['seat_no'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"><input name="rate" type="text" value="<?php echo $rows['rate'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
				<th align="left" valign="top"><input name="Submit" type="submit" value="Payment" style="border:#FFDF00; background-color:#FFDF00; color:#000000; height:24px;"></th>
				</tr>
		</form>  
		<?php 	}else
		{ ?>
		<tr>
                <th align="left" valign="top"> <input name="auditorium" type="text" value="<?php echo $rows['auditorium'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"> <input name="event" type="text" value="<?php echo $rows['event'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"><input name="time" type="text" value="<?php echo $rows['time'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"><input name="seat_no" type="text" value="<?php echo $rows['seat_no'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
                <th align="left" valign="top"><input name="rate" type="text" value="<?php echo $rows['rate'] ?>" style="border:#000000; background-color:#151515; color:#FFFFFF;"></th>
				<th align="left" valign="top"><input name="Submit" type="submit" value="Paid" style="border:#FFDF00; background-color:#FF0000; color:#000000; width:90px; height:24px;">
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
