<html>
    <head>
        </head>
<body>

<?php
@session_start();
include 'configs/config_database.php';
if(!$_SESSION['user_email_session']){

	 echo "<script type='text/javascript'>
		alert('Please login first for booking your show tickets');
		location = 'login.php';
		</script>";
		exit;
}


include 'header.php';

?>

  <div >Welcome  <?php echo strtoupper($_SESSION['user_email_session']); ?></div>
    
           
                
                   
                        <div class="form_row">
                            <label class="contact"><strong>Show Name:</strong></label>
                            <select name="event_name" class="contact_input_select" onChange="sendItrate(this.value)">

<?php
                    $event_details = mysql_query("select * from $event_registration_table");
                    while ($row = mysql_fetch_array($event_details)) {
					echo "<option value='" . $row['id'] . "'";
						if($row['id'] == $_SESSION['event_name'] || $row['id'] == $_SESSION['event_id']){
									echo 'SELECTED';
						}
						echo ">" . $row['Event_name'] . "</option>";

                    }
?>			  </select>

                        </div>
                    </div>
                   

<script type="text/javascript">
function sendItrate(value){

$.ajax({
        url: "admin/ticket_rate.php",
        type: "POST",
		dataType: "JSON",
		data:{info:value},
        success: function(data)
		{
		$("#rate").html(data);
                $("#a_names").show();

        }
    });

}
</script>


						<div class="form_row">
<div id="rate"></div>
</div>
                       

   
    <?php include 'footer.php';?>
</body>
</html>
