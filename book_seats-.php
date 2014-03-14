
<?php include 'configs/config_database.php';


 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Line Break (Shift + Enter)</title>
<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>
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
  <?php include 'configs/config_database.php'; ?>
  <br />
</p>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" align="left" valign="top">          Welcome  <?php echo strtoupper($_SESSION['user_email_session']); ?>  
</td>
  </tr>
  <tr>
    <td width="180" align="left" valign="top">Auditorium Name </td>
    <td width="15" align="left" valign="top">:</td>
    <td width="663" align="left" valign="top"><?php
$event=$_REQUEST['event'];
	$time=$_GET['time'];
	$audi=mysql_query("select auditorium from team_booking_details where time='".$time."' and event='".$event."' ");
	$row_audi=mysql_fetch_array($audi);
	echo $row_audi['auditorium'];
	
$auditorium =$row_audi['auditorium'];

//echo $auditorium;
?>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">Event Name</td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top"><?php 


$event=$_REQUEST['event'];
echo $event; ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">Time</td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top"><?php 

$time=$_REQUEST['time'];
echo $time; ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"> First Class Rate 
</td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top"><?php 
	$sql_time=mysql_query("select * from team_event where time='".$time."' and event='".$event."' ");
		$row_time=mysql_fetch_array($sql_time);
echo $row_time['Class_one_rate'];

$Class_one_rate=$row_time['Class_one_rate'];
?></td>
  </tr>
  <tr>
    <td align="left" valign="top">Second Class Rate</td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top"><?php 
echo $row_time['Class_two_rate'];
$Class_two_rate=$row_time['Class_two_rate'];
?></td>
  </tr>
  <tr>
    <td align="left" valign="top">Third Class Rate</td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top"><?php 
echo $row_time['Class_three_rate'];
$Class_three_rate=$row_time['Class_three_rate'];
 ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">Seat Available</td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top">	<?php 
$result_columns = mysql_query("SELECT * FROM team_booking_details WHERE  event='".$event."' and time='".$time."'");
while($row_columns = mysql_fetch_row($result_columns)){

    $empty_count = 0;
    $count = count($row_columns);
    for($i = 0; $i < $count; $i++)
        if($row_columns[$i] === '' || $row_columns[$i] === 'NULL')
            $empty_count++;
			echo  $empty_count; 
}
?></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>

    <?php 
	//echo $event;
	//echo $time;
	
	$query=mysql_query("select * from team_booking_details WHERE  event='".$event."' and time='".$time."' ");

$row=mysql_fetch_array($query);


	
?>

