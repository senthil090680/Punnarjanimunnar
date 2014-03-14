
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
    <td colspan="4" align="left" valign="top">          Welcome  <?php echo strtoupper($_SESSION['user_email_session']); ?></td>
  </tr>
  <tr>
    <td width="124" align="left" valign="top">&nbsp;</td>
    <td width="9" align="left" valign="top">&nbsp;</td>
    <td width="322" align="left" valign="top">&nbsp;</td>
    <td width="445" rowspan="9" align="left" valign="top"><table width="438" border="0">
      <tr>
        <td width="432" height="86">	<?php $querys=mysql_query("select * from team_booking_details");

$rows=mysql_fetch_array($querys); ?>
<?php if($rows['event']=="event1") { ?>
<a href="gallery/event1.jpg"rel="lightbox[plants]"><img src="gallery/event1.jpg" alt="" width="124" height="124" vspace="37" border="0" /></a><a href="gallery/event1.jpg"rel="lightbox[plants]">Click Here to Enlarge </a><?php } ?>&nbsp; <?php if($rows['event']=="event2") { ?>
 
<a href="gallery/event2.jpg"rel="lightbox[plants]"><img src="gallery/event2.jpg" alt="" width="124" height="124" vspace="37" border="0" /></a><a href="gallery/event2.jpg"rel="lightbox[plants]">Click Here to Enlarge </a>
 <?php } ?></td>
      </tr>
      <tr>
        <td height="40"> Available    :   <input name="" type="" class="seat-width-height"  value=""/>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">Not   Available : <input type="" class="notavailable-seats"  value=""/>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">Auditorium Name </td>
    <td align="left" valign="top">:</td>
    <td align="left" valign="top"><?php
  $event=$_GET['event'];
 	$time=$_GET['time'];
	$audi=mysql_query("select auditorium from team_booking_details where time='".$time."' and event='".$event."' ");
	$row_audi=mysql_fetch_array($audi);
	echo $row_audi['auditorium'];
	
$auditorium =$row_audi['auditorium'];

