<html>
    <head>
	<script type="text/javascript" src="ajax/catajax.js"></script>
  <script src="js-light/jquery-1.7.2.min.js"></script>
<script src="js-light/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js-light/jquery.smooth-scroll.min.js"></script>
<script src="js-light/lightbox.js"></script>
<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });
  </script>
 
<script type="text/javascript" src="ajax/auditoriumajax.js"></script>
<script type="text/javascript" src="ajax/timeajax.js"></script>
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
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
?>
<?php include "header-print.php" ?>


            <div >Name :   <?php echo strtoupper($_SESSION['user_email_session']); ?> <br><br>


User id : <?php echo $a=  $_SESSION['id'];// echo $a; ?>  </div><br>
<br>


<script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 1;var pfHideImages = 1;var pfImageDisplayStyle = 'block';var pfDisablePDF = 1;var pfDisableEmail = 1;var pfDisablePrint = 0;var pfCustomCSS = 'stylesheet.css';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;" src="http://cdn.printfriendly.com/button-print-blu20.png" alt="Print Friendly and PDF"/></a>

	<br>
<br>

	 <?php $res_query = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."'"); 
	$row_query = mysql_fetch_array($res_query); ?> 		


         <a href="javascript:confirmDelete('remove_delete.php?a=<?php echo $row_query['user_id'];?>')" ></a>


      <?php	


	$query_total = "SELECT SUM(rate)as Total FROM team_booked_details where user_id='".$a."'"; 
	$result_total = mysql_query($query_total) or die(mysql_error());
	while($row_total = mysql_fetch_array($result_total)){
		echo "Total Amount . ". $row_total['Total'];
		echo "<br />";
	}
?>

	<?php  $res = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."'  order by id  desc");   		
	     
		 	  $count=mysql_num_rows($res);
			  echo "Total seats Booked :";
			  echo $count;
			 echo "<br>";
			  echo "<br>";
			  ?>
			

<br>

 <?php $res1 = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."' and event='event1' order by id  desc"); 
 echo "	Show Name :";
	echo "	EVENT1 ";echo "<br>";echo "<br>";  
  while($rows1 = mysql_fetch_array($res1)){
	
	
	echo $rows1['time']; echo "&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;";
	echo $rows1['seat_no'];
	echo "<br>";
	
		}?>
		<br>
<br>

	 <?php $res2 = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."' and event='event2' order by id  desc"); 
 echo "	Show Name :";
	echo "	EVENT2 ";echo "<br>";echo "<br>";  
  while($rows2 = mysql_fetch_array($res2)){
	echo $rows2['time']; echo "&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;";
	echo $rows2['seat_no'];
	echo "<br>";
	
		}?>
	
<?php 
  $resexp = mysql_query("SELECT  * FROM team_booked_details where user_id='".$a."' order by id  desc");  
$rowexp = mysql_fetch_array($resexp);
 $rowexp['expiry'];	
 $curtimes = date("H:i:s");
if($rowexp['expiry']!="BOOKED" )
{
mysql_query("DELETE FROM team_booked_details where user_id='".$a."' and  expiry <'".$curtimes."'");
}

?> 

<?php

?>

</body>
</html>
