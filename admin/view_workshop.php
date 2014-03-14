<?php
/*
session_start();
if ($_SESSION['admin']['username']=="")
{
	header("location:http://www.jobtardis.in/administration");
	exit;
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Workshop Report</title>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#startdate").datepicker();
  });
  </script>
  
  <script>
  $(document).ready(function() {
    $("#enddate").datepicker();
  });
  </script>
  
</head>

<body bgcolor="#CCCCCC">
<h1 align="center" style="font-size:20px;">Search Report</h1>
<table align="right">
<tr>
<td><a href=""><input type="button" name="home" value="Home"/></a></td>
</tr>
</table>

<form action="" enctype="multipart/form-data" method="post">
<table align="center">
<tr>
<td>Start Date</td>
<td><input id="startdate" name="startdate" type="text" size="25" /></td>
<!--<td><a href="javascript:NewCal('startdate','ddmmmyyyy',true,24)"><img src="datetimepick/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>-->
<td>&nbsp;</td>
<td>End Date </td>
<td><input type="text" name="enddate" id="enddate" size="25"/></td>
<!--<td><a href="javascript:NewCal('enddate','ddmmmyyyy',true,24)"><img src="datetimepick/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>-->
<td>&nbsp;</td>
</tr>

<tr>
<td>Ticket No</td>
<td><input type="text" name="ticket_number" /></td>
</tr>

<!--<tr>
<td>Email Id</td>
<td><input type="text" name="email" /></td>
</tr>-->

<tr>
<td><input type="submit" name="submit" value="Search" /></td>
<td><input type="button" name="report" id="report" value="Report All" onclick="return download();"></td>
</tr>
</table>
</form>

</body>
</html>
 
<?php
if(isset($_POST['submit']))
{
$startdate		= date("Y-m-d",strtotime($_POST['startdate']));
$enddate		= date("Y-m-d",strtotime($_POST['enddate']));
$ticket_number	= $_POST['ticket_number'];



// start db connection 
$con = mysql_connect("108.163.250.251","ANanD_munn","munn12");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  

mysql_select_db("ANanDHuWiN_munnar", $con);
// end db connection 

// start select query for Date    
//die("SELECT * FROM pan where date between '$startdate' AND '$enddate'");
$result = mysql_query("SELECT * FROM ticket_details where date_of_registration between '$startdate' AND '$enddate' OR ticket_number='$ticket_number' ORDER BY date_of_registration desc");

?>


<!--<h2 align="center">Report Details</h2>
<table align="right">
<tr>
<td><a href="index.php"><input type="button" name="home" value="Home"/></a></td>	
<td><a href="view.php"><input type="button" name="view" value="View"/></a></td>
</tr>
</table>
-->
<h2 align="center">Report Details <?php //echo "Outlet:" . " " .$location;?></h2>

<?php 
if($result == 0)
{
echo "No Records Found";
}
else 
{
echo "<table border='1' align=center>
<tr>
<th>Serial No</th>
<th>Seat Id</th>
<th>Ticket No</th>
<th>Event Timing</th>
<th>Payment Status</th>
<th>Date of Registration</th>
</tr>";

while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id']. "</td>";
echo "<td>" . $row['seating_id']. "</td>";
echo "<td>" . $row['ticket_number']. "</td>";
echo "<td>" . $row['event_timing_id']. "</td>";
echo "<td>" . $row['payment_status']. "</td>";
echo "<td>" . $row['date_of_registration']. "</td>";
?>

<?php

echo "</tr>";
}
}
}
echo "</table>";

//mysql_close($con);
?>
