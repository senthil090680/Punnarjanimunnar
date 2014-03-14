  <tr>
    <td align="left" valign="top">
<?php if($row['ticket_i9']!='I9')
	{?>
      <form action="ticket_booking/ticketi9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
            <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i9" type="submit" class="seat-width-height"  value="I9"/>
</form>
      <?php  } else {?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_i10']!='I10')
	{?>
    <form action="ticket_booking/ticketi10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i10" type="submit" class="seat-width-height"  value="I10"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 


?></td>
    <td align="left" valign="top">
 <?php if($row['ticket_i11']!='I11')
	{?>
<form action="ticket_booking/ticketi11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
  <input name="ticket_i11" type="submit" class="seat-width-height"  value="I11"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 


?></td>

<td align="left" valign="top">
 <?php if($row['ticket_i12']!='I12')
	{?>
<form action="ticket_booking/ticketi12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
  <input name="ticket_i12" type="submit" class="seat-width-height"  value="I12"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 
?></td>    




<td align="left" valign="top">
 <?php if($row['ticket_i13']!='I13')
	{?>
<form action="ticket_booking/ticketi13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
  <input name="ticket_i13" type="submit" class="seat-width-height"  value="I13"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 
?></td>    <td align="left" valign="top">
 <?php if($row['ticket_i14']!='I14')
	{?>
<form action="ticket_booking/ticketi14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
  <input name="ticket_i14" type="submit" class="seat-width-height"  value="I14"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 
?></td> 
    <td align="left" valign="top"> <?php if($row['ticket_i15']!='I15')
	{?>
<form action="ticket_booking/ticketi15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
  <input name="ticket_i15" type="submit" class="seat-width-height"  value="I15"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 
?></td> 
    <td align="left" valign="top">
 <?php if($row['ticket_i16']!='I16')
	{?>
<form action="ticket_booking/ticketi16.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
    <input name="event" type="hidden" value="<?php echo $event ?>" />
    <input name="time" type="hidden"  value="<?php echo $time ?>"/>
                <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>

         <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
     <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
  <input name="ticket_i16" type="submit" class="seat-width-height"  value="I16"/>
      </form>
      <?php  } else { ?>
	<input name="" type="submit" class="notavailable-seats"  value="N/A"/>
<?php 
} 
?>    

</td> 
</tr>
</body>
</html>