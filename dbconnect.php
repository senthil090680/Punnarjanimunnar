<?php
$host="localhost";
$user="teamads_munnar";
$password="munnar123";
$database="teamads_munnar";
$con=mysql_connect($host, $user, $password)
			or die('mysql_connect: Exception in database connection');
$source=mysql_select_db($database,$con)
			or die('mysql_select_db: Exception in selecting source');
			?>


