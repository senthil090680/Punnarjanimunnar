<?php
session_start();
include 'configs/config_database.php';
if(!$_SESSION['user_email_session']){

	 echo "<script type='text/javascript'>
		
		location = 'index.php';
		</script>";
}

?>
<?php $logout = strtoupper($_SESSION['user_email_session']); unset($_SESSION['user_email_session']); ?>
<?php include 'header.php';?>
    <div class="left_content">
<?php include 'left_content.php';?>
  </div>
    <!-- end of left content -->
    <div class="center_content">
      Sign Out
	  <br><br><br><br><br><br>
<center>Thank You, <b>
	  <?php echo $logout;?>
	  </b>
	  Visiting Punarjanimunnar.com
      </center>
	  </div>
      <!-- end of center content -->
    
  <div class="footer">
    <?php include 'footer.php';?>
  </div>
</div>
</html>
