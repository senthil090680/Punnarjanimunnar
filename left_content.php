<?php
session_start();
?>

<table id="gradient-style"  border="1px" style="border-color:white">
    <thead>
    	<tr>
        	<th scope="col">Punarjani Munnar</th>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	
        </tr>
    </tfoot>
    <tbody>
    	<tr> 	<td><a href="index.php">Home</a></td></tr>
        <tr>        <td><a href="book_your_ticket.php">Booking Ticket</a></td></tr>
            <tr>    <td><a href="search_ticket.php">Search Ticket</a></td></tr>
                
	<?php if(empty($_SESSION['user_email_session'])){ ?>
                <tr><td><a href="user_registration.php?height=450&width=600" class="thickbox" title="" style="border:none;" id="user_register">Signup</a>
</td></tr>
        <?php }else{ ?>
<tr><td><a href="signout.php">Sign Out</a></td>        </tr>

<?php }?>
    </tbody>
</table>

	  <?php if(empty($_SESSION['user_email_session'])){ ?>
	 
			<form method="POST" action="index.php">
			<input type="hidden" name="user_login" value="user_login">
   
                        <table id="rounded-corner" style="width: 25%">
           <thead>
               <tr><th class="rounded-company">LOGIN</th><th class="rounded-q4"></th></tr>
            
           </thead>
           <tbody>
               <tr><td>Username :<input type="text" name="user_email" id="user_email" style="width:140px"/></td><td></td></tr>
  <tr><td>Password  :<input type="password" name="user_password" id="user_password" style="width:140px"/></td><td></td></tr>
  <tr> <td> <input type="submit" name="user_login" id="user_lign" value="User Login" /></td><td></td></tr>
	</tbody>
	
	<tfoot>
            <tr><td class="rounded-foot-left">New to BookYourShow?<br><a href="user_registration.php?height=450&width=600" class="thickbox" title="" style="border:none;" id="user_register">Register</a> <br> <a href="user_forget_password.php?"?height=100&width=300" class="thickbox" title="" style="border:none;" id="user_register">Forget Password</a>
  </td>
  <td class="rounded-foot-right"></td>
            </tr>
                
            </tfoot>
      </table>
	</form>
      
  
  <?php }?>
     
  