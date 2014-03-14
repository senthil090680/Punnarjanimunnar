<?php
session_start();
include '../configs/config_database.php';
if(!$_SESSION['admin_email_session']){

	 echo "<script type='text/javascript'>
		alert('You are not authorized person to visit thia area. Please login first');
		location = 'index.php';
		</script>";
		exit;
}

include 'admin_header.php';
//include 'header.php';
?>

    <!-- end of menu tab -->
    
   <?php include "admin_left_content.php"; ?>
    <!-- end of left content -->
    <div class="center_content">
      

	  <div class="center_title_bar">Welcome to Book Your Show @Punarjanimunnar  <?php echo strtoupper($_SESSION['user_email_session']);?></div>
          <br><br><br><br><br>
	 Welcome to Admin Home Page.
         
          
      
	  </div>
      <!-- end of center content -->
    
  <?php include 'admin_footer.php';?>