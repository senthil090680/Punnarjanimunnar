<?php 

include '../configs/config_database.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>:: Welcome ::</title>
   



<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>



<body>



<?php


$ticket_b3 =$_GET['ticket_b3'];

$user_id =$_GET['user_id'];
echo $user_id;
$email =$_GET['email'];
echo email;
$seat_no =$_GET['ticket_b3'];
$auditorium =$_GET['auditorium'];
echo $auditorium;
$event=$_GET['event'];
echo $event;
$time=$_GET['time'];
echo $time;
$rate_b3=$_GET['Class_one_rate'];
echo $rate_b3;

$sql=mysql_query("UPDATE team_booking_details SET ticket_b3='$ticket_b3'
WHERE auditorium='".$auditorium."' and event='".$event."' and time='".$time."' ");


 $sql_event=mysql_query("insert into team_booked_details(auditorium,event,time,email,user_id,seat_no,date)values('$auditorium','$event','$time','$email','$user_id','$seat_no',now())");



$sql_rate=mysql_query("UPDATE team_booked_ticket_rates SET rate_b3='$rate_b3'
WHERE  user_id='".$user_id."' ");


echo "<script>alert('ticket is booked!')</script>";
echo "<script>window.location.href='../book_your_ticket.php'</script>";


?>

</body>
</html>
