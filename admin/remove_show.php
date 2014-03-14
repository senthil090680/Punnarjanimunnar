<?php
session_start();
include '../configs/config_database.php';
if(!$_SESSION['admin_email_session']){

	 echo "<script type='text/javascript'>
		alert('Please login first for searching your show tickets');
		location = 'index.php';
		</script>";
		exit;
}
if(isset($_POST["id"])){

    $stringData = stripslashes($_POST["id"]);
	$ss  = json_decode($stringData, true);
	$event_id = json_encode($ss);

        $show = "delete from $event_registration_table where id='".$event_id."'";
        $show_timing = "delete from $event_timing_registration_table where Event_ID='".$event_id."'";
        mysql_query($show,$link) or die("deletion Failed:" . mysql_error());
        mysql_query($show_timing,$link) or die("deletion Failed:" . mysql_error());
        echo json_encode(TRUE);
	exit;


}else{
	echo "no data";
	exit;
}
?>