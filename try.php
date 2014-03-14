<?php
$host="localhost";
$user="teamads_munnar";
$password="munnar123";
$database="teamads_munnar";
$con=mysql_connect($host, $user, $password)
			or die('mysql_connect: Exception in database connection');
$source=mysql_select_db($database,$con)
			or die('mysql_select_db: Exception in selecting source');
			?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
  	


	$query_total = "SELECT SUM(rate)as Total FROM team_booked_details where user_id='".$a."'"; 
	$result_total = mysql_query($query_total) or die(mysql_error());
	while($row_total = mysql_fetch_array($result_total)){
		echo "Total Amount . ". $row_total['Total'];
		echo "<br />";
	}
?><br>

	<?php  $res = mysql_query("SELECT  * FROM event_master ");   		
	     
		 	?>

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
		
echo "<tr><td>".$rows['Event_name']."</td><td>". $rows['Remarks'] ."</td><td>".$rows['time']."</td><td>".$rows['seat_no']."</td><td>".$rows['rate']."</td></tr>";
	
			}
?>


</body>
</html>