//echo $auditorium;
?>
      &nbsp;</td>
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
    <td align="left" valign="top"> First Class Rate</td>
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
    <td colspan="16" align="center" valign="top"></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><?php if($row['event']=="event1") { ?>	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");
  $rowexp['ticket_u26'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u26'];
 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u26=NULL where expiry_ticket_u26 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u26=NULL where expiry_ticket_u26 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u26']!='U26' && $row['expiry_ticket_u26']==NULL)
	{?>
      <form action="ticket_booking/ticketu26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u26" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u26" type="submit" class="seat-width-height"  value="U26"/>
      </form>
      <?php  } elseif($row['ticket_u26']=='U26' && $row['expiry_ticket_u26']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U26"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U26"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u25'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_u25'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u25=NULL where expiry_ticket_u25 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u25=NULL where expiry_ticket_u25 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u25']!='U25' && $row['expiry_ticket_u25']==NULL)
	{?>
      <form action="ticket_booking/ticketu25.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u25" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u25" type="submit" class="seat-width-height"  value="U25"/>
      </form>
      <?php  } elseif($row['ticket_u25']=='U25' && $row['expiry_ticket_u25']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U25"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U25"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u24'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u24'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u24=NULL where expiry_ticket_u24 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u24=NULL where expiry_ticket_u24 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u24']!='U24' && $row['expiry_ticket_u24']==NULL)
	{?>
      <form action="ticket_booking/ticketu24.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u24" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u24" type="submit" class="seat-width-height"  value="u24"/>
      </form>
      <?php  } elseif($row['ticket_u24']=='U24' && $row['expiry_ticket_u24']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U24"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U24"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u23'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u23'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u23=NULL where expiry_ticket_u23 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u23=NULL where expiry_ticket_u23 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u23']!='U23' && $row['expiry_ticket_u23']==NULL)
	{?>
      <form action="ticket_booking/ticketu23.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u23" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u23" type="submit" class="seat-width-height"  value="U23"/>
      </form>
      <?php  } elseif($row['ticket_u23']=='U23' && $row['expiry_ticket_u23']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U23"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U23"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u22'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u22'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u22=NULL where expiry_ticket_u22 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u22=NULL where expiry_ticket_u22 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u22']!='U22' && $row['expiry_ticket_u22']==NULL)
	{?>
      <form action="ticket_booking/ticketu22.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u22" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u22" type="submit" class="seat-width-height"  value="U22"/>
      </form>
      <?php  } elseif($row['ticket_u22']=='U22' && $row['expiry_ticket_u22']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U22"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U22"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u21'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u21'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u21=NULL where expiry_ticket_u21 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u21=NULL where expiry_ticket_u21 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u21']!='U21' && $row['expiry_ticket_u21']==NULL)
	{?>
      <form action="ticket_booking/ticketu21.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u21" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u21" type="submit" class="seat-width-height"  value="U21"/>
      </form>
      <?php  } elseif($row['ticket_u21']=='U21' && $row['expiry_ticket_u21']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U21"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U21"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u20'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u20'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u20=NULL where expiry_ticket_u20 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u20=NULL where expiry_ticket_u20 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u20']!='U20' && $row['expiry_ticket_u20']==NULL)
	{?>
      <form action="ticket_booking/ticketu20.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u20" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u20" type="submit" class="seat-width-height"  value="U20"/>
      </form>
      <?php  } elseif($row['ticket_u20']=='U20' && $row['expiry_ticket_u20']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U20"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U20"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u19'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_u19'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u19=NULL where expiry_ticket_u19 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u19=NULL where expiry_ticket_u19 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u19']!='U19' && $row['expiry_ticket_u19']==NULL)
	{?>
      <form action="ticket_booking/ticketu19.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u19" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u19" type="submit" class="seat-width-height"  value="U19"/>
      </form>
      <?php  } elseif($row['ticket_u19']=='U19' && $row['expiry_ticket_u19']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U19"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U19"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u18'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_u18'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u18=NULL where expiry_ticket_u18 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u18=NULL where expiry_ticket_u18 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u18']!='U18' && $row['expiry_ticket_u18']==NULL)
	{?>
      <form action="ticket_booking/ticketu18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u18" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u18" type="submit" class="seat-width-height"  value="U18"/>
      </form>
      <?php  } elseif($row['ticket_u18']=='U18' && $row['expiry_ticket_u18']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U18"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U18"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u17'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_u17'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u17=NULL where expiry_ticket_u17 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u17=NULL where expiry_ticket_u17 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u17']!='U17' && $row['expiry_ticket_u17']==NULL)
	{?>
      <form action="ticket_booking/ticketu17.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u17" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u17" type="submit" class="seat-width-height"  value="U17"/>
      </form>
      <?php  } elseif($row['ticket_u17']=='U17' && $row['expiry_ticket_u17']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U17"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U17"/>
      <?php 
} 

?>
</td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_u16'];
 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u16=NULL where expiry_ticket_u16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u16=NULL where expiry_ticket_u16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u16']!='U16' && $row['expiry_ticket_u16']==NULL)
	{?>
      <form action="ticket_booking/ticketu16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u16" type="submit" class="seat-width-height"  value="U16"/>
      </form>
      <?php  } elseif($row['ticket_u16']=='U16' && $row['expiry_ticket_u16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U16"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_u15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_u15'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_u15=NULL where expiry_ticket_u15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_u15=NULL where expiry_ticket_u15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_u15']!='U15' && $row['expiry_ticket_u15']==NULL)
	{?>
      <form action="ticket_booking/ticketu15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_u15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_u15" type="submit" class="seat-width-height"  value="U15"/>
      </form>
      <?php  } elseif($row['ticket_u15']=='U15' && $row['expiry_ticket_u15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="U15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="U15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_s14'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s14=NULL where expiry_ticket_s14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s14=NULL where expiry_ticket_s14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s14']!='S14' && $row['expiry_ticket_s14']==NULL)
	{?>
      <form action="ticket_booking/tickets14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s14" type="submit" class="seat-width-height"  value="S14"/>
      </form>
      <?php  } elseif($row['ticket_s14']=='S14' && $row['expiry_ticket_s14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_s13'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s13=NULL where expiry_ticket_s13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s13=NULL where expiry_ticket_s13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s13']!='S13' && $row['expiry_ticket_s13']==NULL)
	{?>
      <form action="ticket_booking/tickets13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s13" type="submit" class="seat-width-height"  value="S13"/>
      </form>
      <?php  } elseif($row['ticket_s13']=='S13' && $row['expiry_ticket_s13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_s12'];
 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s12=NULL where expiry_ticket_s12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s12=NULL where expiry_ticket_s12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s12']!='S12' && $row['expiry_ticket_s12']==NULL)
	{?>
      <form action="ticket_booking/tickets12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s12" type="submit" class="seat-width-height"  value="S12"/>
      </form>
      <?php  } elseif($row['ticket_s12']=='S12' && $row['expiry_ticket_s12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_s11'];

$curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s11=NULL where expiry_ticket_s11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s11=NULL where expiry_ticket_s11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s11']!='S11' && $row['expiry_ticket_s11']==NULL)
	{?>
      <form action="ticket_booking/tickets11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s11" type="submit" class="seat-width-height"  value="S11"/>
      </form>
      <?php  } elseif($row['ticket_s11']=='S11' && $row['expiry_ticket_s11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_s10'];
 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s10=NULL where expiry_ticket_s10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s10=NULL where expiry_ticket_s10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s10']!='S10' && $row['expiry_ticket_s10']==NULL)
	{?>
      <form action="ticket_booking/tickets10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s10" type="submit" class="seat-width-height"  value="S10"/>
      </form>
      <?php  } elseif($row['ticket_s10']=='S10' && $row['expiry_ticket_s10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_s9'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s9=NULL where expiry_ticket_s9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s9=NULL where expiry_ticket_s9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s9']!='S9' && $row['expiry_ticket_s9']==NULL)
	{?>
      <form action="ticket_booking/tickets9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s9" type="submit" class="seat-width-height"  value="S9"/>
      </form>
      <?php  } elseif($row['ticket_s9']=='S9' && $row['expiry_ticket_s9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_s8'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s8=NULL where expiry_ticket_s8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s8=NULL where expiry_ticket_s8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s8']!='S8' && $row['expiry_ticket_s8']==NULL)
	{?>
      <form action="ticket_booking/tickets8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s8" type="submit" class="seat-width-height"  value="S8"/>
      </form>
      <?php  } elseif($row['ticket_s8']=='S8' && $row['expiry_ticket_s8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S8"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_s7'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s7=NULL where expiry_ticket_s7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s7=NULL where expiry_ticket_s7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s7']!='S7' && $row['expiry_ticket_s7']==NULL)
	{?>
      <form action="ticket_booking/tickets7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s7" type="submit" class="seat-width-height"  value="S7"/>
      </form>
      <?php  } elseif($row['ticket_s7']=='S7' && $row['expiry_ticket_s7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S7"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_s6'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s6=NULL where expiry_ticket_s6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s6=NULL where expiry_ticket_s6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s6']!='S6' && $row['expiry_ticket_s6']==NULL)
	{?>
      <form action="ticket_booking/tickets6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s6" type="submit" class="seat-width-height"  value="S6"/>
      </form>
      <?php  } elseif($row['ticket_s6']=='S6' && $row['expiry_ticket_s6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S6"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
$rowexp['expiry_ticket_s5'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s5=NULL where expiry_ticket_s5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s5=NULL where expiry_ticket_s5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s5']!='S5' && $row['expiry_ticket_s5']==NULL)
	{?>
      <form action="ticket_booking/tickets5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s5" type="submit" class="seat-width-height"  value="S5"/>
      </form>
      <?php  } elseif($row['ticket_s5']=='S5' && $row['expiry_ticket_s5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S5"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_s4'];

$curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s4=NULL where expiry_ticket_s4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s4=NULL where expiry_ticket_s4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s4']!='S4' && $row['expiry_ticket_s4']==NULL)
	{?>
      <form action="ticket_booking/tickets4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s4" type="submit" class="seat-width-height"  value="S4"/>
      </form>
      <?php  } elseif($row['ticket_s4']=='S4' && $row['expiry_ticket_s4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S4"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
$rowexp['expiry_ticket_s3'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s3=NULL where expiry_ticket_s3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s3=NULL where expiry_ticket_s3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s3']!='S3' && $row['expiry_ticket_s3']==NULL)
	{?>
      <form action="ticket_booking/tickets3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s3" type="submit" class="seat-width-height"  value="S3"/>
      </form>
      <?php  } elseif($row['ticket_s3']=='S3' && $row['expiry_ticket_s3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S3"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_s2'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s2=NULL where expiry_ticket_s2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s2=NULL where expiry_ticket_s2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s2']!='S2' && $row['expiry_ticket_s2']==NULL)
	{?>
      <form action="ticket_booking/tickets2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s2" type="submit" class="seat-width-height"  value="S2"/>
      </form>
      <?php  } elseif($row['ticket_s2']=='S2' && $row['expiry_ticket_s2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S2"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_s1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_s1'];

 $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_s1=NULL where expiry_ticket_s1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_s1=NULL where expiry_ticket_s1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_s1']!='S1' && $row['expiry_ticket_s1']==NULL)
	{?>
      <form action="ticket_booking/tickets1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_s1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_s1" type="submit" class="seat-width-height"  value="S1"/>
      </form>
      <?php  } elseif($row['ticket_s1']=='S1' && $row['expiry_ticket_s1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="S1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="S1"/>
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
    <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a1=NULL where expiry_ticket_a1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a1=NULL where expiry_ticket_a1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a1']!='A1' && $row['expiry_ticket_a1']==NULL)
	{?>
      <form action="ticket_booking/ticketa1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a1" type="submit" class="seat-width-height"  value="A1"/>
      </form>
      <?php  } elseif($row['ticket_a1']=='A1' && $row['expiry_ticket_a1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b1=NULL where expiry_ticket_b1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b1=NULL where expiry_ticket_b1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b1']!='B1' && $row['expiry_ticket_b1']==NULL)
	{?>
      <form action="ticket_booking/ticketb1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b1" type="submit" class="seat-width-height"  value="B1"/>
      </form>
      <?php  } elseif($row['ticket_b1']=='B1' && $row['expiry_ticket_b1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c1=NULL where expiry_ticket_c1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c1=NULL where expiry_ticket_c1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c1']!='C1' && $row['expiry_ticket_c1']==NULL)
	{?>
      <form action="ticket_booking/ticketc1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c1" type="submit" class="seat-width-height"  value="C1"/>
      </form>
      <?php  } elseif($row['ticket_c1']=='C1' && $row['expiry_ticket_c1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C1"/>
      <?php 
} 

?></td>
  <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d1=NULL where expiry_ticket_d1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d1=NULL where expiry_ticket_d1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d1']!='D1' && $row['expiry_ticket_d1']==NULL)
	{?>
      <form action="ticket_booking/ticketd1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d1" type="submit" class="seat-width-height"  value="D1"/>
      </form>
      <?php  } elseif($row['ticket_d1']=='D1' && $row['expiry_ticket_d1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e1=NULL where expiry_ticket_e1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e1=NULL where expiry_ticket_e1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e1']!='E1' && $row['expiry_ticket_e1']==NULL)
	{?>
      <form action="ticket_booking/tickete1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e1" type="submit" class="seat-width-height"  value="E1"/>
      </form>
      <?php  } elseif($row['ticket_e1']=='E1' && $row['expiry_ticket_e1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f1=NULL where expiry_ticket_f1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f1=NULL where expiry_ticket_f1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f1']!='F1' && $row['expiry_ticket_f1']==NULL)
	{?>
      <form action="ticket_booking/ticketf1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f1" type="submit" class="seat-width-height"  value="F1"/>
      </form>
      <?php  } elseif($row['ticket_f1']=='F1' && $row['expiry_ticket_f1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g1=NULL where expiry_ticket_g1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g1=NULL where expiry_ticket_g1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g1']!='G1' && $row['expiry_ticket_g1']==NULL)
	{?>
      <form action="ticket_booking/ticketg1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g1" type="submit" class="seat-width-height"  value="G1"/>
      </form>
      <?php  } elseif($row['ticket_g1']=='G1' && $row['expiry_ticket_g1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h1=NULL where expiry_ticket_h1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h1=NULL where expiry_ticket_h1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h1']!='H1' && $row['expiry_ticket_h1']==NULL)
	{?>
      <form action="ticket_booking/ticketh1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h1" type="submit" class="seat-width-height"  value="H1"/>
      </form>
      <?php  } elseif($row['ticket_h1']=='H1' && $row['expiry_ticket_h1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i1=NULL where expiry_ticket_i1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i1=NULL where expiry_ticket_i1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i1']!='I1' && $row['expiry_ticket_i1']==NULL)
	{?>
      <form action="ticket_booking/ticketi1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i1" type="submit" class="seat-width-height"  value="I1"/>
      </form>
      <?php  } elseif($row['ticket_i1']=='I1' && $row['expiry_ticket_i1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I1"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j1=NULL where expiry_ticket_j1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j1=NULL where expiry_ticket_j1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j1']!='J1' && $row['expiry_ticket_j1']==NULL)
	{?>
      <form action="ticket_booking/ticketj1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j1" type="submit" class="seat-width-height"  value="J1"/>
      </form>
      <?php  } elseif($row['ticket_j1']=='J1' && $row['expiry_ticket_j1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J1"/>
      <?php 
} 

?></td>
    <td width="4">&nbsp;</td>
    
    <td width="48" align="left" valign="top">
	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_101'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
 $rowexp['expiry_ticket_101'];

 $curtimes = date("H:i:s");

mysql_query("UPDATE team_booking_details set ticket_101=NULL where expiry_ticket_101 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_101=NULL where expiry_ticket_101 < '".$curtimes."'");

?> 
	<?php if($row['ticket_101']!='101' && $row['expiry_ticket_101']==NULL)
	{?>
      <form action="ticket_booking/ticket101.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_101" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_101" type="submit" class="seat-width-height"  value="101"/>
      </form>
      <?php  } elseif($row['ticket_101']=='101' && $row['expiry_ticket_101']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="101"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="101"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_115'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_115'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_115=NULL where expiry_ticket_115 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_115=NULL where expiry_ticket_115 < '".$curtimes."'");

?> 
	<?php if($row['ticket_115']!='115' && $row['expiry_ticket_115']==NULL)
	{?>
      <form action="ticket_booking/ticket115.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_115" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_115" type="submit" class="seat-width-height"  value="115"/>
      </form>
      <?php  } elseif($row['ticket_115']=='115' && $row['expiry_ticket_115']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="115"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="115"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_129'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_129'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_129=NULL where expiry_ticket_129 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_129=NULL where expiry_ticket_129 < '".$curtimes."'");

?> 
	<?php if($row['ticket_129']!='129' && $row['expiry_ticket_129']==NULL)
	{?>
      <form action="ticket_booking/ticket129.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_129" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_129" type="submit" class="seat-width-height"  value="129"/>
      </form>
      <?php  } elseif($row['ticket_129']=='129' && $row['expiry_ticket_129']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="129"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="129"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_143'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_143'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_143=NULL where expiry_ticket_143 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_143=NULL where expiry_ticket_143 < '".$curtimes."'");

?> 
	<?php if($row['ticket_143']!='143' && $row['expiry_ticket_143']==NULL)
	{?>
      <form action="ticket_booking/ticket143.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_143" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_143" type="submit" class="seat-width-height"  value="143"/>
      </form>
      <?php  } elseif($row['ticket_143']=='143' && $row['expiry_ticket_143']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="143"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="143"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">		<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_157'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_157'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_157=NULL where expiry_ticket_157 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_157=NULL where expiry_ticket_157 < '".$curtimes."'");

?> 
	<?php if($row['ticket_157']!='157' && $row['expiry_ticket_157']==NULL)
	{?>
      <form action="ticket_booking/ticket157.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_157" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_157" type="submit" class="seat-width-height"  value="157"/>
      </form>
      <?php  } elseif($row['ticket_157']=='157' && $row['expiry_ticket_157']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="157"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="157"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a2=NULL where expiry_ticket_a2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a2=NULL where expiry_ticket_a2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a2']!='A2' && $row['expiry_ticket_a2']==NULL)
	{?>
      <form action="ticket_booking/ticketa2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a2" type="submit" class="seat-width-height"  value="A2"/>
      </form>
      <?php  } elseif($row['ticket_a2']=='A2' && $row['expiry_ticket_a2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b2=NULL where expiry_ticket_b2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b2=NULL where expiry_ticket_b2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b2']!='B2' && $row['expiry_ticket_b2']==NULL)
	{?>
      <form action="ticket_booking/ticketb2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b2" type="submit" class="seat-width-height"  value="B2"/>
      </form>
      <?php  } elseif($row['ticket_b2']=='B2' && $row['expiry_ticket_b2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c2=NULL where expiry_ticket_c2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c2=NULL where expiry_ticket_c2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c2']!='C2' && $row['expiry_ticket_c2']==NULL)
	{?>
      <form action="ticket_booking/ticketc2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c2" type="submit" class="seat-width-height"  value="C2"/>
      </form>
      <?php  } elseif($row['ticket_c2']=='C2' && $row['expiry_ticket_c2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d2=NULL where expiry_ticket_d2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d2=NULL where expiry_ticket_d2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d2']!='D2' && $row['expiry_ticket_d2']==NULL)
	{?>
      <form action="ticket_booking/ticketd2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d2" type="submit" class="seat-width-height"  value="D2"/>
      </form>
      <?php  } elseif($row['ticket_d2']=='D2' && $row['expiry_ticket_d2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e2=NULL where expiry_ticket_e2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e2=NULL where expiry_ticket_e2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e2']!='E2' && $row['expiry_ticket_e2']==NULL)
	{?>
      <form action="ticket_booking/tickete2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e2" type="submit" class="seat-width-height"  value="E2"/>
      </form>
      <?php  } elseif($row['ticket_e2']=='E2' && $row['expiry_ticket_e2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f2=NULL where expiry_ticket_f2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f2=NULL where expiry_ticket_f2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f2']!='F2' && $row['expiry_ticket_f2']==NULL)
	{?>
      <form action="ticket_booking/ticketf2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f2" type="submit" class="seat-width-height"  value="F2"/>
      </form>
      <?php  } elseif($row['ticket_f2']=='F2' && $row['expiry_ticket_f2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g2=NULL where expiry_ticket_g2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g2=NULL where expiry_ticket_g2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g2']!='G2' && $row['expiry_ticket_g2']==NULL)
	{?>
      <form action="ticket_booking/ticketg2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g2" type="submit" class="seat-width-height"  value="G2"/>
      </form>
      <?php  } elseif($row['ticket_g2']=='G2' && $row['expiry_ticket_g2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h2=NULL where expiry_ticket_h2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h2=NULL where expiry_ticket_h2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h2']!='H2' && $row['expiry_ticket_h2']==NULL)
	{?>
      <form action="ticket_booking/ticketh2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h2" type="submit" class="seat-width-height"  value="H2"/>
      </form>
      <?php  } elseif($row['ticket_h2']=='H2' && $row['expiry_ticket_h2']=='BOOKED') { ?>

      <input name="" type="submit" class="notavailable-seats"  value="H2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H2"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i2=NULL where expiry_ticket_i2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i2=NULL where expiry_ticket_i2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i2']!='I2' && $row['expiry_ticket_i2']==NULL)
	{?>
      <form action="ticket_booking/ticketi2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i2" type="submit" class="seat-width-height"  value="I2"/>
      </form>
      <?php  } elseif($row['ticket_i2']=='I2' && $row['expiry_ticket_i2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I2"/>
      <?php 
} 

?></td>
    
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j2=NULL where expiry_ticket_j2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j2=NULL where expiry_ticket_j2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j2']!='J2' && $row['expiry_ticket_j2']==NULL)
	{?>
      <form action="ticket_booking/ticketj2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j2" type="submit" class="seat-width-height"  value="J2"/>
      </form>
      <?php  } elseif($row['ticket_j2']=='J2' && $row['expiry_ticket_j2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J2"/>
      <?php 
} 

?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_102'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_102'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_102=NULL where expiry_ticket_102 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_102=NULL where expiry_ticket_102 < '".$curtimes."'");

?> 
	<?php if($row['ticket_102']!='102' && $row['expiry_ticket_102']==NULL)
	{?>
      <form action="ticket_booking/ticket102.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_102" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_102" type="submit" class="seat-width-height"  value="102"/>
      </form>
      <?php  } elseif($row['ticket_102']=='102' && $row['expiry_ticket_102']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="102"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="102"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_116'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_116'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");

?> 
	<?php if($row['ticket_116']!='116' && $row['expiry_ticket_116']==NULL)
	{?>
      <form action="ticket_booking/ticket116.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_116" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_116" type="submit" class="seat-width-height"  value="116"/>
      </form>
      <?php  } elseif($row['ticket_116']=='116' && $row['expiry_ticket_116']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="116"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="116"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_116'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_116'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");

?> 
	<?php if($row['ticket_116']!='116' && $row['expiry_ticket_116']==NULL)
	{?>
      <form action="ticket_booking/ticket116.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_116" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_116" type="submit" class="seat-width-height"  value="116"/>
      </form>
      <?php  } elseif($row['ticket_116']=='116' && $row['expiry_ticket_116']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="116"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="116"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_116'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_116'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");

?> 
	<?php if($row['ticket_116']!='116' && $row['expiry_ticket_116']==NULL)
	{?>
      <form action="ticket_booking/ticket116.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_116" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_116" type="submit" class="seat-width-height"  value="116"/>
      </form>
      <?php  } elseif($row['ticket_116']=='116' && $row['expiry_ticket_116']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="116"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="116"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_158'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_158'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_158=NULL where expiry_ticket_158 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_158=NULL where expiry_ticket_158 < '".$curtimes."'");

?> 
	<?php if($row['ticket_158']!='158' && $row['expiry_ticket_158']==NULL)
	{?>
      <form action="ticket_booking/ticket158.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_158" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_158" type="submit" class="seat-width-height"  value="158"/>
      </form>
      <?php  } elseif($row['ticket_158']=='158' && $row['expiry_ticket_158']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="158"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="158"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a3=NULL where expiry_ticket_a3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a3=NULL where expiry_ticket_a3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a3']!='A3' && $row['expiry_ticket_a3']==NULL)
	{?>
      <form action="ticket_booking/ticketa3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a3" type="submit" class="seat-width-height"  value="A3"/>
      </form>
      <?php  } elseif($row['ticket_a3']=='A3' && $row['expiry_ticket_a3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b3=NULL where expiry_ticket_b3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b3=NULL where expiry_ticket_b3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b3']!='B3' && $row['expiry_ticket_b3']==NULL)
	{?>
      <form action="ticket_booking/ticketb3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b3" type="submit" class="seat-width-height"  value="B3"/>
      </form>
      <?php  } elseif($row['ticket_b3']=='B3' && $row['expiry_ticket_b3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c3=NULL where expiry_ticket_c3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c3=NULL where expiry_ticket_c3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c3']!='C3' && $row['expiry_ticket_c3']==NULL)
	{?>
      <form action="ticket_booking/ticketc3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c3" type="submit" class="seat-width-height"  value="C3"/>
      </form>
      <?php  } elseif($row['ticket_c3']=='C3' && $row['expiry_ticket_c3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d3=NULL where expiry_ticket_d3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d3=NULL where expiry_ticket_d3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d3']!='D3' && $row['expiry_ticket_d3']==NULL)
	{?>
      <form action="ticket_booking/ticketd3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d3" type="submit" class="seat-width-height"  value="D3"/>
      </form>
      <?php  } elseif($row['ticket_d3']=='D3' && $row['expiry_ticket_d3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e3=NULL where expiry_ticket_e3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e3=NULL where expiry_ticket_e3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e3']!='E3' && $row['expiry_ticket_e3']==NULL)
	{?>
      <form action="ticket_booking/tickete3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e3" type="submit" class="seat-width-height"  value="E3"/>
      </form>
      <?php  } elseif($row['ticket_e3']=='E3' && $row['expiry_ticket_e3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f3=NULL where expiry_ticket_f3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f3=NULL where expiry_ticket_f3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f3']!='F3' && $row['expiry_ticket_f3']==NULL)
	{?>
      <form action="ticket_booking/ticketf3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f3" type="submit" class="seat-width-height"  value="F3"/>
      </form>
      <?php  } elseif($row['ticket_f3']=='F3' && $row['expiry_ticket_f3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g3=NULL where expiry_ticket_g3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g3=NULL where expiry_ticket_g3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g3']!='G3' && $row['expiry_ticket_g3']==NULL)
	{?>
      <form action="ticket_booking/ticketg3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g3" type="submit" class="seat-width-height"  value="G3"/>
      </form>
      <?php  } elseif($row['ticket_g3']=='G3' && $row['expiry_ticket_g3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h3=NULL where expiry_ticket_h3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h3=NULL where expiry_ticket_h3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h3']!='H3' && $row['expiry_ticket_h3']==NULL)
	{?>
      <form action="ticket_booking/ticketh3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h3" type="submit" class="seat-width-height"  value="H3"/>
      </form>
      <?php  } elseif($row['ticket_h3']=='H3' && $row['expiry_ticket_h3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H3"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i3=NULL where expiry_ticket_i3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i3=NULL where expiry_ticket_i3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i3']!='I3' && $row['expiry_ticket_i3']==NULL)
	{?>
      <form action="ticket_booking/ticketi3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i3" type="submit" class="seat-width-height"  value="I3"/>
      </form>
      <?php  } elseif($row['ticket_i3']=='I3' && $row['expiry_ticket_i3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I3"/>
      <?php 
} 

?></td>
    
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j3=NULL where expiry_ticket_j3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j3=NULL where expiry_ticket_j3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j3']!='J3' && $row['expiry_ticket_j3']==NULL)
	{?>
      <form action="ticket_booking/ticketj3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j3" type="submit" class="seat-width-height"  value="J3"/>
      </form>
      <?php  } elseif($row['ticket_j3']=='J3' && $row['expiry_ticket_j3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J3"/>
      <?php 
} 

?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j3=NULL where expiry_ticket_j3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j3=NULL where expiry_ticket_j3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j3']!='J3' && $row['expiry_ticket_j3']==NULL)
	{?>
      <form action="ticket_booking/ticketj3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j3" type="submit" class="seat-width-height"  value="J3"/>
      </form>
      <?php  } elseif($row['ticket_j3']=='J3' && $row['expiry_ticket_j3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J3"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_117'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_117'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_117=NULL where expiry_ticket_117 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_117=NULL where expiry_ticket_117 < '".$curtimes."'");

?> 
	<?php if($row['ticket_117']!='117' && $row['expiry_ticket_117']==NULL)
	{?>
      <form action="ticket_booking/ticket117.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_117" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_117" type="submit" class="seat-width-height"  value="117"/>
      </form>
      <?php  } elseif($row['ticket_117']=='117' && $row['expiry_ticket_117']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="117"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="117"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_131'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_131'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_131=NULL where expiry_ticket_131 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_131=NULL where expiry_ticket_131 < '".$curtimes."'");

?> 
	<?php if($row['ticket_131']!='131' && $row['expiry_ticket_131']==NULL)
	{?>
      <form action="ticket_booking/ticket131.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_131" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_131" type="submit" class="seat-width-height"  value="131"/>
      </form>
      <?php  } elseif($row['ticket_131']=='131' && $row['expiry_ticket_131']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="131"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="131"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_145'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_145'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_145=NULL where expiry_ticket_145 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_145=NULL where expiry_ticket_145 < '".$curtimes."'");

?> 
	<?php if($row['ticket_145']!='145' && $row['expiry_ticket_145']==NULL)
	{?>
      <form action="ticket_booking/ticket145.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_145" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_145" type="submit" class="seat-width-height"  value="145"/>
      </form>
      <?php  } elseif($row['ticket_145']=='145' && $row['expiry_ticket_145']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="145"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="145"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_159'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_159'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_159=NULL where expiry_ticket_159 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_159=NULL where expiry_ticket_159 < '".$curtimes."'");

?> 
	<?php if($row['ticket_159']!='159' && $row['expiry_ticket_159']==NULL)
	{?>
      <form action="ticket_booking/ticket159.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_159" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_159" type="submit" class="seat-width-height"  value="159"/>
      </form>
      <?php  } elseif($row['ticket_159']=='159' && $row['expiry_ticket_159']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="159"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="159"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a4=NULL where expiry_ticket_a4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a4=NULL where expiry_ticket_a4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a4']!='A4' && $row['expiry_ticket_a4']==NULL)
	{?>
      <form action="ticket_booking/ticketa4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a4" type="submit" class="seat-width-height"  value="A4"/>
      </form>
      <?php  } elseif($row['ticket_a4']=='A4' && $row['expiry_ticket_a4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b4=NULL where expiry_ticket_b4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b4=NULL where expiry_ticket_b4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b4']!='B4' && $row['expiry_ticket_b4']==NULL)
	{?>
      <form action="ticket_booking/ticketb4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b4" type="submit" class="seat-width-height"  value="B4"/>
      </form>
      <?php  } elseif($row['ticket_b4']=='B4' && $row['expiry_ticket_b4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c4=NULL where expiry_ticket_c4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c4=NULL where expiry_ticket_c4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c4']!='C4' && $row['expiry_ticket_c4']==NULL)
	{?>
      <form action="ticket_booking/ticketc4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c4" type="submit" class="seat-width-height"  value="C4"/>
      </form>
      <?php  } elseif($row['ticket_c4']=='C4' && $row['expiry_ticket_c4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d4=NULL where expiry_ticket_d4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d4=NULL where expiry_ticket_d4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d4']!='D4' && $row['expiry_ticket_d4']==NULL)
	{?>
      <form action="ticket_booking/ticketd4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d4" type="submit" class="seat-width-height"  value="D4"/>
      </form>
      <?php  } elseif($row['ticket_d4']=='D4' && $row['expiry_ticket_d4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e4=NULL where expiry_ticket_e4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e4=NULL where expiry_ticket_e4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e4']!='E4' && $row['expiry_ticket_e4']==NULL)
	{?>
      <form action="ticket_booking/tickete4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e4" type="submit" class="seat-width-height"  value="E4"/>
      </form>
      <?php  } elseif($row['ticket_e4']=='E4' && $row['expiry_ticket_e4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f4=NULL where expiry_ticket_f4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f4=NULL where expiry_ticket_f4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f4']!='F4' && $row['expiry_ticket_f4']==NULL)
	{?>
      <form action="ticket_booking/ticketf4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f4" type="submit" class="seat-width-height"  value="F4"/>
      </form>
      <?php  } elseif($row['ticket_f4']=='F4' && $row['expiry_ticket_f4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g4=NULL where expiry_ticket_g4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g4=NULL where expiry_ticket_g4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g4']!='G4' && $row['expiry_ticket_g4']==NULL)
	{?>
      <form action="ticket_booking/ticketg4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g4" type="submit" class="seat-width-height"  value="G4"/>
      </form>
      <?php  } elseif($row['ticket_g4']=='G4' && $row['expiry_ticket_g4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h4=NULL where expiry_ticket_h4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h4=NULL where expiry_ticket_h4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h4']!='H4' && $row['expiry_ticket_h4']==NULL)
	{?>
      <form action="ticket_booking/ticketh4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h4" type="submit" class="seat-width-height"  value="H4"/>
      </form>
      <?php  } elseif($row['ticket_h4']=='H4' && $row['expiry_ticket_h4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H4"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i4=NULL where expiry_ticket_i4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i4=NULL where expiry_ticket_i4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i4']!='I4' && $row['expiry_ticket_i4']==NULL)
	{?>
      <form action="ticket_booking/ticketi4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i4" type="submit" class="seat-width-height"  value="I4"/>
      </form>
      <?php  } elseif($row['ticket_i4']=='I4' && $row['expiry_ticket_i4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I4"/>
      <?php 
} 

?></td>
    
    <td>	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j4=NULL where expiry_ticket_j4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j4=NULL where expiry_ticket_j4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j4']!='J4' && $row['expiry_ticket_j4']==NULL)
	{?>
      <form action="ticket_booking/ticketj4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j4" type="submit" class="seat-width-height"  value="J4"/>
      </form>
      <?php  } elseif($row['ticket_j4']=='J4' && $row['expiry_ticket_j4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J4"/>
      <?php 
} 

?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_104'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_104'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_104=NULL where expiry_ticket_104 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_104=NULL where expiry_ticket_104 < '".$curtimes."'");

?> 
	<?php if($row['ticket_104']!='104' && $row['expiry_ticket_104']==NULL)
	{?>
      <form action="ticket_booking/ticket104.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_104" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_104" type="submit" class="seat-width-height"  value="104"/>
      </form>
      <?php  } elseif($row['ticket_104']=='104' && $row['expiry_ticket_104']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="104"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="104"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_118'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_118'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_118=NULL where expiry_ticket_118 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_118=NULL where expiry_ticket_118 < '".$curtimes."'");

?> 
	<?php if($row['ticket_118']!='118' && $row['expiry_ticket_118']==NULL)
	{?>
      <form action="ticket_booking/ticket118.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_118" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_118" type="submit" class="seat-width-height"  value="118"/>
      </form>
      <?php  } elseif($row['ticket_118']=='118' && $row['expiry_ticket_118']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="118"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="118"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_132'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_132'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_132=NULL where expiry_ticket_132 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_132=NULL where expiry_ticket_132 < '".$curtimes."'");

?> 
	<?php if($row['ticket_132']!='132' && $row['expiry_ticket_132']==NULL)
	{?>
      <form action="ticket_booking/ticket132.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_132" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_132" type="submit" class="seat-width-height"  value="132"/>
      </form>
      <?php  } elseif($row['ticket_132']=='132' && $row['expiry_ticket_132']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="132"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="132"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_132'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_132'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_132=NULL where expiry_ticket_132 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_132=NULL where expiry_ticket_132 < '".$curtimes."'");

?> 
	<?php if($row['ticket_132']!='132' && $row['expiry_ticket_132']==NULL)
	{?>
      <form action="ticket_booking/ticket132.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_132" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_132" type="submit" class="seat-width-height"  value="132"/>
      </form>
      <?php  } elseif($row['ticket_132']=='132' && $row['expiry_ticket_132']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="132"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="132"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_160'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_160'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_160=NULL where expiry_ticket_160 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_160=NULL where expiry_ticket_160 < '".$curtimes."'");

?> 
	<?php if($row['ticket_160']!='160' && $row['expiry_ticket_160']==NULL)
	{?>
      <form action="ticket_booking/ticket160.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_160" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_160" type="submit" class="seat-width-height"  value="160"/>
      </form>
      <?php  } elseif($row['ticket_160']=='160' && $row['expiry_ticket_160']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="160"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="160"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a5=NULL where expiry_ticket_a5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a5=NULL where expiry_ticket_a5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a5']!='A5' && $row['expiry_ticket_a5']==NULL)
	{?>
      <form action="ticket_booking/ticketa5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a5" type="submit" class="seat-width-height"  value="A5"/>
      </form>
      <?php  } elseif($row['ticket_a5']=='A5' && $row['expiry_ticket_a5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b5=NULL where expiry_ticket_b5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b5=NULL where expiry_ticket_b5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b5']!='B5' && $row['expiry_ticket_b5']==NULL)
	{?>
      <form action="ticket_booking/ticketb5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b5" type="submit" class="seat-width-height"  value="B5"/>
      </form>
      <?php  } elseif($row['ticket_b5']=='B5' && $row['expiry_ticket_b5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c5=NULL where expiry_ticket_c5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c5=NULL where expiry_ticket_c5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c5']!='C5' && $row['expiry_ticket_c5']==NULL)
	{?>
      <form action="ticket_booking/ticketc5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c5" type="submit" class="seat-width-height"  value="C5"/>
      </form>
      <?php  } elseif($row['ticket_c5']=='C5' && $row['expiry_ticket_c5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d5=NULL where expiry_ticket_d5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d5=NULL where expiry_ticket_d5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d5']!='D5' && $row['expiry_ticket_d5']==NULL)
	{?>
      <form action="ticket_booking/ticketd5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d5" type="submit" class="seat-width-height"  value="D5"/>
      </form>
      <?php  } elseif($row['ticket_d5']=='D5' && $row['expiry_ticket_d5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e5=NULL where expiry_ticket_e5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e5=NULL where expiry_ticket_e5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e5']!='E5' && $row['expiry_ticket_e5']==NULL)
	{?>
      <form action="ticket_booking/tickete5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e5" type="submit" class="seat-width-height"  value="E5"/>
      </form>
      <?php  } elseif($row['ticket_e5']=='E5' && $row['expiry_ticket_e5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f5=NULL where expiry_ticket_f5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f5=NULL where expiry_ticket_f5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f5']!='F5' && $row['expiry_ticket_f5']==NULL)
	{?>
      <form action="ticket_booking/ticketf5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f5" type="submit" class="seat-width-height"  value="F5"/>
      </form>
      <?php  } elseif($row['ticket_f5']=='F5' && $row['expiry_ticket_f5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g5=NULL where expiry_ticket_g5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g5=NULL where expiry_ticket_g5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g5']!='G5' && $row['expiry_ticket_g5']==NULL)
	{?>
      <form action="ticket_booking/ticketg5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g5" type="submit" class="seat-width-height"  value="G5"/>
      </form>
      <?php  } elseif($row['ticket_g5']=='G5' && $row['expiry_ticket_g5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h5=NULL where expiry_ticket_h5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h5=NULL where expiry_ticket_h5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h5']!='H5' && $row['expiry_ticket_h5']==NULL)
	{?>
      <form action="ticket_booking/ticketh5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h5" type="submit" class="seat-width-height"  value="H5"/>
      </form>
      <?php  } elseif($row['ticket_h5']=='H5' && $row['expiry_ticket_h5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H5"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i5=NULL where expiry_ticket_i5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i5=NULL where expiry_ticket_i5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i5']!='I5' && $row['expiry_ticket_i5']==NULL)
	{?>
      <form action="ticket_booking/ticketi5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i5" type="submit" class="seat-width-height"  value="I5"/>
      </form>
      <?php  } elseif($row['ticket_i5']=='I5' && $row['expiry_ticket_i5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I5"/>
      <?php 
} 

?></td>
    
    <td>	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j5=NULL where expiry_ticket_j5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j5=NULL where expiry_ticket_j5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j5']!='J5' && $row['expiry_ticket_j5']==NULL)
	{?>
      <form action="ticket_booking/ticketj5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j5" type="submit" class="seat-width-height"  value="J5"/>
      </form>
      <?php  } elseif($row['ticket_j5']=='J5' && $row['expiry_ticket_j5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J5"/>
      <?php 
} 

?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_105'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_105'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_105=NULL where expiry_ticket_105 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_105=NULL where expiry_ticket_105 < '".$curtimes."'");

?> 
	<?php if($row['ticket_105']!='105' && $row['expiry_ticket_105']==NULL)
	{?>
      <form action="ticket_booking/ticket105.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_105" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_105" type="submit" class="seat-width-height"  value="105"/>
      </form>
      <?php  } elseif($row['ticket_105']=='105' && $row['expiry_ticket_105']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="105"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="105"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_119'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_119'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_119=NULL where expiry_ticket_119 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_119=NULL where expiry_ticket_119 < '".$curtimes."'");

?> 
	<?php if($row['ticket_119']!='119' && $row['expiry_ticket_119']==NULL)
	{?>
      <form action="ticket_booking/ticket119.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_119" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_119" type="submit" class="seat-width-height"  value="119"/>
      </form>
      <?php  } elseif($row['ticket_119']=='119' && $row['expiry_ticket_119']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="119"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="119"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_133'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_133'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_133=NULL where expiry_ticket_133 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_133=NULL where expiry_ticket_133 < '".$curtimes."'");

?> 
	<?php if($row['ticket_133']!='133' && $row['expiry_ticket_133']==NULL)
	{?>
      <form action="ticket_booking/ticket133.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_133" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_133" type="submit" class="seat-width-height"  value="133"/>
      </form>
      <?php  } elseif($row['ticket_133']=='133' && $row['expiry_ticket_133']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="133"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="133"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_147'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_147'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_147=NULL where expiry_ticket_147 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_147=NULL where expiry_ticket_147 < '".$curtimes."'");

?> 
	<?php if($row['ticket_147']!='147' && $row['expiry_ticket_147']==NULL)
	{?>
      <form action="ticket_booking/ticket147.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_147" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_147" type="submit" class="seat-width-height"  value="147"/>
      </form>
      <?php  } elseif($row['ticket_147']=='147' && $row['expiry_ticket_147']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="147"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="147"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_161'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_161'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_161=NULL where expiry_ticket_161 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_161=NULL where expiry_ticket_161 < '".$curtimes."'");

?> 
	<?php if($row['ticket_161']!='161' && $row['expiry_ticket_161']==NULL)
	{?>
      <form action="ticket_booking/ticket161.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_161" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_161" type="submit" class="seat-width-height"  value="161"/>
      </form>
      <?php  } elseif($row['ticket_161']=='161' && $row['expiry_ticket_161']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="161"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="161"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a6=NULL where expiry_ticket_a6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a6=NULL where expiry_ticket_a6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a6']!='A6' && $row['expiry_ticket_a6']==NULL)
	{?>
      <form action="ticket_booking/ticketa6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a6" type="submit" class="seat-width-height"  value="A6"/>
      </form>
      <?php  } elseif($row['ticket_a6']=='A6' && $row['expiry_ticket_a6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b6=NULL where expiry_ticket_b6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b6=NULL where expiry_ticket_b6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b6']!='B6' && $row['expiry_ticket_b6']==NULL)
	{?>
      <form action="ticket_booking/ticketb6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b6" type="submit" class="seat-width-height"  value="B6"/>
      </form>
      <?php  } elseif($row['ticket_b6']=='B6' && $row['expiry_ticket_b6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c6=NULL where expiry_ticket_c6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c6=NULL where expiry_ticket_c6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c6']!='C6' && $row['expiry_ticket_c6']==NULL)
	{?>
      <form action="ticket_booking/ticketc6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c6" type="submit" class="seat-width-height"  value="C6"/>
      </form>
      <?php  } elseif($row['ticket_c6']=='C6' && $row['expiry_ticket_c6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d6=NULL where expiry_ticket_d6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d6=NULL where expiry_ticket_d6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d6']!='D6' && $row['expiry_ticket_d6']==NULL)
	{?>
      <form action="ticket_booking/ticketd6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d6" type="submit" class="seat-width-height"  value="D6"/>
      </form>
      <?php  } elseif($row['ticket_d6']=='D6' && $row['expiry_ticket_d6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e6=NULL where expiry_ticket_e6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e6=NULL where expiry_ticket_e6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e6']!='E6' && $row['expiry_ticket_e6']==NULL)
	{?>
      <form action="ticket_booking/tickete6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e6" type="submit" class="seat-width-height"  value="E6"/>
      </form>
      <?php  } elseif($row['ticket_e6']=='E6' && $row['expiry_ticket_e6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f6=NULL where expiry_ticket_f6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f6=NULL where expiry_ticket_f6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f6']!='F6' && $row['expiry_ticket_f6']==NULL)
	{?>
      <form action="ticket_booking/ticketf6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f6" type="submit" class="seat-width-height"  value="F6"/>
      </form>
      <?php  } elseif($row['ticket_f6']=='F6' && $row['expiry_ticket_f6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g6=NULL where expiry_ticket_g6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g6=NULL where expiry_ticket_g6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g6']!='G6' && $row['expiry_ticket_g6']==NULL)
	{?>
      <form action="ticket_booking/ticketg6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g6" type="submit" class="seat-width-height"  value="G6"/>
      </form>
      <?php  } elseif($row['ticket_g6']=='G6' && $row['expiry_ticket_g6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h6=NULL where expiry_ticket_h6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h6=NULL where expiry_ticket_h6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h6']!='H6' && $row['expiry_ticket_h6']==NULL)
	{?>
      <form action="ticket_booking/ticketh6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h6" type="submit" class="seat-width-height"  value="H6"/>
      </form>
      <?php  } elseif($row['ticket_h6']=='H6' && $row['expiry_ticket_h6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H6"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i6=NULL where expiry_ticket_i6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i6=NULL where expiry_ticket_i6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i6']!='I6' && $row['expiry_ticket_i6']==NULL)
	{?>
      <form action="ticket_booking/ticketi6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i6" type="submit" class="seat-width-height"  value="I6"/>
      </form>
      <?php  } elseif($row['ticket_i6']=='I6' && $row['expiry_ticket_i6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I6"/>
      <?php 
} 

?></td>
    
    <td>	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_j6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_j6=NULL where expiry_ticket_j6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_j6=NULL where expiry_ticket_j6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_j6']!='J6' && $row['expiry_ticket_j6']==NULL)
	{?>
      <form action="ticket_booking/ticketj6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_j6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_j6" type="submit" class="seat-width-height"  value="J6"/>
      </form>
      <?php  } elseif($row['ticket_j6']=='J6' && $row['expiry_ticket_j6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="J6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="J6"/>
      <?php 
} 

?></td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_106'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_106'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_106=NULL where expiry_ticket_106 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_106=NULL where expiry_ticket_106 < '".$curtimes."'");

?> 
	<?php if($row['ticket_106']!='106' && $row['expiry_ticket_106']==NULL)
	{?>
      <form action="ticket_booking/ticket106.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_106" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_106" type="submit" class="seat-width-height"  value="106"/>
      </form>
      <?php  } elseif($row['ticket_106']=='106' && $row['expiry_ticket_106']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="106"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="106"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_120'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_120'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_120=NULL where expiry_ticket_120 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_120=NULL where expiry_ticket_120 < '".$curtimes."'");

?> 
	<?php if($row['ticket_120']!='120' && $row['expiry_ticket_120']==NULL)
	{?>
      <form action="ticket_booking/ticket120.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_120" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_120" type="submit" class="seat-width-height"  value="120"/>
      </form>
      <?php  } elseif($row['ticket_120']=='120' && $row['expiry_ticket_120']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="120"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="120"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_134'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_134'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_134=NULL where expiry_ticket_134 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_134=NULL where expiry_ticket_134 < '".$curtimes."'");

?> 
	<?php if($row['ticket_134']!='134' && $row['expiry_ticket_134']==NULL)
	{?>
      <form action="ticket_booking/ticket134.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_134" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_134" type="submit" class="seat-width-height"  value="134"/>
      </form>
      <?php  } elseif($row['ticket_134']=='134' && $row['expiry_ticket_134']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="134"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="134"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_148'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_148'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_148=NULL where expiry_ticket_148 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_148=NULL where expiry_ticket_148 < '".$curtimes."'");

?> 
	<?php if($row['ticket_148']!='148' && $row['expiry_ticket_148']==NULL)
	{?>
      <form action="ticket_booking/ticket148.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_148" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_148" type="submit" class="seat-width-height"  value="148"/>
      </form>
      <?php  } elseif($row['ticket_148']=='148' && $row['expiry_ticket_148']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="148"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="148"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_162'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_162'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_162=NULL where expiry_ticket_162 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_162=NULL where expiry_ticket_162 < '".$curtimes."'");

?> 
	<?php if($row['ticket_162']!='162' && $row['expiry_ticket_162']==NULL)
	{?>
      <form action="ticket_booking/ticket162.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_162" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_162" type="submit" class="seat-width-height"  value="162"/>
      </form>
      <?php  } elseif($row['ticket_162']=='162' && $row['expiry_ticket_162']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="162"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="162"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a7=NULL where expiry_ticket_a7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a7=NULL where expiry_ticket_a7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a7']!='A7' && $row['expiry_ticket_a7']==NULL)
	{?>
      <form action="ticket_booking/ticketa7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a7" type="submit" class="seat-width-height"  value="A7"/>
      </form>
      <?php  } elseif($row['ticket_a7']=='A7' && $row['expiry_ticket_a7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b7=NULL where expiry_ticket_b7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b7=NULL where expiry_ticket_b7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b7']!='B7' && $row['expiry_ticket_b7']==NULL)
	{?>
      <form action="ticket_booking/ticketb7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b7" type="submit" class="seat-width-height"  value="B7"/>
      </form>
      <?php  } elseif($row['ticket_b7']=='B7' && $row['expiry_ticket_b7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c7=NULL where expiry_ticket_c7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c7=NULL where expiry_ticket_c7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c7']!='C7' && $row['expiry_ticket_c7']==NULL)
	{?>
      <form action="ticket_booking/ticketc7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c7" type="submit" class="seat-width-height"  value="C7"/>
      </form>
      <?php  } elseif($row['ticket_c7']=='C7' && $row['expiry_ticket_c7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d7=NULL where expiry_ticket_d7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d7=NULL where expiry_ticket_d7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d7']!='D7' && $row['expiry_ticket_d7']==NULL)
	{?>
      <form action="ticket_booking/ticketd7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d7" type="submit" class="seat-width-height"  value="D7"/>
      </form>
      <?php  } elseif($row['ticket_d7']=='D7' && $row['expiry_ticket_d7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e7=NULL where expiry_ticket_e7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e7=NULL where expiry_ticket_e7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e7']!='E7' && $row['expiry_ticket_e7']==NULL)
	{?>
      <form action="ticket_booking/tickete7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e7" type="submit" class="seat-width-height"  value="E7"/>
      </form>
      <?php  } elseif($row['ticket_e7']=='E7' && $row['expiry_ticket_e7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f7=NULL where expiry_ticket_f7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f7=NULL where expiry_ticket_f7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f7']!='F7' && $row['expiry_ticket_f7']==NULL)
	{?>
      <form action="ticket_booking/ticketf7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f7" type="submit" class="seat-width-height"  value="F7"/>
      </form>
      <?php  } elseif($row['ticket_f7']=='F7' && $row['expiry_ticket_f7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g7=NULL where expiry_ticket_g7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g7=NULL where expiry_ticket_g7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g7']!='G7' && $row['expiry_ticket_g7']==NULL)
	{?>
      <form action="ticket_booking/ticketg7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g7" type="submit" class="seat-width-height"  value="G7"/>
      </form>
      <?php  } elseif($row['ticket_g7']=='G7' && $row['expiry_ticket_g7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h7=NULL where expiry_ticket_h7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h7=NULL where expiry_ticket_h7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h7']!='H7' && $row['expiry_ticket_h7']==NULL)
	{?>
      <form action="ticket_booking/ticketh7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h7" type="submit" class="seat-width-height"  value="H7"/>
      </form>
      <?php  } elseif($row['ticket_h7']=='H7' && $row['expiry_ticket_h7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H7"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i7=NULL where expiry_ticket_i7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i7=NULL where expiry_ticket_i7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i7']!='I7' && $row['expiry_ticket_i7']==NULL)
	{?>
      <form action="ticket_booking/ticketi7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i7" type="submit" class="seat-width-height"  value="I7"/>
      </form>
      <?php  } elseif($row['ticket_i7']=='I7' && $row['expiry_ticket_i7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I7"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_107'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_107'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_107=NULL where expiry_ticket_107 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_107=NULL where expiry_ticket_107 < '".$curtimes."'");

?> 
	<?php if($row['ticket_107']!='107' && $row['expiry_ticket_107']==NULL)
	{?>
      <form action="ticket_booking/ticket107.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_107" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_107" type="submit" class="seat-width-height"  value="107"/>
      </form>
      <?php  } elseif($row['ticket_107']=='107' && $row['expiry_ticket_107']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="107"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="107"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_121'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_121'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_121=NULL where expiry_ticket_121 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_121=NULL where expiry_ticket_121 < '".$curtimes."'");

?> 
	<?php if($row['ticket_121']!='121' && $row['expiry_ticket_121']==NULL)
	{?>
      <form action="ticket_booking/ticket121.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_121" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_121" type="submit" class="seat-width-height"  value="121"/>
      </form>
      <?php  } elseif($row['ticket_121']=='121' && $row['expiry_ticket_121']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="121"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="121"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_135'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_135'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_135=NULL where expiry_ticket_135 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_135=NULL where expiry_ticket_135 < '".$curtimes."'");

?> 
	<?php if($row['ticket_135']!='135' && $row['expiry_ticket_135']==NULL)
	{?>
      <form action="ticket_booking/ticket135.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_135" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_135" type="submit" class="seat-width-height"  value="135"/>
      </form>
      <?php  } elseif($row['ticket_135']=='135' && $row['expiry_ticket_135']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="135"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="135"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_149'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_149'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_149=NULL where expiry_ticket_149 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_149=NULL where expiry_ticket_149 < '".$curtimes."'");

?> 
	<?php if($row['ticket_149']!='149' && $row['expiry_ticket_149']==NULL)
	{?>
      <form action="ticket_booking/ticket149.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_149" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_149" type="submit" class="seat-width-height"  value="149"/>
      </form>
      <?php  } elseif($row['ticket_149']=='149' && $row['expiry_ticket_149']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="149"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="149"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_163'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_163'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_163=NULL where expiry_ticket_163 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_163=NULL where expiry_ticket_163 < '".$curtimes."'");

?> 
	<?php if($row['ticket_163']!='163' && $row['expiry_ticket_163']==NULL)
	{?>
      <form action="ticket_booking/ticket163.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_163" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_163" type="submit" class="seat-width-height"  value="163"/>
      </form>
      <?php  } elseif($row['ticket_163']=='163' && $row['expiry_ticket_163']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="163"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="163"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a8=NULL where expiry_ticket_a8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a8=NULL where expiry_ticket_a8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a8']!='A8' && $row['expiry_ticket_a8']==NULL)
	{?>
      <form action="ticket_booking/ticketa8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a8" type="submit" class="seat-width-height"  value="A8"/>
      </form>
      <?php  } elseif($row['ticket_a8']=='A8' && $row['expiry_ticket_a8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b8=NULL where expiry_ticket_b8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b8=NULL where expiry_ticket_b8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b8']!='B8' && $row['expiry_ticket_b8']==NULL)
	{?>
      <form action="ticket_booking/ticketb8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b8" type="submit" class="seat-width-height"  value="B8"/>
      </form>
      <?php  } elseif($row['ticket_b8']=='B8' && $row['expiry_ticket_b8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c8=NULL where expiry_ticket_c8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c8=NULL where expiry_ticket_c8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c8']!='C8' && $row['expiry_ticket_c8']==NULL)
	{?>
      <form action="ticket_booking/ticketc8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c8" type="submit" class="seat-width-height"  value="C8"/>
      </form>
      <?php  } elseif($row['ticket_c8']=='C8' && $row['expiry_ticket_c8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d8=NULL where expiry_ticket_d8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d8=NULL where expiry_ticket_d8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d8']!='D8' && $row['expiry_ticket_d8']==NULL)
	{?>
      <form action="ticket_booking/ticketd8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d8" type="submit" class="seat-width-height"  value="D8"/>
      </form>
      <?php  } elseif($row['ticket_d8']=='D8' && $row['expiry_ticket_d8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e8=NULL where expiry_ticket_e8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e8=NULL where expiry_ticket_e8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e8']!='E8' && $row['expiry_ticket_e8']==NULL)
	{?>
      <form action="ticket_booking/tickete8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e8" type="submit" class="seat-width-height"  value="E8"/>
      </form>
      <?php  } elseif($row['ticket_e8']=='E8' && $row['expiry_ticket_e8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f8=NULL where expiry_ticket_f8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f8=NULL where expiry_ticket_f8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f8']!='F8' && $row['expiry_ticket_f8']==NULL)
	{?>
      <form action="ticket_booking/ticketf8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f8" type="submit" class="seat-width-height"  value="F8"/>
      </form>
      <?php  } elseif($row['ticket_f8']=='F8' && $row['expiry_ticket_f8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g8=NULL where expiry_ticket_g8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g8=NULL where expiry_ticket_g8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g8']!='G8' && $row['expiry_ticket_g8']==NULL)
	{?>
      <form action="ticket_booking/ticketg8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g8" type="submit" class="seat-width-height"  value="G8"/>
      </form>
      <?php  } elseif($row['ticket_g8']=='G8' && $row['expiry_ticket_g8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h8=NULL where expiry_ticket_h8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h8=NULL where expiry_ticket_h8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h8']!='H8' && $row['expiry_ticket_h8']==NULL)
	{?>
      <form action="ticket_booking/ticketh8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h8" type="submit" class="seat-width-height"  value="H8"/>
      </form>
      <?php  } elseif($row['ticket_h8']=='H8' && $row['expiry_ticket_h8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H8"/>
      <?php 
} 

?></td>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i8=NULL where expiry_ticket_i8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i8=NULL where expiry_ticket_i8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i8']!='I8' && $row['expiry_ticket_i8']==NULL)
	{?>
      <form action="ticket_booking/ticketi8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i8" type="submit" class="seat-width-height"  value="I8"/>
      </form>
      <?php  } elseif($row['ticket_i8']=='I8' && $row['expiry_ticket_i8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I8"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_108'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_108'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_108=NULL where expiry_ticket_108 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_108=NULL where expiry_ticket_108 < '".$curtimes."'");

?> 
	<?php if($row['ticket_108']!='108' && $row['expiry_ticket_108']==NULL)
	{?>
      <form action="ticket_booking/ticket108.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_108" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_108" type="submit" class="seat-width-height"  value="108"/>
      </form>
      <?php  } elseif($row['ticket_108']=='108' && $row['expiry_ticket_108']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="108"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="108"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_122'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_122'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_122=NULL where expiry_ticket_122 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_122=NULL where expiry_ticket_122 < '".$curtimes."'");

?> 
	<?php if($row['ticket_122']!='122' && $row['expiry_ticket_122']==NULL)
	{?>
      <form action="ticket_booking/ticket122.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_122" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_122" type="submit" class="seat-width-height"  value="122"/>
      </form>
      <?php  } elseif($row['ticket_122']=='122' && $row['expiry_ticket_122']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="122"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="122"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_136'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_136'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_136=NULL where expiry_ticket_136 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_136=NULL where expiry_ticket_136 < '".$curtimes."'");

?> 
	<?php if($row['ticket_136']!='136' && $row['expiry_ticket_136']==NULL)
	{?>
      <form action="ticket_booking/ticket136.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_136" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_136" type="submit" class="seat-width-height"  value="136"/>
      </form>
      <?php  } elseif($row['ticket_136']=='136' && $row['expiry_ticket_136']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="136"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="136"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_150'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_150'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_150=NULL where expiry_ticket_150 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_150=NULL where expiry_ticket_150 < '".$curtimes."'");

?> 
	<?php if($row['ticket_150']!='150' && $row['expiry_ticket_150']==NULL)
	{?>
      <form action="ticket_booking/ticket150.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_150" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_150" type="submit" class="seat-width-height"  value="150"/>
      </form>
      <?php  } elseif($row['ticket_150']=='150' && $row['expiry_ticket_150']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="150"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="150"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a9=NULL where expiry_ticket_a9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a9=NULL where expiry_ticket_a9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a9']!='A9' && $row['expiry_ticket_a9']==NULL)
	{?>
      <form action="ticket_booking/ticketa9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a9" type="submit" class="seat-width-height"  value="A9"/>
      </form>
      <?php  } elseif($row['ticket_a9']=='A9' && $row['expiry_ticket_a9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b9=NULL where expiry_ticket_b9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b9=NULL where expiry_ticket_b9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b9']!='B9' && $row['expiry_ticket_b9']==NULL)
	{?>
      <form action="ticket_booking/ticketb9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b9" type="submit" class="seat-width-height"  value="B9"/>
      </form>
      <?php  } elseif($row['ticket_b9']=='B9' && $row['expiry_ticket_b9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c9=NULL where expiry_ticket_c9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c9=NULL where expiry_ticket_c9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c9']!='C9' && $row['expiry_ticket_c9']==NULL)
	{?>
      <form action="ticket_booking/ticketc9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c9" type="submit" class="seat-width-height"  value="C9"/>
      </form>
      <?php  } elseif($row['ticket_c9']=='C9' && $row['expiry_ticket_c9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d9=NULL where expiry_ticket_d9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d9=NULL where expiry_ticket_d9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d9']!='D9' && $row['expiry_ticket_d9']==NULL)
	{?>
      <form action="ticket_booking/ticketd9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d9" type="submit" class="seat-width-height"  value="D9"/>
      </form>
      <?php  } elseif($row['ticket_d9']=='D9' && $row['expiry_ticket_d9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e9=NULL where expiry_ticket_e9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e9=NULL where expiry_ticket_e9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e9']!='E9' && $row['expiry_ticket_e9']==NULL)
	{?>
      <form action="ticket_booking/tickete9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e9" type="submit" class="seat-width-height"  value="E9"/>
      </form>
      <?php  } elseif($row['ticket_e9']=='E9' && $row['expiry_ticket_e9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f9=NULL where expiry_ticket_f9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f9=NULL where expiry_ticket_f9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f9']!='F9' && $row['expiry_ticket_f9']==NULL)
	{?>
      <form action="ticket_booking/ticketf9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f9" type="submit" class="seat-width-height"  value="F9"/>
      </form>
      <?php  } elseif($row['ticket_f9']=='F9' && $row['expiry_ticket_f9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g9=NULL where expiry_ticket_g9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g9=NULL where expiry_ticket_g9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g9']!='G9' && $row['expiry_ticket_g9']==NULL)
	{?>
      <form action="ticket_booking/ticketg9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g9" type="submit" class="seat-width-height"  value="G9"/>
      </form>
      <?php  } elseif($row['ticket_g9']=='G9' && $row['expiry_ticket_g9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h9=NULL where expiry_ticket_h9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h9=NULL where expiry_ticket_h9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h9']!='H9' && $row['expiry_ticket_h9']==NULL)
	{?>
      <form action="ticket_booking/ticketh9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h9" type="submit" class="seat-width-height"  value="H9"/>
      </form>
      <?php  } elseif($row['ticket_h9']=='H9' && $row['expiry_ticket_h9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i9=NULL where expiry_ticket_i9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i9=NULL where expiry_ticket_i9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i9']!='I9' && $row['expiry_ticket_i9']==NULL)
	{?>
      <form action="ticket_booking/ticketi9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i9" type="submit" class="seat-width-height"  value="I9"/>
      </form>
      <?php  } elseif($row['ticket_i9']=='I9' && $row['expiry_ticket_i9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I9"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_109'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_109'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_109=NULL where expiry_ticket_109 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_109=NULL where expiry_ticket_109 < '".$curtimes."'");

?> 
	<?php if($row['ticket_109']!='109' && $row['expiry_ticket_109']==NULL)
	{?>
      <form action="ticket_booking/ticket109.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_109" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_109" type="submit" class="seat-width-height"  value="109"/>
      </form>
      <?php  } elseif($row['ticket_109']=='109' && $row['expiry_ticket_109']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="109"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="109"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_123'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_123'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_123=NULL where expiry_ticket_123 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_123=NULL where expiry_ticket_123 < '".$curtimes."'");

?> 
	<?php if($row['ticket_123']!='123' && $row['expiry_ticket_123']==NULL)
	{?>
      <form action="ticket_booking/ticket123.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_123" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_123" type="submit" class="seat-width-height"  value="123"/>
      </form>
      <?php  } elseif($row['ticket_123']=='123' && $row['expiry_ticket_123']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="123"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="123"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_137'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_137'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_137=NULL where expiry_ticket_137 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_137=NULL where expiry_ticket_137 < '".$curtimes."'");

?> 
	<?php if($row['ticket_137']!='137' && $row['expiry_ticket_137']==NULL)
	{?>
      <form action="ticket_booking/ticket137.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_137" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_137" type="submit" class="seat-width-height"  value="137"/>
      </form>
      <?php  } elseif($row['ticket_137']=='137' && $row['expiry_ticket_137']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="137"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="137"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_151'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_151'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_151=NULL where expiry_ticket_151 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_151=NULL where expiry_ticket_151 < '".$curtimes."'");

?> 
	<?php if($row['ticket_151']!='151' && $row['expiry_ticket_151']==NULL)
	{?>
      <form action="ticket_booking/ticket151.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_151" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_151" type="submit" class="seat-width-height"  value="151"/>
      </form>
      <?php  } elseif($row['ticket_151']=='151' && $row['expiry_ticket_151']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="151"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="151"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a10=NULL where expiry_ticket_a10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a10=NULL where expiry_ticket_a10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a10']!='A10' && $row['expiry_ticket_a10']==NULL)
	{?>
      <form action="ticket_booking/ticketa10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a10" type="submit" class="seat-width-height"  value="A10"/>
      </form>
      <?php  } elseif($row['ticket_a10']=='A10' && $row['expiry_ticket_a10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b10=NULL where expiry_ticket_b10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b10=NULL where expiry_ticket_b10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b10']!='B10' && $row['expiry_ticket_b10']==NULL)
	{?>
      <form action="ticket_booking/ticketb10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b10" type="submit" class="seat-width-height"  value="B10"/>
      </form>
      <?php  } elseif($row['ticket_b10']=='B10' && $row['expiry_ticket_b10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c10=NULL where expiry_ticket_c10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c10=NULL where expiry_ticket_c10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c10']!='C10' && $row['expiry_ticket_c10']==NULL)
	{?>
      <form action="ticket_booking/ticketc10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c10" type="submit" class="seat-width-height"  value="C10"/>
      </form>
      <?php  } elseif($row['ticket_c10']=='C10' && $row['expiry_ticket_c10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d10=NULL where expiry_ticket_d10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d10=NULL where expiry_ticket_d10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d10']!='D10' && $row['expiry_ticket_d10']==NULL)
	{?>
      <form action="ticket_booking/ticketd10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d10" type="submit" class="seat-width-height"  value="D10"/>
      </form>
      <?php  } elseif($row['ticket_d10']=='D10' && $row['expiry_ticket_d10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e10=NULL where expiry_ticket_e10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e10=NULL where expiry_ticket_e10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e10']!='E10' && $row['expiry_ticket_e10']==NULL)
	{?>
      <form action="ticket_booking/tickete10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e10" type="submit" class="seat-width-height"  value="E10"/>
      </form>
      <?php  } elseif($row['ticket_e10']=='E10' && $row['expiry_ticket_e10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f10=NULL where expiry_ticket_f10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f10=NULL where expiry_ticket_f10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f10']!='F10' && $row['expiry_ticket_f10']==NULL)
	{?>
      <form action="ticket_booking/ticketf10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f10" type="submit" class="seat-width-height"  value="F10"/>
      </form>
      <?php  } elseif($row['ticket_f10']=='F10' && $row['expiry_ticket_f10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g10=NULL where expiry_ticket_g10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g10=NULL where expiry_ticket_g10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g10']!='G10' && $row['expiry_ticket_g10']==NULL)
	{?>
      <form action="ticket_booking/ticketg10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g10" type="submit" class="seat-width-height"  value="G10"/>
      </form>
      <?php  } elseif($row['ticket_g10']=='G10' && $row['expiry_ticket_g10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h10=NULL where expiry_ticket_h10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h10=NULL where expiry_ticket_h10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h10']!='H10' && $row['expiry_ticket_h10']==NULL)
	{?>
      <form action="ticket_booking/ticketh10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h10" type="submit" class="seat-width-height"  value="H10"/>
      </form>
      <?php  } elseif($row['ticket_h10']=='H10' && $row['expiry_ticket_h10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i10=NULL where expiry_ticket_i10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i10=NULL where expiry_ticket_i10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i10']!='I10' && $row['expiry_ticket_i10']==NULL)
	{?>
      <form action="ticket_booking/ticketi10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i10" type="submit" class="seat-width-height"  value="I10"/>
      </form>
      <?php  } elseif($row['ticket_i10']=='I10' && $row['expiry_ticket_i10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I10"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_110'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_110'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_110=NULL where expiry_ticket_110 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_110=NULL where expiry_ticket_110 < '".$curtimes."'");

?> 
	<?php if($row['ticket_110']!='110' && $row['expiry_ticket_110']==NULL)
	{?>
      <form action="ticket_booking/ticket110.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_110" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_110" type="submit" class="seat-width-height"  value="110"/>
      </form>
      <?php  } elseif($row['ticket_110']=='110' && $row['expiry_ticket_110']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="110"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="110"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_124'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_124'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_124=NULL where expiry_ticket_124 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_124=NULL where expiry_ticket_124 < '".$curtimes."'");

?> 
	<?php if($row['ticket_124']!='124' && $row['expiry_ticket_124']==NULL)
	{?>
      <form action="ticket_booking/ticket124.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_124" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_124" type="submit" class="seat-width-height"  value="124"/>
      </form>
      <?php  } elseif($row['ticket_124']=='124' && $row['expiry_ticket_124']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="124"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="124"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_138'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_138'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_138=NULL where expiry_ticket_138 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_138=NULL where expiry_ticket_138 < '".$curtimes."'");

?> 
	<?php if($row['ticket_138']!='138' && $row['expiry_ticket_138']==NULL)
	{?>
      <form action="ticket_booking/ticket138.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_138" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_138" type="submit" class="seat-width-height"  value="138"/>
      </form>
      <?php  } elseif($row['ticket_138']=='138' && $row['expiry_ticket_138']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="138"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="138"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_138'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_138'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_138=NULL where expiry_ticket_138 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_138=NULL where expiry_ticket_138 < '".$curtimes."'");

?> 
	<?php if($row['ticket_138']!='138' && $row['expiry_ticket_138']==NULL)
	{?>
      <form action="ticket_booking/ticket138.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_138" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_138" type="submit" class="seat-width-height"  value="138"/>
      </form>
      <?php  } elseif($row['ticket_138']=='138' && $row['expiry_ticket_138']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="138"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="138"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a11=NULL where expiry_ticket_a11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a11=NULL where expiry_ticket_a11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a11']!='A11' && $row['expiry_ticket_a11']==NULL)
	{?>
      <form action="ticket_booking/ticketa11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a11" type="submit" class="seat-width-height"  value="A11"/>
      </form>
      <?php  } elseif($row['ticket_a11']=='A11' && $row['expiry_ticket_a11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b11=NULL where expiry_ticket_b11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b11=NULL where expiry_ticket_b11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b11']!='B11' && $row['expiry_ticket_b11']==NULL)
	{?>
      <form action="ticket_booking/ticketb11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b11" type="submit" class="seat-width-height"  value="B11"/>
      </form>
      <?php  } elseif($row['ticket_b11']=='B11' && $row['expiry_ticket_b11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c11=NULL where expiry_ticket_c11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c11=NULL where expiry_ticket_c11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c11']!='C11' && $row['expiry_ticket_c11']==NULL)
	{?>
      <form action="ticket_booking/ticketc11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c11" type="submit" class="seat-width-height"  value="C11"/>
      </form>
      <?php  } elseif($row['ticket_c11']=='C11' && $row['expiry_ticket_c11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d11=NULL where expiry_ticket_d11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d11=NULL where expiry_ticket_d11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d11']!='D11' && $row['expiry_ticket_d11']==NULL)
	{?>
      <form action="ticket_booking/ticketd11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d11" type="submit" class="seat-width-height"  value="D11"/>
      </form>
      <?php  } elseif($row['ticket_d11']=='D11' && $row['expiry_ticket_d11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e11=NULL where expiry_ticket_e11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e11=NULL where expiry_ticket_e11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e11']!='E11' && $row['expiry_ticket_e11']==NULL)
	{?>
      <form action="ticket_booking/tickete11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e11" type="submit" class="seat-width-height"  value="E11"/>
      </form>
      <?php  } elseif($row['ticket_e11']=='E11' && $row['expiry_ticket_e11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f11=NULL where expiry_ticket_f11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f11=NULL where expiry_ticket_f11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f11']!='F11' && $row['expiry_ticket_f11']==NULL)
	{?>
      <form action="ticket_booking/ticketf11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f11" type="submit" class="seat-width-height"  value="F11"/>
      </form>
      <?php  } elseif($row['ticket_f11']=='F11' && $row['expiry_ticket_f11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g11=NULL where expiry_ticket_g11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g11=NULL where expiry_ticket_g11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g11']!='G11' && $row['expiry_ticket_g11']==NULL)
	{?>
      <form action="ticket_booking/ticketg11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g11" type="submit" class="seat-width-height"  value="G11"/>
      </form>
      <?php  } elseif($row['ticket_g11']=='G11' && $row['expiry_ticket_g11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h11=NULL where expiry_ticket_h11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h11=NULL where expiry_ticket_h11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h11']!='H11' && $row['expiry_ticket_h11']==NULL)
	{?>
      <form action="ticket_booking/ticketh11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h11" type="submit" class="seat-width-height"  value="H11"/>
      </form>
      <?php  } elseif($row['ticket_h11']=='H11' && $row['expiry_ticket_h11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i11=NULL where expiry_ticket_i11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i11=NULL where expiry_ticket_i11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i11']!='I11' && $row['expiry_ticket_i11']==NULL)
	{?>
      <form action="ticket_booking/ticketi11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i11" type="submit" class="seat-width-height"  value="I11"/>
      </form>
      <?php  } elseif($row['ticket_i11']=='I11' && $row['expiry_ticket_i11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I11"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i11=NULL where expiry_ticket_i11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i11=NULL where expiry_ticket_i11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i11']!='I11' && $row['expiry_ticket_i11']==NULL)
	{?>
      <form action="ticket_booking/ticketi11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i11" type="submit" class="seat-width-height"  value="I11"/>
      </form>
      <?php  } elseif($row['ticket_i11']=='I11' && $row['expiry_ticket_i11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I11"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_125'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_125'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_125=NULL where expiry_ticket_125 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_125=NULL where expiry_ticket_125 < '".$curtimes."'");

?> 
	<?php if($row['ticket_125']!='125' && $row['expiry_ticket_125']==NULL)
	{?>
      <form action="ticket_booking/ticket125.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_125" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_125" type="submit" class="seat-width-height"  value="125"/>
      </form>
      <?php  } elseif($row['ticket_125']=='125' && $row['expiry_ticket_125']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="125"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="125"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_139'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_139'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_139=NULL where expiry_ticket_139 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_139=NULL where expiry_ticket_139 < '".$curtimes."'");

?> 
	<?php if($row['ticket_139']!='139' && $row['expiry_ticket_139']==NULL)
	{?>
      <form action="ticket_booking/ticket139.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_139" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_139" type="submit" class="seat-width-height"  value="139"/>
      </form>
      <?php  } elseif($row['ticket_139']=='139' && $row['expiry_ticket_139']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="139"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="139"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_153'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_153'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_153=NULL where expiry_ticket_153 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_153=NULL where expiry_ticket_153 < '".$curtimes."'");

?> 
	<?php if($row['ticket_153']!='153' && $row['expiry_ticket_153']==NULL)
	{?>
      <form action="ticket_booking/ticket153.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_153" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_153" type="submit" class="seat-width-height"  value="153"/>
      </form>
      <?php  } elseif($row['ticket_153']=='153' && $row['expiry_ticket_153']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="153"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="153"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a12=NULL where expiry_ticket_a12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a12=NULL where expiry_ticket_a12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a12']!='A12' && $row['expiry_ticket_a12']==NULL)
	{?>
      <form action="ticket_booking/ticketa12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a12" type="submit" class="seat-width-height"  value="A12"/>
      </form>
      <?php  } elseif($row['ticket_a12']=='A12' && $row['expiry_ticket_a12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b12=NULL where expiry_ticket_b12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b12=NULL where expiry_ticket_b12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b12']!='B12' && $row['expiry_ticket_b12']==NULL)
	{?>
      <form action="ticket_booking/ticketb12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b12" type="submit" class="seat-width-height"  value="B12"/>
      </form>
      <?php  } elseif($row['ticket_b12']=='B12' && $row['expiry_ticket_b12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c12']!='C12' && $row['expiry_ticket_c12']==NULL)
	{?>
      <form action="ticket_booking/ticketc12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c12" type="submit" class="seat-width-height"  value="C12"/>
      </form>
      <?php  } elseif($row['ticket_c12']=='C12' && $row['expiry_ticket_c12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c12']!='C12' && $row['expiry_ticket_c12']==NULL)
	{?>
      <form action="ticket_booking/ticketc12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c12" type="submit" class="seat-width-height"  value="C12"/>
      </form>
      <?php  } elseif($row['ticket_c12']=='C12' && $row['expiry_ticket_c12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e12=NULL where expiry_ticket_e12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e12=NULL where expiry_ticket_e12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e12']!='E12' && $row['expiry_ticket_e12']==NULL)
	{?>
      <form action="ticket_booking/tickete12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e12" type="submit" class="seat-width-height"  value="E12"/>
      </form>
      <?php  } elseif($row['ticket_e12']=='E12' && $row['expiry_ticket_e12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f12=NULL where expiry_ticket_f12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f12=NULL where expiry_ticket_f12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f12']!='F12' && $row['expiry_ticket_f12']==NULL)
	{?>
      <form action="ticket_booking/ticketf12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f12" type="submit" class="seat-width-height"  value="F12"/>
      </form>
      <?php  } elseif($row['ticket_f12']=='F12' && $row['expiry_ticket_f12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g12=NULL where expiry_ticket_g12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g12=NULL where expiry_ticket_g12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g12']!='G12' && $row['expiry_ticket_g12']==NULL)
	{?>
      <form action="ticket_booking/ticketg12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g12" type="submit" class="seat-width-height"  value="G12"/>
      </form>
      <?php  } elseif($row['ticket_g12']=='G12' && $row['expiry_ticket_g12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h12=NULL where expiry_ticket_h12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h12=NULL where expiry_ticket_h12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h12']!='H12' && $row['expiry_ticket_h12']==NULL)
	{?>
      <form action="ticket_booking/ticketh12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h12" type="submit" class="seat-width-height"  value="H12"/>
      </form>
      <?php  } elseif($row['ticket_h12']=='H12' && $row['expiry_ticket_h12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i12=NULL where expiry_ticket_i12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i12=NULL where expiry_ticket_i12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i12']!='I12' && $row['expiry_ticket_i12']==NULL)
	{?>
      <form action="ticket_booking/ticketi12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i12" type="submit" class="seat-width-height"  value="I12"/>
      </form>
      <?php  } elseif($row['ticket_i12']=='I12' && $row['expiry_ticket_i12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I12"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_112'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_112'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_112=NULL where expiry_ticket_112 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_112=NULL where expiry_ticket_112 < '".$curtimes."'");

?> 
	<?php if($row['ticket_112']!='112' && $row['expiry_ticket_112']==NULL)
	{?>
      <form action="ticket_booking/ticket112.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_112" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_112" type="submit" class="seat-width-height"  value="112"/>
      </form>
      <?php  } elseif($row['ticket_112']=='112' && $row['expiry_ticket_112']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="112"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="112"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_126'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_126'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_126=NULL where expiry_ticket_126 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_126=NULL where expiry_ticket_126 < '".$curtimes."'");

?> 
	<?php if($row['ticket_126']!='126' && $row['expiry_ticket_126']==NULL)
	{?>
      <form action="ticket_booking/ticket126.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_126" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_126" type="submit" class="seat-width-height"  value="126"/>
      </form>
      <?php  } elseif($row['ticket_126']=='126' && $row['expiry_ticket_126']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="126"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="126"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_140'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_140'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_140=NULL where expiry_ticket_140 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_140=NULL where expiry_ticket_140 < '".$curtimes."'");

?> 
	<?php if($row['ticket_140']!='140' && $row['expiry_ticket_140']==NULL)
	{?>
      <form action="ticket_booking/ticket140.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_140" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_140" type="submit" class="seat-width-height"  value="140"/>
      </form>
      <?php  } elseif($row['ticket_140']=='140' && $row['expiry_ticket_140']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="140"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="140"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_154'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_154'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_154=NULL where expiry_ticket_154 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_154=NULL where expiry_ticket_154 < '".$curtimes."'");

?> 
	<?php if($row['ticket_154']!='154' && $row['expiry_ticket_154']==NULL)
	{?>
      <form action="ticket_booking/ticket154.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_154" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_154" type="submit" class="seat-width-height"  value="154"/>
      </form>
      <?php  } elseif($row['ticket_154']=='154' && $row['expiry_ticket_154']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="154"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="154"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a13=NULL where expiry_ticket_a13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a13=NULL where expiry_ticket_a13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a13']!='A13' && $row['expiry_ticket_a13']==NULL)
	{?>
      <form action="ticket_booking/ticketa13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a13" type="submit" class="seat-width-height"  value="A13"/>
      </form>
      <?php  } elseif($row['ticket_a13']=='A13' && $row['expiry_ticket_a13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b13=NULL where expiry_ticket_b13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b13=NULL where expiry_ticket_b13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b13']!='B13' && $row['expiry_ticket_b13']==NULL)
	{?>
      <form action="ticket_booking/ticketb13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b13" type="submit" class="seat-width-height"  value="B13"/>
      </form>
      <?php  } elseif($row['ticket_b13']=='B13' && $row['expiry_ticket_b13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c13=NULL where expiry_ticket_c13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c13=NULL where expiry_ticket_c13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c13']!='C13' && $row['expiry_ticket_c13']==NULL)
	{?>
      <form action="ticket_booking/ticketc13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c13" type="submit" class="seat-width-height"  value="C13"/>
      </form>
      <?php  } elseif($row['ticket_c13']=='C13' && $row['expiry_ticket_c13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C13"/>
      <?php 
} 

?></td>

    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d13=NULL where expiry_ticket_d13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d13=NULL where expiry_ticket_d13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d13']!='D13' && $row['expiry_ticket_d13']==NULL)
	{?>
      <form action="ticket_booking/ticketd13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d13" type="submit" class="seat-width-height"  value="D13"/>
      </form>
      <?php  } elseif($row['ticket_d13']=='D13' && $row['expiry_ticket_d13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e13=NULL where expiry_ticket_e13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e13=NULL where expiry_ticket_e13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e13']!='E13' && $row['expiry_ticket_e13']==NULL)
	{?>
      <form action="ticket_booking/tickete13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e13" type="submit" class="seat-width-height"  value="E13"/>
      </form>
      <?php  } elseif($row['ticket_e13']=='E13' && $row['expiry_ticket_e13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f13=NULL where expiry_ticket_f13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f13=NULL where expiry_ticket_f13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f13']!='F13' && $row['expiry_ticket_f13']==NULL)
	{?>
      <form action="ticket_booking/ticketf13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f13" type="submit" class="seat-width-height"  value="F13"/>
      </form>
      <?php  } elseif($row['ticket_f13']=='F13' && $row['expiry_ticket_f13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g13=NULL where expiry_ticket_g13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g13=NULL where expiry_ticket_g13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g13']!='G13' && $row['expiry_ticket_g13']==NULL)
	{?>
      <form action="ticket_booking/ticketg13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g13" type="submit" class="seat-width-height"  value="G13"/>
      </form>
      <?php  } elseif($row['ticket_g13']=='G13' && $row['expiry_ticket_g13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h13=NULL where expiry_ticket_h13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h13=NULL where expiry_ticket_h13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h13']!='H13' && $row['expiry_ticket_h13']==NULL)
	{?>
      <form action="ticket_booking/ticketh13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h13" type="submit" class="seat-width-height"  value="H13"/>
      </form>
      <?php  } elseif($row['ticket_h13']=='H13' && $row['expiry_ticket_h13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_i13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_i13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_i13=NULL where expiry_ticket_i13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_i13=NULL where expiry_ticket_i13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_i13']!='I13' && $row['expiry_ticket_i13']==NULL)
	{?>
      <form action="ticket_booking/ticketi13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_i13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_i13" type="submit" class="seat-width-height"  value="I13"/>
      </form>
      <?php  } elseif($row['ticket_i13']=='I13' && $row['expiry_ticket_i13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="I13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="I13"/>
      <?php 
} 

?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">		<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_113'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_113'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_113=NULL where expiry_ticket_113 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_113=NULL where expiry_ticket_113 < '".$curtimes."'");

?> 
	<?php if($row['ticket_113']!='113' && $row['expiry_ticket_113']==NULL)
	{?>
      <form action="ticket_booking/ticket113.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_113" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_113" type="submit" class="seat-width-height"  value="113"/>
      </form>
      <?php  } elseif($row['ticket_113']=='113' && $row['expiry_ticket_113']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="113"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="113"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_127'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_127'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_127=NULL where expiry_ticket_127 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_127=NULL where expiry_ticket_127 < '".$curtimes."'");

?> 
	<?php if($row['ticket_127']!='127' && $row['expiry_ticket_127']==NULL)
	{?>
      <form action="ticket_booking/ticket127.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_127" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_127" type="submit" class="seat-width-height"  value="127"/>
      </form>
      <?php  } elseif($row['ticket_127']=='127' && $row['expiry_ticket_127']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="127"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="127"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_141'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_141'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_141=NULL where expiry_ticket_141 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_141=NULL where expiry_ticket_141 < '".$curtimes."'");

?> 
	<?php if($row['ticket_141']!='141' && $row['expiry_ticket_141']==NULL)
	{?>
      <form action="ticket_booking/ticket141.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_141" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_141" type="submit" class="seat-width-height"  value="141"/>
      </form>
      <?php  } elseif($row['ticket_141']=='141' && $row['expiry_ticket_141']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="141"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="141"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_155'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_155'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_155=NULL where expiry_ticket_155 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_155=NULL where expiry_ticket_155 < '".$curtimes."'");

?> 
	<?php if($row['ticket_155']!='155' && $row['expiry_ticket_155']==NULL)
	{?>
      <form action="ticket_booking/ticket155.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_155" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_155" type="submit" class="seat-width-height"  value="155"/>
      </form>
      <?php  } elseif($row['ticket_155']=='155' && $row['expiry_ticket_155']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="155"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="155"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a14=NULL where expiry_ticket_a14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a14=NULL where expiry_ticket_a14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a14']!='A14' && $row['expiry_ticket_a14']==NULL)
	{?>
      <form action="ticket_booking/ticketa14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a14" type="submit" class="seat-width-height"  value="A14"/>
      </form>
      <?php  } elseif($row['ticket_a14']=='A14' && $row['expiry_ticket_a14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b14=NULL where expiry_ticket_b14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b14=NULL where expiry_ticket_b14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b14']!='B14' && $row['expiry_ticket_b14']==NULL)
	{?>
      <form action="ticket_booking/ticketb14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b14" type="submit" class="seat-width-height"  value="B14"/>
      </form>
      <?php  } elseif($row['ticket_b14']=='B14' && $row['expiry_ticket_b14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c14=NULL where expiry_ticket_c14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c14=NULL where expiry_ticket_c14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c14']!='C14' && $row['expiry_ticket_c14']==NULL)
	{?>
      <form action="ticket_booking/ticketc14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c14" type="submit" class="seat-width-height"  value="C14"/>
      </form>
      <?php  } elseif($row['ticket_c14']=='C14' && $row['expiry_ticket_c14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d14=NULL where expiry_ticket_d14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d14=NULL where expiry_ticket_d14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d14']!='D14' && $row['expiry_ticket_d14']==NULL)
	{?>
      <form action="ticket_booking/ticketd14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d14" type="submit" class="seat-width-height"  value="D14"/>
      </form>
      <?php  } elseif($row['ticket_d14']=='D14' && $row['expiry_ticket_d14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e14=NULL where expiry_ticket_e14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e14=NULL where expiry_ticket_e14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e14']!='E14' && $row['expiry_ticket_e14']==NULL)
	{?>
      <form action="ticket_booking/tickete14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e14" type="submit" class="seat-width-height"  value="E14"/>
      </form>
      <?php  } elseif($row['ticket_e14']=='E14' && $row['expiry_ticket_e14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_f14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_f14=NULL where expiry_ticket_f14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_f14=NULL where expiry_ticket_f14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_f14']!='F14' && $row['expiry_ticket_f14']==NULL)
	{?>
      <form action="ticket_booking/ticketf14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_f14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_f14" type="submit" class="seat-width-height"  value="F14"/>
      </form>
      <?php  } elseif($row['ticket_f14']=='F14' && $row['expiry_ticket_f14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="F14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="F14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_g14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_g14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_g14=NULL where expiry_ticket_g14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g14=NULL where expiry_ticket_g14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g14']!='G14' && $row['expiry_ticket_g14']==NULL)
	{?>
      <form action="ticket_booking/ticketg14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g14" type="submit" class="seat-width-height"  value="G14"/>
      </form>
      <?php  } elseif($row['ticket_g14']=='G14' && $row['expiry_ticket_g14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="G14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="G14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_h14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_h14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_h14=NULL where expiry_ticket_h14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_h14=NULL where expiry_ticket_h14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_h14']!='H14' && $row['expiry_ticket_h14']==NULL)
	{?>
      <form action="ticket_booking/ticketh14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_h14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_h14" type="submit" class="seat-width-height"  value="H14"/>
      </form>
      <?php  } elseif($row['ticket_h14']=='H14' && $row['expiry_ticket_h14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="H14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="H14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_114'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_114'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_114=NULL where expiry_ticket_114 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_114=NULL where expiry_ticket_114 < '".$curtimes."'");

?> 
	<?php if($row['ticket_114']!='114' && $row['expiry_ticket_114']==NULL)
	{?>
      <form action="ticket_booking/ticket114.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_114" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_114" type="submit" class="seat-width-height"  value="114"/>
      </form>
      <?php  } elseif($row['ticket_114']=='114' && $row['expiry_ticket_114']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="114"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="114"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_128'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_128'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_128=NULL where expiry_ticket_128 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_128=NULL where expiry_ticket_128 < '".$curtimes."'");

?> 
	<?php if($row['ticket_128']!='128' && $row['expiry_ticket_128']==NULL)
	{?>
      <form action="ticket_booking/ticket128.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_128" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_128" type="submit" class="seat-width-height"  value="128"/>
      </form>
      <?php  } elseif($row['ticket_128']=='128' && $row['expiry_ticket_128']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="128"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="128"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_142'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_142'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_142=NULL where expiry_ticket_142 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_142=NULL where expiry_ticket_142 < '".$curtimes."'");

?> 
	<?php if($row['ticket_142']!='142' && $row['expiry_ticket_142']==NULL)
	{?>
      <form action="ticket_booking/ticket142.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_142" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_142" type="submit" class="seat-width-height"  value="142"/>
      </form>
      <?php  } elseif($row['ticket_142']=='142' && $row['expiry_ticket_142']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="142"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="142"/>
      <?php 
} 

?></td>
    <td width="114" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_156'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_156'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_156=NULL where expiry_ticket_156 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_156=NULL where expiry_ticket_156 < '".$curtimes."'");

?> 
	<?php if($row['ticket_156']!='156' && $row['expiry_ticket_156']==NULL)
	{?>
      <form action="ticket_booking/ticket156.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_156" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_156" type="submit" class="seat-width-height"  value="156"/>
      </form>
      <?php  } elseif($row['ticket_156']=='156' && $row['expiry_ticket_156']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="156"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="156"/>
      <?php 
} 

?></td>
    <td width="48" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a15=NULL where expiry_ticket_a15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a15=NULL where expiry_ticket_a15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a15']!='A15' && $row['expiry_ticket_a15']==NULL)
	{?>
      <form action="ticket_booking/ticketa15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a15" type="submit" class="seat-width-height"  value="A15"/>
      </form>
      <?php  } elseif($row['ticket_a15']=='A15' && $row['expiry_ticket_a15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b15=NULL where expiry_ticket_b15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b15=NULL where expiry_ticket_b15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b15']!='B15' && $row['expiry_ticket_b15']==NULL)
	{?>
      <form action="ticket_booking/ticketb15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b15" type="submit" class="seat-width-height"  value="B15"/>
      </form>
      <?php  } elseif($row['ticket_b15']=='B15' && $row['expiry_ticket_b15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c15=NULL where expiry_ticket_c15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c15=NULL where expiry_ticket_c15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c15']!='C15' && $row['expiry_ticket_c15']==NULL)
	{?>
      <form action="ticket_booking/ticketc15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c15" type="submit" class="seat-width-height"  value="C15"/>
      </form>
      <?php  } elseif($row['ticket_c15']=='C15' && $row['expiry_ticket_c15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d15=NULL where expiry_ticket_d15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d15=NULL where expiry_ticket_d15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d15']!='D15' && $row['expiry_ticket_d15']==NULL)
	{?>
      <form action="ticket_booking/ticketd15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d15" type="submit" class="seat-width-height"  value="D15"/>
      </form>
      <?php  } elseif($row['ticket_d15']=='D15' && $row['expiry_ticket_d15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e15=NULL where expiry_ticket_e15 < '".$curtimes."'");
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
    <td width="82" align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_a16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a16=NULL where expiry_ticket_a16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a16=NULL where expiry_ticket_a16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a16']!='A16' && $row['expiry_ticket_a16']==NULL)
	{?>
      <form action="ticket_booking/ticketa16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a16" type="submit" class="seat-width-height"  value="A16"/>
      </form>
      <?php  } elseif($row['ticket_a16']=='A16' && $row['expiry_ticket_a16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A16"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_b16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b16=NULL where expiry_ticket_b16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b16=NULL where expiry_ticket_b16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b16']!='B16' && $row['expiry_ticket_b16']==NULL)
	{?>
      <form action="ticket_booking/ticketb16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b16" type="submit" class="seat-width-height"  value="B16"/>
      </form>
      <?php  } elseif($row['ticket_b16']=='B16' && $row['expiry_ticket_b16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B16"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_c16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c16=NULL where expiry_ticket_c16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c16=NULL where expiry_ticket_c16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c16']!='C16' && $row['expiry_ticket_c16']==NULL)
	{?>
      <form action="ticket_booking/ticketc16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c16" type="submit" class="seat-width-height"  value="C16"/>
      </form>
      <?php  } elseif($row['ticket_c16']=='C16' && $row['expiry_ticket_c16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C16"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_d16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d16=NULL where expiry_ticket_d16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d16=NULL where expiry_ticket_d16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d16']!='D16' && $row['expiry_ticket_d16']==NULL)
	{?>
      <form action="ticket_booking/ticketd16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d16" type="submit" class="seat-width-height"  value="D16"/>
      </form>
      <?php  } elseif($row['ticket_d16']=='D16' && $row['expiry_ticket_d16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D16"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  $rowexp['expiry_ticket_e16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e16=NULL where expiry_ticket_e16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e16=NULL where expiry_ticket_e16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e16']!='E16' && $row['expiry_ticket_e16']==NULL)
	{?>
      <form action="ticket_booking/tickete16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e16" type="submit" class="seat-width-height"  value="E16"/>
      </form>
      <?php  } elseif($row['ticket_e16']=='E16' && $row['expiry_ticket_e16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E16"/>
      <?php 
} 
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
    <td colspan="16" align="center" valign="top"></td>
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
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a1=NULL where expiry_ticket_a1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a1=NULL where expiry_ticket_a1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a1']!='A1' && $row['expiry_ticket_a1']==NULL)
	{?>
      <form action="ticket_booking/ticketa1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a1" type="submit" class="seat-width-height"  value="A1"/>
      </form>
      <?php  } 
	  elseif($row['ticket_a1']=='A1' && $row['expiry_ticket_a1']=='BOOKED') 
	  { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A1"/>
      <?php 
} 

else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A1"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a2=NULL where expiry_ticket_a2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a2=NULL where expiry_ticket_a2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a2']!='A2' && $row['expiry_ticket_a2']==NULL)
	{?>
      <form action="ticket_booking/ticketa2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a2" type="submit" class="seat-width-height"  value="A2"/>
      </form>
      <?php  } elseif($row['ticket_a2']=='A2' && $row['expiry_ticket_a2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A2"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a3=NULL where expiry_ticket_a3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a3=NULL where expiry_ticket_a3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a3']!='A3' && $row['expiry_ticket_a3']==NULL)
	{?>
      <form action="ticket_booking/ticketa3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a3" type="submit" class="seat-width-height"  value="A3"/>
      </form>
      <?php  } elseif($row['ticket_a3']=='A3' && $row['expiry_ticket_a3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A3"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a4=NULL where expiry_ticket_a4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a4=NULL where expiry_ticket_a4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a4']!='A4' && $row['expiry_ticket_a4']==NULL)
	{?>
      <form action="ticket_booking/ticketa4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a4" type="submit" class="seat-width-height"  value="A4"/>
      </form>
      <?php  } elseif($row['ticket_a4']=='A4' && $row['expiry_ticket_a4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A4"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a5=NULL where expiry_ticket_a5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a5=NULL where expiry_ticket_a5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a5']!='A5' && $row['expiry_ticket_a5']==NULL)
	{?>
      <form action="ticket_booking/ticketa5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a5" type="submit" class="seat-width-height"  value="A5"/>
      </form>
      <?php  } elseif($row['ticket_a5']=='A5' && $row['expiry_ticket_a5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A5"/>
      <?php 
} 

?></td>
  <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a6=NULL where expiry_ticket_a6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a6=NULL where expiry_ticket_a6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a6']!='A6' && $row['expiry_ticket_a6']==NULL)
	{?>
      <form action="ticket_booking/ticketa6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a6" type="submit" class="seat-width-height"  value="A6"/>
      </form>
      <?php  } elseif($row['ticket_a6']=='A6' && $row['expiry_ticket_a6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A6"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a6=NULL where expiry_ticket_a7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a7=NULL where expiry_ticket_a7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a7']!='A7' && $row['expiry_ticket_a7']==NULL)
	{?>
      <form action="ticket_booking/ticketa7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a7" type="submit" class="seat-width-height"  value="A7"/>
      </form>
      <?php  } elseif($row['ticket_a7']=='A7' && $row['expiry_ticket_a7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A7"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a8=NULL where expiry_ticket_a8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a8=NULL where expiry_ticket_a8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a8']!='A8' && $row['expiry_ticket_a8']==NULL)
	{?>
      <form action="ticket_booking/ticketa8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a8" type="submit" class="seat-width-height"  value="A8"/>
      </form>
      <?php  } elseif($row['ticket_a8']=='A8' && $row['expiry_ticket_a8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A8"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a9=NULL where expiry_ticket_a9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a9=NULL where expiry_ticket_a9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a9']!='A9' && $row['expiry_ticket_a9']==NULL)
	{?>
      <form action="ticket_booking/ticketa9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a9" type="submit" class="seat-width-height"  value="A9"/>
      </form>
      <?php  } elseif($row['ticket_a9']=='A9' && $row['expiry_ticket_a9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a10=NULL where expiry_ticket_a10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a10=NULL where expiry_ticket_a10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a10']!='A10' && $row['expiry_ticket_a10']==NULL)
	{?>
      <form action="ticket_booking/ticketa10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a10" type="submit" class="seat-width-height"  value="A10"/>
      </form>
      <?php  } elseif($row['ticket_a10']=='A10' && $row['expiry_ticket_a10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a11=NULL where expiry_ticket_a11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a11=NULL where expiry_ticket_a11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a11']!='A11' && $row['expiry_ticket_a11']==NULL)
	{?>
      <form action="ticket_booking/ticketa11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a11" type="submit" class="seat-width-height"  value="A11"/>
      </form>
      <?php  } elseif($row['ticket_a11']=='A11' && $row['expiry_ticket_a11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a12=NULL where expiry_ticket_a12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a12=NULL where expiry_ticket_a12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a12']!='A12' && $row['expiry_ticket_a12']==NULL)
	{?>
      <form action="ticket_booking/ticketa12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a12" type="submit" class="seat-width-height"  value="A12"/>
      </form>
      <?php  } elseif($row['ticket_a12']=='A12' && $row['expiry_ticket_a12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a13=NULL where expiry_ticket_a13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a13=NULL where expiry_ticket_a13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a13']!='A13' && $row['expiry_ticket_a13']==NULL)
	{?>
      <form action="ticket_booking/ticketa13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a13" type="submit" class="seat-width-height"  value="A13"/>
      </form>
      <?php  } elseif($row['ticket_a13']=='A13' && $row['expiry_ticket_a13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a14=NULL where expiry_ticket_a14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a14=NULL where expiry_ticket_a14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a14']!='A14' && $row['expiry_ticket_a14']==NULL)
	{?>
      <form action="ticket_booking/ticketa14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a14" type="submit" class="seat-width-height"  value="A14"/>
      </form>
      <?php  } elseif($row['ticket_a14']=='A14' && $row['expiry_ticket_a14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a15=NULL where expiry_ticket_a15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a15=NULL where expiry_ticket_a15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a15']!='A15' && $row['expiry_ticket_a15']==NULL)
	{?>
      <form action="ticket_booking/ticketa15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a15" type="submit" class="seat-width-height"  value="A15"/>
      </form>
      <?php  } elseif($row['ticket_a15']=='A15' && $row['expiry_ticket_a15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a16=NULL where expiry_ticket_a16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a16=NULL where expiry_ticket_a16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a16']!='A16' && $row['expiry_ticket_a16']==NULL)
	{?>
      <form action="ticket_booking/ticketa16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a16" type="submit" class="seat-width-height"  value="A16"/>
      </form>
      <?php  } elseif($row['ticket_a16']=='A16' && $row['expiry_ticket_a16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A16"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a17'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a17'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a17=NULL where expiry_ticket_a17 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a17=NULL where expiry_ticket_a17 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a17']!='A17' && $row['expiry_ticket_a17']==NULL)
	{?>
      <form action="ticket_booking/ticketa17.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a17" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a17" type="submit" class="seat-width-height"  value="A17"/>
      </form>
      <?php  } elseif($row['ticket_a17']=='A17' && $row['expiry_ticket_a17']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A17"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A17"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a18'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a18'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a18=NULL where expiry_ticket_a18 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a18=NULL where expiry_ticket_a18 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a18']!='A18' && $row['expiry_ticket_a18']==NULL)
	{?>
      <form action="ticket_booking/ticketa18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a18" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a18" type="submit" class="seat-width-height"  value="A18"/>
      </form>
      <?php  } elseif($row['ticket_a18']=='A18' && $row['expiry_ticket_a18']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A18"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A18"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a18'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a18'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a18=NULL where expiry_ticket_a18 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a18=NULL where expiry_ticket_a18 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a18']!='A18' && $row['expiry_ticket_a18']==NULL)
	{?>
      <form action="ticket_booking/ticketa18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a18" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a18" type="submit" class="seat-width-height"  value="A18"/>
      </form>
      <?php  } elseif($row['ticket_a18']=='A18' && $row['expiry_ticket_a18']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A18"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A18"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a20'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a20'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a20=NULL where expiry_ticket_a20 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a20=NULL where expiry_ticket_a20 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a20']!='A20' && $row['expiry_ticket_a20']==NULL)
	{?>
      <form action="ticket_booking/ticketa20.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a20" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a20" type="submit" class="seat-width-height"  value="A20"/>
      </form>
      <?php  } elseif($row['ticket_a20']=='A20' && $row['expiry_ticket_a20']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A20"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A20"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a21'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a21'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a21=NULL where expiry_ticket_a21 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a21=NULL where expiry_ticket_a21 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a21']!='A21' && $row['expiry_ticket_a21']==NULL)
	{?>
      <form action="ticket_booking/ticketa21.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a21" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a21" type="submit" class="seat-width-height"  value="A21"/>
      </form>
      <?php  } elseif($row['ticket_a21']=='A21' && $row['expiry_ticket_a21']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A21"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A21"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a22'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a22'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a22=NULL where expiry_ticket_a22 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a22=NULL where expiry_ticket_a22 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a22']!='A22' && $row['expiry_ticket_a22']==NULL)
	{?>
      <form action="ticket_booking/ticketa22.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a22" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a22" type="submit" class="seat-width-height"  value="A22"/>
      </form>
      <?php  } elseif($row['ticket_a22']=='A22' && $row['expiry_ticket_a22']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A22"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A22"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a23'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a23'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a23=NULL where expiry_ticket_a23 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a23=NULL where expiry_ticket_a23 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a23']!='A23' && $row['expiry_ticket_a23']==NULL)
	{?>
      <form action="ticket_booking/ticketa23.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a23" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a23" type="submit" class="seat-width-height"  value="A23"/>
      </form>
      <?php  } elseif($row['ticket_a23']=='A23' && $row['expiry_ticket_a23']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A23"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A23"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a24'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a24'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a24=NULL where expiry_ticket_a24 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a24=NULL where expiry_ticket_a24 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a24']!='A24' && $row['expiry_ticket_a24']==NULL)
	{?>
      <form action="ticket_booking/ticketa24.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a24" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a24" type="submit" class="seat-width-height"  value="A24"/>
      </form>
      <?php  } elseif($row['ticket_a24']=='A24' && $row['expiry_ticket_a24']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A24"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A24"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a25'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a25'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a25=NULL where expiry_ticket_a25 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a25=NULL where expiry_ticket_a25 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a25']!='A25' && $row['expiry_ticket_a25']==NULL)
	{?>
      <form action="ticket_booking/ticketa25.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a25" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a25" type="submit" class="seat-width-height"  value="A25"/>
      </form>
      <?php  } elseif($row['ticket_a25']=='A25' && $row['expiry_ticket_a25']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A25"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A25"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a26'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a26'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a26=NULL where expiry_ticket_a26 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a26=NULL where expiry_ticket_a26 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a26']!='A26' && $row['expiry_ticket_a26']==NULL)
	{?>
      <form action="ticket_booking/ticketa26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a26" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a26" type="submit" class="seat-width-height"  value="A26"/>
      </form>
      <?php  } elseif($row['ticket_a26']=='A26' && $row['expiry_ticket_a26']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A26"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A26"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a27'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a27'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a27=NULL where expiry_ticket_a27 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a27=NULL where expiry_ticket_a27 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a27']!='A27' && $row['expiry_ticket_a27']==NULL)
	{?>
      <form action="ticket_booking/ticketa27.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a27" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a27" type="submit" class="seat-width-height"  value="A27"/>
      </form>
      <?php  } elseif($row['ticket_a27']=='A27' && $row['expiry_ticket_a27']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A27"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A27"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a28'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a28'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a28=NULL where expiry_ticket_a28 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a28=NULL where expiry_ticket_a28 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a28']!='A28' && $row['expiry_ticket_a28']==NULL)
	{?>
      <form action="ticket_booking/ticketa28.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a28" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a28" type="submit" class="seat-width-height"  value="A28"/>
      </form>
      <?php  } elseif($row['ticket_a28']=='A28' && $row['expiry_ticket_a28']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A28"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A28"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a29'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a29'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a29=NULL where expiry_ticket_a29 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a29=NULL where expiry_ticket_a29 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a29']!='A29' && $row['expiry_ticket_a29']==NULL)
	{?>
      <form action="ticket_booking/ticketa29.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a29" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a29" type="submit" class="seat-width-height"  value="A29"/>
      </form>
      <?php  } elseif($row['ticket_a29']=='A29' && $row['expiry_ticket_a29']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A29"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A29"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a30'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a30'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a30=NULL where expiry_ticket_a30 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a30=NULL where expiry_ticket_a30 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a30']!='A30' && $row['expiry_ticket_a30']==NULL)
	{?>
      <form action="ticket_booking/ticketa30.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a30" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a30" type="submit" class="seat-width-height"  value="A30"/>
      </form>
      <?php  } elseif($row['ticket_a30']=='A30' && $row['expiry_ticket_a30']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A30"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A30"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a31'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a31'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a31=NULL where expiry_ticket_a31 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a31=NULL where expiry_ticket_a31 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a31']!='A31' && $row['expiry_ticket_a31']==NULL)
	{?>
      <form action="ticket_booking/ticketa31.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a31" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a31" type="submit" class="seat-width-height"  value="A31"/>
      </form>
      <?php  } elseif($row['ticket_a31']=='A31' && $row['expiry_ticket_a31']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A31"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A31"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a32'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a32'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a32=NULL where expiry_ticket_a32 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a32=NULL where expiry_ticket_a32 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a32']!='A32' && $row['expiry_ticket_a32']==NULL)
	{?>
      <form action="ticket_booking/ticketa32.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a32" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a32" type="submit" class="seat-width-height"  value="A32"/>
      </form>
      <?php  } elseif($row['ticket_a32']=='A32' && $row['expiry_ticket_a32']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A32"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A32"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a33'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a33'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a33=NULL where expiry_ticket_a33 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a33=NULL where expiry_ticket_a33 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a33']!='A33' && $row['expiry_ticket_a33']==NULL)
	{?>
      <form action="ticket_booking/ticketa33.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a33" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a33" type="submit" class="seat-width-height"  value="A33"/>
      </form>
      <?php  } elseif($row['ticket_a33']=='A33' && $row['expiry_ticket_a33']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A33"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A33"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a34'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a34'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a34=NULL where expiry_ticket_a34 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a34=NULL where expiry_ticket_a34 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a34']!='A34' && $row['expiry_ticket_a34']==NULL)
	{?>
      <form action="ticket_booking/ticketa34.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a34" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a34" type="submit" class="seat-width-height"  value="A34"/>
      </form>
      <?php  } elseif($row['ticket_a34']=='A34' && $row['expiry_ticket_a34']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A34"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A34"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a35'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a35'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a35=NULL where expiry_ticket_a35 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a35=NULL where expiry_ticket_a35 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a35']!='A35' && $row['expiry_ticket_a35']==NULL)
	{?>
      <form action="ticket_booking/ticketa35.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a35" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a35" type="submit" class="seat-width-height"  value="A35"/>
      </form>
      <?php  } elseif($row['ticket_a35']=='A35' && $row['expiry_ticket_a35']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A35"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A35"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a36'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a36'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a36=NULL where expiry_ticket_a36 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a36=NULL where expiry_ticket_a36 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a36']!='A36' && $row['expiry_ticket_a36']==NULL)
	{?>
      <form action="ticket_booking/ticketa36.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a36" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a36" type="submit" class="seat-width-height"  value="A36"/>
      </form>
      <?php  } elseif($row['ticket_a36']=='A36' && $row['expiry_ticket_a36']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A36"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A36"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a37'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a37'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a37=NULL where expiry_ticket_a37 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a37=NULL where expiry_ticket_a37 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a37']!='A37' && $row['expiry_ticket_a37']==NULL)
	{?>
      <form action="ticket_booking/ticketa37.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a37" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a37" type="submit" class="seat-width-height"  value="A37"/>
      </form>
      <?php  } elseif($row['ticket_a37']=='A37' && $row['expiry_ticket_a37']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A37"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A37"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a38'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a38'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a38=NULL where expiry_ticket_a38 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a38=NULL where expiry_ticket_a38 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a38']!='A38' && $row['expiry_ticket_a38']==NULL)
	{?>
      <form action="ticket_booking/ticketa38.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a38" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a38" type="submit" class="seat-width-height"  value="A38"/>
      </form>
      <?php  } elseif($row['ticket_a38']=='A38' && $row['expiry_ticket_a38']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A38"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A38"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a39'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a39'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a39=NULL where expiry_ticket_a39 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a39=NULL where expiry_ticket_a39 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a39']!='A39' && $row['expiry_ticket_a39']==NULL)
	{?>
      <form action="ticket_booking/ticketa39.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a39" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a39" type="submit" class="seat-width-height"  value="A39"/>
      </form>
      <?php  } elseif($row['ticket_a39']=='A39' && $row['expiry_ticket_a39']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A39"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A39"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a40'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a40'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a40=NULL where expiry_ticket_a40 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a40=NULL where expiry_ticket_a40 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a40']!='A40' && $row['expiry_ticket_a40']==NULL)
	{?>
      <form action="ticket_booking/ticketa40.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a40" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a40" type="submit" class="seat-width-height"  value="A40"/>
      </form>
      <?php  } elseif($row['ticket_a40']=='A40' && $row['expiry_ticket_a40']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A40"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A40"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a41'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a41'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a41=NULL where expiry_ticket_a41 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a41=NULL where expiry_ticket_a41 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a41']!='A41' && $row['expiry_ticket_a41']==NULL)
	{?>
      <form action="ticket_booking/ticketa41.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a41" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a41" type="submit" class="seat-width-height"  value="A41"/>
      </form>
      <?php  } elseif($row['ticket_a41']=='A41' && $row['expiry_ticket_a41']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A41"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A41"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a42'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a42'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a42=NULL where expiry_ticket_a42 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a42=NULL where expiry_ticket_a42 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a42']!='A42' && $row['expiry_ticket_a42']==NULL)
	{?>
      <form action="ticket_booking/ticketa42.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a42" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a42" type="submit" class="seat-width-height"  value="A42"/>
      </form>
      <?php  } elseif($row['ticket_a42']=='A42' && $row['expiry_ticket_a42']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A42"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A42"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a43'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a43'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a43=NULL where expiry_ticket_a43 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a43=NULL where expiry_ticket_a43 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a43']!='A43' && $row['expiry_ticket_a43']==NULL)
	{?>
      <form action="ticket_booking/ticketa43.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a43" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a43" type="submit" class="seat-width-height"  value="A43"/>
      </form>
      <?php  } elseif($row['ticket_a43']=='A43' && $row['expiry_ticket_a43']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A43"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A43"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a44'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a44'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a44=NULL where expiry_ticket_a44 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a44=NULL where expiry_ticket_a44 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a44']!='A44' && $row['expiry_ticket_a44']==NULL)
	{?>
      <form action="ticket_booking/ticketa44.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a44" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a44" type="submit" class="seat-width-height"  value="A44"/>
      </form>
      <?php  } elseif($row['ticket_a44']=='A44' && $row['expiry_ticket_a44']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A44"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A44"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a45'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a45'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a45=NULL where expiry_ticket_a45 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a45=NULL where expiry_ticket_a45 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a45']!='A45' && $row['expiry_ticket_a45']==NULL)
	{?>
      <form action="ticket_booking/ticketa45.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a45" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a45" type="submit" class="seat-width-height"  value="A45"/>
      </form>
      <?php  } elseif($row['ticket_a45']=='A45' && $row['expiry_ticket_a45']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A45"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A45"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a46'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a46'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a46=NULL where expiry_ticket_a46 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a46=NULL where expiry_ticket_a46 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a46']!='A46' && $row['expiry_ticket_a46']==NULL)
	{?>
      <form action="ticket_booking/ticketa46.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a46" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a46" type="submit" class="seat-width-height"  value="A46"/>
      </form>
      <?php  } elseif($row['ticket_a46']=='A46' && $row['expiry_ticket_a46']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A46"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A46"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a47'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a47'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a47=NULL where expiry_ticket_a47 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a47=NULL where expiry_ticket_a47 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a47']!='A47' && $row['expiry_ticket_a47']==NULL)
	{?>
      <form action="ticket_booking/ticketa47.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a47" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a47" type="submit" class="seat-width-height"  value="A47"/>
      </form>
      <?php  } elseif($row['ticket_a47']=='A47' && $row['expiry_ticket_a47']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A47"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A47"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a48'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a48'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a48=NULL where expiry_ticket_a48 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a48=NULL where expiry_ticket_a48 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a48']!='A48' && $row['expiry_ticket_a48']==NULL)
	{?>
      <form action="ticket_booking/ticketa48.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a48" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a48" type="submit" class="seat-width-height"  value="A48"/>
      </form>
      <?php  } elseif($row['ticket_a48']=='A48' && $row['expiry_ticket_a48']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A48"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A48"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a49'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a49'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a49=NULL where expiry_ticket_a49 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a49=NULL where expiry_ticket_a49 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a49']!='A49' && $row['expiry_ticket_a49']==NULL)
	{?>
      <form action="ticket_booking/ticketa49.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a49" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a49" type="submit" class="seat-width-height"  value="A49"/>
      </form>
      <?php  } elseif($row['ticket_a49']=='A49' && $row['expiry_ticket_a49']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A49"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A49"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a50'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a50'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a50=NULL where expiry_ticket_a50 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a50=NULL where expiry_ticket_a50 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a50']!='A50' && $row['expiry_ticket_a50']==NULL)
	{?>
      <form action="ticket_booking/ticketa50.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a50" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a50" type="submit" class="seat-width-height"  value="A50"/>
      </form>
      <?php  } elseif($row['ticket_a50']=='A50' && $row['expiry_ticket_a50']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A50"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A50"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a51'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a51'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a51=NULL where expiry_ticket_a51 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a51=NULL where expiry_ticket_a51 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a51']!='A51' && $row['expiry_ticket_a51']==NULL)
	{?>
      <form action="ticket_booking/ticketa51.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a51" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a51" type="submit" class="seat-width-height"  value="A51"/>
      </form>
      <?php  } elseif($row['ticket_a51']=='A51' && $row['expiry_ticket_a51']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A51"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A51"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a52'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a52'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a52=NULL where expiry_ticket_a52 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a52=NULL where expiry_ticket_a52 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a52']!='A52' && $row['expiry_ticket_a52']==NULL)
	{?>
      <form action="ticket_booking/ticketa52.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a52" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a52" type="submit" class="seat-width-height"  value="A52"/>
      </form>
      <?php  } elseif($row['ticket_a52']=='A52' && $row['expiry_ticket_a52']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A52"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A52"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a53'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a53'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a53=NULL where expiry_ticket_a53 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a53=NULL where expiry_ticket_a53 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a53']!='A53' && $row['expiry_ticket_a53']==NULL)
	{?>
      <form action="ticket_booking/ticketa53.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a53" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a53" type="submit" class="seat-width-height"  value="A53"/>
      </form>
      <?php  } elseif($row['ticket_a53']=='A53' && $row['expiry_ticket_a53']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A53"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A53"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a54'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a54'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a54=NULL where expiry_ticket_a54 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a54=NULL where expiry_ticket_a54 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a54']!='A54' && $row['expiry_ticket_a54']==NULL)
	{?>
      <form action="ticket_booking/ticketa54.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a54" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a54" type="submit" class="seat-width-height"  value="A54"/>
      </form>
      <?php  } elseif($row['ticket_a54']=='A54' && $row['expiry_ticket_a54']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A54"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A54"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a55'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_a55'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_a55=NULL where expiry_ticket_a55 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a55=NULL where expiry_ticket_a55 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a55']!='A55' && $row['expiry_ticket_a55']==NULL)
	{?>
      <form action="ticket_booking/ticketa55.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_a55" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_a55" type="submit" class="seat-width-height"  value="A55"/>
      </form>
      <?php  } elseif($row['ticket_a55']=='A55' && $row['expiry_ticket_a55']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="A55"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="A55"/>
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
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b1=NULL where expiry_ticket_b1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b1=NULL where expiry_ticket_b1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b1']!='B1' && $row['expiry_ticket_b1']==NULL)
	{?>
      <form action="ticket_booking/ticketb1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b1" type="submit" class="seat-width-height"  value="B1"/>
      </form>
      <?php  } elseif($row['ticket_b1']=='B1' && $row['expiry_ticket_b1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B1"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b2=NULL where expiry_ticket_b2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b2=NULL where expiry_ticket_b2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b2']!='B2' && $row['expiry_ticket_b2']==NULL)
	{?>
      <form action="ticket_booking/ticketb2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b2" type="submit" class="seat-width-height"  value="B2"/>
      </form>
      <?php  } elseif($row['ticket_b2']=='B2' && $row['expiry_ticket_b2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B2"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b3=NULL where expiry_ticket_b3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b3=NULL where expiry_ticket_b3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b3']!='B3' && $row['expiry_ticket_b3']==NULL)
	{?>
      <form action="ticket_booking/ticketb3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b3" type="submit" class="seat-width-height"  value="B3"/>
      </form>
      <?php  } elseif($row['ticket_b3']=='B3' && $row['expiry_ticket_b3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B3"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b4=NULL where expiry_ticket_b4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b4=NULL where expiry_ticket_b4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b4']!='B4' && $row['expiry_ticket_b4']==NULL)
	{?>
      <form action="ticket_booking/ticketb4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b4" type="submit" class="seat-width-height"  value="B4"/>
      </form>
      <?php  } elseif($row['ticket_b4']=='B4' && $row['expiry_ticket_b4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B4"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b5=NULL where expiry_ticket_b5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b5=NULL where expiry_ticket_b5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b5']!='B5' && $row['expiry_ticket_b5']==NULL)
	{?>
      <form action="ticket_booking/ticketb5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b5" type="submit" class="seat-width-height"  value="B5"/>
      </form>
      <?php  } elseif($row['ticket_b5']=='B5' && $row['expiry_ticket_b5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B5"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b6=NULL where expiry_ticket_b6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b6=NULL where expiry_ticket_b6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b6']!='B6' && $row['expiry_ticket_b6']==NULL)
	{?>
      <form action="ticket_booking/ticketb6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b6" type="submit" class="seat-width-height"  value="B6"/>
      </form>
      <?php  } elseif($row['ticket_b6']=='B6' && $row['expiry_ticket_b6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B6"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b7=NULL where expiry_ticket_b7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b7=NULL where expiry_ticket_b7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b7']!='B7' && $row['expiry_ticket_b7']==NULL)
	{?>
      <form action="ticket_booking/ticketb7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b7" type="submit" class="seat-width-height"  value="B7"/>
      </form>
      <?php  } elseif($row['ticket_b7']=='B7' && $row['expiry_ticket_b7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B7"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b8=NULL where expiry_ticket_b8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b8=NULL where expiry_ticket_b8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b8']!='B8' && $row['expiry_ticket_b8']==NULL)
	{?>
      <form action="ticket_booking/ticketb8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b8" type="submit" class="seat-width-height"  value="B8"/>
      </form>
      <?php  } elseif($row['ticket_b8']=='B8' && $row['expiry_ticket_b8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B8"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b9=NULL where expiry_ticket_b9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b9=NULL where expiry_ticket_b9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b9']!='B9' && $row['expiry_ticket_b9']==NULL)
	{?>
      <form action="ticket_booking/ticketb9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b9" type="submit" class="seat-width-height"  value="B9"/>
      </form>
      <?php  } elseif($row['ticket_b9']=='B9' && $row['expiry_ticket_b9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b10=NULL where expiry_ticket_b10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b10=NULL where expiry_ticket_b10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b10']!='B10' && $row['expiry_ticket_b10']==NULL)
	{?>
      <form action="ticket_booking/ticketb10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b10" type="submit" class="seat-width-height"  value="B10"/>
      </form>
      <?php  } elseif($row['ticket_b10']=='B10' && $row['expiry_ticket_b10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b11=NULL where expiry_ticket_b11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b11=NULL where expiry_ticket_b11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b11']!='B11' && $row['expiry_ticket_b11']==NULL)
	{?>
      <form action="ticket_booking/ticketb11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b11" type="submit" class="seat-width-height"  value="B11"/>
      </form>
      <?php  } elseif($row['ticket_b11']=='B11' && $row['expiry_ticket_b11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b12=NULL where expiry_ticket_b12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b12=NULL where expiry_ticket_b12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b12']!='B12' && $row['expiry_ticket_b12']==NULL)
	{?>
      <form action="ticket_booking/ticketb12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b12" type="submit" class="seat-width-height"  value="B12"/>
      </form>
      <?php  } elseif($row['ticket_b12']=='B12' && $row['expiry_ticket_b12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b13=NULL where expiry_ticket_b13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b13=NULL where expiry_ticket_b13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b13']!='B13' && $row['expiry_ticket_b13']==NULL)
	{?>
      <form action="ticket_booking/ticketb13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b13" type="submit" class="seat-width-height"  value="B13"/>
      </form>
      <?php  } elseif($row['ticket_b13']=='B13' && $row['expiry_ticket_b13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b14=NULL where expiry_ticket_b14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b14=NULL where expiry_ticket_b14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b14']!='B14' && $row['expiry_ticket_b14']==NULL)
	{?>
      <form action="ticket_booking/ticketb14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b14" type="submit" class="seat-width-height"  value="B14"/>
      </form>
      <?php  } elseif($row['ticket_b14']=='B14' && $row['expiry_ticket_b14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b15=NULL where expiry_ticket_b15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b15=NULL where expiry_ticket_b15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b15']!='B15' && $row['expiry_ticket_b15']==NULL)
	{?>
      <form action="ticket_booking/ticketb15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b15" type="submit" class="seat-width-height"  value="B15"/>
      </form>
      <?php  } elseif($row['ticket_b15']=='B15' && $row['expiry_ticket_b15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b16=NULL where expiry_ticket_b16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b16=NULL where expiry_ticket_b16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b16']!='B16' && $row['expiry_ticket_b16']==NULL)
	{?>
      <form action="ticket_booking/ticketb16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b16" type="submit" class="seat-width-height"  value="B16"/>
      </form>
      <?php  } elseif($row['ticket_b16']=='B16' && $row['expiry_ticket_b16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B16"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b17'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b17'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b17=NULL where expiry_ticket_b17 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b17=NULL where expiry_ticket_b17 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b17']!='B17' && $row['expiry_ticket_b17']==NULL)
	{?>
      <form action="ticket_booking/ticketb17.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b17" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b17" type="submit" class="seat-width-height"  value="B17"/>
      </form>
      <?php  } elseif($row['ticket_b17']=='B17' && $row['expiry_ticket_b17']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B17"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B17"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b18'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b18'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b18=NULL where expiry_ticket_b18 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b18=NULL where expiry_ticket_b18 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b18']!='B18' && $row['expiry_ticket_b18']==NULL)
	{?>
      <form action="ticket_booking/ticketb18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b18" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b18" type="submit" class="seat-width-height"  value="B18"/>
      </form>
      <?php  } elseif($row['ticket_b18']=='B18' && $row['expiry_ticket_b18']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B18"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B18"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b19'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b19'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b19=NULL where expiry_ticket_b19 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b19=NULL where expiry_ticket_b19 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b19']!='B19' && $row['expiry_ticket_b19']==NULL)
	{?>
      <form action="ticket_booking/ticketb19.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b19" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b19" type="submit" class="seat-width-height"  value="B19"/>
      </form>
      <?php  } elseif($row['ticket_b19']=='B19' && $row['expiry_ticket_b19']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B19"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B19"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b20'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b20'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b20=NULL where expiry_ticket_b20 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b20=NULL where expiry_ticket_b20 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b20']!='B20' && $row['expiry_ticket_b20']==NULL)
	{?>
      <form action="ticket_booking/ticketb20.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b20" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b20" type="submit" class="seat-width-height"  value="B20"/>
      </form>
      <?php  } elseif($row['ticket_b20']=='B20' && $row['expiry_ticket_b20']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B20"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B20"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b21'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b21'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b21=NULL where expiry_ticket_b21 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b21=NULL where expiry_ticket_b21 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b21']!='B21' && $row['expiry_ticket_b21']==NULL)
	{?>
      <form action="ticket_booking/ticketb21.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b21" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b21" type="submit" class="seat-width-height"  value="B21"/>
      </form>
      <?php  } elseif($row['ticket_b21']=='B21' && $row['expiry_ticket_b21']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B21"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B21"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b22'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b22'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b22=NULL where expiry_ticket_b22 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b22=NULL where expiry_ticket_b22 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b22']!='B22' && $row['expiry_ticket_b22']==NULL)
	{?>
      <form action="ticket_booking/ticketb22.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b22" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b22" type="submit" class="seat-width-height"  value="B22"/>
      </form>
      <?php  } elseif($row['ticket_b22']=='B22' && $row['expiry_ticket_b22']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B22"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B22"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b23'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b23'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b23=NULL where expiry_ticket_b23 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b23=NULL where expiry_ticket_b23 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b23']!='B23' && $row['expiry_ticket_b23']==NULL)
	{?>
      <form action="ticket_booking/ticketb23.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b23" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b23" type="submit" class="seat-width-height"  value="B23"/>
      </form>
      <?php  } elseif($row['ticket_b23']=='B23' && $row['expiry_ticket_b23']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B23"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B23"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b24'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b24'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b24=NULL where expiry_ticket_b24 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b24=NULL where expiry_ticket_b24 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b24']!='B24' && $row['expiry_ticket_b24']==NULL)
	{?>
      <form action="ticket_booking/ticketb24.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b24" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b24" type="submit" class="seat-width-height"  value="B24"/>
      </form>
      <?php  } elseif($row['ticket_b24']=='B24' && $row['expiry_ticket_b24']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B24"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B24"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b25'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b25'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b25=NULL where expiry_ticket_b25 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b25=NULL where expiry_ticket_b25 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b25']!='B25' && $row['expiry_ticket_b25']==NULL)
	{?>
      <form action="ticket_booking/ticketb25.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b25" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b25" type="submit" class="seat-width-height"  value="B25"/>
      </form>
      <?php  } elseif($row['ticket_b25']=='B25' && $row['expiry_ticket_b25']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B25"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B25"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b26'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b26'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b26=NULL where expiry_ticket_b26 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b26=NULL where expiry_ticket_b26 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b26']!='B26' && $row['expiry_ticket_b26']==NULL)
	{?>
      <form action="ticket_booking/ticketb26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b26" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b26" type="submit" class="seat-width-height"  value="B26"/>
      </form>
      <?php  } elseif($row['ticket_b26']=='B26' && $row['expiry_ticket_b26']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B26"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B26"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b27'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b27'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b27=NULL where expiry_ticket_b27 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b27=NULL where expiry_ticket_b27 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b27']!='B27' && $row['expiry_ticket_b27']==NULL)
	{?>
      <form action="ticket_booking/ticketb27.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b27" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b27" type="submit" class="seat-width-height"  value="B27"/>
      </form>
      <?php  } elseif($row['ticket_b27']=='B27' && $row['expiry_ticket_b27']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B27"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B27"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b28'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b28'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b28=NULL where expiry_ticket_b28 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b28=NULL where expiry_ticket_b28 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b28']!='B28' && $row['expiry_ticket_b28']==NULL)
	{?>
      <form action="ticket_booking/ticketb28.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b28" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b28" type="submit" class="seat-width-height"  value="B28"/>
      </form>
      <?php  } elseif($row['ticket_b28']=='B28' && $row['expiry_ticket_b28']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B28"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B28"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b29'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b29'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b29=NULL where expiry_ticket_b29 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b29=NULL where expiry_ticket_b29 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b29']!='B29' && $row['expiry_ticket_b29']==NULL)
	{?>
      <form action="ticket_booking/ticketb29.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b29" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b29" type="submit" class="seat-width-height"  value="B29"/>
      </form>
      <?php  } elseif($row['ticket_b29']=='B29' && $row['expiry_ticket_b29']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B29"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B29"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b30'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b30'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b30=NULL where expiry_ticket_b30 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b30=NULL where expiry_ticket_b30 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b30']!='B30' && $row['expiry_ticket_b30']==NULL)
	{?>
      <form action="ticket_booking/ticketb30.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b30" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b30" type="submit" class="seat-width-height"  value="B30"/>
      </form>
      <?php  } elseif($row['ticket_b30']=='B30' && $row['expiry_ticket_b30']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B30"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B30"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b31'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b31'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b31=NULL where expiry_ticket_b31 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b31=NULL where expiry_ticket_b31 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b31']!='B31' && $row['expiry_ticket_b31']==NULL)
	{?>
      <form action="ticket_booking/ticketb31.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b31" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b31" type="submit" class="seat-width-height"  value="B31"/>
      </form>
      <?php  } elseif($row['ticket_b31']=='B31' && $row['expiry_ticket_b31']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B31"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B31"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b32'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b32'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b32=NULL where expiry_ticket_b32 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b32=NULL where expiry_ticket_b32 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b32']!='B32' && $row['expiry_ticket_b32']==NULL)
	{?>
      <form action="ticket_booking/ticketb32.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b32" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b32" type="submit" class="seat-width-height"  value="B32"/>
      </form>
      <?php  } elseif($row['ticket_b32']=='B32' && $row['expiry_ticket_b32']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B32"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B32"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b33'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b33'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b33=NULL where expiry_ticket_b33 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b33=NULL where expiry_ticket_b33 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b33']!='B33' && $row['expiry_ticket_b33']==NULL)
	{?>
      <form action="ticket_booking/ticketb33.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b33" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b33" type="submit" class="seat-width-height"  value="B33"/>
      </form>
      <?php  } elseif($row['ticket_b33']=='B33' && $row['expiry_ticket_b33']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B33"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B33"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b34'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b34'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b34=NULL where expiry_ticket_b34 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b34=NULL where expiry_ticket_b34 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b34']!='B34' && $row['expiry_ticket_b34']==NULL)
	{?>
      <form action="ticket_booking/ticketb34.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b34" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b34" type="submit" class="seat-width-height"  value="B34"/>
      </form>
      <?php  } elseif($row['ticket_b34']=='B34' && $row['expiry_ticket_b34']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B34"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B34"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b35'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b35'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b35=NULL where expiry_ticket_b35 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b35=NULL where expiry_ticket_b35 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b35']!='B35' && $row['expiry_ticket_b35']==NULL)
	{?>
      <form action="ticket_booking/ticketb35.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b35" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b35" type="submit" class="seat-width-height"  value="B35"/>
      </form>
      <?php  } elseif($row['ticket_b35']=='B35' && $row['expiry_ticket_b35']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B35"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B35"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b36'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b36'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b36=NULL where expiry_ticket_b36 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b36=NULL where expiry_ticket_b36 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b36']!='B36' && $row['expiry_ticket_b36']==NULL)
	{?>
      <form action="ticket_booking/ticketb36.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b36" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b36" type="submit" class="seat-width-height"  value="B36"/>
      </form>
      <?php  } elseif($row['ticket_b36']=='B36' && $row['expiry_ticket_b36']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B36"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B36"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b37'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b37'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b37=NULL where expiry_ticket_b37 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b37=NULL where expiry_ticket_b37 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b37']!='B37' && $row['expiry_ticket_b37']==NULL)
	{?>
      <form action="ticket_booking/ticketb37.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b37" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b37" type="submit" class="seat-width-height"  value="B37"/>
      </form>
      <?php  } elseif($row['ticket_b37']=='B37' && $row['expiry_ticket_b37']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B37"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B37"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b38'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b38'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b38=NULL where expiry_ticket_b38 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b38=NULL where expiry_ticket_b38 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b38']!='B38' && $row['expiry_ticket_b38']==NULL)
	{?>
      <form action="ticket_booking/ticketb38.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b38" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b38" type="submit" class="seat-width-height"  value="B38"/>
      </form>
      <?php  } elseif($row['ticket_b38']=='B38' && $row['expiry_ticket_b38']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B38"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B38"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b39'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b39'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b39=NULL where expiry_ticket_b39 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b39=NULL where expiry_ticket_b39 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b39']!='B39' && $row['expiry_ticket_b39']==NULL)
	{?>
      <form action="ticket_booking/ticketb39.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b39" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b39" type="submit" class="seat-width-height"  value="B39"/>
      </form>
      <?php  } elseif($row['ticket_b39']=='B39' && $row['expiry_ticket_b39']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B39"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B39"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b40'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b40'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b40=NULL where expiry_ticket_b40 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b40=NULL where expiry_ticket_b40 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b40']!='B40' && $row['expiry_ticket_b40']==NULL)
	{?>
      <form action="ticket_booking/ticketb40.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b40" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b40" type="submit" class="seat-width-height"  value="B40"/>
      </form>
      <?php  } elseif($row['ticket_b40']=='B40' && $row['expiry_ticket_b40']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B40"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B40"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b41'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b41'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b41=NULL where expiry_ticket_b41 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b41=NULL where expiry_ticket_b41 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b41']!='B41' && $row['expiry_ticket_b41']==NULL)
	{?>
      <form action="ticket_booking/ticketb41.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b41" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b41" type="submit" class="seat-width-height"  value="B41"/>
      </form>
      <?php  } elseif($row['ticket_b41']=='B41' && $row['expiry_ticket_b41']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B41"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B41"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b42'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b42'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b42=NULL where expiry_ticket_b42 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b42=NULL where expiry_ticket_b42 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b42']!='B42' && $row['expiry_ticket_b42']==NULL)
	{?>
      <form action="ticket_booking/ticketb42.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b42" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b42" type="submit" class="seat-width-height"  value="B42"/>
      </form>
      <?php  } elseif($row['ticket_b42']=='B42' && $row['expiry_ticket_b42']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B42"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B42"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b43'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b43'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b43=NULL where expiry_ticket_b43 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b43=NULL where expiry_ticket_b43 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b43']!='B43' && $row['expiry_ticket_b43']==NULL)
	{?>
      <form action="ticket_booking/ticketb43.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b43" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b43" type="submit" class="seat-width-height"  value="B43"/>
      </form>
      <?php  } elseif($row['ticket_b43']=='B43' && $row['expiry_ticket_b43']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B43"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B43"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b44'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b44'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b44=NULL where expiry_ticket_b44 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b44=NULL where expiry_ticket_b44 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b44']!='B44' && $row['expiry_ticket_b44']==NULL)
	{?>
      <form action="ticket_booking/ticketb44.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b44" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b44" type="submit" class="seat-width-height"  value="B44"/>
      </form>
      <?php  } elseif($row['ticket_b44']=='B44' && $row['expiry_ticket_b44']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B44"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B44"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b45'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b45'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b45=NULL where expiry_ticket_b45 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b45=NULL where expiry_ticket_b45 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b45']!='B45' && $row['expiry_ticket_b45']==NULL)
	{?>
      <form action="ticket_booking/ticketb45.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b45" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b45" type="submit" class="seat-width-height"  value="B45"/>
      </form>
      <?php  } elseif($row['ticket_b45']=='B45' && $row['expiry_ticket_b45']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B45"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B45"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b46'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b46'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b46=NULL where expiry_ticket_b46 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b46=NULL where expiry_ticket_b46 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b46']!='B46' && $row['expiry_ticket_b46']==NULL)
	{?>
      <form action="ticket_booking/ticketb46.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b46" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b46" type="submit" class="seat-width-height"  value="B46"/>
      </form>
      <?php  } elseif($row['ticket_b46']=='B46' && $row['expiry_ticket_b46']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B46"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B46"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b47'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b47'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b47=NULL where expiry_ticket_b47 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b47=NULL where expiry_ticket_b47 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b47']!='B47' && $row['expiry_ticket_b47']==NULL)
	{?>
      <form action="ticket_booking/ticketb47.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b47" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b47" type="submit" class="seat-width-height"  value="B47"/>
      </form>
      <?php  } elseif($row['ticket_b47']=='B47' && $row['expiry_ticket_b47']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B47"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B47"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b48'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b48'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b48=NULL where expiry_ticket_b48 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b48=NULL where expiry_ticket_b48 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b48']!='B48' && $row['expiry_ticket_b48']==NULL)
	{?>
      <form action="ticket_booking/ticketb48.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b48" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b48" type="submit" class="seat-width-height"  value="B48"/>
      </form>
      <?php  } elseif($row['ticket_b48']=='B48' && $row['expiry_ticket_b48']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B48"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B48"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b49'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b49'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b49=NULL where expiry_ticket_b49 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b49=NULL where expiry_ticket_b49 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b49']!='B49' && $row['expiry_ticket_b49']==NULL)
	{?>
      <form action="ticket_booking/ticketb49.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b49" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b49" type="submit" class="seat-width-height"  value="B49"/>
      </form>
      <?php  } elseif($row['ticket_b49']=='B49' && $row['expiry_ticket_b49']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B49"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B49"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b50'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b50'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b50=NULL where expiry_ticket_b50 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b50=NULL where expiry_ticket_b50 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b50']!='B50' && $row['expiry_ticket_b50']==NULL)
	{?>
      <form action="ticket_booking/ticketb50.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b50" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b50" type="submit" class="seat-width-height"  value="B50"/>
      </form>
      <?php  } elseif($row['ticket_b50']=='B50' && $row['expiry_ticket_b50']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B50"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B50"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b51'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b51'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b51=NULL where expiry_ticket_b51 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b51=NULL where expiry_ticket_b51 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b51']!='B51' && $row['expiry_ticket_b51']==NULL)
	{?>
      <form action="ticket_booking/ticketb51.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b51" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b51" type="submit" class="seat-width-height"  value="B51"/>
      </form>
      <?php  } elseif($row['ticket_b51']=='B51' && $row['expiry_ticket_b51']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B51"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B51"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b52'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b52'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b52=NULL where expiry_ticket_b52 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b52=NULL where expiry_ticket_b52 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b52']!='B52' && $row['expiry_ticket_b52']==NULL)
	{?>
      <form action="ticket_booking/ticketb52.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b52" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b52" type="submit" class="seat-width-height"  value="B52"/>
      </form>
      <?php  } elseif($row['ticket_b52']=='B52' && $row['expiry_ticket_b52']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B52"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B52"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b53'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b53'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b53=NULL where expiry_ticket_b53 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b53=NULL where expiry_ticket_b53 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b53']!='B53' && $row['expiry_ticket_b53']==NULL)
	{?>
      <form action="ticket_booking/ticketb53.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b53" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b53" type="submit" class="seat-width-height"  value="B53"/>
      </form>
      <?php  } elseif($row['ticket_b53']=='B53' && $row['expiry_ticket_b53']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B53"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B53"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b54'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b54'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b54=NULL where expiry_ticket_b54 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b54=NULL where expiry_ticket_b54 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b54']!='B54' && $row['expiry_ticket_b54']==NULL)
	{?>
      <form action="ticket_booking/ticketb54.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b54" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b54" type="submit" class="seat-width-height"  value="B54"/>
      </form>
      <?php  } elseif($row['ticket_b54']=='B54' && $row['expiry_ticket_b54']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B54"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B54"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b55'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b55'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b55=NULL where expiry_ticket_b55 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b55=NULL where expiry_ticket_b55 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b55']!='B55' && $row['expiry_ticket_b55']==NULL)
	{?>
      <form action="ticket_booking/ticketb55.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b55" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b55" type="submit" class="seat-width-height"  value="B55"/>
      </form>
      <?php  } elseif($row['ticket_b55']=='B55' && $row['expiry_ticket_b55']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B55"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B55"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b56'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b56'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b56=NULL where expiry_ticket_b56 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b56=NULL where expiry_ticket_b56 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b56']!='B56' && $row['expiry_ticket_b56']==NULL)
	{?>
      <form action="ticket_booking/ticketb56.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b56" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b56" type="submit" class="seat-width-height"  value="B56"/>
      </form>
      <?php  } elseif($row['ticket_b56']=='B56' && $row['expiry_ticket_b56']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B56"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B56"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b57'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b57'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b57=NULL where expiry_ticket_b57 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b57=NULL where expiry_ticket_b57 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b57']!='B57' && $row['expiry_ticket_b57']==NULL)
	{?>
      <form action="ticket_booking/ticketb57.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b57" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b57" type="submit" class="seat-width-height"  value="B57"/>
      </form>
      <?php  } elseif($row['ticket_b57']=='B57' && $row['expiry_ticket_b57']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B57"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B57"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b58'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b58'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b58=NULL where expiry_ticket_b58 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b58=NULL where expiry_ticket_b58 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b58']!='B58' && $row['expiry_ticket_b58']==NULL)
	{?>
      <form action="ticket_booking/ticketb58.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b58" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b58" type="submit" class="seat-width-height"  value="B58"/>
      </form>
      <?php  } elseif($row['ticket_b58']=='B58' && $row['expiry_ticket_b58']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B58"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B58"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b59'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b59'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b59=NULL where expiry_ticket_b59 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b59=NULL where expiry_ticket_b59 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b59']!='B59' && $row['expiry_ticket_b59']==NULL)
	{?>
      <form action="ticket_booking/ticketb59.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b59" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b59" type="submit" class="seat-width-height"  value="B59"/>
      </form>
      <?php  } elseif($row['ticket_b59']=='B59' && $row['expiry_ticket_b59']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B59"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B59"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b60'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b60'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b60=NULL where expiry_ticket_b60 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b60=NULL where expiry_ticket_b60 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b60']!='B60' && $row['expiry_ticket_b60']==NULL)
	{?>
      <form action="ticket_booking/ticketb60.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b60" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b60" type="submit" class="seat-width-height"  value="B60"/>
      </form>
      <?php  } elseif($row['ticket_b60']=='B60' && $row['expiry_ticket_b60']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B60"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B60"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b61'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b61'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b61=NULL where expiry_ticket_b61 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b61=NULL where expiry_ticket_b61 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b61']!='B61' && $row['expiry_ticket_b61']==NULL)
	{?>
      <form action="ticket_booking/ticketb61.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b61" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b61" type="submit" class="seat-width-height"  value="B61"/>
      </form>
      <?php  } elseif($row['ticket_b61']=='B61' && $row['expiry_ticket_b61']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B61"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B61"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b62'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b62'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b62=NULL where expiry_ticket_b62 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b62=NULL where expiry_ticket_b62 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b62']!='B62' && $row['expiry_ticket_b62']==NULL)
	{?>
      <form action="ticket_booking/ticketb62.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b62" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b62" type="submit" class="seat-width-height"  value="B62"/>
      </form>
      <?php  } elseif($row['ticket_b62']=='B62' && $row['expiry_ticket_b62']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B62"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B62"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b63'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b63'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b63=NULL where expiry_ticket_b63 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b63=NULL where expiry_ticket_b63 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b63']!='B63' && $row['expiry_ticket_b63']==NULL)
	{?>
      <form action="ticket_booking/ticketb63.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b63" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b63" type="submit" class="seat-width-height"  value="B63"/>
      </form>
      <?php  } elseif($row['ticket_b63']=='B63' && $row['expiry_ticket_b63']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B63"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B63"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_b64'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_b64'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_b64=NULL where expiry_ticket_b64 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b64=NULL where expiry_ticket_b64 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b64']!='B64' && $row['expiry_ticket_b64']==NULL)
	{?>
      <form action="ticket_booking/ticketb64.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_b64" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_b64" type="submit" class="seat-width-height"  value="B64"/>
      </form>
      <?php  } elseif($row['ticket_b64']=='B64' && $row['expiry_ticket_b64']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="B64"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="B64"/>
      <?php 
} 

?></td>
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
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c1=NULL where expiry_ticket_c1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c1=NULL where expiry_ticket_c1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c1']!='C1' && $row['expiry_ticket_c1']==NULL)
	{?>
      <form action="ticket_booking/ticketc1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c1" type="submit" class="seat-width-height"  value="C1"/>
      </form>
      <?php  } elseif($row['ticket_c1']=='C1' && $row['expiry_ticket_c1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C1"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c2=NULL where expiry_ticket_c2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c2=NULL where expiry_ticket_c2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c2']!='C2' && $row['expiry_ticket_c2']==NULL)
	{?>
      <form action="ticket_booking/ticketc2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c2" type="submit" class="seat-width-height"  value="C2"/>
      </form>
      <?php  } elseif($row['ticket_c2']=='C2' && $row['expiry_ticket_c2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C2"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c3=NULL where expiry_ticket_c3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c3=NULL where expiry_ticket_c3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c3']!='C3' && $row['expiry_ticket_c3']==NULL)
	{?>
      <form action="ticket_booking/ticketc3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c3" type="submit" class="seat-width-height"  value="C3"/>
      </form>
      <?php  } elseif($row['ticket_c3']=='C3' && $row['expiry_ticket_c3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C3"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c4=NULL where expiry_ticket_c4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c4=NULL where expiry_ticket_c4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c4']!='C4' && $row['expiry_ticket_c4']==NULL)
	{?>
      <form action="ticket_booking/ticketc4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c4" type="submit" class="seat-width-height"  value="C4"/>
      </form>
      <?php  } elseif($row['ticket_c4']=='C4' && $row['expiry_ticket_c4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C4"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c5=NULL where expiry_ticket_c5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c5=NULL where expiry_ticket_c5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c5']!='C5' && $row['expiry_ticket_c5']==NULL)
	{?>
      <form action="ticket_booking/ticketc5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c5" type="submit" class="seat-width-height"  value="C5"/>
      </form>
      <?php  } elseif($row['ticket_c5']=='C5' && $row['expiry_ticket_c5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C5"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c6=NULL where expiry_ticket_c6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c6=NULL where expiry_ticket_c6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c6']!='C6' && $row['expiry_ticket_c6']==NULL)
	{?>
      <form action="ticket_booking/ticketc6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c6" type="submit" class="seat-width-height"  value="C6"/>
      </form>
      <?php  } elseif($row['ticket_c6']=='C6' && $row['expiry_ticket_c6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C6"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c7=NULL where expiry_ticket_c7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c7=NULL where expiry_ticket_c7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c7']!='C7' && $row['expiry_ticket_c7']==NULL)
	{?>
      <form action="ticket_booking/ticketc7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c7" type="submit" class="seat-width-height"  value="C7"/>
      </form>
      <?php  } elseif($row['ticket_c7']=='C7' && $row['expiry_ticket_c7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C7"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c8=NULL where expiry_ticket_c8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c8=NULL where expiry_ticket_c8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c8']!='C8' && $row['expiry_ticket_c8']==NULL)
	{?>
      <form action="ticket_booking/ticketc8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c8" type="submit" class="seat-width-height"  value="C8"/>
      </form>
      <?php  } elseif($row['ticket_c8']=='C8' && $row['expiry_ticket_c8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C8"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c9=NULL where expiry_ticket_c9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c9=NULL where expiry_ticket_c9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c9']!='C9' && $row['expiry_ticket_c9']==NULL)
	{?>
      <form action="ticket_booking/ticketc9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c9" type="submit" class="seat-width-height"  value="C9"/>
      </form>
      <?php  } elseif($row['ticket_c9']=='C9' && $row['expiry_ticket_c9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c10=NULL where expiry_ticket_c10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c10=NULL where expiry_ticket_c10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c10']!='C10' && $row['expiry_ticket_c10']==NULL)
	{?>
      <form action="ticket_booking/ticketc10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c10" type="submit" class="seat-width-height"  value="C10"/>
      </form>
      <?php  } elseif($row['ticket_c10']=='C10' && $row['expiry_ticket_c10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c11=NULL where expiry_ticket_c11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c11=NULL where expiry_ticket_c11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c11']!='C11' && $row['expiry_ticket_c11']==NULL)
	{?>
      <form action="ticket_booking/ticketc11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c11" type="submit" class="seat-width-height"  value="C11"/>
      </form>
      <?php  } elseif($row['ticket_c11']=='C11' && $row['expiry_ticket_c11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c12']!='C12' && $row['expiry_ticket_c12']==NULL)
	{?>
      <form action="ticket_booking/ticketc12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c12" type="submit" class="seat-width-height"  value="C12"/>
      </form>
      <?php  } elseif($row['ticket_c12']=='C12' && $row['expiry_ticket_c12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c13=NULL where expiry_ticket_c13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c13=NULL where expiry_ticket_c13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c13']!='C13' && $row['expiry_ticket_c13']==NULL)
	{?>
      <form action="ticket_booking/ticketc13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c13" type="submit" class="seat-width-height"  value="C13"/>
      </form>
      <?php  } elseif($row['ticket_c13']=='C13' && $row['expiry_ticket_c13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c14=NULL where expiry_ticket_c14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c14=NULL where expiry_ticket_c14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c14']!='C14' && $row['expiry_ticket_c14']==NULL)
	{?>
      <form action="ticket_booking/ticketc14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c14" type="submit" class="seat-width-height"  value="C14"/>
      </form>
      <?php  } elseif($row['ticket_c14']=='C14' && $row['expiry_ticket_c14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c15=NULL where expiry_ticket_c15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c15=NULL where expiry_ticket_c15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c15']!='C15' && $row['expiry_ticket_c15']==NULL)
	{?>
      <form action="ticket_booking/ticketc15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c15" type="submit" class="seat-width-height"  value="C15"/>
      </form>
      <?php  } elseif($row['ticket_c15']=='C15' && $row['expiry_ticket_c15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c16=NULL where expiry_ticket_c16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c16=NULL where expiry_ticket_c16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c16']!='C16' && $row['expiry_ticket_c16']==NULL)
	{?>
      <form action="ticket_booking/ticketc16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c16" type="submit" class="seat-width-height"  value="C16"/>
      </form>
      <?php  } elseif($row['ticket_c16']=='C16' && $row['expiry_ticket_c16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C16"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c17'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c17'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c17=NULL where expiry_ticket_c17 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c17=NULL where expiry_ticket_c17 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c17']!='C17' && $row['expiry_ticket_c17']==NULL)
	{?>
      <form action="ticket_booking/ticketc17.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c17" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c17" type="submit" class="seat-width-height"  value="C17"/>
      </form>
      <?php  } elseif($row['ticket_c17']=='C17' && $row['expiry_ticket_c17']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C17"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C17"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c18'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c18'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c18=NULL where expiry_ticket_c18 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c18=NULL where expiry_ticket_c18 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c18']!='C18' && $row['expiry_ticket_c18']==NULL)
	{?>
      <form action="ticket_booking/ticketc18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c18" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c18" type="submit" class="seat-width-height"  value="C18"/>
      </form>
      <?php  } elseif($row['ticket_c18']=='C18' && $row['expiry_ticket_c18']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C18"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C18"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c19'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c19'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c19=NULL where expiry_ticket_c19 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c19=NULL where expiry_ticket_c19 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c19']!='C19' && $row['expiry_ticket_c19']==NULL)
	{?>
      <form action="ticket_booking/ticketc19.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c19" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c19" type="submit" class="seat-width-height"  value="C19"/>
      </form>
      <?php  } elseif($row['ticket_c19']=='C19' && $row['expiry_ticket_c19']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C19"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C19"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c20'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c20'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c20=NULL where expiry_ticket_c20 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c20=NULL where expiry_ticket_c20 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c20']!='C20' && $row['expiry_ticket_c20']==NULL)
	{?>
      <form action="ticket_booking/ticketc20.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c20" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c20" type="submit" class="seat-width-height"  value="C20"/>
      </form>
      <?php  } elseif($row['ticket_c20']=='C20' && $row['expiry_ticket_c20']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C20"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C20"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c21'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c21'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c21=NULL where expiry_ticket_c21 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c21=NULL where expiry_ticket_c21 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c21']!='C21' && $row['expiry_ticket_c21']==NULL)
	{?>
      <form action="ticket_booking/ticketc21.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c21" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c21" type="submit" class="seat-width-height"  value="C21"/>
      </form>
      <?php  } elseif($row['ticket_c21']=='C21' && $row['expiry_ticket_c21']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C21"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C21"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c22'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c22'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c22=NULL where expiry_ticket_c22 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c22=NULL where expiry_ticket_c22 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c22']!='C22' && $row['expiry_ticket_c22']==NULL)
	{?>
      <form action="ticket_booking/ticketc22.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c22" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c22" type="submit" class="seat-width-height"  value="C22"/>
      </form>
      <?php  } elseif($row['ticket_c22']=='C22' && $row['expiry_ticket_c22']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C22"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C22"/>
      <?php 
} 

?></td>
    <td align="left" valign="top"><?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c23'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c23'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c23=NULL where expiry_ticket_c23 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c23=NULL where expiry_ticket_c23 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c23']!='C23' && $row['expiry_ticket_c23']==NULL)
	{?>
      <form action="ticket_booking/ticketc23.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c23" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c23" type="submit" class="seat-width-height"  value="C23"/>
      </form>
      <?php  } elseif($row['ticket_c23']=='C23' && $row['expiry_ticket_c23']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C23"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C23"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c24'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c24'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c24=NULL where expiry_ticket_c24 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c24=NULL where expiry_ticket_c24 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c24']!='C24' && $row['expiry_ticket_c24']==NULL)
	{?>
      <form action="ticket_booking/ticketc24.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c24" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c24" type="submit" class="seat-width-height"  value="C24"/>
      </form>
      <?php  } elseif($row['ticket_c24']=='C24' && $row['expiry_ticket_c24']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C24"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C24"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c25'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c25'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c25=NULL where expiry_ticket_c25 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c25=NULL where expiry_ticket_c25 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c25']!='C25' && $row['expiry_ticket_c25']==NULL)
	{?>
      <form action="ticket_booking/ticketc25.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c25" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c25" type="submit" class="seat-width-height"  value="C25"/>
      </form>
      <?php  } elseif($row['ticket_c25']=='C25' && $row['expiry_ticket_c25']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C25"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C25"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c26'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c26'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c26=NULL where expiry_ticket_c26 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c26=NULL where expiry_ticket_c26 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c26']!='C26' && $row['expiry_ticket_c26']==NULL)
	{?>
      <form action="ticket_booking/ticketc26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c26" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c26" type="submit" class="seat-width-height"  value="C26"/>
      </form>
      <?php  } elseif($row['ticket_c26']=='C26' && $row['expiry_ticket_c26']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C26"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C26"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c27'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c27'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c27=NULL where expiry_ticket_c27 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c27=NULL where expiry_ticket_c27 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c27']!='C27' && $row['expiry_ticket_c27']==NULL)
	{?>
      <form action="ticket_booking/ticketc27.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c27" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c27" type="submit" class="seat-width-height"  value="C27"/>
      </form>
      <?php  } elseif($row['ticket_c27']=='C27' && $row['expiry_ticket_c27']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C27"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C27"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c28'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c28'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c28=NULL where expiry_ticket_c28 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c28=NULL where expiry_ticket_c28 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c28']!='C28' && $row['expiry_ticket_c28']==NULL)
	{?>
      <form action="ticket_booking/ticketc28.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c28" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c28" type="submit" class="seat-width-height"  value="C28"/>
      </form>
      <?php  } elseif($row['ticket_c28']=='C28' && $row['expiry_ticket_c28']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C28"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C28"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c29'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c29'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c29=NULL where expiry_ticket_c29 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c29=NULL where expiry_ticket_c29 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c29']!='C29' && $row['expiry_ticket_c29']==NULL)
	{?>
      <form action="ticket_booking/ticketc29.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c29" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c29" type="submit" class="seat-width-height"  value="C29"/>
      </form>
      <?php  } elseif($row['ticket_c29']=='C29' && $row['expiry_ticket_c29']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C29"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C29"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c30'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c30'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c30=NULL where expiry_ticket_c30 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c30=NULL where expiry_ticket_c30 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c30']!='C30' && $row['expiry_ticket_c30']==NULL)
	{?>
      <form action="ticket_booking/ticketc30.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c30" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c30" type="submit" class="seat-width-height"  value="C30"/>
      </form>
      <?php  } elseif($row['ticket_c30']=='C30' && $row['expiry_ticket_c30']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C30"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C30"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c31'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c31'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c31=NULL where expiry_ticket_c31 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c31=NULL where expiry_ticket_c31 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c31']!='C31' && $row['expiry_ticket_c31']==NULL)
	{?>
      <form action="ticket_booking/ticketc31.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c31" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c31" type="submit" class="seat-width-height"  value="C31"/>
      </form>
      <?php  } elseif($row['ticket_c31']=='C31' && $row['expiry_ticket_c31']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C31"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C31"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c32'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c32'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c32=NULL where expiry_ticket_c32 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c32=NULL where expiry_ticket_c32 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c32']!='C32' && $row['expiry_ticket_c32']==NULL)
	{?>
      <form action="ticket_booking/ticketc32.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c32" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c32" type="submit" class="seat-width-height"  value="C32"/>
      </form>
      <?php  } elseif($row['ticket_c32']=='C32' && $row['expiry_ticket_c32']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C32"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C32"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c33'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c33'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c33=NULL where expiry_ticket_c33 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c33=NULL where expiry_ticket_c33 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c33']!='C33' && $row['expiry_ticket_c33']==NULL)
	{?>
      <form action="ticket_booking/ticketc33.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c33" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c33" type="submit" class="seat-width-height"  value="C33"/>
      </form>
      <?php  } elseif($row['ticket_c33']=='C33' && $row['expiry_ticket_c33']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C33"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C33"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c34'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c34'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c34=NULL where expiry_ticket_c34 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c34=NULL where expiry_ticket_c34 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c34']!='C34' && $row['expiry_ticket_c34']==NULL)
	{?>
      <form action="ticket_booking/ticketc34.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c34" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c34" type="submit" class="seat-width-height"  value="C34"/>
      </form>
      <?php  } elseif($row['ticket_c34']=='C34' && $row['expiry_ticket_c34']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C34"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C34"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c35'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c35'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c35=NULL where expiry_ticket_c35 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c35=NULL where expiry_ticket_c35 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c35']!='C35' && $row['expiry_ticket_c35']==NULL)
	{?>
      <form action="ticket_booking/ticketc35.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c35" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c35" type="submit" class="seat-width-height"  value="C35"/>
      </form>
      <?php  } elseif($row['ticket_c35']=='C35' && $row['expiry_ticket_c35']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C35"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C35"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c36'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c36'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c36=NULL where expiry_ticket_c36 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c36=NULL where expiry_ticket_c36 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c36']!='C36' && $row['expiry_ticket_c36']==NULL)
	{?>
      <form action="ticket_booking/ticketc36.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c36" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c36" type="submit" class="seat-width-height"  value="C36"/>
      </form>
      <?php  } elseif($row['ticket_c36']=='C36' && $row['expiry_ticket_c36']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C36"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C36"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c37'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c37'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c37=NULL where expiry_ticket_c37 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c37=NULL where expiry_ticket_c37 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c37']!='C37' && $row['expiry_ticket_c37']==NULL)
	{?>
      <form action="ticket_booking/ticketc37.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c37" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c37" type="submit" class="seat-width-height"  value="C37"/>
      </form>
      <?php  } elseif($row['ticket_c37']=='C37' && $row['expiry_ticket_c37']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C37"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C37"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c38'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c38'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c38=NULL where expiry_ticket_c38 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c38=NULL where expiry_ticket_c38 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c38']!='C38' && $row['expiry_ticket_c38']==NULL)
	{?>
      <form action="ticket_booking/ticketc38.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c38" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c38" type="submit" class="seat-width-height"  value="C38"/>
      </form>
      <?php  } elseif($row['ticket_c38']=='C38' && $row['expiry_ticket_c38']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C38"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C38"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c39'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c39'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c39=NULL where expiry_ticket_c39 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c39=NULL where expiry_ticket_c39 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c39']!='C39' && $row['expiry_ticket_c39']==NULL)
	{?>
      <form action="ticket_booking/ticketc39.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c39" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c39" type="submit" class="seat-width-height"  value="C39"/>
      </form>
      <?php  } elseif($row['ticket_c39']=='C39' && $row['expiry_ticket_c39']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C39"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C39"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c40'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c40'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c40=NULL where expiry_ticket_c40 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c40=NULL where expiry_ticket_c40 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c40']!='C40' && $row['expiry_ticket_c40']==NULL)
	{?>
      <form action="ticket_booking/ticketc40.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c40" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c40" type="submit" class="seat-width-height"  value="C40"/>
      </form>
      <?php  } elseif($row['ticket_c40']=='C40' && $row['expiry_ticket_c40']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C40"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C40"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c41'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c41'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c41=NULL where expiry_ticket_c41 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c41=NULL where expiry_ticket_c41 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c41']!='C41' && $row['expiry_ticket_c41']==NULL)
	{?>
      <form action="ticket_booking/ticketc41.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c41" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c41" type="submit" class="seat-width-height"  value="C41"/>
      </form>
      <?php  } elseif($row['ticket_c41']=='C41' && $row['expiry_ticket_c41']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C41"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C41"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c42'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c42'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c42=NULL where expiry_ticket_c42 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c42=NULL where expiry_ticket_c42 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c42']!='C42' && $row['expiry_ticket_c42']==NULL)
	{?>
      <form action="ticket_booking/ticketc42.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c42" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c42" type="submit" class="seat-width-height"  value="C42"/>
      </form>
      <?php  } elseif($row['ticket_c42']=='C42' && $row['expiry_ticket_c42']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C42"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C42"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c43'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c43'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c43=NULL where expiry_ticket_c43 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c43=NULL where expiry_ticket_c43 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c43']!='C43' && $row['expiry_ticket_c43']==NULL)
	{?>
      <form action="ticket_booking/ticketc43.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c43" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c43" type="submit" class="seat-width-height"  value="C43"/>
      </form>
      <?php  } elseif($row['ticket_c43']=='C43' && $row['expiry_ticket_c43']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C43"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C43"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c44'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c44'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c44=NULL where expiry_ticket_c44 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c44=NULL where expiry_ticket_c44 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c44']!='C44' && $row['expiry_ticket_c44']==NULL)
	{?>
      <form action="ticket_booking/ticketc44.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c44" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c44" type="submit" class="seat-width-height"  value="C44"/>
      </form>
      <?php  } elseif($row['ticket_c44']=='C44' && $row['expiry_ticket_c44']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C44"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C44"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c45'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c45'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c45=NULL where expiry_ticket_c45 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c45=NULL where expiry_ticket_c45 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c45']!='C45' && $row['expiry_ticket_c45']==NULL)
	{?>
      <form action="ticket_booking/ticketc45.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c45" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c45" type="submit" class="seat-width-height"  value="C45"/>
      </form>
      <?php  } elseif($row['ticket_c45']=='C45' && $row['expiry_ticket_c45']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C45"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C45"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c46'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c46'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c46=NULL where expiry_ticket_c46 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c46=NULL where expiry_ticket_c46 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c46']!='C46' && $row['expiry_ticket_c46']==NULL)
	{?>
      <form action="ticket_booking/ticketc46.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c46" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c46" type="submit" class="seat-width-height"  value="C46"/>
      </form>
      <?php  } elseif($row['ticket_c46']=='C46' && $row['expiry_ticket_c46']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C46"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C46"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c47'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c47'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c47=NULL where expiry_ticket_c47 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c47=NULL where expiry_ticket_c47 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c47']!='C47' && $row['expiry_ticket_c47']==NULL)
	{?>
      <form action="ticket_booking/ticketc47.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c47" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c47" type="submit" class="seat-width-height"  value="C47"/>
      </form>
      <?php  } elseif($row['ticket_c47']=='C47' && $row['expiry_ticket_c47']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C47"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C47"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c48'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c48'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c48=NULL where expiry_ticket_c48 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c48=NULL where expiry_ticket_c48 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c48']!='C48' && $row['expiry_ticket_c48']==NULL)
	{?>
      <form action="ticket_booking/ticketc48.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c48" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c48" type="submit" class="seat-width-height"  value="C48"/>
      </form>
      <?php  } elseif($row['ticket_c48']=='C48' && $row['expiry_ticket_c48']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C48"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C48"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">		<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c49'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c49'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c49=NULL where expiry_ticket_c49 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c49=NULL where expiry_ticket_c49 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c49']!='C49' && $row['expiry_ticket_c49']==NULL)
	{?>
      <form action="ticket_booking/ticketc49.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c49" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c49" type="submit" class="seat-width-height"  value="C49"/>
      </form>
      <?php  } elseif($row['ticket_c49']=='C49' && $row['expiry_ticket_c49']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C49"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C49"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c50'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c50'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c50=NULL where expiry_ticket_c50 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c50=NULL where expiry_ticket_c50 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c50']!='C50' && $row['expiry_ticket_c50']==NULL)
	{?>
      <form action="ticket_booking/ticketc50.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c50" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c50" type="submit" class="seat-width-height"  value="C50"/>
      </form>
      <?php  } elseif($row['ticket_c50']=='C50' && $row['expiry_ticket_c50']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C50"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C50"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c51'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c51'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c51=NULL where expiry_ticket_c51 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c51=NULL where expiry_ticket_c51 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c51']!='C51' && $row['expiry_ticket_c51']==NULL)
	{?>
      <form action="ticket_booking/ticketc51.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c51" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c51" type="submit" class="seat-width-height"  value="C51"/>
      </form>
      <?php  } elseif($row['ticket_c51']=='C51' && $row['expiry_ticket_c51']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C51"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C51"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c52'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c52'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c52=NULL where expiry_ticket_c52 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c52=NULL where expiry_ticket_c52 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c52']!='C52' && $row['expiry_ticket_c52']==NULL)
	{?>
      <form action="ticket_booking/ticketc52.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c52" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c52" type="submit" class="seat-width-height"  value="C52"/>
      </form>
      <?php  } elseif($row['ticket_c52']=='C52' && $row['expiry_ticket_c52']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C52"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C52"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c53'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c53'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c53=NULL where expiry_ticket_c53 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c53=NULL where expiry_ticket_c53 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c53']!='C53' && $row['expiry_ticket_c53']==NULL)
	{?>
      <form action="ticket_booking/ticketc53.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c53" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c53" type="submit" class="seat-width-height"  value="C53"/>
      </form>
      <?php  } elseif($row['ticket_c53']=='C53' && $row['expiry_ticket_c53']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C53"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C53"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c54'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c54'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c54=NULL where expiry_ticket_c54 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c54=NULL where expiry_ticket_c54 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c54']!='C54' && $row['expiry_ticket_c54']==NULL)
	{?>
      <form action="ticket_booking/ticketc54.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c54" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c54" type="submit" class="seat-width-height"  value="C54"/>
      </form>
      <?php  } elseif($row['ticket_c54']=='C54' && $row['expiry_ticket_c54']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C54"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C54"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c55'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c55'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c55=NULL where expiry_ticket_c55 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c55=NULL where expiry_ticket_c55 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c55']!='C55' && $row['expiry_ticket_c55']==NULL)
	{?>
      <form action="ticket_booking/ticketc55.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c55" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c55" type="submit" class="seat-width-height"  value="C55"/>
      </form>
      <?php  } elseif($row['ticket_c55']=='C55' && $row['expiry_ticket_c55']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C55"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C55"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c56'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c56'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c56=NULL where expiry_ticket_c56 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c56=NULL where expiry_ticket_c56 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c56']!='C56' && $row['expiry_ticket_c56']==NULL)
	{?>
      <form action="ticket_booking/ticketc56.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c56" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c56" type="submit" class="seat-width-height"  value="C56"/>
      </form>
      <?php  } elseif($row['ticket_c56']=='C56' && $row['expiry_ticket_c56']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C56"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C56"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c57'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c57'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c57=NULL where expiry_ticket_c57 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c57=NULL where expiry_ticket_c57 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c57']!='C57' && $row['expiry_ticket_c57']==NULL)
	{?>
      <form action="ticket_booking/ticketc57.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c57" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c57" type="submit" class="seat-width-height"  value="C57"/>
      </form>
      <?php  } elseif($row['ticket_c57']=='C57' && $row['expiry_ticket_c57']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C57"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C57"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c58'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c58'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c58=NULL where expiry_ticket_c58 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c58=NULL where expiry_ticket_c58 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c58']!='C58' && $row['expiry_ticket_c58']==NULL)
	{?>
      <form action="ticket_booking/ticketc58.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c58" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c58" type="submit" class="seat-width-height"  value="C58"/>
      </form>
      <?php  } elseif($row['ticket_c58']=='C58' && $row['expiry_ticket_c58']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C58"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C58"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c59'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c59'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c59=NULL where expiry_ticket_c59 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c59=NULL where expiry_ticket_c59 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c59']!='C59' && $row['expiry_ticket_c59']==NULL)
	{?>
      <form action="ticket_booking/ticketc59.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c59" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c59" type="submit" class="seat-width-height"  value="C59"/>
      </form>
      <?php  } elseif($row['ticket_c59']=='C59' && $row['expiry_ticket_c59']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C59"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C59"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c60'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c60'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c60=NULL where expiry_ticket_c60 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c60=NULL where expiry_ticket_c60 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c60']!='C60' && $row['expiry_ticket_c60']==NULL)
	{?>
      <form action="ticket_booking/ticketc60.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c60" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c60" type="submit" class="seat-width-height"  value="C60"/>
      </form>
      <?php  } elseif($row['ticket_c60']=='C60' && $row['expiry_ticket_c60']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C60"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C60"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_c61'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_c61'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_c61=NULL where expiry_ticket_c61 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c61=NULL where expiry_ticket_c61 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c61']!='C61' && $row['expiry_ticket_c61']==NULL)
	{?>
      <form action="ticket_booking/ticketc61.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_c61" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_c61" type="submit" class="seat-width-height"  value="C61"/>
      </form>
      <?php  } elseif($row['ticket_c61']=='C61' && $row['expiry_ticket_c61']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="C61"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="C61"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">&nbsp;</td>
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
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d1=NULL where expiry_ticket_d1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d1=NULL where expiry_ticket_d1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d1']!='D1' && $row['expiry_ticket_d1']==NULL)
	{?>
      <form action="ticket_booking/ticketd1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d1" type="submit" class="seat-width-height"  value="D1"/>
      </form>
      <?php  } elseif($row['ticket_d1']=='D1' && $row['expiry_ticket_d1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D1"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d2=NULL where expiry_ticket_d2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d2=NULL where expiry_ticket_d2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d2']!='D2' && $row['expiry_ticket_d2']==NULL)
	{?>
      <form action="ticket_booking/ticketd2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d2" type="submit" class="seat-width-height"  value="D2"/>
      </form>
      <?php  } elseif($row['ticket_d2']=='D2' && $row['expiry_ticket_d2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D2"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d3=NULL where expiry_ticket_d3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d3=NULL where expiry_ticket_d3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d3']!='D3' && $row['expiry_ticket_d3']==NULL)
	{?>
      <form action="ticket_booking/ticketd3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d3" type="submit" class="seat-width-height"  value="D3"/>
      </form>
      <?php  } elseif($row['ticket_d3']=='D3' && $row['expiry_ticket_d3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D3"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d4=NULL where expiry_ticket_d4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d4=NULL where expiry_ticket_d4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d4']!='D4' && $row['expiry_ticket_d4']==NULL)
	{?>
      <form action="ticket_booking/ticketd4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d4" type="submit" class="seat-width-height"  value="D4"/>
      </form>
      <?php  } elseif($row['ticket_d4']=='D4' && $row['expiry_ticket_d4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D4"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d5=NULL where expiry_ticket_d5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d5=NULL where expiry_ticket_d5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d5']!='D5' && $row['expiry_ticket_d5']==NULL)
	{?>
      <form action="ticket_booking/ticketd5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d5" type="submit" class="seat-width-height"  value="D5"/>
      </form>
      <?php  } elseif($row['ticket_d5']=='D5' && $row['expiry_ticket_d5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D5"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">		<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d6=NULL where expiry_ticket_d6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d6=NULL where expiry_ticket_d6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d6']!='D6' && $row['expiry_ticket_d6']==NULL)
	{?>
      <form action="ticket_booking/ticketd6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d6" type="submit" class="seat-width-height"  value="D6"/>
      </form>
      <?php  } elseif($row['ticket_d6']=='D6' && $row['expiry_ticket_d6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D6"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d7=NULL where expiry_ticket_d7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d7=NULL where expiry_ticket_d7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d7']!='D7' && $row['expiry_ticket_d7']==NULL)
	{?>
      <form action="ticket_booking/ticketd7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d7" type="submit" class="seat-width-height"  value="D7"/>
      </form>
      <?php  } elseif($row['ticket_d7']=='D7' && $row['expiry_ticket_d7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D7"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d8=NULL where expiry_ticket_d8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d8=NULL where expiry_ticket_d8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d8']!='D8' && $row['expiry_ticket_d8']==NULL)
	{?>
      <form action="ticket_booking/ticketd8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d8" type="submit" class="seat-width-height"  value="D8"/>
      </form>
      <?php  } elseif($row['ticket_d8']=='D8' && $row['expiry_ticket_d8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D8"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d9=NULL where expiry_ticket_d9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d9=NULL where expiry_ticket_d9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d9']!='D9' && $row['expiry_ticket_d9']==NULL)
	{?>
      <form action="ticket_booking/ticketd9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d9" type="submit" class="seat-width-height"  value="D9"/>
      </form>
      <?php  } elseif($row['ticket_d9']=='D9' && $row['expiry_ticket_d9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d10=NULL where expiry_ticket_d10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d10=NULL where expiry_ticket_d10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d10']!='D10' && $row['expiry_ticket_d10']==NULL)
	{?>
      <form action="ticket_booking/ticketd10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d10" type="submit" class="seat-width-height"  value="D10"/>
      </form>
      <?php  } elseif($row['ticket_d10']=='D10' && $row['expiry_ticket_d10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d11=NULL where expiry_ticket_d11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d11=NULL where expiry_ticket_d11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d11']!='D11' && $row['expiry_ticket_d11']==NULL)
	{?>
      <form action="ticket_booking/ticketd11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d11" type="submit" class="seat-width-height"  value="D11"/>
      </form>
      <?php  } elseif($row['ticket_d11']=='D11' && $row['expiry_ticket_d11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d12=NULL where expiry_ticket_d12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d12=NULL where expiry_ticket_d12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d12']!='D12' && $row['expiry_ticket_d12']==NULL)
	{?>
      <form action="ticket_booking/ticketd12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d12" type="submit" class="seat-width-height"  value="D12"/>
      </form>
      <?php  } elseif($row['ticket_d12']=='D12' && $row['expiry_ticket_d12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d13=NULL where expiry_ticket_d13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d13=NULL where expiry_ticket_d13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d13']!='D13' && $row['expiry_ticket_d13']==NULL)
	{?>
      <form action="ticket_booking/ticketd13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d13" type="submit" class="seat-width-height"  value="D13"/>
      </form>
      <?php  } elseif($row['ticket_d13']=='D13' && $row['expiry_ticket_d13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d14=NULL where expiry_ticket_d14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d14=NULL where expiry_ticket_d14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d14']!='D14' && $row['expiry_ticket_d14']==NULL)
	{?>
      <form action="ticket_booking/ticketd14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d14" type="submit" class="seat-width-height"  value="D14"/>
      </form>
      <?php  } elseif($row['ticket_d14']=='D14' && $row['expiry_ticket_d14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d15=NULL where expiry_ticket_d15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d15=NULL where expiry_ticket_d15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d15']!='D15' && $row['expiry_ticket_d15']==NULL)
	{?>
      <form action="ticket_booking/ticketd15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d15" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d15" type="submit" class="seat-width-height"  value="D15"/>
      </form>
      <?php  } elseif($row['ticket_d15']=='D15' && $row['expiry_ticket_d15']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D15"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D15"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d16'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d16'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d16=NULL where expiry_ticket_d16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d16=NULL where expiry_ticket_d16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d16']!='D16' && $row['expiry_ticket_d16']==NULL)
	{?>
      <form action="ticket_booking/ticketd16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d16" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d16" type="submit" class="seat-width-height"  value="D16"/>
      </form>
      <?php  } elseif($row['ticket_d16']=='D16' && $row['expiry_ticket_d16']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D16"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D16"/>
      <?php 
} 

?></td>
  </tr>
  <tr>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d17'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d17'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d17=NULL where expiry_ticket_d17 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d17=NULL where expiry_ticket_d17 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d17']!='D17' && $row['expiry_ticket_d17']==NULL)
	{?>
      <form action="ticket_booking/ticketd17.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d17" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d17" type="submit" class="seat-width-height"  value="D17"/>
      </form>
      <?php  } elseif($row['ticket_d17']=='D17' && $row['expiry_ticket_d17']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D17"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D17"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d18'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d18'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d18=NULL where expiry_ticket_d18 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d18=NULL where expiry_ticket_d18 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d18']!='D18' && $row['expiry_ticket_d18']==NULL)
	{?>
      <form action="ticket_booking/ticketd18.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d18" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d18" type="submit" class="seat-width-height"  value="D18"/>
      </form>
      <?php  } elseif($row['ticket_d18']=='D18' && $row['expiry_ticket_d18']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D18"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D18"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d19'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d19'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d19=NULL where expiry_ticket_d19 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d19=NULL where expiry_ticket_d19 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d19']!='D19' && $row['expiry_ticket_d19']==NULL)
	{?>
      <form action="ticket_booking/ticketd19.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d19" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d19" type="submit" class="seat-width-height"  value="D19"/>
      </form>
      <?php  } elseif($row['ticket_d19']=='D19' && $row['expiry_ticket_d19']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D19"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D19"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d20'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d20'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d20=NULL where expiry_ticket_d20 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d20=NULL where expiry_ticket_d20 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d20']!='D20' && $row['expiry_ticket_d20']==NULL)
	{?>
      <form action="ticket_booking/ticketd20.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d20" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d20" type="submit" class="seat-width-height"  value="D20"/>
      </form>
      <?php  } elseif($row['ticket_d20']=='D20' && $row['expiry_ticket_d20']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D20"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D20"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d21'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d21'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d21=NULL where expiry_ticket_d21 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d21=NULL where expiry_ticket_d21 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d21']!='D21' && $row['expiry_ticket_d21']==NULL)
	{?>
      <form action="ticket_booking/ticketd21.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d21" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d21" type="submit" class="seat-width-height"  value="D21"/>
      </form>
      <?php  } elseif($row['ticket_d21']=='D21' && $row['expiry_ticket_d21']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D21"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D21"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d22'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d22'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d22=NULL where expiry_ticket_d22 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d22=NULL where expiry_ticket_d22 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d22']!='D22' && $row['expiry_ticket_d22']==NULL)
	{?>
      <form action="ticket_booking/ticketd22.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d22" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d22" type="submit" class="seat-width-height"  value="D22"/>
      </form>
      <?php  } elseif($row['ticket_d22']=='D22' && $row['expiry_ticket_d22']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D22"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D22"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d23'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d23'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d23=NULL where expiry_ticket_d23 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d23=NULL where expiry_ticket_d23 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d23']!='D23' && $row['expiry_ticket_d23']==NULL)
	{?>
      <form action="ticket_booking/ticketd23.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d23" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d23" type="submit" class="seat-width-height"  value="D23"/>
      </form>
      <?php  } elseif($row['ticket_d23']=='D23' && $row['expiry_ticket_d23']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D23"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D23"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d24'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d24'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d24=NULL where expiry_ticket_d24 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d24=NULL where expiry_ticket_d24 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d24']!='D24' && $row['expiry_ticket_d24']==NULL)
	{?>
      <form action="ticket_booking/ticketd24.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d24" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d24" type="submit" class="seat-width-height"  value="D24"/>
      </form>
      <?php  } elseif($row['ticket_d24']=='D24' && $row['expiry_ticket_d24']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D24"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D24"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d25'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d25'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d25=NULL where expiry_ticket_d25 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d25=NULL where expiry_ticket_d25 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d25']!='D25' && $row['expiry_ticket_d25']==NULL)
	{?>
      <form action="ticket_booking/ticketd25.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d25" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d25" type="submit" class="seat-width-height"  value="D25"/>
      </form>
      <?php  } elseif($row['ticket_d25']=='D25' && $row['expiry_ticket_d25']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D25"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D25"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d26'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d26'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d26=NULL where expiry_ticket_d26 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d26=NULL where expiry_ticket_d26 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d26']!='D26' && $row['expiry_ticket_d26']==NULL)
	{?>
      <form action="ticket_booking/ticketd26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d26" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d26" type="submit" class="seat-width-height"  value="D26"/>
      </form>
      <?php  } elseif($row['ticket_d26']=='D26' && $row['expiry_ticket_d26']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D26"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D26"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d26'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d26'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d26=NULL where expiry_ticket_d26 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d26=NULL where expiry_ticket_d26 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d26']!='D26' && $row['expiry_ticket_d26']==NULL)
	{?>
      <form action="ticket_booking/ticketd26.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d26" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d26" type="submit" class="seat-width-height"  value="D26"/>
      </form>
      <?php  } elseif($row['ticket_d26']=='D26' && $row['expiry_ticket_d26']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D26"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D26"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d28'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d28'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d28=NULL where expiry_ticket_d28 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d28=NULL where expiry_ticket_d28 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d28']!='D28' && $row['expiry_ticket_d28']==NULL)
	{?>
      <form action="ticket_booking/ticketd28.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d28" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d28" type="submit" class="seat-width-height"  value="D28"/>
      </form>
      <?php  } elseif($row['ticket_d28']=='D28' && $row['expiry_ticket_d28']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D28"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D28"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d29'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d29'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d29=NULL where expiry_ticket_d29 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d29=NULL where expiry_ticket_d29 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d29']!='D29' && $row['expiry_ticket_d29']==NULL)
	{?>
      <form action="ticket_booking/ticketd29.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d29" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d29" type="submit" class="seat-width-height"  value="D29"/>
      </form>
      <?php  } elseif($row['ticket_d29']=='D29' && $row['expiry_ticket_d29']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D29"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D29"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d30'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d30'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d30=NULL where expiry_ticket_d30 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d30=NULL where expiry_ticket_d30 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d30']!='D30' && $row['expiry_ticket_d30']==NULL)
	{?>
      <form action="ticket_booking/ticketd30.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d30" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d30" type="submit" class="seat-width-height"  value="D30"/>
      </form>
      <?php  } elseif($row['ticket_d30']=='D30' && $row['expiry_ticket_d30']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D30"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D30"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d31'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d31'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d31=NULL where expiry_ticket_d31 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d31=NULL where expiry_ticket_d31 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d31']!='D31' && $row['expiry_ticket_d31']==NULL)
	{?>
      <form action="ticket_booking/ticketd31.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d31" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d31" type="submit" class="seat-width-height"  value="D31"/>
      </form>
      <?php  } elseif($row['ticket_d31']=='D31' && $row['expiry_ticket_d31']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D31"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D31"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_d32'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_d32'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_d32=NULL where expiry_ticket_d32 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_d32=NULL where expiry_ticket_d32 < '".$curtimes."'");

?> 
	<?php if($row['ticket_d32']!='D32' && $row['expiry_ticket_d32']==NULL)
	{?>
      <form action="ticket_booking/ticketd32.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_d32" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_d32" type="submit" class="seat-width-height"  value="D32"/>
      </form>
      <?php  } elseif($row['ticket_d32']=='D32' && $row['expiry_ticket_d32']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="D32"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="D32"/>
      <?php 
} 

?></td>
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
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e1'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e1'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e1=NULL where expiry_ticket_e1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e1=NULL where expiry_ticket_e1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e1']!='E1' && $row['expiry_ticket_e1']==NULL)
	{?>
      <form action="ticket_booking/tickete1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e1" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e1" type="submit" class="seat-width-height"  value="E1"/>
      </form>
      <?php  } elseif($row['ticket_e1']=='E1' && $row['expiry_ticket_e1']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E1"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E1"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e2'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e2'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e2=NULL where expiry_ticket_e2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e2=NULL where expiry_ticket_e2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e2']!='E2' && $row['expiry_ticket_e2']==NULL)
	{?>
      <form action="ticket_booking/tickete2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e2" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e2" type="submit" class="seat-width-height"  value="E2"/>
      </form>
      <?php  } elseif($row['ticket_e2']=='E2' && $row['expiry_ticket_e2']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E2"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E2"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e3'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e3'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e3=NULL where expiry_ticket_e3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e3=NULL where expiry_ticket_e3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e3']!='E3' && $row['expiry_ticket_e3']==NULL)
	{?>
      <form action="ticket_booking/tickete3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e3" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e3" type="submit" class="seat-width-height"  value="E3"/>
      </form>
      <?php  } elseif($row['ticket_e3']=='E3' && $row['expiry_ticket_e3']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E3"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E3"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e4'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e4'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e4=NULL where expiry_ticket_e4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e4=NULL where expiry_ticket_e4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e4']!='E4' && $row['expiry_ticket_e4']==NULL)
	{?>
      <form action="ticket_booking/tickete4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e4" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e4" type="submit" class="seat-width-height"  value="E4"/>
      </form>
      <?php  } elseif($row['ticket_e4']=='E4' && $row['expiry_ticket_e4']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E4"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E4"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e5'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e5=NULL where expiry_ticket_e5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e5=NULL where expiry_ticket_e5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e5']!='E5' && $row['expiry_ticket_e5']==NULL)
	{?>
      <form action="ticket_booking/tickete5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e5" type="submit" class="seat-width-height"  value="E5"/>
      </form>
      <?php  } elseif($row['ticket_e5']=='E5' && $row['expiry_ticket_e5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E5"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e6'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e6=NULL where expiry_ticket_e6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e6=NULL where expiry_ticket_e6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e6']!='E6' && $row['expiry_ticket_e6']==NULL)
	{?>
      <form action="ticket_booking/tickete6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e6" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e6" type="submit" class="seat-width-height"  value="E6"/>
      </form>
      <?php  } elseif($row['ticket_e6']=='E6' && $row['expiry_ticket_e6']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E6"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E6"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e7'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e7'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e7=NULL where expiry_ticket_e7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e7=NULL where expiry_ticket_e7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e7']!='E7' && $row['expiry_ticket_e7']==NULL)
	{?>
      <form action="ticket_booking/tickete7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e7" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e7" type="submit" class="seat-width-height"  value="E7"/>
      </form>
      <?php  } elseif($row['ticket_e7']=='E7' && $row['expiry_ticket_e7']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E7"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E7"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e8'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e8'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e8=NULL where expiry_ticket_e8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e8=NULL where expiry_ticket_e8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e8']!='E8' && $row['expiry_ticket_e8']==NULL)
	{?>
      <form action="ticket_booking/tickete8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e8" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e8" type="submit" class="seat-width-height"  value="E8"/>
      </form>
      <?php  } elseif($row['ticket_e8']=='E8' && $row['expiry_ticket_e8']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E8"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E8"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e9'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e9'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e9=NULL where expiry_ticket_e9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e9=NULL where expiry_ticket_e9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e9']!='E9' && $row['expiry_ticket_e9']==NULL)
	{?>
      <form action="ticket_booking/tickete9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e9" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e9" type="submit" class="seat-width-height"  value="E9"/>
      </form>
      <?php  } elseif($row['ticket_e9']=='E9' && $row['expiry_ticket_e9']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E9"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E9"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e10'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e10=NULL where expiry_ticket_e10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e10=NULL where expiry_ticket_e10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e10']!='E10' && $row['expiry_ticket_e10']==NULL)
	{?>
      <form action="ticket_booking/tickete10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e10" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e10" type="submit" class="seat-width-height"  value="E10"/>
      </form>
      <?php  } elseif($row['ticket_e10']=='E10' && $row['expiry_ticket_e10']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E10"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E10"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e11'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e11'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e11=NULL where expiry_ticket_e11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e11=NULL where expiry_ticket_e11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e11']!='E11' && $row['expiry_ticket_e11']==NULL)
	{?>
      <form action="ticket_booking/tickete11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e11" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e11" type="submit" class="seat-width-height"  value="E11"/>
      </form>
      <?php  } elseif($row['ticket_e11']=='E11' && $row['expiry_ticket_e11']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E11"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E11"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e12'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e12=NULL where expiry_ticket_e12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e12=NULL where expiry_ticket_e12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e12']!='E12' && $row['expiry_ticket_e12']==NULL)
	{?>
      <form action="ticket_booking/tickete12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e12" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e12" type="submit" class="seat-width-height"  value="E12"/>
      </form>
      <?php  } elseif($row['ticket_e12']=='E12' && $row['expiry_ticket_e12']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E12"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E12"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e13'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e13'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e13=NULL where expiry_ticket_e13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e13=NULL where expiry_ticket_e13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e13']!='E13' && $row['expiry_ticket_e13']==NULL)
	{?>
      <form action="ticket_booking/tickete13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e13" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e13" type="submit" class="seat-width-height"  value="E13"/>
      </form>
      <?php  } elseif($row['ticket_e13']=='E13' && $row['expiry_ticket_e13']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E13"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E13"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e14'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e14'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e14=NULL where expiry_ticket_e14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e14=NULL where expiry_ticket_e14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e14']!='E14' && $row['expiry_ticket_e14']==NULL)
	{?>
      <form action="ticket_booking/tickete14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_e14" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_e14" type="submit" class="seat-width-height"  value="E14"/>
      </form>
      <?php  } elseif($row['ticket_e14']=='E14' && $row['expiry_ticket_e14']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="E14"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="E14"/>
      <?php 
} 

?></td>
    <td align="left" valign="top">	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_e15'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
   $rowexp['expiry_ticket_e15'];

$curtimes = date("H:i:s");mysql_query("UPDATE team_booking_details set ticket_e15=NULL where expiry_ticket_e15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_e15=NULL where expiry_ticket_e15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_e15']!='E15' && $row['expiry_ticket_e15']==NULL)
	{?>
      <form action="ticket_booking/tickete15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
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