<?php
session_start();
include '../configs/config_database.php';
if(!$_SESSION['user_email_session']){

	 echo "<script type='text/javascript'>
		
		location = 'index.php';
		</script>";
}

?>
<?php $logout = strtoupper($_SESSION['admin_email_session']); unset($_SESSION['admin_email_session']); ?>
<?php include 'admin_header.php';?>
    <div class="crumb_navigation"> @Punarjanimunnar: <span class="current">Home</span> </div>
 
<?php include 'admin_left_content.php';?>
 
    <!-- end of left content -->
    <div class="center_content">
      <div class="center_title_bar">Sign Out</div>
	  <br><br><br><br><br><br>
<center>Thank You, <b>
	  <?php echo $logout;?>
	  </b>
	  Visiting Punarjanimunnar.com
      </center>
	  </div>
      <!-- end of center content -->
    
 
    <?php include 'admin_footer.php';?>
  