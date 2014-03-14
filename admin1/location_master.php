<html><body>
<?php
session_start();
include '../configs/config_database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_location_master'] == "Add Location Master Details") {
  $err = array();
  //performing all validations and raising corresponding errors
  if (empty($_POST['auditorium_name'])){
	$err[] = "Auditorium name is required";  
	}
  if (empty($_POST['city'])){
	$err[] = "City name is required"; 
	}
	if (empty($_POST['Class_one_No_Seat'])){
	$err[] = "Number Of seats are required in CLASS I";  
	}
  if (empty($_POST['Class_two_No_Seat'])){
	$err[] = "Number Of seats are required in CLASS II";  
	}
	if (empty($_POST['Class_three_No_Seat'])){
	$err[] = "Number Of seats are required in CLASS III";  
	}
	
if(empty($err)){
       $auditorium_name = mysql_real_escape_string($_POST["auditorium_name"]);
       $city = mysql_real_escape_string($_POST["city"]);
	$address = mysql_real_escape_string($_POST["address"]);
       $class_one_no_seat = mysql_real_escape_string($_POST["Class_one_No_Seat"]);
	$class_two_no_seat = mysql_real_escape_string($_POST["Class_two_No_Seat"]);
       $class_three_no_seat = mysql_real_escape_string($_POST["Class_three_No_Seat"]);
	$location_remarks = mysql_real_escape_string($_POST["location_remarks"]);
    $sql="insert into $location_registration_table (id,Auditorium_Name,city,address,Class_one_No_Seat,Class_two_No_Seat,Class_three_No_Seat,Remarks,stamp)values('','$auditorium_name','$city','$address','$class_one_no_seat','$class_two_no_seat','$class_three_no_seat','$location_remarks',now())";
$sucess = mysql_query($sql,$link) or die("Insertion Failed:" . mysql_error());
if($sucess){
$added_details = "You have successfully added all details";
}else{
$added_details = "You have an error while adding all details. Please check all details";
}
}else{
$err = $err;
  }
}
?>

<?php include 'admin_header.php';?>
     <div class ="wrapper col4" style="height:800px">
      <div id="container">
      <div id="content" >

	<div >Add Punnarjanimunnar Show and Place Details <?php echo strtoupper($_SESSION['user_email_session']);?></div>
        <div >
        
		  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		 
            <div class="form_row">
              <label class="contact"><strong>Auditorium Name:</strong></label>			  
			  <input type="text"  class="contact_input" name="auditorium_name">                   
            </div>
			
			<div class="form_row">
              <label class="contact"><strong>City:</strong></label>			  
			  <input type="text"  class="contact_input" name="city">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>Address:</strong></label>			  
			  <textarea class="contact_textarea" name="address"></textarea>
            </div>
			<div class="form_row">
              <label class="contact"><strong>No.of Seats in Class I:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_one_No_Seat">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>No.of Seats in Class II:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_two_No_Seat">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>No.of Seats in Class III:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_three_No_Seat">                   
            </div>
			            <div class="form_row">
              <label class="contact"><strong>Location Remarks:</strong></label>
              <textarea class="contact_textarea" name="location_remarks"></textarea>
            </div>
            
        
            <div class="form_row"> <label class="contact"><strong></strong></label><input type="submit" class="contact_button" name="add_location_master" value="Add Location Master Details"> </div></form>
			
			
          </div>
          
        <div>Location Master Details</div>

        <table id="gradient-style"  border="1px" style="padding-left: 10px; border-color:white; width:100%">

             <thead>
    	<tr>
        	<th> Auditorium Name</th><th>City</th><th>Address</th><th>No.of Seats</th>
        </tr>
             </thead>
        <?php

        $detail = "select * from $location_registration_table";
        $result = mysql_query($detail,$link) or die("Insertion Failed:" . mysql_error());
        echo "<tbody>";
        while($row = mysql_fetch_array($result)){
echo "<tr><td>".$row['Auditorium_Name']."</td><td>".$row['city']."</td><td>".$row['address']."</td><td>".

            "Class I  :".$row['Class_one_No_Seat']."<br>".
            "Class II :".$row['Class_two_No_Seat']."<br>".
            "Class III:".$row['Class_three_No_Seat'] ."</td><tr>";

        }

        
        ?>
        </tbody>
        </table>
      </div>
          </div>
         </div>
  <?php include 'admin_footer.php';?>

        </body>
</html>