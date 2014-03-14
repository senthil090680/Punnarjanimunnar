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
  //$resexp = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."' order by id  desc");  
//$rowexp = mysql_fetch_array($resexp);echo $rowexp['expiry'];	
//echo "<br/>";echo "<br/>";

?> 

<?php
echo $expiry_ticket_c19 =$_GET['expiry_ticket_c19'];
echo $expiry =$_GET['expiry_ticket_c19'];
echo $ticket_c19 =$_GET['ticket_c19'];

$user_id =$_GET['user_id'];
echo $user_id;
$email =$_GET['email'];
echo email;
$seat_no =$_GET['ticket_c19'];
$auditorium =$_GET['auditorium'];
echo $auditorium;
$event=$_GET['event'];
echo $event;
$time=$_GET['time'];
echo $time;
$rate=$_GET['rate'];
echo $rate;


 $sql_event=mysql_query("insert into team_booked_details(auditorium,event,time,email,user_id,seat_no,rate,expiry,date)values('$auditorium','$event','$time','$email','$user_id','$seat_no','$rate','$expiry',now())");
$rate=$_GET['rate'];
echo $rate;
 //$sql_event=mysql_query("insert into team_booked_details(auditorium,event,time,email,user_id,seat_no,rate,date)values('$auditorium','$event','$time','$email','$user_id','$seat_no','$rate',now())");
$rate_c19=$_GET['Class_three_rate'];
echo $rate_c19;
$sql_rate=mysql_query("UPDATE team_booked_ticket_rates SET rate_c19='$rate_c19'
WHERE  user_id='".$user_id."' ");


$sql=mysql_query("UPDATE team_booking_details SET  expiry_ticket_c19 ='$expiry_ticket_c19'
WHERE auditorium='".$auditorium."' and event='".$event."' and time='".$time."' ");

$sqls=mysql_query("UPDATE team_booking_details SET ticket_c19 ='$ticket_c19'
WHERE auditorium='".$auditorium."' and event='".$event."' and time='".$time."' ");



echo "<script>alert('ticket is booked!')</script>";
echo "<script>window.location.href='../book_your_ticket.php'</script>";


?>

</body>
</html>
