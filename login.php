<?php session_start();
include 'header.php';?>
<div  align="center">

<?php

include 'configs/config_database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['user_login'] == "User Login") {

       $user_email = mysql_real_escape_string($_POST["user_email"]);
       $password = mysql_real_escape_string($_POST["user_password"]);

if($user_email=="admin" && $password =="admin"){
$_SESSION['admin_email_session'] = $user_email;
 echo "<script type='text/javascript'>

		location = 'admin/admin1.php';
		</script>";
}else{
$sql="SELECT * FROM $user_registration_table WHERE email = '".$user_email."' and password='".$password."' limit 1";
$result=mysql_query($sql);



while($row = mysql_fetch_assoc($result)){
$_SESSION['id'] = $row['id'];
$_SESSION['user_email_session'] = $row['name'];
}
// If successfully queried
if($result){

	 echo "<script type='text/javascript'>

		location = 'book_your_ticket.php';
		</script>";
}
}
}
?>
<?php //session_start(); ?>
	  <?php if(empty($_SESSION['user_email_session'])){ ?>
			<form method="POST" action="login.php">
                            
			<input type="hidden" name="user_login" value="user_login">
                        <table style="width: 30%" >
           <thead>
               <tr><th>LOGIN</th></tr>
           </thead>
           <tbody>
               <tr><td>Username :<input type="text" name="user_email" id="user_email" style="width:140px"/></td></tr>
  <tr><td>Password  :<input type="password" name="user_password" id="user_password" style="width:140px"/></td></tr>
  <tr> <td> <input type="submit" name="user_login" id="user_lign" value="User Login" /></td></tr>
	</tbody>

	<tfoot>
            <tr><td >New to Punarjani?<br><a href="user_registration.php?height=450&width=600" class="thickbox" title="" style="border:none;" id="user_register">Register</a> <br> <a href="user_forget_password.php?"?height=100&width=300" class="thickbox" title="" style="border:none;" id="user_register">Forget Password</a>
  </td>

            </tr>

            </tfoot>
      </table>
	</form>


  <?php }?>

    </div>


  <div class="footer">
    <?php include 'footer.php';?>
  </div>
</html>
