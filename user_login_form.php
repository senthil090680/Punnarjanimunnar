<?php

if (!empty($_POST)) {
	// process the request here
	
	print_r($_POST);

	// you must end here to stop the displaying of the html below
	exit (0);
	}	
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
 <script>
  $(document).ready(function () {
  
  $("#user_registration").click(function(){
  var user_name = $("#user_name").val();
  var user_email = $("#user_email").val();
  var user_password = $("#user_password").val();
  var user_confirm_password = $("#user_confirm_password").val();
  var user_mobile_number = $("#user_mobile_number").val();
  
  
  
        if ($('#user_email').val().length == 0) {
            $("#message").text('Please enter valid email address');
         
        }
        if (validateEmail(user_email)) {
            
        }
        else {
            $("#message").text('Invalid Email Address');
           
        }
		if(user_password != user_confirm_password){
	$("#message").text("Please check your password which is mismatch");
	return false;
  }
  });
  
});


function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
  </script>


<style>
#message {margin:20px; padding:20px; display:block; background:#cccccc; color:#cc0000;}
</style>

<div id="message">Please enter your password</div>

<div style="text-align:center ">
	<table border="0" cellpadding="3" cellspacing="3" style="margin:0 auto;" >
	  <tr>
		<td><label>Name</label>
		  :</td>
		<td><input name="user_name" id="user_name" type="user_name" size="20"></td>
	  </tr>
	  
	  <tr>
		<td><label>Username (Email ID)</label>
		  :</td>
		<td><input name="user_email" id="user_email" type="text" size="20"></td>
	  </tr>
	  <tr>
		<td><label>Password</label>
		  :</td>
		<td><input name="user_password" id="user_password" type="text" size="20" value="llllllllllll"></td>
	  </tr>
	  	  <tr>
		<td><label>Confirm Password</label>
		  :</td>
		<td><input name="user_confirm_password" id="user_confirm_password" type="text" size="20"></td>
	  </tr>
	  <tr>
		<td><label>Mobile Number</label>
		  :</td>
		<td><input name="user_mobile_number" id="user_mobile_number" type="text" size="20"></td>
	  </tr>

	  <tr align="right">
	  
		<td colspan="2">
		<input type="submit" value="&nbsp;&nbsp;Login&nbsp;&nbsp;" id="user_registration">
		&nbsp;
		<input type="submit" id="Login" value="&nbsp;&nbsp;Cancel&nbsp;&nbsp;" onclick="tb_remove()"></td>
		</tr>
	</table>
</div>