<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="16" align="center" valign="top"><?php if($row['event']=="event1") { ?>
<a href="gallery/event1.jpg"rel="lightbox[plants]"><img src="gallery/event1.jpg" alt="" width="124" height="124" vspace="37" border="0" /></a><?php } ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><?php if($row['event']=="event1") { ?><?php if($row['ticket_u26']!='U26')
	{?>
      <form action="ticket_booking/ticketu26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u26" type="submit" class="seat-width-height"  value="U26"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_u25']!='U25')
	{?>
      <form action="ticket_booking/ticketu25.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u25" type="submit" class="seat-width-height"  value="U25"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_u24']!='U24')
	{?>
      <form action="ticket_booking/ticketu24.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u24" type="submit" class="seat-width-height"  value="U24"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u23']!='U23')
	{?>
      <form action="ticket_booking/ticketu23.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u23" type="submit" class="seat-width-height"  value="U23"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u22']!='U22')
	{?>
      <form action="ticket_booking/ticketu22.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u22" type="submit" class="seat-width-height"  value="U22"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u21']!='U21')
	{?>
      <form action="ticket_booking/ticketu21.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u21" type="submit" class="seat-width-height"  value="U21"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u20']!='U20')
	{?>
      <form action="ticket_booking/ticketu20.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u20" type="submit" class="seat-width-height"  value="U20"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u19']!='U19')
	{?>
      <form action="ticket_booking/ticketu19.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u19" type="submit" class="seat-width-height"  value="U19"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u18']!='U18')
	{?>
      <form action="ticket_booking/ticketu18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u18" type="submit" class="seat-width-height"  value="U18"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u17']!='U17')
	{?>
      <form action="ticket_booking/ticketu17.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u17" type="submit" class="seat-width-height"  value="U17"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u16']!='U16')
	{?>
      <form action="ticket_booking/ticketu16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u16" type="submit" class="seat-width-height"  value="U16"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_u15']!='U15')
	{?>
      <form action="ticket_booking/ticketu15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_u15" type="submit" class="seat-width-height"  value="U15"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><?php if($row['ticket_s14']!='S14')
	{?>
      <form action="ticket_booking/tickets14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s14" type="submit" class="seat-width-height"  value="S14"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_s13']!='S13')
	{?>
      <form action="ticket_booking/tickets13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s13" type="submit" class="seat-width-height"  value="S13"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_s12']!='S12')
	{?>
      <form action="ticket_booking/tickets12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s12" type="submit" class="seat-width-height"  value="S12"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_s11']!='S11')
	{?>
      <form action="ticket_booking/tickets11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s11" type="submit" class="seat-width-height"  value="S11"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_s10']!='S10')
	{?>
      <form action="ticket_booking/tickets10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s10" type="submit" class="seat-width-height"  value="S10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s9']!='S9')
	{?>
      <form action="ticket_booking/tickets9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s9" type="submit" class="seat-width-height"  value="S9"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s8']!='S8')
	{?>
      <form action="ticket_booking/tickets8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s8" type="submit" class="seat-width-height"  value="S8"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s7']!='S7')
	{?>
      <form action="ticket_booking/tickets7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s7" type="submit" class="seat-width-height"  value="S7"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s6']!='S6')
	{?>
      <form action="ticket_booking/tickets6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s6" type="submit" class="seat-width-height"  value="S6"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s5']!='S5')
	{?>
      <form action="ticket_booking/tickets5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s5" type="submit" class="seat-width-height"  value="S5"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s4']!='S4')
	{?>
      <form action="ticket_booking/tickets4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s4" type="submit" class="seat-width-height"  value="S4"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s3']!='S3')
	{?>
      <form action="ticket_booking/tickets3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s3" type="submit" class="seat-width-height"  value="S3"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s2']!='S2')
	{?>
      <form action="ticket_booking/tickets2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s2" type="submit" class="seat-width-height"  value="S2"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_s1']!='S1')
	{?>
      <form action="ticket_booking/tickets1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_s1" type="submit" class="seat-width-height"  value="S1"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a1']!='A1')
	{?>
      <form action="ticket_booking/ticketa1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a1" type="submit" class="seat-width-height"  value="A1"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b1']!='B1')
	{?>
      <form action="ticket_booking/ticketb1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b1" type="submit" class="seat-width-height"  value="B1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c1']!='C1')
	{?>
      <form action="ticket_booking/ticketc1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c1" type="submit" class="seat-width-height"  value="C1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
  <td width="82" align="left" valign="top"><?php if($row['ticket_d1']!='D1')
	{?>
      <form action="ticket_booking/ticketd1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d1" type="submit" class="seat-width-height"  value="D1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_e1']!='E1')
	{?>
      <form action="ticket_booking/tickete1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e1" type="submit"  class="seat-width-height" value="E1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f1']!='F1')
	{?>
      <form action="ticket_booking/ticketf1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f1" type="submit" class="seat-width-height"  value="F1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g1']!='G1')
	{?>
      <form action="ticket_booking/ticketg1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g1" type="submit" class="seat-width-height"  value="G1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h1']!='H1')
	{?>
      <form action="ticket_booking/ticketh1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h1" type="submit" class="seat-width-height"  value="H1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i1']!='I1')
	{?>
      <form action="ticket_booking/ticketi1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i1" type="submit" class="seat-width-height"  value="I1"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_j1']!='J1')
	{?>
        <form action="ticket_booking/ticketj1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_j1" type="submit" class="seat-width-height"  value="J1"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td width="4">&nbsp;</td>
    
    <td width="48" align="left" valign="top"><?php if($row['ticket_101']!='101')
	{?>
      <form action="ticket_booking/ticket101.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_101" type="submit" class="seat-width-height"  value="101"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_115']!='115')
	{?>
      <form action="ticket_booking/ticket115.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_115" type="submit" class="seat-width-height"  value="115"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_129']!='129')
	{?>
      <form action="ticket_booking/ticket129.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_129" type="submit" class="seat-width-height"  value="129"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_143']!='143')
	{?>
      <form action="ticket_booking/ticket143.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_143" type="submit" class="seat-width-height"  value="143"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_157']!='157')
	{?>
      <form action="ticket_booking/ticket157.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_157" type="submit" class="seat-width-height"  value="157"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a2']!='A2')
	{?>
      <form action="ticket_booking/ticketa2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a2" type="submit"  class="seat-width-height" value="A2"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";  />
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b2']!='B2')
	{?>
      <form action="ticket_booking/ticketb2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b2" type="submit"  class="seat-width-height" value="B2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c2']!='C2')
	{?>
      <form action="ticket_booking/ticketc2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c2" type="submit"  class="seat-width-height" value="C2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_d2']!='D2')
	{?>
      <form action="ticket_booking/ticketd2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d2" type="submit"  class="seat-width-height" value="D2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_e2']!='E2')
	{?>
      <form action="ticket_booking/tickete2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e2" type="submit"  class="seat-width-height" value="E2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f2']!='F2')
	{?>
      <form action="ticket_booking/ticketf2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f2" type="submit"  class="seat-width-height" value="F2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g2']!='G2')
	{?>
      <form action="ticket_booking/ticketg2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g2" type="submit"  class="seat-width-height" value="G2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h2']!='H2')
	{?>
      <form action="ticket_booking/ticketh2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h2" type="submit"  class="seat-width-height" value="H2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i2']!='I2')
	{?>
      <form action="ticket_booking/ticketi2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i2" type="submit"  class="seat-width-height" value="I2"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    
    <td width="82" align="left" valign="top"><?php if($row['ticket_j2']!='J2')
	{?>
        <form action="ticket_booking/ticketj2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_j2" type="submit"  class="seat-width-height" value="J2"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_102']!='102')
	{?>
      <form action="ticket_booking/ticket102.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_102" type="submit" class="seat-width-height"  value="102"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_116']!='116')
	{?>
      <form action="ticket_booking/ticket116.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_116" type="submit" class="seat-width-height"  value="116"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_130']!='130')
	{?>
      <form action="ticket_booking/ticket130.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_130" type="submit" class="seat-width-height"  value="130"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_144']!='144')
	{?>
      <form action="ticket_booking/ticket144.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_144" type="submit" class="seat-width-height"  value="144"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_158']!='158')
	{?>
      <form action="ticket_booking/ticket158.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_158" type="submit" class="seat-width-height"  value="158"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_a3']!='A3')
	{?>
      <form action="ticket_booking/ticketa3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a3" type="submit"  class="seat-width-height" value="A3"/>
      </form>
      <?php  } else{?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_b3']!='B3')
	{?>
      <form action="ticket_booking/ticketb3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b3" type="submit"  class="seat-width-height" value="B3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_c3']!='C3')
	{?>
      <form action="ticket_booking/ticketc3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c3" type="submit"  class="seat-width-height" value="C3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_d3']!='D3')
	{?>
      <form action="ticket_booking/ticketd3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d3" type="submit"  class="seat-width-height" value="D3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_e3']!='E3')
	{?>
      <form action="ticket_booking/tickete3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e3" type="submit"  class="seat-width-height" value="E3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_f3']!='F3')
	{?>
      <form action="ticket_booking/ticketf3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f3" type="submit"  class="seat-width-height" value="F3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_g3']!='G3')
	{?>
      <form action="ticket_booking/ticketg3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g3" type="submit"  class="seat-width-height" value="G3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_h3']!='H3')
	{?>
      <form action="ticket_booking/ticketh3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h3" type="submit"  class="seat-width-height" value="H3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php 
if($row['ticket_i3']!='I3')
	{?>
      <form action="ticket_booking/ticketi3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i3" type="submit"  class="seat-width-height" value="I3"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    
    <td width="82" align="left" valign="top"><?php if($row['ticket_j3']!='J3')
	{?>
      <form action="ticket_booking/ticketj3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_j3" type="submit" class="seat-width-height"  value="J3"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_103']!='103')
	{?>
      <form action="ticket_booking/ticket103.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_103" type="submit" class="seat-width-height"  value="103"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_117']!='117')
	{?>
      <form action="ticket_booking/ticket117.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_117" type="submit" class="seat-width-height"  value="117"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_131']!='131')
	{?>
      <form action="ticket_booking/ticket131.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_131" type="submit" class="seat-width-height"  value="131"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_145']!='145')
	{?>
      <form action="ticket_booking/ticket145.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_145" type="submit" class="seat-width-height"  value="145"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_159']!='159')
	{?>
      <form action="ticket_booking/ticket159.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_159" type="submit" class="seat-width-height"  value="159"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a4']!='A4')
	{?>
      <form action="ticket_booking/ticketa4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a4" type="submit"  class="seat-width-height" value="A4"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b4']!='B4')
	{?>
      <form action="ticket_booking/ticketb4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b4" type="submit"  class="seat-width-height" value="B4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c4']!='C4')
	{?>
      <form action="ticket_booking/ticketc4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c4" type="submit"  class="seat-width-height" value="C4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_d4']!='D4')
	{?>
      <form action="ticket_booking/ticketd4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d4" type="submit"  class="seat-width-height" value="D4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_e4']!='E4')
	{?>
      <form action="ticket_booking/tickete4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e4" type="submit"  class="seat-width-height" value="E4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f4']!='F4')
	{?>
      <form action="ticket_booking/ticketf4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f4" type="submit"  class="seat-width-height" value="F4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g4']!='G4')
	{?>
      <form action="ticket_booking/ticketg4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g4" type="submit"  class="seat-width-height" value="G4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h4']!='H4')
	{?>
      <form action="ticket_booking/ticketh4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h4" type="submit"  class="seat-width-height" value="H4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i4']!='I4')
	{?>
      <form action="ticket_booking/ticketi4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i4" type="submit"  class="seat-width-height" value="I4"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    
    <td><?php if($row['ticket_j4']!='J4')
	{?>
      <form action="ticket_booking/ticketj4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_j4" type="submit"  class="seat-width-height" value="J4"/>
      </form>
      <?php  } else {
?>
      <input name="Input3" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_104']!='104')
	{?>
      <form action="ticket_booking/ticket104.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_104" type="submit" class="seat-width-height"  value="104"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_118']!='118')
	{?>
      <form action="ticket_booking/ticket118.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_118" type="submit" class="seat-width-height"  value="118"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_132']!='132')
	{?>
      <form action="ticket_booking/ticket132.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_132" type="submit" class="seat-width-height"  value="132"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_146']!='146')
	{?>
      <form action="ticket_booking/ticket146.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_146" type="submit" class="seat-width-height"  value="146"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_160']!='160')
	{?>
      <form action="ticket_booking/ticket160.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_160" type="submit" class="seat-width-height"  value="160"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a5']!='A5')
	{?>
      <form action="ticket_booking/ticketa5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a5" type="submit" class="seat-width-height"  value="A5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b5']!='B5')
	{?>
      <form action="ticket_booking/ticketb5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b5" type="submit" class="seat-width-height"  value="B5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c5']!='C5')
	{?>
      <form action="ticket_booking/ticketc5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c5" type="submit" class="seat-width-height"  value="C5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_d5']!='D5')
	{?>
      <form action="ticket_booking/ticketd5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d5" type="submit" class="seat-width-height"  value="D5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_e5']!='E5')
	{?>
      <form action="ticket_booking/tickete5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e5" type="submit" class="seat-width-height"  value="E5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f5']!='F5')
	{?>
      <form action="ticket_booking/ticketf5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f5" type="submit" class="seat-width-height"  value="F5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g5']!='G5')
	{?>
      <form action="ticket_booking/ticketg5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g5" type="submit" class="seat-width-height"  value="G5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h5']!='H5')
	{?>
      <form action="ticket_booking/ticketh5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h5" type="submit" class="seat-width-height"  value="H5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i5']!='I5')
	{?>
      <form action="ticket_booking/ticketi5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i5" type="submit" class="seat-width-height"  value="I5"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    
    <td><?php if($row['ticket_j5']!='J5')
	{?>
      <form action="ticket_booking/ticketj5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_j5" type="submit" class="seat-width-height" id="ticket_j5"  value="J5"/>
      </form>
      <?php  } else {
?>
      <input name="Input2" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_105']!='105')
	{?>
      <form action="ticket_booking/ticket105.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_105" type="submit" class="seat-width-height"  value="105"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_119']!='119')
	{?>
      <form action="ticket_booking/ticket119.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_119" type="submit" class="seat-width-height"  value="119"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_133']!='133')
	{?>
      <form action="ticket_booking/ticket133.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_133" type="submit" class="seat-width-height"  value="133"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_147']!='147')
	{?>
      <form action="ticket_booking/ticket147.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_147" type="submit" class="seat-width-height"  value="147"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_161']!='161')
	{?>
      <form action="ticket_booking/ticket161.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_161" type="submit" class="seat-width-height"  value="161"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a6']!='A6')
	{?>
      <form action="ticket_booking/ticketa6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a6" type="submit" class="seat-width-height"  value="A6"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b6']!='B6')
	{?>
      <form action="ticket_booking/ticketb6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b6" type="submit" class="seat-width-height"  value="B6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c6']!='C6')
	{?>
      <form action="ticket_booking/ticketc6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c6" type="submit" class="seat-width-height"  value="C6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_d6']!='D6')
	{?>
      <form action="ticket_booking/ticketd6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d6" type="submit" class="seat-width-height"  value="D6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_e6']!='E6')
	{?>
      <form action="ticket_booking/tickete6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e6" type="submit" class="seat-width-height"  value="E6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f6']!='F6')
	{?>
      <form action="ticket_booking/ticketf6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f6" type="submit" class="seat-width-height"  value="F6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g6']!='G6')
	{?>
      <form action="ticket_booking/ticketg6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g6" type="submit" class="seat-width-height"  value="G6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h6']!='H6')
	{?>
      <form action="ticket_booking/ticketh6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h6" type="submit" class="seat-width-height"  value="H6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i6']!='I6')
	{?>
      <form action="ticket_booking/ticketi6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i6" type="submit" class="seat-width-height"  value="I6"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    
    <td><?php if($row['ticket_j6']!='J6')
	{?>
      <form action="ticket_booking/ticketj6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_j6" type="submit" class="seat-width-height"  value="J6"/>
      </form>
      <?php  } else {
?>
      <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_106']!='106')
	{?>
      <form action="ticket_booking/ticket106.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_106" type="submit" class="seat-width-height"  value="106"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_120']!='120')
	{?>
      <form action="ticket_booking/ticket120.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_120" type="submit" class="seat-width-height"  value="120"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_134']!='134')
	{?>
      <form action="ticket_booking/ticket134.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_134" type="submit" class="seat-width-height"  value="134"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_148']!='148')
	{?>
      <form action="ticket_booking/ticket148.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_148" type="submit" class="seat-width-height"  value="148"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_162']!='162')
	{?>
      <form action="ticket_booking/ticket162.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_162" type="submit" class="seat-width-height"  value="162"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a7']!='A7')
	{?>
      <form action="ticket_booking/ticketa7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a7" type="submit" class="seat-width-height"  value="A7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b7']!='B7')
	{?>
      <form action="ticket_booking/ticketb7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b7" type="submit" class="seat-width-height"  value="B7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c7']!='C7')
	{?>
      <form action="ticket_booking/ticketc7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c7" type="submit" class="seat-width-height"  value="C7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 

?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_d7']!='D7')
	{?>
      <form action="ticket_booking/ticketd7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d7" type="submit" class="seat-width-height"  value="D7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_e7']!='E7')
	{?>
      <form action="ticket_booking/tickete7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e7" type="submit" class="seat-width-height"  value="E7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f7']!='F7')
	{?>
      <form action="ticket_booking/ticketf7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f7" type="submit" class="seat-width-height"  value="F7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g7']!='G7')
	{?>
      <form action="ticket_booking/ticketg7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g7" type="submit" class="seat-width-height"  value="G7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h7']!='H7')
	{?>
      <form action="ticket_booking/ticketh7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h7" type="submit" class="seat-width-height"  value="H7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i7']!='I7')
	{?>
      <form action="ticket_booking/ticketi7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i7" type="submit" class="seat-width-height"  value="I7"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_107']!='107')
	{?>
      <form action="ticket_booking/ticket107.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_107" type="submit" class="seat-width-height"  value="107"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_121']!='121')
	{?>
      <form action="ticket_booking/ticket121.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_121" type="submit" class="seat-width-height"  value="121"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_135']!='135')
	{?>
      <form action="ticket_booking/ticket135.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_135" type="submit" class="seat-width-height"  value="135"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_149']!='149')
	{?>
      <form action="ticket_booking/ticket149.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_149" type="submit" class="seat-width-height"  value="149"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_163']!='163')
	{?>
      <form action="ticket_booking/ticket163.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_163" type="submit" class="seat-width-height"  value="163"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a8']!='A8')
	{?>
      <form action="ticket_booking/ticketa8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a8" type="submit" class="seat-width-height"  value="A8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_b8']!='B8')
	{?>
      <form action="ticket_booking/ticketb8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b8" type="submit" class="seat-width-height"  value="B8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_c8']!='C8')
	{?>
      <form action="ticket_booking/ticketc8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c8" type="submit" class="seat-width-height"  value="C8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_d8']!='D8')
	{?>
      <form action="ticket_booking/ticketd8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d8" type="submit" class="seat-width-height"  value="D8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_e8']!='E8')
	{?>
      <form action="ticket_booking/tickete8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e8" type="submit" class="seat-width-height"  value="E8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_f8']!='F8')
	{?>
      <form action="ticket_booking/ticketf8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f8" type="submit" class="seat-width-height"  value="F8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_g8']!='G8')
	{?>
      <form action="ticket_booking/ticketg8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g8" type="submit" class="seat-width-height"  value="G8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_h8']!='H8')
	{?>
      <form action="ticket_booking/ticketh8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h8" type="submit" class="seat-width-height"  value="H8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="82" align="left" valign="top"><?php if($row['ticket_i8']!='I8')
	{?>
      <form action="ticket_booking/ticketi8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i8" type="submit" class="seat-width-height"  value="I8"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_108']!='108')
	{?>
      <form action="ticket_booking/ticket108.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_108" type="submit" class="seat-width-height"  value="108"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_122']!='122')
	{?>
      <form action="ticket_booking/ticket122.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_122" type="submit" class="seat-width-height"  value="122"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_136']!='136')
	{?>
      <form action="ticket_booking/ticket136.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_136" type="submit" class="seat-width-height"  value="136"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_150']!='150')
	{?>
      <form action="ticket_booking/ticket150.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_150" type="submit" class="seat-width-height"  value="150"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php } ?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_a9']!='A9')
	{?>
      <form action="ticket_booking/ticketa9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a9" type="submit" class="seat-width-height"  value="A9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_b9']!='B9')
	{?>
      <form action="ticket_booking/ticketb9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b9" type="submit" class="seat-width-height"  value="B9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_c9']!='C9')
	{?>
      <form action="ticket_booking/ticketc9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c9" type="submit" class="seat-width-height"  value="C9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_d9']!='D9')
	{?>
      <form action="ticket_booking/ticketd9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d9" type="submit" class="seat-width-height"  value="D9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_e9']!='E9')
	{?>
      <form action="ticket_booking/tickete9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e9" type="submit" class="seat-width-height"  value="E9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_f9']!='F9')
	{?>
      <form action="ticket_booking/ticketf9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f9" type="submit" class="seat-width-height"  value="F9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_g9']!='G9')
	{?>
      <form action="ticket_booking/ticketg9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g9" type="submit" class="seat-width-height"  value="G9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_h9']!='H9')
	{?>
      <form action="ticket_booking/ticketh9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h9" type="submit" class="seat-width-height"  value="H9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php if($row['ticket_i9']!='I9')
	{?>
      <form action="ticket_booking/ticketi9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i9" type="submit" class="seat-width-height"  value="I9"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_109']!='109')
	{?>
      <form action="ticket_booking/ticket109.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_109" type="submit"  class="seat-width-height" value="109"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";  />
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_123']!='123')
	{?>
      <form action="ticket_booking/ticket123.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_123" type="submit"  class="seat-width-height" value="123"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";  />
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_137']!='137')
	{?>
      <form action="ticket_booking/ticket137.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_137" type="submit"  class="seat-width-height" value="137"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";  />
      <?php } ?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_151']!='151')
	{?>
      <form action="ticket_booking/ticket151.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_151" type="submit"  class="seat-width-height" value="151"/>
      </form>
      <?php  } else {?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";  />
      <?php } ?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a10']!='A10')
	{?>
      <form action="ticket_booking/ticketa10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a10" type="submit" class="seat-width-height"  value="A10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b10']!='B10')
	{?>
      <form action="ticket_booking/ticketb10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b10" type="submit" class="seat-width-height"  value="B10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c10']!='C10')
	{?>
      <form action="ticket_booking/ticketc10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c10" type="submit" class="seat-width-height"  value="C10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d10']!='D10')
	{?>
      <form action="ticket_booking/ticketd10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d10" type="submit" class="seat-width-height"  value="D10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e10']!='E10')
	{?>
      <form action="ticket_booking/tickete10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e10" type="submit" class="seat-width-height"  value="E10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_f10']!='F10')
	{?>
      <form action="ticket_booking/ticketf10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f10" type="submit" class="seat-width-height"  value="F10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_g10']!='G10')
	{?>
      <form action="ticket_booking/ticketg10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g10" type="submit" class="seat-width-height"  value="G10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_h10']!='H10')
	{?>
      <form action="ticket_booking/ticketh10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h10" type="submit" class="seat-width-height"  value="H10"/>
      </form>
      <?php  } else { ?>
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
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i10" type="submit" class="seat-width-height"  value="I10"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php 
if($row['ticket_110']!='110')
	{?>
      <form action="ticket_booking/ticket110.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_110" type="submit"  class="seat-width-height" value="110"/>
      </form>
      <?php  } else{?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php 
if($row['ticket_124']!='124')
	{?>
      <form action="ticket_booking/ticket124.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_124" type="submit"  class="seat-width-height" value="124"/>
      </form>
      <?php  } else{?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="48" align="left" valign="top"><?php 
if($row['ticket_138']!='138')
	{?>
      <form action="ticket_booking/ticket138.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_138" type="submit"  class="seat-width-height" value="138"/>
      </form>
      <?php  } else{?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="114" align="left" valign="top"><?php 
if($row['ticket_152']!='152')
	{?>
      <form action="ticket_booking/ticket152.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_152" type="submit"  class="seat-width-height" value="152"/>
      </form>
      <?php  } else{?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } ?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a11']!='A11')
	{?>
      <form action="ticket_booking/ticketa11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a11" type="submit" class="seat-width-height"  value="A11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b11']!='B11')
	{?>
      <form action="ticket_booking/ticketb11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b11" type="submit" class="seat-width-height"  value="B11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c11']!='C11')
	{?>
      <form action="ticket_booking/ticketc11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c11" type="submit" class="seat-width-height"  value="C11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d11']!='D11')
	{?>
      <form action="ticket_booking/ticketd11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d11" type="submit" class="seat-width-height"  value="D11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_e11']!='E11')
	{?>
      <form action="ticket_booking/tickete11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e11" type="submit" class="seat-width-height"  value="E11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_f11']!='F11')
	{?>
      <form action="ticket_booking/ticketf11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f11" type="submit" class="seat-width-height"  value="F11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_g11']!='G11')
	{?>
      <form action="ticket_booking/ticketg11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g11" type="submit" class="seat-width-height"  value="G11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_h11']!='H11')
	{?>
      <form action="ticket_booking/ticketh11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h11" type="submit" class="seat-width-height"  value="H11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_i11']!='I11')
	{?>
      <form action="ticket_booking/ticketi11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i11" type="submit" class="seat-width-height"  value="I11"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 


?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_111']!='111')
	{?>
      <form action="ticket_booking/ticket111.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_111" type="submit"  class="seat-width-height" value="111"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_125']!='125')
	{?>
      <form action="ticket_booking/ticket125.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_125" type="submit"  class="seat-width-height" value="125"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} ?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_139']!='139')
	{?>
      <form action="ticket_booking/ticket139.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_139" type="submit"  class="seat-width-height" value="139"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} ?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_153']!='153')
	{?>
      <form action="ticket_booking/ticket153.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_153" type="submit"  class="seat-width-height" value="153"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} ?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a12']!='A12')
	{?>
      <form action="ticket_booking/ticketa12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a12" type="submit" class="seat-width-height"  value="A12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_b12']!='B12')
	{?>
      <form action="ticket_booking/ticketb12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b12" type="submit" class="seat-width-height"  value="B12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_c12']!='C12')
	{?>
      <form action="ticket_booking/ticketc12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c12" type="submit" class="seat-width-height"  value="C12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_d12']!='D12')
	{?>
      <form action="ticket_booking/ticketd12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d12" type="submit" class="seat-width-height"  value="D12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_e12']!='E12')
	{?>
      <form action="ticket_booking/tickete12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e12" type="submit" class="seat-width-height"  value="E12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_f12']!='F12')
	{?>
      <form action="ticket_booking/ticketf12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f12" type="submit" class="seat-width-height"  value="F12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_g12']!='G12')
	{?>
      <form action="ticket_booking/ticketg12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g12" type="submit" class="seat-width-height"  value="G12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_h12']!='H12')
	{?>
      <form action="ticket_booking/ticketh12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h12" type="submit" class="seat-width-height"  value="H12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_i12']!='I12')
	{?>
      <form action="ticket_booking/ticketi12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i12" type="submit" class="seat-width-height"  value="I12"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_112']!='112')
	{?>
      <form action="ticket_booking/ticket112.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_112" type="submit" class="seat-width-height"  value="112"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_126']!='126')
	{?>
      <form action="ticket_booking/ticket126.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_126" type="submit" class="seat-width-height"  value="126"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_140']!='140')
	{?>
      <form action="ticket_booking/ticket140.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_140" type="submit" class="seat-width-height"  value="140"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_154']!='154')
	{?>
      <form action="ticket_booking/ticket154.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_154" type="submit" class="seat-width-height"  value="154"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a13']!='A13')
	{?>
      <form action="ticket_booking/ticketa13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a13" type="submit" class="seat-width-height"  value="A13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_b13']!='B13')
	{?>
      <form action="ticket_booking/ticketb13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b13" type="submit" class="seat-width-height"  value="B13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_c13']!='C13')
	{?>
      <form action="ticket_booking/ticketc13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c13" type="submit" class="seat-width-height"  value="C13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_d13']!='D13')
	{?>
      <form action="ticket_booking/ticketd13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d13" type="submit" class="seat-width-height"  value="D13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_e13']!='E13')
	{?>
      <form action="ticket_booking/tickete13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e13" type="submit" class="seat-width-height"  value="E13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_f13']!='F13')
	{?>
      <form action="ticket_booking/ticketf13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f13" type="submit" class="seat-width-height"  value="F13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_g13']!='G13')
	{?>
      <form action="ticket_booking/ticketg13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g13" type="submit" class="seat-width-height"  value="G13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_h13']!='H13')
	{?>
      <form action="ticket_booking/ticketh13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h13" type="submit" class="seat-width-height"  value="H13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_i13']!='I13')
	{?>
      <form action="ticket_booking/ticketi13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_i13" type="submit" class="seat-width-height"  value="I13"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_113']!='113')
	{?>
      <form action="ticket_booking/ticket113.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_113" type="submit" class="seat-width-height"  value="113"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_127']!='127')
	{?>
      <form action="ticket_booking/ticket127.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_127" type="submit" class="seat-width-height"  value="127"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_141']!='141')
	{?>
      <form action="ticket_booking/ticket141.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_141" type="submit" class="seat-width-height"  value="141"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} 


?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_155']!='155')
	{?>
      <form action="ticket_booking/ticket155.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_155" type="submit" class="seat-width-height"  value="155"/>
      </form>
      <?php  } else {
	?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php 
} 


?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a14']!='A14')
	{?>
      <form action="ticket_booking/ticketa14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a14" type="submit" class="seat-width-height"  value="A14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_b14']!='B14')
	{?>
      <form action="ticket_booking/ticketb14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b14" type="submit" class="seat-width-height"  value="B14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_c14']!='C14')
	{?>
      <form action="ticket_booking/ticketc14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c14" type="submit" class="seat-width-height"  value="C14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_d14']!='D14')
	{?>
      <form action="ticket_booking/ticketd14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d14" type="submit" class="seat-width-height"  value="D14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_e14']!='E14')
	{?>
      <form action="ticket_booking/tickete14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e14" type="submit" class="seat-width-height"  value="E14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_f14']!='F14')
	{?>
      <form action="ticket_booking/ticketf14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_f14" type="submit" class="seat-width-height"  value="F14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_g14']!='G14')
	{?>
      <form action="ticket_booking/ticketg14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_g14" type="submit" class="seat-width-height"  value="G14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_h14']!='H14')
	{?>
      <form action="ticket_booking/ticketh14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_h14" type="submit" class="seat-width-height"  value="H14"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_114']!='114')
	{?>
      <form action="ticket_booking/ticket114.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_114" type="submit" class="seat-width-height"  value="114"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_128']!='128')
	{?>
      <form action="ticket_booking/ticket128.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_128" type="submit" class="seat-width-height"  value="128"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="48" align="left" valign="top"><?php if($row['ticket_142']!='142')
	{?>
      <form action="ticket_booking/ticket142.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_142" type="submit" class="seat-width-height"  value="142"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="114" align="left" valign="top"><?php if($row['ticket_156']!='156')
	{?>
      <form action="ticket_booking/ticket156.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_156" type="submit" class="seat-width-height"  value="156"/>
      </form>
      <?php  } else {
?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
      <?php } 


?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a15']!='A15')
	{?>
      <form action="ticket_booking/ticketa15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a15" type="submit" class="seat-width-height"  value="A15"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_b15']!='B15')
	{?>
      <form action="ticket_booking/ticketb15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b15" type="submit" class="seat-width-height"  value="B15"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_c15']!='C15')
	{?>
      <form action="ticket_booking/ticketc15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c15" type="submit" class="seat-width-height"  value="C15"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_d15']!='D15')
	{?>
      <form action="ticket_booking/ticketd15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d15" type="submit" class="seat-width-height"  value="D15"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_e15']!='E15')
	{?>
      <form action="ticket_booking/tickete15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e15" type="submit" class="seat-width-height"  value="E15"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php if($row['ticket_a16']!='A16')
	{?>
      <form action="ticket_booking/ticketa16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_a16" type="submit" class="seat-width-height"  value="A16"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_b16']!='B16')
	{?>
      <form action="ticket_booking/ticketb16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_b16" type="submit" class="seat-width-height"  value="B16"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_c16']!='C16')
	{?>
      <form action="ticket_booking/ticketc16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_c16" type="submit" class="seat-width-height"  value="C16"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_d16']!='D16')
	{?>
      <form action="ticket_booking/ticketd16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_d16" type="submit" class="seat-width-height"  value="D16"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} 
?></td>
    <td align="left" valign="top"><?php if($row['ticket_e16']!='E16')
	{?>
      <form action="ticket_booking/tickete16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
        <input name="ticket_e16" type="submit" class="seat-width-height"  value="E16"/>
      </form>
      <?php  } else { ?>
      <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
      <?php 
} }
?></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td colspan="16" align="center" valign="top"> <?php if($row['event']=="event2") { ?>
 
<a href="gallery/event2.jpg"rel="lightbox[plants]"><img src="gallery/event2.jpg" alt="" width="124" height="124" vspace="37" border="0" /></a>
 <?php } ?></td>
  </tr>
  
    <?php 
	$sql_time=mysql_query("select * from team_event where time='".$time."' and event='".$event."' ");
		$row_time=mysql_fetch_array($sql_time);
 $row_time['Class_one_rate'];

$Class_one_rate=$row_time['Class_one_rate'];
?><?php 
 $row_time['Class_two_rate'];
$Class_two_rate=$row_time['Class_two_rate'];
?><?php 
 $row_time['Class_three_rate'];
$Class_three_rate=$row_time['Class_three_rate'];
 ?>

  <?php

$event=$_REQUEST['event'];
	$time=$_GET['time'];
	$audi=mysql_query("select auditorium from team_booking_details where time='".$time."' and event='".$event."' ");
	$row_audi=mysql_fetch_array($audi);
	//echo $row_audi['auditorium'];
	
$auditorium =$row_audi['auditorium'];

//echo $auditorium;
?><?php 
  $event=$_REQUEST['event'];
?><?php 
 $time=$_REQUEST['time'];
?><?php 
//echo $Class_one_rate=$_REQUEST['Class_one_rate'];

?><?php 
 //echo $Class_two_rate=$_REQUEST['Class_two_rate'];

?><?php 
 //echo $Class_three_rate=$_REQUEST['Class_three_rate'];

 ?>

  <tr><?php if($row['event']=="event2") { ?>
    <td align="left" valign="top"><?php if($row['ticket_a1']!='A1')
	{?>
        <form action="ticket_booking/ticketa1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a1" type="submit" class="seat-width-height"  value="A1"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a2']!='A2')
	{?>
        <form action="ticket_booking/ticketa2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a2" type="submit" class="seat-width-height"  value="A2"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a3']!='A3')
	{?>
        <form action="ticket_booking/ticketa3.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a3" type="submit" class="seat-width-height"  value="A3"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a4']!='A4')
	{?>
        <form action="ticket_booking/ticketa4.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a4" type="submit" class="seat-width-height"  value="A4"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a5']!='A5')
	{?>
        <form action="ticket_booking/ticketa5.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a5" type="submit" class="seat-width-height"  value="A5"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a6']!='A6')
	{?>
        <form action="ticket_booking/ticketa6.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a6" type="submit" class="seat-width-height"  value="A6"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a7']!='A7')
	{?>
        <form action="ticket_booking/ticketa7.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a7" type="submit" class="seat-width-height"  value="A7"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a8']!='A8')
	{?>
        <form action="ticket_booking/ticketa8.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a8" type="submit" class="seat-width-height"  value="A8"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a9']!='A9')
	{?>
        <form action="ticket_booking/ticketa9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a9" type="submit" class="seat-width-height"  value="A9"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a10']!='A10')
	{?>
        <form action="ticket_booking/ticketa10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a10" type="submit" class="seat-width-height"  value="A10"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a11']!='A11')
	{?>
        <form action="ticket_booking/ticketa11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a11" type="submit" class="seat-width-height"  value="A11"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a12']!='A12')
	{?>
        <form action="ticket_booking/ticketa12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a12" type="submit" class="seat-width-height"  value="A12"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a13']!='A13')
	{?>
        <form action="ticket_booking/ticketa13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a13" type="submit" class="seat-width-height"  value="A13"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a14']!='A14')
	{?>
        <form action="ticket_booking/ticketa14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a14" type="submit" class="seat-width-height"  value="A14"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a15']!='A15')
	{?>
        <form action="ticket_booking/ticketa15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a15" type="submit" class="seat-width-height"  value="A15"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a16']!='A16')
	{?>
        <form action="ticket_booking/ticketa16.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a16" type="submit" class="seat-width-height"  value="A16"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_a17']!='A17')
	{?>
        <form action="ticket_booking/ticketa17.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a17" type="submit" class="seat-width-height"  value="A17"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a18']!='A18')
	{?>
        <form action="ticket_booking/ticketa18.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a18" type="submit" class="seat-width-height"  value="A18"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a19']!='A19')
	{?>
        <form action="ticket_booking/ticketa19.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a19" type="submit" class="seat-width-height"  value="A19"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a20']!='A20')
	{?>
        <form action="ticket_booking/ticketa20.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a20" type="submit" class="seat-width-height"  value="A20"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a21']!='A21')
	{?>
        <form action="ticket_booking/ticketa21.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a21" type="submit" class="seat-width-height"  value="A21"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a22']!='A22')
	{?>
        <form action="ticket_booking/ticketa22.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a22" type="submit" class="seat-width-height"  value="A22"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a23']!='A23')
	{?>
        <form action="ticket_booking/ticketa23.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a23" type="submit" class="seat-width-height"  value="A23"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a24']!='A24')
	{?>
        <form action="ticket_booking/ticketa24.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a24" type="submit" class="seat-width-height"  value="A24"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a25']!='A25')
	{?>
        <form action="ticket_booking/ticketa25.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a25" type="submit" class="seat-width-height"  value="A25"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a26']!='A26')
	{?>
        <form action="ticket_booking/ticketa26.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a26" type="submit" class="seat-width-height"  value="A26"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a27']!='A27')
	{?>
        <form action="ticket_booking/ticketa27.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a27" type="submit" class="seat-width-height"  value="A27"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a28']!='A28')
	{?>
        <form action="ticket_booking/ticketa28.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a28" type="submit" class="seat-width-height"  value="A28"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a29']!='A29')
	{?>
        <form action="ticket_booking/ticketa29.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a29" type="submit" class="seat-width-height"  value="A29"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a30']!='A30')
	{?>
        <form action="ticket_booking/ticketa30.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a30" type="submit" class="seat-width-height"  value="A30"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a31']!='A31')
	{?>
        <form action="ticket_booking/ticketa31.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a31" type="submit" class="seat-width-height"  value="A31"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a32']!='A32')
	{?>
        <form action="ticket_booking/ticketa32.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a32" type="submit" class="seat-width-height"  value="A32"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_a33']!='A33')
	{?>
        <form action="ticket_booking/ticketa33.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a33" type="submit" class="seat-width-height"  value="A33"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a34']!='A34')
	{?>
        <form action="ticket_booking/ticketa34.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a34" type="submit" class="seat-width-height"  value="A34"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a35']!='A35')
	{?>
        <form action="ticket_booking/ticketa35.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a35" type="submit" class="seat-width-height"  value="A35"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a36']!='A36')
	{?>
        <form action="ticket_booking/ticketa36.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a36" type="submit" class="seat-width-height"  value="A36"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a37']!='A37')
	{?>
        <form action="ticket_booking/ticketa37.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a37" type="submit" class="seat-width-height"  value="A37"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a38']!='A38')
	{?>
        <form action="ticket_booking/ticketa38.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a38" type="submit" class="seat-width-height"  value="A38"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a39']!='A39')
	{?>
        <form action="ticket_booking/ticketa39.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a39" type="submit" class="seat-width-height"  value="A39"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a40']!='A40')
	{?>
        <form action="ticket_booking/ticketa40.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a40" type="submit" class="seat-width-height"  value="A40"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a41']!='A41')
	{?>
        <form action="ticket_booking/ticketa41.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a41" type="submit" class="seat-width-height"  value="A41"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a42']!='A42')
	{?>
        <form action="ticket_booking/ticketa42.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a42" type="submit" class="seat-width-height"  value="A42"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a43']!='A43')
	{?>
        <form action="ticket_booking/ticketa43.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a43" type="submit" class="seat-width-height"  value="A43"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a44']!='A44')
	{?>
        <form action="ticket_booking/ticketa44.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a44" type="submit" class="seat-width-height"  value="A44"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a45']!='A45')
	{?>
        <form action="ticket_booking/ticketa45.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a45" type="submit" class="seat-width-height"  value="A45"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a46']!='A46')
	{?>
        <form action="ticket_booking/ticketa46.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a46" type="submit" class="seat-width-height"  value="A46"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_a47']!='A47')
	{?>
        <form action="ticket_booking/ticketa47.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a47" type="submit" class="seat-width-height"  value="A47"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a48']!='A48')
	{?>
        <form action="ticket_booking/ticketa48.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a48" type="submit" class="seat-width-height"  value="A48"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_a49']!='A49')
	{?>
        <form action="ticket_booking/ticketa49.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a49" type="submit" class="seat-width-height"  value="A49"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a50']!='A50')
	{?>
        <form action="ticket_booking/ticketa50.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a50" type="submit" class="seat-width-height"  value="A50"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a51']!='A51')
	{?>
        <form action="ticket_booking/ticketa51.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a51" type="submit" class="seat-width-height"  value="A51"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a52']!='A52')
	{?>
        <form action="ticket_booking/ticketa52.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a52" type="submit" class="seat-width-height"  value="A52"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a53']!='A53')
	{?>
        <form action="ticket_booking/ticketa53.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a53" type="submit" class="seat-width-height"  value="A53"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a54']!='A54')
	{?>
        <form action="ticket_booking/ticketa54.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a54" type="submit" class="seat-width-height"  value="A54"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_a55']!='A55')
	{?>
        <form action="ticket_booking/ticketa55.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_a55" type="submit" class="seat-width-height"  value="A55"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_b1']!='B1')
	{?>
        <form action="ticket_booking/ticketb1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b1" type="submit" class="seat-width-height"  value="B1"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b2']!='B2')
	{?>
        <form action="ticket_booking/ticketb2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b2" type="submit" class="seat-width-height"  value="B2"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b3']!='B3')
	{?>
        <form action="ticket_booking/ticketb3.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b3" type="submit" class="seat-width-height"  value="B3"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b4']!='B4')
	{?>
        <form action="ticket_booking/ticketb4.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b4" type="submit" class="seat-width-height"  value="B4"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b5']!='B5')
	{?>
        <form action="ticket_booking/ticketb5.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b5" type="submit" class="seat-width-height"  value="B5"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b6']!='B6')
	{?>
        <form action="ticket_booking/ticketb6.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b6" type="submit" class="seat-width-height"  value="B6"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b7']!='B7')
	{?>
        <form action="ticket_booking/ticketb7.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b7" type="submit" class="seat-width-height"  value="B7"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b8']!='B8')
	{?>
        <form action="ticket_booking/ticketb8.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b8" type="submit" class="seat-width-height"  value="B8"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b9']!='B9')
	{?>
        <form action="ticket_booking/ticketb9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b9" type="submit" class="seat-width-height"  value="B9"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b10']!='B10')
	{?>
        <form action="ticket_booking/ticketb10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b10" type="submit" class="seat-width-height"  value="B10"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b11']!='B11')
	{?>
        <form action="ticket_booking/ticketb11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b11" type="submit" class="seat-width-height"  value="B11"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b12']!='B12')
	{?>
        <form action="ticket_booking/ticketb12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b12" type="submit" class="seat-width-height"  value="B12"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b13']!='B13')
	{?>
        <form action="ticket_booking/ticketb13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b13" type="submit" class="seat-width-height"  value="B13"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b14']!='B14')
	{?>
        <form action="ticket_booking/ticketb14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b14" type="submit" class="seat-width-height"  value="B14"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b15']!='B15')
	{?>
        <form action="ticket_booking/ticketb15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b15" type="submit" class="seat-width-height"  value="B15"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b16']!='B16')
	{?>
        <form action="ticket_booking/ticketb16.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b16" type="submit" class="seat-width-height"  value="B16"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_b17']!='B17')
	{?>
        <form action="ticket_booking/ticketb17.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b17" type="submit" class="seat-width-height"  value="B17"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b18']!='B18')
	{?>
        <form action="ticket_booking/ticketb18.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b18" type="submit" class="seat-width-height"  value="B18"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b19']!='B19')
	{?>
        <form action="ticket_booking/ticketb19.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b19" type="submit" class="seat-width-height"  value="B19"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b20']!='B20')
	{?>
        <form action="ticket_booking/ticketb20.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b20" type="submit" class="seat-width-height"  value="B20"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b21']!='B21')
	{?>
        <form action="ticket_booking/ticketb21.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b21" type="submit" class="seat-width-height"  value="B21"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b22']!='B22')
	{?>
        <form action="ticket_booking/ticketb22.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b22" type="submit" class="seat-width-height"  value="B22"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b23']!='B23')
	{?>
        <form action="ticket_booking/ticketb23.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b23" type="submit" class="seat-width-height"  value="B23"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b24']!='B24')
	{?>
        <form action="ticket_booking/ticketb24.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b24" type="submit" class="seat-width-height"  value="B24"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b25']!='B25')
	{?>
        <form action="ticket_booking/ticketb25.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b25" type="submit" class="seat-width-height"  value="B25"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b26']!='B26')
	{?>
        <form action="ticket_booking/ticketb26.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b26" type="submit" class="seat-width-height"  value="B26"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b27']!='B27')
	{?>
        <form action="ticket_booking/ticketb27.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b27" type="submit" class="seat-width-height"  value="B27"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b28']!='B28')
	{?>
        <form action="ticket_booking/ticketb28.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b28" type="submit" class="seat-width-height"  value="B28"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b29']!='B29')
	{?>
        <form action="ticket_booking/ticketb29.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b29" type="submit" class="seat-width-height"  value="B29"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b30']!='B30')
	{?>
        <form action="ticket_booking/ticketb30.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b30" type="submit" class="seat-width-height"  value="B30"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b31']!='B31')
	{?>
        <form action="ticket_booking/ticketb31.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b31" type="submit" class="seat-width-height"  value="B31"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b32']!='B32')
	{?>
        <form action="ticket_booking/ticketb32.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b32" type="submit" class="seat-width-height"  value="B32"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_b33']!='B33')
	{?>
        <form action="ticket_booking/ticketb33.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b33" type="submit" class="seat-width-height"  value="B33"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b34']!='B34')
	{?>
        <form action="ticket_booking/ticketb34.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b34" type="submit" class="seat-width-height"  value="B34"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b35']!='B35')
	{?>
        <form action="ticket_booking/ticketb35.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b35" type="submit" class="seat-width-height"  value="B35"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b36']!='B36')
	{?>
        <form action="ticket_booking/ticketb36.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b36" type="submit" class="seat-width-height"  value="B36"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b37']!='B37')
	{?>
        <form action="ticket_booking/ticketb37.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b37" type="submit" class="seat-width-height"  value="B37"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b38']!='B38')
	{?>
        <form action="ticket_booking/ticketb38.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b38" type="submit" class="seat-width-height"  value="B38"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b39']!='B39')
	{?>
        <form action="ticket_booking/ticketb39.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b39" type="submit" class="seat-width-height"  value="B39"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b40']!='B40')
	{?>
        <form action="ticket_booking/ticketb40.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b40" type="submit" class="seat-width-height"  value="B40"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b41']!='B41')
	{?>
        <form action="ticket_booking/ticketb41.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b41" type="submit" class="seat-width-height"  value="B41"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b42']!='B42')
	{?>
        <form action="ticket_booking/ticketb42.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b42" type="submit" class="seat-width-height"  value="B42"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b43']!='B43')
	{?>
        <form action="ticket_booking/ticketb43.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b43" type="submit" class="seat-width-height"  value="B43"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b44']!='B44')
	{?>
        <form action="ticket_booking/ticketb44.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b44" type="submit" class="seat-width-height"  value="B44"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b45']!='B45')
	{?>
        <form action="ticket_booking/ticketb45.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b45" type="submit" class="seat-width-height"  value="B45"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b46']!='B46')
	{?>
        <form action="ticket_booking/ticketb46.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b46" type="submit" class="seat-width-height"  value="B46"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b47']!='B47')
	{?>
        <form action="ticket_booking/ticketb47.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b47" type="submit" class="seat-width-height"  value="B47"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b48']!='B48')
	{?>
        <form action="ticket_booking/ticketb48.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b48" type="submit" class="seat-width-height"  value="B48"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_b49']!='B49')
	{?>
        <form action="ticket_booking/ticketb49.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b49" type="submit" class="seat-width-height"  value="B49"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b50']!='B50')
	{?>
        <form action="ticket_booking/ticketb50.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b50" type="submit" class="seat-width-height"  value="B50"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b51']!='B51')
	{?>
        <form action="ticket_booking/ticketb51.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b51" type="submit" class="seat-width-height"  value="B51"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b52']!='B52')
	{?>
        <form action="ticket_booking/ticketb52.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b52" type="submit" class="seat-width-height"  value="B52"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b53']!='B53')
	{?>
        <form action="ticket_booking/ticketb53.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b53" type="submit" class="seat-width-height"  value="B53"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b54']!='B54')
	{?>
        <form action="ticket_booking/ticketb54.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b54" type="submit" class="seat-width-height"  value="B54"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b55']!='B55')
	{?>
        <form action="ticket_booking/ticketb55.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b55" type="submit" class="seat-width-height"  value="B55"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b56']!='B56')
	{?>
        <form action="ticket_booking/ticketb56.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b56" type="submit" class="seat-width-height"  value="B56"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b56']!='B56')
	{?>
        <form action="ticket_booking/ticketb56.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b56" type="submit" class="seat-width-height"  value="B56"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b57']!='B57')
	{?>
        <form action="ticket_booking/ticketb57.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b57" type="submit" class="seat-width-height"  value="B57"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b57']!='B57')
	{?>
        <form action="ticket_booking/ticketb57.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b57" type="submit" class="seat-width-height"  value="B57"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b58']!='B58')
	{?>
        <form action="ticket_booking/ticketb58.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b58" type="submit" class="seat-width-height"  value="B58"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_b59']!='B59')
	{?>
        <form action="ticket_booking/ticketb59.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b59" type="submit" class="seat-width-height"  value="B59"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b60']!='B60')
	{?>
        <form action="ticket_booking/ticketb60.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b60" type="submit" class="seat-width-height"  value="B60"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b61']!='B61')
	{?>
        <form action="ticket_booking/ticketb61.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b61" type="submit" class="seat-width-height"  value="B61"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b62']!='B62')
	{?>
        <form action="ticket_booking/ticketb62.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b62" type="submit" class="seat-width-height"  value="B62"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_b63']!='B63')
	{?>
        <form action="ticket_booking/ticketb63.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b63" type="submit" class="seat-width-height"  value="B63"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_b64']!='B64')
	{?>
        <form action="ticket_booking/ticketb64.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_b64" type="submit" class="seat-width-height"  value="B64"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_c1']!='C1')
	{?>
        <form action="ticket_booking/ticketc1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c1" type="submit" class="seat-width-height"  value="C1"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c2']!='C2')
	{?>
        <form action="ticket_booking/ticketc2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c2" type="submit" class="seat-width-height"  value="C2"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c3']!='C3')
	{?>
        <form action="ticket_booking/ticketc3.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c3" type="submit" class="seat-width-height"  value="C3"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c4']!='C4')
	{?>
        <form action="ticket_booking/ticketc4.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c4" type="submit" class="seat-width-height"  value="C4"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c5']!='C5')
	{?>
        <form action="ticket_booking/ticketc5.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c5" type="submit" class="seat-width-height"  value="C5"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c6']!='C6')
	{?>
        <form action="ticket_booking/ticketc6.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c6" type="submit" class="seat-width-height"  value="C6"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c7']!='C7')
	{?>
        <form action="ticket_booking/ticketc7.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c7" type="submit" class="seat-width-height"  value="C7"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c8']!='C8')
	{?>
        <form action="ticket_booking/ticketc8.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c8" type="submit" class="seat-width-height"  value="C8"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c9']!='C9')
	{?>
        <form action="ticket_booking/ticketc9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c9" type="submit" class="seat-width-height"  value="C9"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c10']!='C10')
	{?>
        <form action="ticket_booking/ticketc10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c10" type="submit" class="seat-width-height"  value="C10"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c11']!='C11')
	{?>
        <form action="ticket_booking/ticketc11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c11" type="submit" class="seat-width-height"  value="C11"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c12']!='C12')
	{?>
        <form action="ticket_booking/ticketc12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c12" type="submit" class="seat-width-height"  value="C12"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c13']!='C13')
	{?>
        <form action="ticket_booking/ticketc13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c13" type="submit" class="seat-width-height"  value="C13"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c14']!='C14')
	{?>
        <form action="ticket_booking/ticketc14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c14" type="submit" class="seat-width-height"  value="C14"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c15']!='C15')
	{?>
        <form action="ticket_booking/ticketc15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c15" type="submit" class="seat-width-height"  value="C15"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c16']!='C16')
	{?>
        <form action="ticket_booking/ticketc16.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c16" type="submit" class="seat-width-height"  value="C16"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_c17']!='C17')
	{?>
        <form action="ticket_booking/ticketc17.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c17" type="submit" class="seat-width-height"  value="C17"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c18']!='C18')
	{?>
        <form action="ticket_booking/ticketc18.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c18" type="submit" class="seat-width-height"  value="C18"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c19']!='C19')
	{?>
        <form action="ticket_booking/ticketc19.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c19" type="submit" class="seat-width-height"  value="C19"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c20']!='C20')
	{?>
        <form action="ticket_booking/ticketc20.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c20" type="submit" class="seat-width-height"  value="C20"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c21']!='C21')
	{?>
        <form action="ticket_booking/ticketc21.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c21" type="submit" class="seat-width-height"  value="C21"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c22']!='C22')
	{?>
        <form action="ticket_booking/ticketc22.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c22" type="submit" class="seat-width-height"  value="C22"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c23']!='C23')
	{?>
        <form action="ticket_booking/ticketc23.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c23" type="submit" class="seat-width-height"  value="C23"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c24']!='C24')
	{?>
        <form action="ticket_booking/ticketc24.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c24" type="submit" class="seat-width-height"  value="C24"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c25']!='C25')
	{?>
        <form action="ticket_booking/ticketc25.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c25" type="submit" class="seat-width-height"  value="C25"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c26']!='C26')
	{?>
        <form action="ticket_booking/ticketc26.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c26" type="submit" class="seat-width-height"  value="C26"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c27']!='C27')
	{?>
        <form action="ticket_booking/ticketc27.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c27" type="submit" class="seat-width-height"  value="C27"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c28']!='C28')
	{?>
        <form action="ticket_booking/ticketc28.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c28" type="submit" class="seat-width-height"  value="C28"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c29']!='C29')
	{?>
        <form action="ticket_booking/ticketc29.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c29" type="submit" class="seat-width-height"  value="C29"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c30']!='C30')
	{?>
        <form action="ticket_booking/ticketc30.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c30" type="submit" class="seat-width-height"  value="C30"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c31']!='C31')
	{?>
        <form action="ticket_booking/ticketc31.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c31" type="submit" class="seat-width-height"  value="C31"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c32']!='C32')
	{?>
        <form action="ticket_booking/ticketc32.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c32" type="submit" class="seat-width-height"  value="C32"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_c33']!='C33')
	{?>
        <form action="ticket_booking/ticketc33.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c33" type="submit" class="seat-width-height"  value="C33"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c34']!='C34')
	{?>
        <form action="ticket_booking/ticketc34.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c34" type="submit" class="seat-width-height"  value="C34"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c35']!='C35')
	{?>
        <form action="ticket_booking/ticketc35.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c35" type="submit" class="seat-width-height"  value="C35"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c36']!='C36')
	{?>
        <form action="ticket_booking/ticketc36.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c36" type="submit" class="seat-width-height"  value="C36"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c37']!='C37')
	{?>
        <form action="ticket_booking/ticketc37.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c37" type="submit" class="seat-width-height"  value="C37"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c38']!='C38')
	{?>
        <form action="ticket_booking/ticketc38.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c38" type="submit" class="seat-width-height"  value="C38"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c39']!='C39')
	{?>
        <form action="ticket_booking/ticketc39.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c39" type="submit" class="seat-width-height"  value="C39"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c40']!='C40')
	{?>
        <form action="ticket_booking/ticketc40.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c40" type="submit" class="seat-width-height"  value="C40"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c41']!='C41')
	{?>
        <form action="ticket_booking/ticketc41.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c41" type="submit" class="seat-width-height"  value="C41"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c42']!='C42')
	{?>
        <form action="ticket_booking/ticketc42.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c42" type="submit" class="seat-width-height"  value="C42"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c43']!='C43')
	{?>
        <form action="ticket_booking/ticketc43.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c43" type="submit" class="seat-width-height"  value="C43"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c44']!='C44')
	{?>
        <form action="ticket_booking/ticketc44.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c44" type="submit" class="seat-width-height"  value="C44"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c45']!='C45')
	{?>
        <form action="ticket_booking/ticketc45.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c45" type="submit" class="seat-width-height"  value="C45"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c46']!='C46')
	{?>
        <form action="ticket_booking/ticketc46.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c46" type="submit" class="seat-width-height"  value="C46"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c47']!='C47')
	{?>
        <form action="ticket_booking/ticketc47.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c47" type="submit" class="seat-width-height"  value="C47"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c48']!='C48')
	{?>
        <form action="ticket_booking/ticketc48.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c48" type="submit" class="seat-width-height"  value="C48"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_c49']!='C49')
	{?>
        <form action="ticket_booking/ticketc49.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c49" type="submit" class="seat-width-height"  value="C49"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c50']!='C50')
	{?>
        <form action="ticket_booking/ticketc50.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c50" type="submit" class="seat-width-height"  value="C50"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c51']!='C51')
	{?>
        <form action="ticket_booking/ticketc51.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c51" type="submit" class="seat-width-height"  value="C51"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c52']!='C52')
	{?>
        <form action="ticket_booking/ticketc52.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c52" type="submit" class="seat-width-height"  value="C52"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c53']!='C53')
	{?>
        <form action="ticket_booking/ticketc53.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c53" type="submit" class="seat-width-height"  value="C53"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c54']!='C54')
	{?>
        <form action="ticket_booking/ticketc54.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c54" type="submit" class="seat-width-height"  value="C54"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c55']!='C55')
	{?>
        <form action="ticket_booking/ticketc55.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c55" type="submit" class="seat-width-height"  value="C55"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c56']!='C56')
	{?>
        <form action="ticket_booking/ticketc56.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c56" type="submit" class="seat-width-height"  value="C56"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c56']!='C56')
	{?>
        <form action="ticket_booking/ticketc56.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c56" type="submit" class="seat-width-height"  value="C56"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c57']!='C57')
	{?>
        <form action="ticket_booking/ticketc57.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c57" type="submit" class="seat-width-height"  value="C57"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c58']!='C58')
	{?>
        <form action="ticket_booking/ticketc58.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c58" type="submit" class="seat-width-height"  value="C58"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_c59']!='C59')
	{?>
        <form action="ticket_booking/ticketc59.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c59" type="submit" class="seat-width-height"  value="C59"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c60']!='C60')
	{?>
        <form action="ticket_booking/ticketc60.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c60" type="submit" class="seat-width-height"  value="C60"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_c61']!='C61')
	{?>
        <form action="ticket_booking/ticketc61.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_c61" type="submit" class="seat-width-height"  value="C61"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_d1']!='D1')
	{?>
        <form action="ticket_booking/ticketd1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d1" type="submit" class="seat-width-height"  value="D1"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_d2']!='D2')
	{?>
        <form action="ticket_booking/ticketd2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d2" type="submit" class="seat-width-height"  value="D2"/>
        </form>
      <?php  } else {
?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_d3']!='D3')
	{?>
        <form action="ticket_booking/ticketd3.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d3" type="submit" class="seat-width-height"  value="D3"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d4']!='D4')
	{?>
        <form action="ticket_booking/ticketd4.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d4" type="submit" class="seat-width-height"  value="D4"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d5']!='D5')
	{?>
        <form action="ticket_booking/ticketd5.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d5" type="submit" class="seat-width-height"  value="D5"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d6']!='D6')
	{?>
        <form action="ticket_booking/ticketd6.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d6" type="submit" class="seat-width-height"  value="D6"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d7']!='D7')
	{?>
        <form action="ticket_booking/ticketd7.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d7" type="submit" class="seat-width-height"  value="D7"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d8']!='D8')
	{?>
        <form action="ticket_booking/ticketd8.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d8" type="submit" class="seat-width-height"  value="D8"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d9']!='D9')
	{?>
        <form action="ticket_booking/ticketd9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d9" type="submit" class="seat-width-height"  value="D9"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d10']!='D10')
	{?>
        <form action="ticket_booking/ticketd10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d10" type="submit" class="seat-width-height"  value="D10"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d11']!='D11')
	{?>
        <form action="ticket_booking/ticketd11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d11" type="submit" class="seat-width-height"  value="D11"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d12']!='D12')
	{?>
        <form action="ticket_booking/ticketd12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d12" type="submit" class="seat-width-height"  value="D12"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d13']!='D13')
	{?>
        <form action="ticket_booking/ticketd13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d13" type="submit" class="seat-width-height"  value="D13"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d14']!='D14')
	{?>
        <form action="ticket_booking/ticketd14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d14" type="submit" class="seat-width-height"  value="D14"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d15']!='D15')
	{?>
        <form action="ticket_booking/ticketd15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d15" type="submit" class="seat-width-height"  value="D15"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d16']!='D16')
	{?>
        <form action="ticket_booking/ticketd16.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d16" type="submit" class="seat-width-height"  value="D16"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_d17']!='D17')
	{?>
        <form action="ticket_booking/ticketd17.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d17" type="submit" class="seat-width-height"  value="D17"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_d18']!='D18')
	{?>
        <form action="ticket_booking/ticketd18.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d18" type="submit" class="seat-width-height"  value="D18"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_d19']!='D19')
	{?>
        <form action="ticket_booking/ticketd19.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d19" type="submit" class="seat-width-height"  value="D19"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d20']!='D20')
	{?>
        <form action="ticket_booking/ticketd20.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d20" type="submit" class="seat-width-height"  value="D20"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d21']!='D21')
	{?>
        <form action="ticket_booking/ticketd21.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d21" type="submit" class="seat-width-height"  value="D21"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d22']!='D22')
	{?>
        <form action="ticket_booking/ticketd22.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d22" type="submit" class="seat-width-height"  value="D22"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d23']!='D23')
	{?>
        <form action="ticket_booking/ticketd23.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d23" type="submit" class="seat-width-height"  value="D23"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d24']!='D24')
	{?>
        <form action="ticket_booking/ticketd24.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d24" type="submit" class="seat-width-height"  value="D24"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d25']!='D25')
	{?>
        <form action="ticket_booking/ticketd25.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d25" type="submit" class="seat-width-height"  value="D25"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d26']!='D26')
	{?>
        <form action="ticket_booking/ticketd26.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d26" type="submit" class="seat-width-height"  value="D26"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d27']!='D27')
	{?>
        <form action="ticket_booking/ticketd27.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d27" type="submit" class="seat-width-height"  value="D27"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d28']!='D28')
	{?>
        <form action="ticket_booking/ticketd28.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d28" type="submit" class="seat-width-height"  value="D28"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d29']!='D29')
	{?>
        <form action="ticket_booking/ticketd29.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d29" type="submit" class="seat-width-height"  value="D29"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d30']!='D30')
	{?>
        <form action="ticket_booking/ticketd30.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d30" type="submit" class="seat-width-height"  value="D30"/>
        </form>
      <?php  } else { ?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 


?></td>
    <td align="left" valign="top"><?php if($row['ticket_d31']!='D31')
	{?>
        <form action="ticket_booking/ticketd31.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d31" type="submit" class="seat-width-height"  value="D31"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
    <td align="left" valign="top"><?php if($row['ticket_d32']!='D32')
	{?>
        <form action="ticket_booking/ticketd32.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_d32" type="submit" class="seat-width-height"  value="D32"/>
        </form>
      <?php  } else {
?>
        <input name="" type="submit" class="notavailable-seats"  value="N/A";/>
        <?php } ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php if($row['ticket_e1']!='E1')
	{?>
        <form action="ticket_booking/tickete1.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete2.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete3.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete4.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete5.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete6.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete7.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete8.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete9.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete10.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete11.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete12.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete13.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete14.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
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
        <form action="ticket_booking/tickete15.php" method="get">
          <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
          <input name="event" type="hidden" value="<?php echo $event ?>" />
          <input name="time" type="hidden"  value="<?php echo $time ?>"/>
          <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
          <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
          <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
          <input name="ticket_e15" type="submit" class="seat-width-height"  value="E15"/>
        </form>
      <?php  } else { ?>
        <input name="Input" type="submit" class="notavailable-seats"  value="N/A"/>
        <?php 
} 
}

?></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td align="left" valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>