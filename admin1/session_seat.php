<?php
session_start();
unset($_SESSION['tickets']);
$_SESSION['tickets'] = array();
if(isset($_POST["id"])){
    $stringData = stripslashes($_POST["id"]);
	//$bala = '{"0":{"id":"3B"},"1":{"id":"4B"},"2":{"id":"5B"}}';
	//echo json_decode(stripslashes($_POST['id']), true);
	//exit;
	
    $ss  = json_decode($stringData, true);
	//exit;
	  if($ss !== null){ 
		foreach($ss as $key=>$val){
			foreach($val as $keys=>$vals){
				array_push($_SESSION['tickets'],$vals);
			}
		}
		echo json_encode($_SESSION['tickets']);
	exit;
	}
	
}else{
	echo "no data";
	exit;
}
?>