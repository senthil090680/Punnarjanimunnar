<?php
include 'configs/config_database.php';
$user_email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $user_email = mysql_real_escape_string($_POST["user_email"]);
   $sql='SELECT * FROM '.$user_registration_table .' WHERE email = "'.$user_email.'" limit 1';
$result = mysql_query($sql,$link) or die("Selection Failed:" . mysql_error());
$msg = urlencode("Thank you <STRONG>" .$user_name."</STRONG>, You have registered Successfuly.");
while($row = mysql_fetch_array($result)){

$user_password = $row['password'];
}	

mail($user_email,"BookYourShow","Thank You, $user_name for using BookYourShow. Please note down your password: $user_password \n\n Warm Regards \n BookYourShow.");
		

    echo "<script type='text/javascript'>
	alert('Your password is emailed. Please check your mail');
	
		location = 'index.php';
		</script>";
   }

?>
<link rel="stylesheet" href="css/movie.css" type="text/css" media="screen" />
<div id="message"> Please Enter Your Email ID:</div>
<fieldset>
  <legend>User Forget Password Form</legend>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <table id="user_registration_form">
  <tr><td colspan="2" >  </td><td></td></tr>
  <tr><td>  Email ID:</td><td><input type="text" name="user_email" id="user_email" /></td></tr>
  <tr><td colspan="2" >  </td><td></td></tr>
    
	<tr align="right">
	  
		<td colspan="2">
		<input type="submit" value="&nbsp;&nbsp;Get My Password&nbsp;&nbsp;" id="get_my_password">
		&nbsp;
</td>
		</tr>
		</table>
		</form>
</fieldset>













