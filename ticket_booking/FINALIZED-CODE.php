	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_e15'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e15=NULL where expiry_ticket_e15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e15=NULL where expiry_ticket_e15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e15']!='E15' && $row['expiry_ticket_e15']==NULL)
	{?>
      <form action="ticket_booking/tickete15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e15" type="submit" class="seat-width-height"  value="E15"/>
      </form>
      <?php  } elseif($row['ticket_e15']=='E15' && $row['expiry_ticket_e15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E15"/>
      <?php 
} 

?>