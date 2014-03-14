<?php
include 'configs/config_database.php';
$user_name = $user_email = $user_password =  $user_mobile_number = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = mysql_real_escape_string($_POST["user_name"]);
        $user_email = mysql_real_escape_string($_POST["user_email"]);
        $password = mysql_real_escape_string($_POST["user_password"]);
        $user_mobile_number = mysql_real_escape_string($_POST["user_mobile_number"]);
    
    $sql="insert into $user_registration_table (id,name,email,password,mobile_number,registration_date)values('','$user_name','$user_email','$password','$user_mobile_number',now())";
$sucess = mysql_query($sql,$link) or die("Insertion Failed:" . mysql_error());
		
		
		$last=mysql_insert_id();
		
		
		
		  $sql_register=mysql_query("insert into team_booked_ticket_rates(user_id)values('$last')");
		
		$msg = urlencode("Thank you <STRONG>" .$user_name."</STRONG>, You have registered Successfuly.");
		
	
mail($user_email,"BookYourShow","Thank You, $user_name for registering BookYourShow.\n\n Warm Regards \n BookYourShow.");
		

    echo "<script type='text/javascript'>
		
		location = 'index.php';
		</script>";
   
}
?>
<link rel="stylesheet" href="css/movie.css" type="text/css" media="screen" />
<div id="message" style="display:none;"></div>
<fieldset>
  <legend>User Registration Form</legend>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <table id="user_registration_form">
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<input type="text" name="user_name" id="user_name" /></td></tr>
  <tr><td colspan="2" >  </td><td></td></tr>
  <tr><td>  User Name(Email ID):</td><td><input type="text" name="user_email" id="user_email" /></td></tr>
  <tr><td colspan="2" >  </td><td></td></tr>
    
	<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Password:</td><td><input type="password" name="user_password" id="user_password" /></td></tr>
  <tr><td colspan="2" >  </td><td></td></tr>
  <tr><td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm Password:</td><td><input type="password" name="confirm_user_password" id="confirm_user_password" /></td></tr>
  <tr><td colspan="2" >  </td><td></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile Number:</td><td><input type="text" name="user_mobile_number" id="user_mobile_number" /></td></tr>
  <tr><td colspan="2" >  </td><td></td></tr>
  
  
	<tr align="right">
	  
		<td colspan="2">
		<input type="submit" value="&nbsp;&nbsp;Register&nbsp;&nbsp;" id="user_registration">
		
		</td></tr>
		</table>
		</form>
</fieldset>













