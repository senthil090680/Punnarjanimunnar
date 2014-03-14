<?php
session_start();
include '../configs/config_database.php';

//unset($_SESSION['event_seat_timing']);
if(isset($_POST["info"])){

    $stringData = stripslashes($_POST["info"]);
	$ss  = json_decode($stringData, true);
	$_SESSION['event_id'] = $event_id = json_encode($ss);
	
	
	$sql = "select * from event_master where id='".$event_id."'";
                $result = mysql_query($sql);
				$html ='';
				
        while($row = mysql_fetch_array($result)){

            $_SESSION['Class_one_rate'] = $Class_one_rate = $row['Class_one_rate'];
			$_SESSION['Class_two_rate'] = $Class_two_rate = $row['Class_two_rate'];
			$_SESSION['Class_three_rate'] = $Class_three_rate = $row['Class_three_rate'];
         }
		 $html .="<br>".'Class I Rate:';
		 
		 $html .= "Rs.".$Class_one_rate."<br>";
		 
		 $html .='Class II Rate:';
		 
		 $html .= "Rs.".$Class_two_rate."<br>";
		 
		 $html .='Class III Rate:';
		 
		 $html .= "Rs.".$Class_three_rate."<br>";?>
		 
	
    
    <input name="Class_one_rate" type="hidden"  value="<?php echo $Class_one_rate ?>"/>
      <input name="Class_two_rate" type="hidden"  value="<?php echo $Class_two_rate ?>"/>
         <input name="Class_three_rate" type="hidden"  value="<?php echo $Class_three_rate ?>"/>
 
<?php	



echo json_encode($html);exit;	
		
}


?>