<html><body><?php
session_start();
include '../configs/config_database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_location_master'] == "Save Show Details") {
  $err = array();
  //performing all validations and raising corresponding errors
  if (empty($_POST['event_name'])){
	$err[] = "Show name is required";  
	}
  if (empty($_POST['Class_one_rate'])){
	$err[] = "CLASS I rate is required"; 
	}
	if (empty($_POST['Class_two_rate'])){
	$err[] = "CLASS II rate is required";  
	}
  if (empty($_POST['Class_three_rate'])){
	$err[] = "CLASS III rate is required";  
	}
	
if(empty($err)){
       $event_name = mysql_real_escape_string($_POST["event_name"]);
       $movie_remarks = mysql_real_escape_string($_POST["movie_remarks"]);
	   $Class_one_rate = mysql_real_escape_string($_POST["Class_one_rate"]);
       $Class_two_rate = mysql_real_escape_string($_POST["Class_two_rate"]);
	   $Class_three_rate = mysql_real_escape_string($_POST["Class_three_rate"]);
     
	 $sql="insert into $event_registration_table (id,Event_name,Remarks,stamp,Class_one_rate,Class_two_rate,Class_three_rate)values('','$event_name','$movie_remarks',now(),'$Class_one_rate','$Class_two_rate','$Class_three_rate')";
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
	  <div class="center_title_bar">Add Punnarjanimunnar Show and Rate Details	  <?php echo strtoupper($_SESSION['user_email_session']);?></div>
  
		  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  	  
            <div class="form_row">
              <label class="contact"><strong>Show Name:</strong></label>
			  <input type="text"  class="contact_input" name="event_name">                   
            </div>
			
			   <div class="form_row">
              <label class="contact"><strong>Show Remarks:</strong></label>
              <textarea class="contact_textarea" name="movie_remarks"></textarea>
            </div>
			<div class="form_row">
              <label class="contact"><strong>Class I Rate:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_one_rate">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>Class II Rate:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_two_rate">                   
            </div>
			<div class="form_row">
              <label class="contact"><strong>Class III Rate:</strong></label>			  
			  <input type="text"  class="contact_input" name="Class_three_rate">                   
            </div>
		
            <div class="form_row"> <label class="contact"><strong></strong></label><input type="submit" class="contact_button" name="add_location_master" value="Save Show Details"> </div></form>
			
	          <div class="center_title_bar">Show Master Details</div>


        <table border="1" width="100%"><tr>
                <th>Show Name</th><th>Class I Rate</th><th>Class II Rate</th><th>Class III Rate</th><th>Remove Show</th></tr>
            <script type="text/javascript">
                    function removeShow(value){
                $.ajax({
        url: "remove_show.php",
        type: "POST",
		dataType: "JSON",
		data:{id:value},
        success: function(data)
		{ 
                    window.location = "event_master.php";
                }

        });

        
                    }
                    </script>
        <?php

        $detail = "select * from $event_registration_table";
        $result = mysql_query($detail,$link) or die("Insertion Failed:" . mysql_error());
        while($row = mysql_fetch_array($result)){
echo "<tr><td>".$row['Event_name']."</td><td>".$row['Class_one_rate']."</td><td>".$row['Class_two_rate']."</td><td>"   .$row['Class_three_rate']."<br>"."</td><td><a href='#' onclick=\"removeShow(".$row[id].");\">Delete</a></td><tr>";

        }

       
        ?>
        </table>

    </div>
          </div>
         </div>
  <?php include 'admin_footer.php';?>

</BODY>
</html>