<?php
error_reporting(0);

include 'configs/config_database.php';
$a=$_GET['a'];
echo $a;
$results = mysql_query("delete from team_booked_details where user_id='".$a."'");
$row = mysql_fetch_array($results);
if($_POST['']=='') {

 echo "<script>window.location.href='book_your_ticket.php'</script>";
}

?>