<?php
$dbname = 'ANanDHuWiN_munnarnew';
$link = mysql_connect("localhost","ANanD_mnewuser","mnewpass") or die("Couldn't make connection.");
//$dbname = 'movie';
//$link = mysql_connect("localhost"," "," ") or die("Couldn't make connection.");

$db = mysql_select_db($dbname, $link) or die("Couldn't select database");

//Tables

$user_registration_table = "user_registration";
$location_registration_table = "location_master";
$event_registration_table = "event_master";
$event_timing_registration_table = "event_timing";
$tickets_rate_registration_table = "tickets_rate";
$event_ticket_registration_table = "event_ticket";
?>


