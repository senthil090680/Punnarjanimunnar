<table width="600" border="0" cellpadding="0" cellspacing="0">
  <tr>
  
    <td align="left" valign="top"><?php if($row['ticket_e1']!='E1')
	{?>
        <form action="ticket_cooking/tickete1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="class_three_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e1" type="submit" class="seat-width-height"  value="E1"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_e2']!='E2')
	{?>
        <form action="ticket_cooking/tickete2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e2" type="submit" class="seat-width-height"  value="E2"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_e3']!='E3')
	{?>
        <form action="ticket_cooking/tickete3.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e3" type="submit" class="seat-width-height"  value="E3"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e4']!='E4')
	{?>
        <form action="ticket_cooking/tickete4.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e4" type="submit" class="seat-width-height"  value="E4"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e5']!='E5')
	{?>
        <form action="ticket_cooking/tickete5.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e5" type="submit" class="seat-width-height"  value="E5"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e6']!='E6')
	{?>
        <form action="ticket_cooking/tickete6.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e6" type="submit" class="seat-width-height"  value="E6"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e7']!='E7')
	{?>
        <form action="ticket_cooking/tickete7.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e7" type="submit" class="seat-width-height"  value="E7"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e8']!='E8')
	{?>
        <form action="ticket_cooking/tickete8.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e8" type="submit" class="seat-width-height"  value="E8"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e9']!='E9')
	{?>
        <form action="ticket_cooking/tickete9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e9" type="submit" class="seat-width-height"  value="E9"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e10']!='E10')
	{?>
        <form action="ticket_cooking/tickete10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e10" type="submit" class="seat-width-height"  value="E10"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e11']!='E11')
	{?>
        <form action="ticket_cooking/tickete11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e11" type="submit" class="seat-width-height"  value="E11"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e12']!='E12')
	{?>
        <form action="ticket_cooking/tickete12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e12" type="submit" class="seat-width-height"  value="E12"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e13']!='E13')
	{?>
        <form action="ticket_cooking/tickete13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e13" type="submit" class="seat-width-height"  value="E13"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e14']!='E14')
	{?>
        <form action="ticket_cooking/tickete14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e14" type="submit" class="seat-width-height"  value="E14"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>



<td align="left" valign="top"><?php if($row['ticket_e15']!='E15')
	{?>
        <form action="ticket_cooking/tickete15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e15" type="submit" class="seat-width-height"  value="E15"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
<td align="left" valign="top"><?php if($row['ticket_e16']!='E16')
	{?>
        <form action="ticket_cooking/tickete16.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e16" type="submit" class="seat-width-height"  value="E16"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
</table>
























































