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
    <div class="crumb_navigation"> @Punarjanimunnar: <span class="current">Home</span> </div>
<?php include 'admin_left_content.php';?>
    <!-- end of left content -->
    <div class="center_content">
	  <div class="center_title_bar">Add Punnarjanimunnar Show and Place Details	  <?php echo strtoupper($_SESSION['user_email_session']);?></div>
  
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
          <div class="contact_form"><font color="green" size=4>
		   <?php if($added_details){
		   echo $added_details;
		   }
		   if($err){
			foreach($err as $e){
				echo "<font color='red' size=4>".$e."<br></font>";
			}
			}

		   ?></font>
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
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>
      <div class="center_title_bar">Location Master Details</div>
	  	
	
        <table border="1" width="100%"><tr>
                <th>Auditorium Name</th><th>City</th><th>Address</th><th>No.of Seats</th></tr>
        <?php

        $detail = "select * from $location_registration_table";
        $result = mysql_query($detail,$link) or die("Insertion Failed:" . mysql_error());
        while($row = mysql_fetch_array($result)){
echo "<tr><td>".$row['Auditorium_Name']."</td><td>".$row['city']."</td><td>".$row['address']."</td><td>".

            "Class I  :".$row['Class_one_No_Seat']."<br>".
            "Class II :".$row['Class_two_No_Seat']."<br>".
            "Class III:".$row['Class_three_No_Seat'] ."</td><tr>";

        }

        
        ?>
        </table>
	  </div>
      <!-- end of center content -->

    <?php include 'admin_right_content.php';?>
  <?php include 'admin_footer.php';?>