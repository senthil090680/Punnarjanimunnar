<html>
    <head>
	<script type="text/javascript" src="ajax/catajax.js"></script>
  <script src="js-light/jquery-1.7.2.min.js"></script>
<script src="js-light/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js-light/jquery.smooth-scroll.min.js"></script>
<script src="js-light/lightbox.js"></script>
<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });
  </script>
 
<script type="text/javascript" src="ajax/auditoriumajax.js"></script>
<script type="text/javascript" src="ajax/timeajax.js"></script>
    </head>
<body>

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


            <div >Welcome  <?php echo strtoupper($_SESSION['user_email_session']); ?><?php $a=  $_SESSION['id'];?>  </div>


<?php $auditorium=$_GET['auditorium'];
$event=$_GET['event'];
$time=$_GET['time'];
$seat_no=$_GET['seat_no'];
mysql_query("update team_booked_details set expiry='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."'and seat_no='".$seat_no."'  ");
//mysql_query("update team_booked_details set expiry='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."'and seat_no='".$seat_no."'  ");
$pay_select=mysql_query("select * from team_booking_details");
$pay_row=mysql_fetch_array($pay_select);

if($seat_no==$pay_row['ticket_a1'] )
{
mysql_query("update team_booking_details set expiry_ticket_a1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a2'] )
{
mysql_query("update team_booking_details set expiry_ticket_a2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a3'] )
{
mysql_query("update team_booking_details set expiry_ticket_a3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a4'] )
{
mysql_query("update team_booking_details set expiry_ticket_a4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a5'] )
{
mysql_query("update team_booking_details set expiry_ticket_a5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a6'] )
{
mysql_query("update team_booking_details set expiry_ticket_a6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a7'] )
{
mysql_query("update team_booking_details set expiry_ticket_a7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a8'] )
{
mysql_query("update team_booking_details set expiry_ticket_a8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a9'] )
{
mysql_query("update team_booking_details set expiry_ticket_a9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a10'] )
{
mysql_query("update team_booking_details set expiry_ticket_a10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a11'] )
{
mysql_query("update team_booking_details set expiry_ticket_a11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a12'] )
{
mysql_query("update team_booking_details set expiry_ticket_a12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a13'] )
{
mysql_query("update team_booking_details set expiry_ticket_a13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a14'] )
{
mysql_query("update team_booking_details set expiry_ticket_a14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a15'] )
{
mysql_query("update team_booking_details set expiry_ticket_a15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a16'] )
{
mysql_query("update team_booking_details set expiry_ticket_a16='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a17'] )
{
mysql_query("update team_booking_details set expiry_ticket_a17='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a18'] )
{
mysql_query("update team_booking_details set expiry_ticket_a18='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a19'] )
{
mysql_query("update team_booking_details set expiry_ticket_a19='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a20'] )
{
mysql_query("update team_booking_details set expiry_ticket_a20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a21'] )
{
mysql_query("update team_booking_details set expiry_ticket_a21='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a22'] )
{
mysql_query("update team_booking_details set expiry_ticket_a22='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a23'] )
{
mysql_query("update team_booking_details set expiry_ticket_a23='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a24'] )
{
mysql_query("update team_booking_details set expiry_ticket_a24='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a25'] )
{
mysql_query("update team_booking_details set expiry_ticket_a25='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a26'] )
{
mysql_query("update team_booking_details set expiry_ticket_a26='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a27'] )
{
mysql_query("update team_booking_details set expiry_ticket_a27='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a28'] )
{
mysql_query("update team_booking_details set expiry_ticket_a28='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a29'] )
{
mysql_query("update team_booking_details set expiry_ticket_a29='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a30'] )
{
mysql_query("update team_booking_details set expiry_ticket_a20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a31'] )
{
mysql_query("update team_booking_details set expiry_ticket_a31='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a32'] )
{
mysql_query("update team_booking_details set expiry_ticket_a32='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a33'] )
{
mysql_query("update team_booking_details set expiry_ticket_a33='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a34'] )
{
mysql_query("update team_booking_details set expiry_ticket_a34='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a35'] )
{
mysql_query("update team_booking_details set expiry_ticket_a35='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a36'] )
{
mysql_query("update team_booking_details set expiry_ticket_a36='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a37'] )
{
mysql_query("update team_booking_details set expiry_ticket_a37='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a38'] )
{
mysql_query("update team_booking_details set expiry_ticket_a38='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a39'] )
{
mysql_query("update team_booking_details set expiry_ticket_a39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a40'] )
{
mysql_query("update team_booking_details set expiry_ticket_a40='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a41'] )
{
mysql_query("update team_booking_details set expiry_ticket_a41='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a42'] )
{
mysql_query("update team_booking_details set expiry_ticket_a42='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a43'] )
{
mysql_query("update team_booking_details set expiry_ticket_a43='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a44'] )
{
mysql_query("update team_booking_details set expiry_ticket_a44='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a45'] )
{
mysql_query("update team_booking_details set expiry_ticket_a45='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a46'] )
{
mysql_query("update team_booking_details set expiry_ticket_a46='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a47'] )
{
mysql_query("update team_booking_details set expiry_ticket_a47='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a48'] )
{
mysql_query("update team_booking_details set expiry_ticket_a48='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a49'] )
{
mysql_query("update team_booking_details set expiry_ticket_a49='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a50'] )
{
mysql_query("update team_booking_details set expiry_ticket_a50='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a51'] )
{
mysql_query("update team_booking_details set expiry_ticket_a51='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a52'] )
{
mysql_query("update team_booking_details set expiry_ticket_a52='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a53'] )
{
mysql_query("update team_booking_details set expiry_ticket_a53='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a54'] )
{
mysql_query("update team_booking_details set expiry_ticket_a54='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a55'] )
{
mysql_query("update team_booking_details set expiry_ticket_a55='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a56'] )
{
mysql_query("update team_booking_details set expiry_ticket_a39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a57'] )
{
mysql_query("update team_booking_details set expiry_ticket_a57='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a58'] )
{
mysql_query("update team_booking_details set expiry_ticket_a58='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a59'] )
{
mysql_query("update team_booking_details set expiry_ticket_a59='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a60'] )
{
mysql_query("update team_booking_details set expiry_ticket_a60='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a61'] )
{
mysql_query("update team_booking_details set expiry_ticket_a61='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a62'] )
{
mysql_query("update team_booking_details set expiry_ticket_a62='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a63'] )
{
mysql_query("update team_booking_details set expiry_ticket_a63='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a64'] )
{
mysql_query("update team_booking_details set expiry_ticket_a64='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_a65'] )
{
mysql_query("update team_booking_details set expiry_ticket_a65='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
 elseif($seat_no==$pay_row['ticket_b1'] )
{
mysql_query("update team_booking_details set expiry_ticket_b1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b2'] )
{
mysql_query("update team_booking_details set expiry_ticket_b2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b3'] )
{
mysql_query("update team_booking_details set expiry_ticket_b3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b4'] )
{
mysql_query("update team_booking_details set expiry_ticket_b4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b5'] )
{
mysql_query("update team_booking_details set expiry_ticket_b5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b6'] )
{
mysql_query("update team_booking_details set expiry_ticket_b6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b7'] )
{
mysql_query("update team_booking_details set expiry_ticket_b7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b8'] )
{
mysql_query("update team_booking_details set expiry_ticket_b8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b9'] )
{
mysql_query("update team_booking_details set expiry_ticket_b9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b10'] )
{
mysql_query("update team_booking_details set expiry_ticket_b10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b11'] )
{
mysql_query("update team_booking_details set expiry_ticket_b11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b12'] )
{
mysql_query("update team_booking_details set expiry_ticket_b12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b13'] )
{
mysql_query("update team_booking_details set expiry_ticket_b13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b14'] )
{
mysql_query("update team_booking_details set expiry_ticket_b14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b15'] )
{
mysql_query("update team_booking_details set expiry_ticket_b15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b16'] )
{
mysql_query("update team_booking_details set expiry_ticket_b16='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b17'] )
{
mysql_query("update team_booking_details set expiry_ticket_b17='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b18'] )
{
mysql_query("update team_booking_details set expiry_ticket_b18='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b19'] )
{
mysql_query("update team_booking_details set expiry_ticket_b19='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b20'] )
{
mysql_query("update team_booking_details set expiry_ticket_b20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b21'] )
{
mysql_query("update team_booking_details set expiry_ticket_b21='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b22'] )
{
mysql_query("update team_booking_details set expiry_ticket_b22='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b23'] )
{
mysql_query("update team_booking_details set expiry_ticket_b23='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b24'] )
{
mysql_query("update team_booking_details set expiry_ticket_b24='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b25'] )
{
mysql_query("update team_booking_details set expiry_ticket_b25='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b26'] )
{
mysql_query("update team_booking_details set expiry_ticket_b26='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b27'] )
{
mysql_query("update team_booking_details set expiry_ticket_b27='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b28'] )
{
mysql_query("update team_booking_details set expiry_ticket_b28='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b29'] )
{
mysql_query("update team_booking_details set expiry_ticket_b29='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b30'] )
{
mysql_query("update team_booking_details set expiry_ticket_b20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b31'] )
{
mysql_query("update team_booking_details set expiry_ticket_b31='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b32'] )
{
mysql_query("update team_booking_details set expiry_ticket_b32='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b33'] )
{
mysql_query("update team_booking_details set expiry_ticket_b33='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b34'] )
{
mysql_query("update team_booking_details set expiry_ticket_b34='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b35'] )
{
mysql_query("update team_booking_details set expiry_ticket_b35='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b36'] )
{
mysql_query("update team_booking_details set expiry_ticket_b36='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b37'] )
{
mysql_query("update team_booking_details set expiry_ticket_b37='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b38'] )
{
mysql_query("update team_booking_details set expiry_ticket_b38='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b39'] )
{
mysql_query("update team_booking_details set expiry_ticket_b39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b40'] )
{
mysql_query("update team_booking_details set expiry_ticket_b40='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b41'] )
{
mysql_query("update team_booking_details set expiry_ticket_b41='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b42'] )
{
mysql_query("update team_booking_details set expiry_ticket_b42='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b43'] )
{
mysql_query("update team_booking_details set expiry_ticket_b43='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b44'] )
{
mysql_query("update team_booking_details set expiry_ticket_b44='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b45'] )
{
mysql_query("update team_booking_details set expiry_ticket_b45='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b46'] )
{
mysql_query("update team_booking_details set expiry_ticket_b46='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b47'] )
{
mysql_query("update team_booking_details set expiry_ticket_b47='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b48'] )
{
mysql_query("update team_booking_details set expiry_ticket_b48='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b49'] )
{
mysql_query("update team_booking_details set expiry_ticket_b49='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b50'] )
{
mysql_query("update team_booking_details set expiry_ticket_b50='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b51'] )
{
mysql_query("update team_booking_details set expiry_ticket_b51='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b52'] )
{
mysql_query("update team_booking_details set expiry_ticket_b52='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b53'] )
{
mysql_query("update team_booking_details set expiry_ticket_b53='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b54'] )
{
mysql_query("update team_booking_details set expiry_ticket_b54='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b55'] )
{
mysql_query("update team_booking_details set expiry_ticket_b55='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b56'] )
{
mysql_query("update team_booking_details set expiry_ticket_b39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b57'] )
{
mysql_query("update team_booking_details set expiry_ticket_b57='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b58'] )
{
mysql_query("update team_booking_details set expiry_ticket_b58='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b59'] )
{
mysql_query("update team_booking_details set expiry_ticket_b59='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b60'] )
{
mysql_query("update team_booking_details set expiry_ticket_b60='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b61'] )
{
mysql_query("update team_booking_details set expiry_ticket_b61='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b62'] )
{
mysql_query("update team_booking_details set expiry_ticket_b62='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b63'] )
{
mysql_query("update team_booking_details set expiry_ticket_b63='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b64'] )
{
mysql_query("update team_booking_details set expiry_ticket_b64='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_b65'] )
{
mysql_query("update team_booking_details set expiry_ticket_b65='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
 elseif($seat_no==$pay_row['ticket_c1'] )
{
mysql_query("update team_booking_details set expiry_ticket_c1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c2'] )
{
mysql_query("update team_booking_details set expiry_ticket_c2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c3'] )
{
mysql_query("update team_booking_details set expiry_ticket_c3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c4'] )
{
mysql_query("update team_booking_details set expiry_ticket_c4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c5'] )
{
mysql_query("update team_booking_details set expiry_ticket_c5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c6'] )
{
mysql_query("update team_booking_details set expiry_ticket_c6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c7'] )
{
mysql_query("update team_booking_details set expiry_ticket_c7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c8'] )
{
mysql_query("update team_booking_details set expiry_ticket_c8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c9'] )
{
mysql_query("update team_booking_details set expiry_ticket_c9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c10'] )
{
mysql_query("update team_booking_details set expiry_ticket_c10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c11'] )
{
mysql_query("update team_booking_details set expiry_ticket_c11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c12'] )
{
mysql_query("update team_booking_details set expiry_ticket_c12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c13'] )
{
mysql_query("update team_booking_details set expiry_ticket_c13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c14'] )
{
mysql_query("update team_booking_details set expiry_ticket_c14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c15'] )
{
mysql_query("update team_booking_details set expiry_ticket_c15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c16'] )
{
mysql_query("update team_booking_details set expiry_ticket_c16='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c17'] )
{
mysql_query("update team_booking_details set expiry_ticket_c17='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c18'] )
{
mysql_query("update team_booking_details set expiry_ticket_c18='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c19'] )
{
mysql_query("update team_booking_details set expiry_ticket_c19='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c20'] )
{
mysql_query("update team_booking_details set expiry_ticket_c20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c21'] )
{
mysql_query("update team_booking_details set expiry_ticket_c21='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c22'] )
{
mysql_query("update team_booking_details set expiry_ticket_c22='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c23'] )
{
mysql_query("update team_booking_details set expiry_ticket_c23='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c24'] )
{
mysql_query("update team_booking_details set expiry_ticket_c24='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c25'] )
{
mysql_query("update team_booking_details set expiry_ticket_c25='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c26'] )
{
mysql_query("update team_booking_details set expiry_ticket_c26='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c27'] )
{
mysql_query("update team_booking_details set expiry_ticket_c27='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c28'] )
{
mysql_query("update team_booking_details set expiry_ticket_c28='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c29'] )
{
mysql_query("update team_booking_details set expiry_ticket_c29='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c30'] )
{
mysql_query("update team_booking_details set expiry_ticket_c20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c31'] )
{
mysql_query("update team_booking_details set expiry_ticket_c31='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c32'] )
{
mysql_query("update team_booking_details set expiry_ticket_c32='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c33'] )
{
mysql_query("update team_booking_details set expiry_ticket_c33='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c34'] )
{
mysql_query("update team_booking_details set expiry_ticket_c34='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c35'] )
{
mysql_query("update team_booking_details set expiry_ticket_c35='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c36'] )
{
mysql_query("update team_booking_details set expiry_ticket_c36='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c37'] )
{
mysql_query("update team_booking_details set expiry_ticket_c37='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c38'] )
{
mysql_query("update team_booking_details set expiry_ticket_c38='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c39'] )
{
mysql_query("update team_booking_details set expiry_ticket_c39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c40'] )
{
mysql_query("update team_booking_details set expiry_ticket_c40='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c41'] )
{
mysql_query("update team_booking_details set expiry_ticket_c41='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c42'] )
{
mysql_query("update team_booking_details set expiry_ticket_c42='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c43'] )
{
mysql_query("update team_booking_details set expiry_ticket_c43='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c44'] )
{
mysql_query("update team_booking_details set expiry_ticket_c44='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c45'] )
{
mysql_query("update team_booking_details set expiry_ticket_c45='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c46'] )
{
mysql_query("update team_booking_details set expiry_ticket_c46='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c47'] )
{
mysql_query("update team_booking_details set expiry_ticket_c47='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c48'] )
{
mysql_query("update team_booking_details set expiry_ticket_c48='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c49'] )
{
mysql_query("update team_booking_details set expiry_ticket_c49='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c50'] )
{
mysql_query("update team_booking_details set expiry_ticket_c50='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c51'] )
{
mysql_query("update team_booking_details set expiry_ticket_c51='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c52'] )
{
mysql_query("update team_booking_details set expiry_ticket_c52='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c53'] )
{
mysql_query("update team_booking_details set expiry_ticket_c53='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c54'] )
{
mysql_query("update team_booking_details set expiry_ticket_c54='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c55'] )
{
mysql_query("update team_booking_details set expiry_ticket_c55='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c56'] )
{
mysql_query("update team_booking_details set expiry_ticket_c39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c57'] )
{
mysql_query("update team_booking_details set expiry_ticket_c57='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c58'] )
{
mysql_query("update team_booking_details set expiry_ticket_c58='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c59'] )
{
mysql_query("update team_booking_details set expiry_ticket_c59='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c60'] )
{
mysql_query("update team_booking_details set expiry_ticket_c60='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_c61'] )
{
mysql_query("update team_booking_details set expiry_ticket_c61='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d1'] )
{
mysql_query("update team_booking_details set expiry_ticket_d1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d2'] )
{
mysql_query("update team_booking_details set expiry_ticket_d2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d3'] )
{
mysql_query("update team_booking_details set expiry_ticket_d3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d4'] )
{
mysql_query("update team_booking_details set expiry_ticket_d4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d5'] )
{
mysql_query("update team_booking_details set expiry_ticket_d5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d6'] )
{
mysql_query("update team_booking_details set expiry_ticket_d6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d7'] )
{
mysql_query("update team_booking_details set expiry_ticket_d7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d8'] )
{
mysql_query("update team_booking_details set expiry_ticket_d8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d9'] )
{
mysql_query("update team_booking_details set expiry_ticket_d9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d10'] )
{
mysql_query("update team_booking_details set expiry_ticket_d10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d11'] )
{
mysql_query("update team_booking_details set expiry_ticket_d11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d12'] )
{
mysql_query("update team_booking_details set expiry_ticket_d12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d13'] )
{
mysql_query("update team_booking_details set expiry_ticket_d13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d14'] )
{
mysql_query("update team_booking_details set expiry_ticket_d14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d15'] )
{
mysql_query("update team_booking_details set expiry_ticket_d15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d16'] )
{
mysql_query("update team_booking_details set expiry_ticket_d16='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d17'] )
{
mysql_query("update team_booking_details set expiry_ticket_d17='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d18'] )
{
mysql_query("update team_booking_details set expiry_ticket_d18='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d19'] )
{
mysql_query("update team_booking_details set expiry_ticket_d19='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d20'] )
{
mysql_query("update team_booking_details set expiry_ticket_d20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d21'] )
{
mysql_query("update team_booking_details set expiry_ticket_d21='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d22'] )
{
mysql_query("update team_booking_details set expiry_ticket_d22='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d23'] )
{
mysql_query("update team_booking_details set expiry_ticket_d23='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d24'] )
{
mysql_query("update team_booking_details set expiry_ticket_d24='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d25'] )
{
mysql_query("update team_booking_details set expiry_ticket_d25='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d26'] )
{
mysql_query("update team_booking_details set expiry_ticket_d26='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d27'] )
{
mysql_query("update team_booking_details set expiry_ticket_d27='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d28'] )
{
mysql_query("update team_booking_details set expiry_ticket_d28='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d29'] )
{
mysql_query("update team_booking_details set expiry_ticket_d29='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d30'] )
{
mysql_query("update team_booking_details set expiry_ticket_d20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d31'] )
{
mysql_query("update team_booking_details set expiry_ticket_d31='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d32'] )
{
mysql_query("update team_booking_details set expiry_ticket_d32='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d33'] )
{
mysql_query("update team_booking_details set expiry_ticket_d33='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d34'] )
{
mysql_query("update team_booking_details set expiry_ticket_d34='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d35'] )
{
mysql_query("update team_booking_details set expiry_ticket_d35='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d36'] )
{
mysql_query("update team_booking_details set expiry_ticket_d36='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d37'] )
{
mysql_query("update team_booking_details set expiry_ticket_d37='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d38'] )
{
mysql_query("update team_booking_details set expiry_ticket_d38='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d39'] )
{
mysql_query("update team_booking_details set expiry_ticket_d39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d40'] )
{
mysql_query("update team_booking_details set expiry_ticket_d40='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d41'] )
{
mysql_query("update team_booking_details set expiry_ticket_d41='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_d42'] )
{
mysql_query("update team_booking_details set expiry_ticket_d42='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e1'] )
{
mysql_query("update team_booking_details set expiry_ticket_e1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e2'] )
{
mysql_query("update team_booking_details set expiry_ticket_e2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e3'] )
{
mysql_query("update team_booking_details set expiry_ticket_e3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e4'] )
{
mysql_query("update team_booking_details set expiry_ticket_e4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e5'] )
{
mysql_query("update team_booking_details set expiry_ticket_e5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e6'] )
{
mysql_query("update team_booking_details set expiry_ticket_e6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e7'] )
{
mysql_query("update team_booking_details set expiry_ticket_e7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e8'] )
{
mysql_query("update team_booking_details set expiry_ticket_e8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e9'] )
{
mysql_query("update team_booking_details set expiry_ticket_e9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e10'] )
{
mysql_query("update team_booking_details set expiry_ticket_e10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e11'] )
{
mysql_query("update team_booking_details set expiry_ticket_e11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e12'] )
{
mysql_query("update team_booking_details set expiry_ticket_e12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e13'] )
{
mysql_query("update team_booking_details set expiry_ticket_e13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e14'] )
{
mysql_query("update team_booking_details set expiry_ticket_e14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_e15'] )
{
mysql_query("update team_booking_details set expiry_ticket_e15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}

elseif($seat_no==$pay_row['ticket_f1'] )
{
mysql_query("update team_booking_details set expiry_ticket_f1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f2'] )
{
mysql_query("update team_booking_details set expiry_ticket_f2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f3'] )
{
mysql_query("update team_booking_details set expiry_ticket_f3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f4'] )
{
mysql_query("update team_booking_details set expiry_ticket_f4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f5'] )
{
mysql_query("update team_booking_details set expiry_ticket_f5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f6'] )
{
mysql_query("update team_booking_details set expiry_ticket_f6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f7'] )
{
mysql_query("update team_booking_details set expiry_ticket_f7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f8'] )
{
mysql_query("update team_booking_details set expiry_ticket_f8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f9'] )
{
mysql_query("update team_booking_details set expiry_ticket_f9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f10'] )
{
mysql_query("update team_booking_details set expiry_ticket_f10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f11'] )
{
mysql_query("update team_booking_details set expiry_ticket_f11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f12'] )
{
mysql_query("update team_booking_details set expiry_ticket_f12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f13'] )
{
mysql_query("update team_booking_details set expiry_ticket_f13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_f14'] )
{
mysql_query("update team_booking_details set expiry_ticket_f14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g1'] )
{
mysql_query("update team_booking_details set expiry_ticket_g1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g2'] )
{
mysql_query("update team_booking_details set expiry_ticket_g2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g3'] )
{
mysql_query("update team_booking_details set expiry_ticket_g3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g4'] )
{
mysql_query("update team_booking_details set expiry_ticket_g4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g5'] )
{
mysql_query("update team_booking_details set expiry_ticket_g5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g6'] )
{
mysql_query("update team_booking_details set expiry_ticket_g6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g7'] )
{
mysql_query("update team_booking_details set expiry_ticket_g7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g8'] )
{
mysql_query("update team_booking_details set expiry_ticket_g8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g9'] )
{
mysql_query("update team_booking_details set expiry_ticket_g9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g10'] )
{
mysql_query("update team_booking_details set expiry_ticket_g10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g11'] )
{
mysql_query("update team_booking_details set expiry_ticket_g11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g12'] )
{
mysql_query("update team_booking_details set expiry_ticket_g12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g13'] )
{
mysql_query("update team_booking_details set expiry_ticket_g13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_g14'] )
{
mysql_query("update team_booking_details set expiry_ticket_g14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
 elseif($seat_no==$pay_row['ticket_i1'] )
{
mysql_query("update team_booking_details set expiry_ticket_h1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h2'] )
{
mysql_query("update team_booking_details set expiry_ticket_h2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h3'] )
{
mysql_query("update team_booking_details set expiry_ticket_h3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h4'] )
{
mysql_query("update team_booking_details set expiry_ticket_h4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h5'] )
{
mysql_query("update team_booking_details set expiry_ticket_h5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h6'] )
{
mysql_query("update team_booking_details set expiry_ticket_h6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h7'] )
{
mysql_query("update team_booking_details set expiry_ticket_h7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h8'] )
{
mysql_query("update team_booking_details set expiry_ticket_h8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h9'] )
{
mysql_query("update team_booking_details set expiry_ticket_h9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h10'] )
{
mysql_query("update team_booking_details set expiry_ticket_h10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h11'] )
{
mysql_query("update team_booking_details set expiry_ticket_h11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h12'] )
{
mysql_query("update team_booking_details set expiry_ticket_h12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h13'] )
{
mysql_query("update team_booking_details set expiry_ticket_h13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_h14'] )
{
mysql_query("update team_booking_details set expiry_ticket_h14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
 elseif($seat_no==$pay_row['ticket_i1'] )
{
mysql_query("update team_booking_details set expiry_ticket_i1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i2'] )
{
mysql_query("update team_booking_details set expiry_ticket_i2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i3'] )
{
mysql_query("update team_booking_details set expiry_ticket_i3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i4'] )
{
mysql_query("update team_booking_details set expiry_ticket_i4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i5'] )
{
mysql_query("update team_booking_details set expiry_ticket_i5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i6'] )
{
mysql_query("update team_booking_details set expiry_ticket_i6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i7'] )
{
mysql_query("update team_booking_details set expiry_ticket_i7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i8'] )
{
mysql_query("update team_booking_details set expiry_ticket_i8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i9'] )
{
mysql_query("update team_booking_details set expiry_ticket_i9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i10'] )
{
mysql_query("update team_booking_details set expiry_ticket_i10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i11'] )
{
mysql_query("update team_booking_details set expiry_ticket_i11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i12'] )
{
mysql_query("update team_booking_details set expiry_ticket_i12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_i13'] )
{
mysql_query("update team_booking_details set expiry_ticket_i13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_j1'] )
{
mysql_query("update team_booking_details set expiry_ticket_j1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_j2'] )
{
mysql_query("update team_booking_details set expiry_ticket_j2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_j3'] )
{
mysql_query("update team_booking_details set expiry_ticket_j3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_j4'] )
{
mysql_query("update team_booking_details set expiry_ticket_j4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_j5'] )
{
mysql_query("update team_booking_details set expiry_ticket_j5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_j6'] )
{
mysql_query("update team_booking_details set expiry_ticket_j6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s1'] )
{
mysql_query("update team_booking_details set expiry_ticket_s1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s2'] )
{
mysql_query("update team_booking_details set expiry_ticket_s2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s3'] )
{
mysql_query("update team_booking_details set expiry_ticket_s3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s4'] )
{
mysql_query("update team_booking_details set expiry_ticket_s4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s5'] )
{
mysql_query("update team_booking_details set expiry_ticket_s5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s6'] )
{
mysql_query("update team_booking_details set expiry_ticket_s6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s7'] )
{
mysql_query("update team_booking_details set expiry_ticket_s7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s8'] )
{
mysql_query("update team_booking_details set expiry_ticket_s8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s9'] )
{
mysql_query("update team_booking_details set expiry_ticket_s9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s10'] )
{
mysql_query("update team_booking_details set expiry_ticket_s10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s11'] )
{
mysql_query("update team_booking_details set expiry_ticket_s11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s12'] )
{
mysql_query("update team_booking_details set expiry_ticket_s12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s13'] )
{
mysql_query("update team_booking_details set expiry_ticket_s13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s14'] )
{
mysql_query("update team_booking_details set expiry_ticket_s14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_s15'] )
{
mysql_query("update team_booking_details set expiry_ticket_s15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}

elseif($seat_no==$pay_row['ticket_u15'] )
{
mysql_query("update team_booking_details set expiry_ticket_u15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u16'] )
{
mysql_query("update team_booking_details set expiry_ticket_u16='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u17'] )
{
mysql_query("update team_booking_details set expiry_ticket_u17='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u18'] )
{
mysql_query("update team_booking_details set expiry_ticket_u18='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u19'] )
{
mysql_query("update team_booking_details set expiry_ticket_u19='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u20'] )
{
mysql_query("update team_booking_details set expiry_ticket_u20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u21'] )
{
mysql_query("update team_booking_details set expiry_ticket_u21='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u22'] )
{
mysql_query("update team_booking_details set expiry_ticket_u22='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u23'] )
{
mysql_query("update team_booking_details set expiry_ticket_u23='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u24'] )
{
mysql_query("update team_booking_details set expiry_ticket_u24='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u25'] )
{
mysql_query("update team_booking_details set expiry_ticket_u25='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_u26'] )
{
mysql_query("update team_booking_details set expiry_ticket_u26='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}

 elseif($seat_no==$pay_row['ticket_1'] )
{
mysql_query("update team_booking_details set expiry_ticket_1='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_2'] )
{
mysql_query("update team_booking_details set expiry_ticket_2='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_3'] )
{
mysql_query("update team_booking_details set expiry_ticket_3='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_4'] )
{
mysql_query("update team_booking_details set expiry_ticket_4='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_5'] )
{
mysql_query("update team_booking_details set expiry_ticket_5='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_6'] )
{
mysql_query("update team_booking_details set expiry_ticket_6='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_7'] )
{
mysql_query("update team_booking_details set expiry_ticket_7='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_8'] )
{
mysql_query("update team_booking_details set expiry_ticket_8='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_9'] )
{
mysql_query("update team_booking_details set expiry_ticket_9='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_10'] )
{
mysql_query("update team_booking_details set expiry_ticket_10='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_11'] )
{
mysql_query("update team_booking_details set expiry_ticket_11='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_12'] )
{
mysql_query("update team_booking_details set expiry_ticket_12='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_13'] )
{
mysql_query("update team_booking_details set expiry_ticket_13='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_14'] )
{
mysql_query("update team_booking_details set expiry_ticket_14='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_15'] )
{
mysql_query("update team_booking_details set expiry_ticket_15='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_16'] )
{
mysql_query("update team_booking_details set expiry_ticket_16='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_17'] )
{
mysql_query("update team_booking_details set expiry_ticket_17='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_18'] )
{
mysql_query("update team_booking_details set expiry_ticket_18='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_19'] )
{
mysql_query("update team_booking_details set expiry_ticket_19='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_20'] )
{
mysql_query("update team_booking_details set expiry_ticket_20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_21'] )
{
mysql_query("update team_booking_details set expiry_ticket_21='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_22'] )
{
mysql_query("update team_booking_details set expiry_ticket_22='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_23'] )
{
mysql_query("update team_booking_details set expiry_ticket_23='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_24'] )
{
mysql_query("update team_booking_details set expiry_ticket_24='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_25'] )
{
mysql_query("update team_booking_details set expiry_ticket_25='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_26'] )
{
mysql_query("update team_booking_details set expiry_ticket_26='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_27'] )
{
mysql_query("update team_booking_details set expiry_ticket_27='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_28'] )
{
mysql_query("update team_booking_details set expiry_ticket_28='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_29'] )
{
mysql_query("update team_booking_details set expiry_ticket_29='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_30'] )
{
mysql_query("update team_booking_details set expiry_ticket_20='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_31'] )
{
mysql_query("update team_booking_details set expiry_ticket_31='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_32'] )
{
mysql_query("update team_booking_details set expiry_ticket_32='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_33'] )
{
mysql_query("update team_booking_details set expiry_ticket_33='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_34'] )
{
mysql_query("update team_booking_details set expiry_ticket_34='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_35'] )
{
mysql_query("update team_booking_details set expiry_ticket_35='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_36'] )
{
mysql_query("update team_booking_details set expiry_ticket_36='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_37'] )
{
mysql_query("update team_booking_details set expiry_ticket_37='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_38'] )
{
mysql_query("update team_booking_details set expiry_ticket_38='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_39'] )
{
mysql_query("update team_booking_details set expiry_ticket_39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_40'] )
{
mysql_query("update team_booking_details set expiry_ticket_40='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_41'] )
{
mysql_query("update team_booking_details set expiry_ticket_41='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_42'] )
{
mysql_query("update team_booking_details set expiry_ticket_42='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_43'] )
{
mysql_query("update team_booking_details set expiry_ticket_43='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_44'] )
{
mysql_query("update team_booking_details set expiry_ticket_44='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_45'] )
{
mysql_query("update team_booking_details set expiry_ticket_45='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_46'] )
{
mysql_query("update team_booking_details set expiry_ticket_46='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_47'] )
{
mysql_query("update team_booking_details set expiry_ticket_47='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_48'] )
{
mysql_query("update team_booking_details set expiry_ticket_48='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_49'] )
{
mysql_query("update team_booking_details set expiry_ticket_49='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_50'] )
{
mysql_query("update team_booking_details set expiry_ticket_50='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_51'] )
{
mysql_query("update team_booking_details set expiry_ticket_51='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_52'] )
{
mysql_query("update team_booking_details set expiry_ticket_52='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_53'] )
{
mysql_query("update team_booking_details set expiry_ticket_53='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_54'] )
{
mysql_query("update team_booking_details set expiry_ticket_54='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_55'] )
{
mysql_query("update team_booking_details set expiry_ticket_55='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_56'] )
{
mysql_query("update team_booking_details set expiry_ticket_39='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_57'] )
{
mysql_query("update team_booking_details set expiry_ticket_57='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_58'] )
{
mysql_query("update team_booking_details set expiry_ticket_58='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_59'] )
{
mysql_query("update team_booking_details set expiry_ticket_59='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_60'] )
{
mysql_query("update team_booking_details set expiry_ticket_60='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_61'] )
{
mysql_query("update team_booking_details set expiry_ticket_61='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_62'] )
{
mysql_query("update team_booking_details set expiry_ticket_62='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_63'] )
{
mysql_query("update team_booking_details set expiry_ticket_63='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_64'] )
{
mysql_query("update team_booking_details set expiry_ticket_64='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_65'] )
{
mysql_query("update team_booking_details set expiry_ticket_65='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_65'] )
{
mysql_query("update team_booking_details set expiry_ticket_66='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_67'] )
{
mysql_query("update team_booking_details set expiry_ticket_67='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_68'] )
{
mysql_query("update team_booking_details set expiry_ticket_68='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_69'] )
{
mysql_query("update team_booking_details set expiry_ticket_69='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_70'] )
{
mysql_query("update team_booking_details set expiry_ticket_70='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_71'] )
{
mysql_query("update team_booking_details set expiry_ticket_71='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_72'] )
{
mysql_query("update team_booking_details set expiry_ticket_72='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_73'] )
{
mysql_query("update team_booking_details set expiry_ticket_73='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_74'] )
{
mysql_query("update team_booking_details set expiry_ticket_74='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_75'] )
{
mysql_query("update team_booking_details set expiry_ticket_75='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_76'] )
{
mysql_query("update team_booking_details set expiry_ticket_76='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_77'] )
{
mysql_query("update team_booking_details set expiry_ticket_77='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_78'] )
{
mysql_query("update team_booking_details set expiry_ticket_78='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_79'] )
{
mysql_query("update team_booking_details set expiry_ticket_79='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_80'] )
{
mysql_query("update team_booking_details set expiry_ticket_80='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_81'] )
{
mysql_query("update team_booking_details set expiry_ticket_81='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_82'] )
{
mysql_query("update team_booking_details set expiry_ticket_82='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_83'] )
{
mysql_query("update team_booking_details set expiry_ticket_83='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_84'] )
{
mysql_query("update team_booking_details set expiry_ticket_84='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_85'] )
{
mysql_query("update team_booking_details set expiry_ticket_85='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_86'] )
{
mysql_query("update team_booking_details set expiry_ticket_86='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_87'] )
{
mysql_query("update team_booking_details set expiry_ticket_87='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_88'] )
{
mysql_query("update team_booking_details set expiry_ticket_88='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_89'] )
{
mysql_query("update team_booking_details set expiry_ticket_89='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_90'] )
{
mysql_query("update team_booking_details set expiry_ticket_90='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_91'] )
{
mysql_query("update team_booking_details set expiry_ticket_91='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_92'] )
{
mysql_query("update team_booking_details set expiry_ticket_92='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_93'] )
{
mysql_query("update team_booking_details set expiry_ticket_93='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_94'] )
{
mysql_query("update team_booking_details set expiry_ticket_94='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_95'] )
{
mysql_query("update team_booking_details set expiry_ticket_95='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_96'] )
{
mysql_query("update team_booking_details set expiry_ticket_96='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_97'] )
{
mysql_query("update team_booking_details set expiry_ticket_97='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_98'] )
{
mysql_query("update team_booking_details set expiry_ticket_98='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_99'] )
{
mysql_query("update team_booking_details set expiry_ticket_99='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_100'] )
{
mysql_query("update team_booking_details set expiry_ticket_100='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_101'] )
{
mysql_query("update team_booking_details set expiry_ticket_101='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_102'] )
{
mysql_query("update team_booking_details set expiry_ticket_102='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_103'] )
{
mysql_query("update team_booking_details set expiry_ticket_103='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_104'] )
{
mysql_query("update team_booking_details set expiry_ticket_104='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_104'] )
{
mysql_query("update team_booking_details set expiry_ticket_104='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_105'] )
{
mysql_query("update team_booking_details set expiry_ticket_105='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_106'] )
{
mysql_query("update team_booking_details set expiry_ticket_106='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_107'] )
{
mysql_query("update team_booking_details set expiry_ticket_107='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_108'] )
{
mysql_query("update team_booking_details set expiry_ticket_108='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_109'] )
{
mysql_query("update team_booking_details set expiry_ticket_109='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}

elseif($seat_no==$pay_row['ticket_110'] )
{
mysql_query("update team_booking_details set expiry_ticket_110='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_111'] )
{
mysql_query("update team_booking_details set expiry_ticket_111='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_112'] )
{
mysql_query("update team_booking_details set expiry_ticket_112='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_113'] )
{
mysql_query("update team_booking_details set expiry_ticket_113='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_114'] )
{
mysql_query("update team_booking_details set expiry_ticket_114='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_115'] )
{
mysql_query("update team_booking_details set expiry_ticket_115='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_116'] )
{
mysql_query("update team_booking_details set expiry_ticket_116='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_117'] )
{
mysql_query("update team_booking_details set expiry_ticket_117='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_118'] )
{
mysql_query("update team_booking_details set expiry_ticket_118='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_119'] )
{
mysql_query("update team_booking_details set expiry_ticket_119='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_120'] )
{
mysql_query("update team_booking_details set expiry_ticket_120='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_121'] )
{
mysql_query("update team_booking_details set expiry_ticket_121='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_122'] )
{
mysql_query("update team_booking_details set expiry_ticket_122='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_123'] )
{
mysql_query("update team_booking_details set expiry_ticket_123='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_124'] )
{
mysql_query("update team_booking_details set expiry_ticket_124='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_125'] )
{
mysql_query("update team_booking_details set expiry_ticket_125='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_126'] )
{
mysql_query("update team_booking_details set expiry_ticket_126='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_127'] )
{
mysql_query("update team_booking_details set expiry_ticket_127='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_128'] )
{
mysql_query("update team_booking_details set expiry_ticket_128='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_129'] )
{
mysql_query("update team_booking_details set expiry_ticket_129='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_130'] )
{
mysql_query("update team_booking_details set expiry_ticket_120='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_131'] )
{
mysql_query("update team_booking_details set expiry_ticket_131='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_132'] )
{
mysql_query("update team_booking_details set expiry_ticket_132='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_133'] )
{
mysql_query("update team_booking_details set expiry_ticket_133='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_134'] )
{
mysql_query("update team_booking_details set expiry_ticket_134='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_135'] )
{
mysql_query("update team_booking_details set expiry_ticket_135='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_136'] )
{
mysql_query("update team_booking_details set expiry_ticket_136='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_137'] )
{
mysql_query("update team_booking_details set expiry_ticket_137='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_138'] )
{
mysql_query("update team_booking_details set expiry_ticket_138='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_139'] )
{
mysql_query("update team_booking_details set expiry_ticket_139='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_140'] )
{
mysql_query("update team_booking_details set expiry_ticket_140='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_141'] )
{
mysql_query("update team_booking_details set expiry_ticket_141='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_142'] )
{
mysql_query("update team_booking_details set expiry_ticket_142='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_143'] )
{
mysql_query("update team_booking_details set expiry_ticket_143='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_144'] )
{
mysql_query("update team_booking_details set expiry_ticket_144='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_145'] )
{
mysql_query("update team_booking_details set expiry_ticket_145='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_146'] )
{
mysql_query("update team_booking_details set expiry_ticket_146='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_147'] )
{
mysql_query("update team_booking_details set expiry_ticket_147='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_148'] )
{
mysql_query("update team_booking_details set expiry_ticket_148='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_149'] )
{
mysql_query("update team_booking_details set expiry_ticket_149='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_150'] )
{
mysql_query("update team_booking_details set expiry_ticket_150='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_151'] )
{
mysql_query("update team_booking_details set expiry_ticket_151='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_152'] )
{
mysql_query("update team_booking_details set expiry_ticket_152='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_153'] )
{
mysql_query("update team_booking_details set expiry_ticket_153='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_154'] )
{
mysql_query("update team_booking_details set expiry_ticket_154='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_155'] )
{
mysql_query("update team_booking_details set expiry_ticket_155='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_156'] )
{
mysql_query("update team_booking_details set expiry_ticket_139='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_157'] )
{
mysql_query("update team_booking_details set expiry_ticket_157='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_158'] )
{
mysql_query("update team_booking_details set expiry_ticket_158='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_159'] )
{
mysql_query("update team_booking_details set expiry_ticket_159='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_160'] )
{
mysql_query("update team_booking_details set expiry_ticket_160='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_161'] )
{
mysql_query("update team_booking_details set expiry_ticket_161='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_162'] )
{
mysql_query("update team_booking_details set expiry_ticket_162='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
elseif($seat_no==$pay_row['ticket_163'] )
{
mysql_query("update team_booking_details set expiry_ticket_163='BOOKED' where time='".$time."' and event='".$event."' and auditorium='".$auditorium."' ");
}
echo "<script>window.location.href='payment.php'</script>";
?>
</body>
</html>
