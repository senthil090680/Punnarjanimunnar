<?php
echo $expiry_ticket_g10 =$_GET['expiry_ticket_g10'];
echo $expiry =$_GET['expiry_ticket_g10'];
echo $ticket_g10 =$_GET['ticket_g10'];

$user_id =$_GET['user_id'];
echo $user_id;
$email =$_GET['email'];
echo email;
$seat_no =$_GET['ticket_g10'];
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
$rate_g10=$_GET['Class_three_rate'];
echo $rate_g10;
$sql_rate=mysql_query("UPDATE team_booked_ticket_rates SET rate_g10='$rate_g10'
WHERE  user_id='".$user_id."' ");


$sql=mysql_query("UPDATE team_booking_details SET  expiry_ticket_g10 ='$expiry_ticket_g10'
WHERE auditorium='".$auditorium."' and event='".$event."' and time='".$time."' ");

$sqls=mysql_query("UPDATE team_booking_details SET ticket_g10 ='$ticket_g10'
WHERE auditorium='".$auditorium."' and event='".$event."' and time='".$time."' ");



echo "<script>alert('ticket is booked!')</script>";
echo "<script>window.location.href='../book_your_ticket.php'</script>";


?>