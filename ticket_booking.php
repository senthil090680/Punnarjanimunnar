<?php 
include 'configs/config_database.php';
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>:: Welcome ::</title>
   



<link href="ticket_booking/stylesheet.css" rel="stylesheet" type="text/css" />
</head>



<body>



<?php


echo $ticket =$_GET['ticket'];

$user_id =$_GET['user_id'];
//echo $user_id;
$email =$_GET['email'];
//echo email;
$seat_no =$_GET['ticket'];
$auditorium =$_GET['auditorium'];
//echo $auditorium;
$event=$_GET['event'];
//echo $event;
$time=$_GET['time'];
//echo $time;
$rate=$_GET['rate'];
//echo $rate;
//echo $expirytime = date("H:i:s", time());
//echo "<br />";

echo $expiry= date("H:i:s", strtotime ("+30 minutes"));




 $sql_event=mysql_query("insert into team_booked_details(auditorium,event,time,email,user_id,seat_no,rate,date,expiry)values('$auditorium','$event','$time','$email','$user_id','$seat_no','$rate',now(),'$expiry')");
$rate_117=$_GET['Class_three_rate'];
echo $rate_117;

$sql=mysql_query("insert into team_book_details(auditorium,event,time,user_id,date,ticket,expiry)values('$auditorium','$event','$time','$user_id',now(),'$ticket','$expiry')");



echo "<script>alert('ticket is booked!')</script>";
echo "<script>window.location.href='book_your_ticket.php'</script>";



?>

</body>
</html>
