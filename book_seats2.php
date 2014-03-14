
<?php include 'configs/config_database.php';


 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
 echo $event=$_GET['event'];
echo 	$time=$_GET['time'];
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
  echo $rowexp['expiry_ticket_a1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a1=NULL where expiry_ticket_a1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a1=NULL where expiry_ticket_a1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a1']!='A1' && $row['expiry_ticket_a1']==NULL)
	{?>
      <form action="ticket_booking/ticketa1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b1=NULL where expiry_ticket_b1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b1=NULL where expiry_ticket_b1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b1']!='B1' && $row['expiry_ticket_b1']==NULL)
	{?>
      <form action="ticket_booking/ticketb1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c1=NULL where expiry_ticket_c1 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c1=NULL where expiry_ticket_c1 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c1']!='C1' && $row['expiry_ticket_c1']==NULL)
	{?>
      <form action="ticket_booking/ticketc1.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d1=NULL where expiry_ticket_d1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e1=NULL where expiry_ticket_e1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f1=NULL where expiry_ticket_f1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g1=NULL where expiry_ticket_g1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h1=NULL where expiry_ticket_h1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i1=NULL where expiry_ticket_i1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_j1'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j1=NULL where expiry_ticket_j1 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_115'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_115=NULL where expiry_ticket_115 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_129'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_129=NULL where expiry_ticket_129 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_143'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_143=NULL where expiry_ticket_143 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_157'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_157=NULL where expiry_ticket_157 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a2=NULL where expiry_ticket_a2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a2=NULL where expiry_ticket_a2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a2']!='A2' && $row['expiry_ticket_a2']==NULL)
	{?>
      <form action="ticket_booking/ticketa2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b2=NULL where expiry_ticket_b2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b2=NULL where expiry_ticket_b2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b2']!='B2' && $row['expiry_ticket_b2']==NULL)
	{?>
      <form action="ticket_booking/ticketb2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c2=NULL where expiry_ticket_c2 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c2=NULL where expiry_ticket_c2 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c2']!='C2' && $row['expiry_ticket_c2']==NULL)
	{?>
      <form action="ticket_booking/ticketc2.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d2=NULL where expiry_ticket_d2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e2=NULL where expiry_ticket_e2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f2=NULL where expiry_ticket_f2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g2=NULL where expiry_ticket_g2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h2=NULL where expiry_ticket_h2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i2=NULL where expiry_ticket_i2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_j2'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j2=NULL where expiry_ticket_j2 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_102'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_102=NULL where expiry_ticket_102 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_116'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_116'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_116'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_116=NULL where expiry_ticket_116 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_158'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_158=NULL where expiry_ticket_158 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a3=NULL where expiry_ticket_a3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a3=NULL where expiry_ticket_a3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a3']!='A3' && $row['expiry_ticket_a3']==NULL)
	{?>
      <form action="ticket_booking/ticketa3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b3=NULL where expiry_ticket_b3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b3=NULL where expiry_ticket_b3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b3']!='B3' && $row['expiry_ticket_b3']==NULL)
	{?>
      <form action="ticket_booking/ticketb3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c3=NULL where expiry_ticket_c3 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c3=NULL where expiry_ticket_c3 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c3']!='C3' && $row['expiry_ticket_c3']==NULL)
	{?>
      <form action="ticket_booking/ticketc3.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d3=NULL where expiry_ticket_d3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e3=NULL where expiry_ticket_e3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f3=NULL where expiry_ticket_f3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g3=NULL where expiry_ticket_g3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h3=NULL where expiry_ticket_h3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i3=NULL where expiry_ticket_i3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_j3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j3=NULL where expiry_ticket_j3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_j3'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j3=NULL where expiry_ticket_j3 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_117'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_117=NULL where expiry_ticket_117 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_131'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_131=NULL where expiry_ticket_131 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_145'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_145=NULL where expiry_ticket_145 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_159'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_159=NULL where expiry_ticket_159 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a4=NULL where expiry_ticket_a4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a4=NULL where expiry_ticket_a4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a4']!='A4' && $row['expiry_ticket_a4']==NULL)
	{?>
      <form action="ticket_booking/ticketa4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b4=NULL where expiry_ticket_b4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b4=NULL where expiry_ticket_b4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b4']!='B4' && $row['expiry_ticket_b4']==NULL)
	{?>
      <form action="ticket_booking/ticketb4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c4=NULL where expiry_ticket_c4 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c4=NULL where expiry_ticket_c4 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c4']!='C4' && $row['expiry_ticket_c4']==NULL)
	{?>
      <form action="ticket_booking/ticketc4.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d4=NULL where expiry_ticket_d4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e4=NULL where expiry_ticket_e4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f4=NULL where expiry_ticket_f4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g4=NULL where expiry_ticket_g4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h4=NULL where expiry_ticket_h4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i4=NULL where expiry_ticket_i4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_j4'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j4=NULL where expiry_ticket_j4 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_104'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_104=NULL where expiry_ticket_104 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_118'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_118=NULL where expiry_ticket_118 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_132'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_132=NULL where expiry_ticket_132 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_132'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_132=NULL where expiry_ticket_132 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_160'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_160=NULL where expiry_ticket_160 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a5=NULL where expiry_ticket_a5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a5=NULL where expiry_ticket_a5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a5']!='A5' && $row['expiry_ticket_a5']==NULL)
	{?>
      <form action="ticket_booking/ticketa5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b5=NULL where expiry_ticket_b5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b5=NULL where expiry_ticket_b5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b5']!='B5' && $row['expiry_ticket_b5']==NULL)
	{?>
      <form action="ticket_booking/ticketb5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c5=NULL where expiry_ticket_c5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c5=NULL where expiry_ticket_c5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c5']!='C5' && $row['expiry_ticket_c5']==NULL)
	{?>
      <form action="ticket_booking/ticketc5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d5=NULL where expiry_ticket_d5 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e5=NULL where expiry_ticket_e5 < '".$curtimes."'");
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
    <td width="82" align="left" valign="top"><	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_f5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f5=NULL where expiry_ticket_f5 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g5=NULL where expiry_ticket_g5 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_g5=NULL where expiry_ticket_g5 < '".$curtimes."'");

?> 
	<?php if($row['ticket_g5']!='g5' && $row['expiry_ticket_g5']==NULL)
	{?>
      <form action="ticket_booking/ticketg5.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
        <input name="email" type="hidden"  value="<?php echo strtoupper($_SESSION['user_email_session']); ?>"/>
        <input name="user_id" type="hidden"  value="<?php echo ($_SESSION['id']); ?>"/>
		      <input name="expiry_ticket_g5" type="hidden"  value="<?php echo  date("H:i:s", strtotime ("+30 minutes"));?>"/>
        <input name="ticket_g5" type="submit" class="seat-width-height"  value="g5"/>
      </form>
      <?php  } elseif($row['ticket_g5']=='g5' && $row['expiry_ticket_g5']=='BOOKED') { ?>
      <input name="" type="submit" class="notavailable-seats"  value="g5"/>
      <?php 
} 
else { ?>
      <input name="" type="submit" class="notavailable-seats-YET"  value="g5"/>
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
  echo $rowexp['expiry_ticket_h5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h5=NULL where expiry_ticket_h5 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i5=NULL where expiry_ticket_i5 < '".$curtimes."'");
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
    
    <td><	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_j5'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_j5'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j5=NULL where expiry_ticket_j5 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_105'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_105=NULL where expiry_ticket_105 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_119'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_119=NULL where expiry_ticket_119 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_133'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_133=NULL where expiry_ticket_133 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_147'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_147=NULL where expiry_ticket_147 < '".$curtimes."'");
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
    <td width="48" align="left" valign="top"><	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_161'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_161'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_161=NULL where expiry_ticket_161 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a6=NULL where expiry_ticket_a6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a6=NULL where expiry_ticket_a6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a6']!='A6' && $row['expiry_ticket_a6']==NULL)
	{?>
      <form action="ticket_booking/ticketa6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b6=NULL where expiry_ticket_b6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b6=NULL where expiry_ticket_b6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b6']!='B6' && $row['expiry_ticket_b6']==NULL)
	{?>
      <form action="ticket_booking/ticketb6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c6=NULL where expiry_ticket_c6 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c6=NULL where expiry_ticket_c6 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c6']!='C6' && $row['expiry_ticket_c6']==NULL)
	{?>
      <form action="ticket_booking/ticketc6.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d6=NULL where expiry_ticket_d6 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e6=NULL where expiry_ticket_e6 < '".$curtimes."'");
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
    <td width="82" align="left" valign="top"><	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_f6'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_f6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f6=NULL where expiry_ticket_f6 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g6=NULL where expiry_ticket_g6 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h6=NULL where expiry_ticket_h6 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i6=NULL where expiry_ticket_i6 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_j6'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_j6=NULL where expiry_ticket_j6 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_106'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_106=NULL where expiry_ticket_106 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_120'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_120=NULL where expiry_ticket_120 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_134'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_134=NULL where expiry_ticket_134 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_148'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_148=NULL where expiry_ticket_148 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_162'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_162=NULL where expiry_ticket_162 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a7=NULL where expiry_ticket_a7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a7=NULL where expiry_ticket_a7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a7']!='A7' && $row['expiry_ticket_a7']==NULL)
	{?>
      <form action="ticket_booking/ticketa7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b7=NULL where expiry_ticket_b7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b7=NULL where expiry_ticket_b7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b7']!='B7' && $row['expiry_ticket_b7']==NULL)
	{?>
      <form action="ticket_booking/ticketb7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c7=NULL where expiry_ticket_c7 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c7=NULL where expiry_ticket_c7 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c7']!='C7' && $row['expiry_ticket_c7']==NULL)
	{?>
      <form action="ticket_booking/ticketc7.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d7=NULL where expiry_ticket_d7 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e7=NULL where expiry_ticket_e7 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f7=NULL where expiry_ticket_f7 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g7=NULL where expiry_ticket_g7 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h7=NULL where expiry_ticket_h7 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i7'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i7=NULL where expiry_ticket_i7 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_107'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_107=NULL where expiry_ticket_107 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_121'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_121=NULL where expiry_ticket_121 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_135'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_135=NULL where expiry_ticket_135 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_149'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_149=NULL where expiry_ticket_149 < '".$curtimes."'");
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
    <td width="48" align="left" valign="top"><	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_163'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_163'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_163=NULL where expiry_ticket_163 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a8=NULL where expiry_ticket_a8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a8=NULL where expiry_ticket_a8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a8']!='A8' && $row['expiry_ticket_a8']==NULL)
	{?>
      <form action="ticket_booking/ticketa8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b8=NULL where expiry_ticket_b8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b8=NULL where expiry_ticket_b8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b8']!='B8' && $row['expiry_ticket_b8']==NULL)
	{?>
      <form action="ticket_booking/ticketb8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c8=NULL where expiry_ticket_c8 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c8=NULL where expiry_ticket_c8 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c8']!='C8' && $row['expiry_ticket_c8']==NULL)
	{?>
      <form action="ticket_booking/ticketc8.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d8=NULL where expiry_ticket_d8 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e8=NULL where expiry_ticket_e8 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f8=NULL where expiry_ticket_f8 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g8=NULL where expiry_ticket_g8 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h8=NULL where expiry_ticket_h8 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i8'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i8=NULL where expiry_ticket_i8 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_108'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_108=NULL where expiry_ticket_108 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_122'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_122=NULL where expiry_ticket_122 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_136'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_136=NULL where expiry_ticket_136 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_150'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_150=NULL where expiry_ticket_150 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a9=NULL where expiry_ticket_a9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a9=NULL where expiry_ticket_a9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a9']!='A9' && $row['expiry_ticket_a9']==NULL)
	{?>
      <form action="ticket_booking/ticketa9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b9=NULL where expiry_ticket_b9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b9=NULL where expiry_ticket_b9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b9']!='B9' && $row['expiry_ticket_b9']==NULL)
	{?>
      <form action="ticket_booking/ticketb9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c9=NULL where expiry_ticket_c9 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c9=NULL where expiry_ticket_c9 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c9']!='C9' && $row['expiry_ticket_c9']==NULL)
	{?>
      <form action="ticket_booking/ticketc9.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d9=NULL where expiry_ticket_d9 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e9=NULL where expiry_ticket_e9 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f9=NULL where expiry_ticket_f9 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g9=NULL where expiry_ticket_g9 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h9=NULL where expiry_ticket_h9 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i9'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i9=NULL where expiry_ticket_i9 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_109'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_109=NULL where expiry_ticket_109 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_123'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_123=NULL where expiry_ticket_123 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_137'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_137=NULL where expiry_ticket_137 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_151'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_151=NULL where expiry_ticket_151 < '".$curtimes."'");
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
    <td width="82" align="left" valign="top"><	<?php 
  $resexp = mysql_query("SELECT * FROM team_booking_details where time='".$time."' and event='".$event."' and auditorium ='".$auditorium."' ");  
$rowexp = mysql_fetch_array($resexp);
 $curtimes = date("H:i:s");

  $rowexp['ticket_a10'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_a10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a10=NULL where expiry_ticket_a10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a10=NULL where expiry_ticket_a10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a10']!='A10' && $row['expiry_ticket_a10']==NULL)
	{?>
      <form action="ticket_booking/ticketa10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b10=NULL where expiry_ticket_b10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b10=NULL where expiry_ticket_b10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b10']!='B10' && $row['expiry_ticket_b10']==NULL)
	{?>
      <form action="ticket_booking/ticketb10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c10=NULL where expiry_ticket_c10 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c10=NULL where expiry_ticket_c10 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c10']!='C10' && $row['expiry_ticket_c10']==NULL)
	{?>
      <form action="ticket_booking/ticketc10.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d10=NULL where expiry_ticket_d10 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e10=NULL where expiry_ticket_e10 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f10=NULL where expiry_ticket_f10 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g10=NULL where expiry_ticket_g10 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h10=NULL where expiry_ticket_h10 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i10'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i10=NULL where expiry_ticket_i10 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_110'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_110=NULL where expiry_ticket_110 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_124'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_124=NULL where expiry_ticket_124 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_138'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_138=NULL where expiry_ticket_138 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_138'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_138=NULL where expiry_ticket_138 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a11=NULL where expiry_ticket_a11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a11=NULL where expiry_ticket_a11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a11']!='A11' && $row['expiry_ticket_a11']==NULL)
	{?>
      <form action="ticket_booking/ticketa11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b11=NULL where expiry_ticket_b11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b11=NULL where expiry_ticket_b11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b11']!='B11' && $row['expiry_ticket_b11']==NULL)
	{?>
      <form action="ticket_booking/ticketb11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c11=NULL where expiry_ticket_c11 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c11=NULL where expiry_ticket_c11 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c11']!='C11' && $row['expiry_ticket_c11']==NULL)
	{?>
      <form action="ticket_booking/ticketc11.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d11=NULL where expiry_ticket_d11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e11=NULL where expiry_ticket_e11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f11=NULL where expiry_ticket_f11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g11=NULL where expiry_ticket_g11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h11=NULL where expiry_ticket_h11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i11=NULL where expiry_ticket_i11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i11'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i11=NULL where expiry_ticket_i11 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_125'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_125=NULL where expiry_ticket_125 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_139'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_139=NULL where expiry_ticket_139 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_153'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_153=NULL where expiry_ticket_153 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a12=NULL where expiry_ticket_a12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a12=NULL where expiry_ticket_a12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a12']!='A12' && $row['expiry_ticket_a12']==NULL)
	{?>
      <form action="ticket_booking/ticketa12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b12=NULL where expiry_ticket_b12 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b12=NULL where expiry_ticket_b12 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b12']!='B12' && $row['expiry_ticket_b12']==NULL)
	{?>
      <form action="ticket_booking/ticketb12.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");
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

  $rowexp['ticket_c12'];
 $time_det = $rowexp['time'];
  $eve_det =  $rowexp['event'];
  $aud_det = $rowexp['auditorium'];
  echo $rowexp['expiry_ticket_c12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c12=NULL where expiry_ticket_c12 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e12=NULL where expiry_ticket_e12 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f12=NULL where expiry_ticket_f12 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g12=NULL where expiry_ticket_g12 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h12=NULL where expiry_ticket_h12 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i12'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i12=NULL where expiry_ticket_i12 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_112'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_112=NULL where expiry_ticket_112 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_126'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_126=NULL where expiry_ticket_126 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_140'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_140=NULL where expiry_ticket_140 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_154'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_154=NULL where expiry_ticket_154 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a13=NULL where expiry_ticket_a13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a13=NULL where expiry_ticket_a13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a13']!='A13' && $row['expiry_ticket_a13']==NULL)
	{?>
      <form action="ticket_booking/ticketa13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b13=NULL where expiry_ticket_b13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b13=NULL where expiry_ticket_b13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b13']!='B13' && $row['expiry_ticket_b13']==NULL)
	{?>
      <form action="ticket_booking/ticketb13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c13=NULL where expiry_ticket_c13 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c13=NULL where expiry_ticket_c13 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c13']!='C13' && $row['expiry_ticket_c13']==NULL)
	{?>
      <form action="ticket_booking/ticketc13.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d13=NULL where expiry_ticket_d13 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e13=NULL where expiry_ticket_e13 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f13=NULL where expiry_ticket_f13 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g13=NULL where expiry_ticket_g13 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h13=NULL where expiry_ticket_h13 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_i13'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_i13=NULL where expiry_ticket_i13 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_113'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_113=NULL where expiry_ticket_113 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_127'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_127=NULL where expiry_ticket_127 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_141'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_141=NULL where expiry_ticket_141 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_155'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_155=NULL where expiry_ticket_155 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a14=NULL where expiry_ticket_a14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a14=NULL where expiry_ticket_a14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a14']!='A14' && $row['expiry_ticket_a14']==NULL)
	{?>
      <form action="ticket_booking/ticketa14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b14=NULL where expiry_ticket_b14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b14=NULL where expiry_ticket_b14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b14']!='B14' && $row['expiry_ticket_b14']==NULL)
	{?>
      <form action="ticket_booking/ticketb14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c14=NULL where expiry_ticket_c14 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c14=NULL where expiry_ticket_c14 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c14']!='C14' && $row['expiry_ticket_c14']==NULL)
	{?>
      <form action="ticket_booking/ticketc14.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d14=NULL where expiry_ticket_d14 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e14=NULL where expiry_ticket_e14 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_f14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_f14=NULL where expiry_ticket_f14 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_g14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_g14=NULL where expiry_ticket_g14 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_h14'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_h14=NULL where expiry_ticket_h14 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_114'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_114=NULL where expiry_ticket_114 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_128'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_128=NULL where expiry_ticket_128 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_142'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_142=NULL where expiry_ticket_142 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_156'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_156=NULL where expiry_ticket_156 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a15'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a15=NULL where expiry_ticket_a15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a15=NULL where expiry_ticket_a15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a15']!='A15' && $row['expiry_ticket_a15']==NULL)
	{?>
      <form action="ticket_booking/ticketa15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b15'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b15=NULL where expiry_ticket_b15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b15=NULL where expiry_ticket_b15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b15']!='B15' && $row['expiry_ticket_b15']==NULL)
	{?>
      <form action="ticket_booking/ticketb15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c15'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c15=NULL where expiry_ticket_c15 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c15=NULL where expiry_ticket_c15 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c15']!='C15' && $row['expiry_ticket_c15']==NULL)
	{?>
      <form action="ticket_booking/ticketc15.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d15'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d15=NULL where expiry_ticket_d15 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_a16'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_a16=NULL where expiry_ticket_a16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_a16=NULL where expiry_ticket_a16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_a16']!='A16' && $row['expiry_ticket_a16']==NULL)
	{?>
      <form action="ticket_booking/ticketa16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_b16'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_b16=NULL where expiry_ticket_b16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_b16=NULL where expiry_ticket_b16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_b16']!='B16' && $row['expiry_ticket_b16']==NULL)
	{?>
      <form action="ticket_booking/ticketb16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_c16'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_c16=NULL where expiry_ticket_c16 < '".$curtimes."'");
mysql_query("UPDATE team_booking_details set expiry_ticket_c16=NULL where expiry_ticket_c16 < '".$curtimes."'");

?> 
	<?php if($row['ticket_c16']!='C16' && $row['expiry_ticket_c16']==NULL)
	{?>
      <form action="ticket_booking/ticketc16.php" method="get">
        <input name="auditorium" type="hidden" value="<?php echo $auditorium ?>" />
        <input name="event" type="hidden" value="<?php echo $event ?>" />
        <input name="time" type="hidden"  value="<?php echo $time ?>"/>
        <input name="rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
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
  echo $rowexp['expiry_ticket_d16'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_d16=NULL where expiry_ticket_d16 < '".$curtimes."'");
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
  echo $rowexp['expiry_ticket_e16'];

echo $curtimes = date("H:i:s");
mysql_query("UPDATE team_booking_details set ticket_e16=NULL where expiry_ticket_e16 < '".$curtimes."'");
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
</table>
</body>
</html>