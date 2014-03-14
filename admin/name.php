<?php
session_start();
include '../configs/config_database.php';

//unset($_SESSION['event_seat_timing']);
if(isset($_POST["info"])){

    $stringData = stripslashes($_POST["info"]);
	$ss  = json_decode($stringData, true);
	$_SESSION['auditorium_id']  = json_encode($ss);
	
		 echo json_encode($_SESSION['auditorium_id']);exit;	
		
}


?>