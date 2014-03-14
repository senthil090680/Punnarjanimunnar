<?php
session_start();
include '../configs/config_database.php';

//unset($_SESSION['event_seat_timing']);
if(isset($_POST["info"])){

    $stringData = stripslashes($_POST["info"]);
	$ss  = json_decode($stringData, true);
	$_SESSION['event_seat_timing'] = json_encode($ss);
	//echo $_SESSION['event_seat_timing'];exit;
		
}


?><html>
    <head>
        <link type="text/css" href="../css/styles.layout.css" rel="stylesheet">
        <!--[if IE 6]>
        <link rel="stylesheet" href="inc/styles.layout.ie.css" type="text/css" />
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="inc/styles.layout.ie7.css" type="text/css" />
        <![endif]-->
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js"></script>
        <link href="../css/jquery-ui-1.8.16.custom.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../js/js_functions.js?val=38"></script>


    </head>
    <body>
	<center>
	<?php
	if(!$_SESSION['event_seat_timing']){
	echo "Please select show timings before booking tickets";
	exit;
	
	}
	
			$sql = "select * from seating_a where event_timing_id='".$_SESSION['event_seat_timing']."'";
			$seating_place = array();
			$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)){
									array_push($seating_place,$row['seating_place']);
									}
										?>
<br>
										Book Your Show @Punarjanimunnar.com
										<br>
        <table align="center">
            <tbody><tr><td>
                        <p class="center">
                            <img width="20" height="20" src="../images/seat-available.png"> Seat is Not Yet Booked &nbsp;&nbsp;&nbsp;
                            <img width="20" height="20" src="../images/seat-selected.png">Your Seat &nbsp;&nbsp;&nbsp;
                            <img width="20" height="20" src="../images/seat-sold.png"> Sold 

                        </p>

                    </td></tr>
                <tr><td>

                        
                        <div id="SeatSelector" style="height: 390px;"><div style="position: absolute">
                                <table align="center"><tr>

                                       <table align="center"><tr><td>


			<div grid_col="" grid_row="" style="left:275px; top:300px;" class="seat label noclick"><p>A</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1A" style="left:295px; top:300px;" 
			<?php 
			if(in_array("1A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1A')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2A"  style="left:315px; top:300px;" <?php 
			if(in_array("2A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2A')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3A"  style="left:335px; top:300px;" 
			<?php 
			if(in_array("3A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3A')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4A" style="left:350px; top:300px;"
			<?php 
			if(in_array("4A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4A')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5A" style="left:370px; top:300px;" 
			<?php 
			if(in_array("5A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5A')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6A" style="left:390px; top:300px;" 
			<?php 
			if(in_array("6A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6A')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7A" style="left:410px; top:300px;" <?php 
			if(in_array("7A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7A')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8A" style="left:430px; top:300px;" <?php 
			if(in_array("8A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8A')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="15" grid_row="11" seat_type="none" seat_no="16A" style="left:40px; top:300px;" <?php 
			if(in_array("16A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('16A')\"";
			} 
			?>><p>16</p></div><div grid_col="14" grid_row="11" seat_type="none" seat_no="15A"  style="left:60px; top:300px;" <?php 
			if(in_array("15A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('15A')\"";
			} 
			?>><p>15</p></div><div grid_col="13" grid_row="11" seat_type="none" seat_no="14A"  style="left:80px; top:300px;" <?php 
			if(in_array("14A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14A')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13A"  style="left:100px; top:300px;" <?php 
			if(in_array("13A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13A')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12A" style="left:120px; top:300px;" <?php 
			if(in_array("12A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12A')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11A"  style="left:140px; top:300px;" <?php 
			if(in_array("11A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11A')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10A"  style="left:160px; top:300px;" <?php 
			if(in_array("10A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10A')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9A" style="left:180px; top:300px;" <?php 
			if(in_array("9A",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9A')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:300px;" class="seat label noclick"><p>A</p></div>


			<div grid_col="" grid_row="" style="left:275px; top:280px;" class="seat label noclick"><p>B</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1B" style="left:295px; top:280px;" 
			<?php 
			if(in_array("1B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1B')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2B"  style="left:315px; top:280px;" <?php 
			if(in_array("2B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2B')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3B"  style="left:335px; top:280px;" 
			<?php 
			if(in_array("3B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3B')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4B" style="left:350px; top:280px;"
			<?php 
			if(in_array("4B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4B')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5B" style="left:370px; top:280px;" 
			<?php 
			if(in_array("5B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5B')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6B" style="left:390px; top:280px;" 
			<?php 
			if(in_array("6B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6B')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7B" style="left:410px; top:280px;" <?php 
			if(in_array("7B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7B')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8B" style="left:430px; top:280px;" <?php 
			if(in_array("8B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8B')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="15" grid_row="11" seat_type="none" seat_no="16B" style="left:40px; top:280px;" <?php 
			if(in_array("16B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('16B')\"";
			} 
			?>><p>16</p></div><div grid_col="14" grid_row="11" seat_type="none" seat_no="15B"  style="left:60px; top:280px;" <?php 
			if(in_array("15B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('15B')\"";
			} 
			?>><p>15</p></div><div grid_col="13" grid_row="11" seat_type="none" seat_no="14B"  style="left:80px; top:280px;" <?php 
			if(in_array("14B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14B')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13B"  style="left:100px; top:280px;" <?php 
			if(in_array("13B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13B')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12B" style="left:120px; top:280px;" <?php 
			if(in_array("12B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12B')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11B"  style="left:140px; top:280px;" <?php 
			if(in_array("11B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11B')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10B"  style="left:160px; top:280px;" <?php 
			if(in_array("10B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10B')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9B" style="left:180px; top:280px;" <?php 
			if(in_array("9B",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9B')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:280px;" class="seat label noclick"><p>B</p></div>


			<div grid_col="" grid_row="" style="left:275px; top:260px;" class="seat label noclick"><p>C</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1C" style="left:295px; top:260px;" 
			<?php 
			if(in_array("1C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1C')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2C"  style="left:315px; top:260px;" <?php 
			if(in_array("2C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2C')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3C"  style="left:335px; top:260px;" 
			<?php 
			if(in_array("3C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3C')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4C" style="left:350px; top:260px;"
			<?php 
			if(in_array("4C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4C')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5C" style="left:370px; top:260px;" 
			<?php 
			if(in_array("5C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5C')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6C" style="left:390px; top:260px;" 
			<?php 
			if(in_array("6C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6C')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7C" style="left:410px; top:260px;" <?php 
			if(in_array("7C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7C')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8C" style="left:430px; top:260px;" <?php 
			if(in_array("8C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8C')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="15" grid_row="11" seat_type="none" seat_no="16C" style="left:40px; top:260px;" <?php 
			if(in_array("16C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('16C')\"";
			} 
			?>><p>16</p></div><div grid_col="14" grid_row="11" seat_type="none" seat_no="15C"  style="left:60px; top:260px;" <?php 
			if(in_array("15C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('15C')\"";
			} 
			?>><p>15</p></div><div grid_col="13" grid_row="11" seat_type="none" seat_no="14C"  style="left:80px; top:260px;" <?php 
			if(in_array("14C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14C')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13C"  style="left:100px; top:260px;" <?php 
			if(in_array("13C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13C')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12C" style="left:120px; top:260px;" <?php 
			if(in_array("12C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12C')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11C"  style="left:140px; top:260px;" <?php 
			if(in_array("11C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11C')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10C"  style="left:160px; top:260px;" <?php 
			if(in_array("10C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10C')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9C" style="left:180px; top:260px;" <?php 
			if(in_array("9C",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9C')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:260px;" class="seat label noclick"><p>C</p></div>

			<div grid_col="" grid_row="" style="left:275px; top:240px;" class="seat label noclick"><p>D</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1D" style="left:295px; top:240px;" 
			<?php 
			if(in_array("1D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1D')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2D"  style="left:315px; top:240px;" <?php 
			if(in_array("2D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2D')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3D"  style="left:335px; top:240px;" 
			<?php 
			if(in_array("3D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3D')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4D" style="left:350px; top:240px;"
			<?php 
			if(in_array("4D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4D')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5D" style="left:370px; top:240px;" 
			<?php 
			if(in_array("5D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5D')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6D" style="left:390px; top:240px;" 
			<?php 
			if(in_array("6D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6D')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7D" style="left:410px; top:240px;" <?php 
			if(in_array("7D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7D')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8D" style="left:430px; top:240px;" <?php 
			if(in_array("8D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8D')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="15" grid_row="11" seat_type="none" seat_no="16D" style="left:40px; top:240px;" <?php 
			if(in_array("16D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('16D')\"";
			} 
			?>><p>16</p></div><div grid_col="14" grid_row="11" seat_type="none" seat_no="15D"  style="left:60px; top:240px;" <?php 
			if(in_array("15D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('15D')\"";
			} 
			?>><p>15</p></div><div grid_col="13" grid_row="11" seat_type="none" seat_no="14D"  style="left:80px; top:240px;" <?php 
			if(in_array("14D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14D')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13D"  style="left:100px; top:240px;" <?php 
			if(in_array("13D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13D')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12D" style="left:120px; top:240px;" <?php 
			if(in_array("12D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12D')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11D"  style="left:140px; top:240px;" <?php 
			if(in_array("11D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11D')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10D"  style="left:160px; top:240px;" <?php 
			if(in_array("10D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10D')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9D" style="left:180px; top:240px;" <?php 
			if(in_array("9D",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9D')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:240px;" class="seat label noclick"><p>D</p></div>
			<div grid_col="" grid_row="" style="left:275px; top:220px;" class="seat label noclick"><p>E</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1E" style="left:295px; top:220px;" 
			<?php 
			if(in_array("1E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1E')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2E"  style="left:315px; top:220px;" <?php 
			if(in_array("2E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2E')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3E"  style="left:335px; top:220px;" 
			<?php 
			if(in_array("3E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3E')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4E" style="left:350px; top:220px;"
			<?php 
			if(in_array("4E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4E')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5E" style="left:370px; top:220px;" 
			<?php 
			if(in_array("5E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5E')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6E" style="left:390px; top:220px;" 
			<?php 
			if(in_array("6E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6E')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7E" style="left:410px; top:220px;" <?php 
			if(in_array("7E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7E')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8E" style="left:430px; top:220px;" <?php 
			if(in_array("8E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8E')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="15" grid_row="11" seat_type="none" seat_no="16E" style="left:40px; top:220px;" <?php 
			if(in_array("16E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('16E')\"";
			} 
			?>><p>16</p></div><div grid_col="14" grid_row="11" seat_type="none" seat_no="15E"  style="left:60px; top:220px;" <?php 
			if(in_array("15E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('15E')\"";
			} 
			?>><p>15</p></div><div grid_col="13" grid_row="11" seat_type="none" seat_no="14E"  style="left:80px; top:220px;" <?php 
			if(in_array("14E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14E')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13E"  style="left:100px; top:220px;" <?php 
			if(in_array("13E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13E')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12E" style="left:120px; top:220px;" <?php 
			if(in_array("12E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12E')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11E"  style="left:140px; top:220px;" <?php 
			if(in_array("11E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11E')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10E"  style="left:160px; top:220px;" <?php 
			if(in_array("10E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10E')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9E" style="left:180px; top:220px;" <?php 
			if(in_array("9E",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9E')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:220px;" class="seat label noclick"><p>E</p></div>
			<div grid_col="" grid_row="" style="left:275px; top:200px;" class="seat label noclick"><p>F</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1F" style="left:295px; top:200px;" 
			<?php 
			if(in_array("1F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1F')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2F"  style="left:315px; top:200px;" <?php 
			if(in_array("2F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2F')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3F"  style="left:335px; top:200px;" 
			<?php 
			if(in_array("3F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3F')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4F" style="left:350px; top:200px;"
			<?php 
			if(in_array("4F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4F')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5F" style="left:370px; top:200px;" 
			<?php 
			if(in_array("5F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5F')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6F" style="left:390px; top:200px;" 
			<?php 
			if(in_array("6F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6F')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7F" style="left:410px; top:200px;" <?php 
			if(in_array("7F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7F')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8F" style="left:430px; top:200px;" <?php 
			if(in_array("8F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8F')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="13" grid_row="11" seat_type="none" seat_no="14F"  style="left:80px; top:200px;" <?php 
			if(in_array("14F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14F')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13F"  style="left:100px; top:200px;" <?php 
			if(in_array("13F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13F')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12F" style="left:120px; top:200px;" <?php 
			if(in_array("12F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12F')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11F"  style="left:140px; top:200px;" <?php 
			if(in_array("11F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11F')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10F"  style="left:160px; top:200px;" <?php 
			if(in_array("10F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10F')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9F" style="left:180px; top:200px;" <?php 
			if(in_array("9F",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9F')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:200px;" class="seat label noclick"><p>F</p></div>
						<div grid_col="" grid_row="" style="left:275px; top:180px;" class="seat label noclick"><p>G</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1G" style="left:295px; top:180px;" 
			<?php 
			if(in_array("1G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1G')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2G"  style="left:315px; top:180px;" <?php 
			if(in_array("2G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2G')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3G"  style="left:335px; top:180px;" 
			<?php 
			if(in_array("3G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3G')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4G" style="left:350px; top:180px;"
			<?php 
			if(in_array("4G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4G')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5G" style="left:370px; top:180px;" 
			<?php 
			if(in_array("5G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5G')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6G" style="left:390px; top:180px;" 
			<?php 
			if(in_array("6G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6G')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7G" style="left:410px; top:180px;" <?php 
			if(in_array("7G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7G')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8G" style="left:430px; top:180px;" <?php 
			if(in_array("8G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8G')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="13" grid_row="11" seat_type="none" seat_no="14G"  style="left:80px; top:180px;" <?php 
			if(in_array("14G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14G')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13G"  style="left:100px; top:180px;" <?php 
			if(in_array("13G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13G')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12G" style="left:120px; top:180px;" <?php 
			if(in_array("12G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12G')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11G"  style="left:140px; top:180px;" <?php 
			if(in_array("11G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11G')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10G"  style="left:160px; top:180px;" <?php 
			if(in_array("10G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10G')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9G" style="left:180px; top:180px;" <?php 
			if(in_array("9G",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9G')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:180px;" class="seat label noclick"><p>G</p></div>
			<div grid_col="" grid_row="" style="left:275px; top:160px;" class="seat label noclick"><p>H</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1H" style="left:295px; top:160px;" 
			<?php 
			if(in_array("1H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1H')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2H"  style="left:315px; top:160px;" <?php 
			if(in_array("2H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2H')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3H"  style="left:335px; top:160px;" 
			<?php 
			if(in_array("3H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3H')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4H" style="left:350px; top:160px;"
			<?php 
			if(in_array("4H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4H')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5H" style="left:370px; top:160px;" 
			<?php 
			if(in_array("5H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5H')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6H" style="left:390px; top:160px;" 
			<?php 
			if(in_array("6H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6H')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7H" style="left:410px; top:160px;" <?php 
			if(in_array("7H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7H')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8H" style="left:430px; top:160px;" <?php 
			if(in_array("8H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8H')\"";
			} 
			?>><p>8</p></div>

<div grid_col="8" grid_row="11" seat_type="none" seat_no="9H" style="left:450px; top:160px;" <?php 
			if(in_array("9H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9H')\"";
			} 
			
			?>><p>9</p></div>

			<div grid_col="14" grid_row="11" seat_type="none" seat_no="15H"  style="left:80px; top:160px;" <?php 
			if(in_array("15H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('15H')\"";
			} 
			?>><p>15</p></div><div grid_col="13" grid_row="11" seat_type="none" seat_no="14H"  style="left:100px; top:160px;" <?php 
			if(in_array("14H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('14H')\"";
			} 
			?>><p>14</p></div><div grid_col="12" grid_row="11" seat_type="none" seat_no="13H"  style="left:120px; top:160px;" <?php 
			if(in_array("13H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13H')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12H" style="left:140px; top:160px;" <?php 
			if(in_array("12H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12H')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11H"  style="left:160px; top:160px;" <?php 
			if(in_array("11H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11H')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10H"  style="left:180px; top:160px;" <?php 
			if(in_array("10H",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10H')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:160px;" class="seat label noclick"><p>H</p></div>

			<div grid_col="" grid_row="" style="left:275px; top:140px;" class="seat label noclick"><p>I</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1I" style="left:295px; top:140px;" 
			<?php 
			if(in_array("1I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1I')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2I"  style="left:315px; top:140px;" <?php 
			if(in_array("2I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2I')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3I"  style="left:335px; top:140px;" 
			<?php 
			if(in_array("3I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3I')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4I" style="left:350px; top:140px;"
			<?php 
			if(in_array("4I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4I')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5I" style="left:370px; top:140px;" 
			<?php 
			if(in_array("5I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5I')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6I" style="left:390px; top:140px;" 
			<?php 
			if(in_array("6I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6I')\"";
			} 
			?>><p>6</p></div>


			<div grid_col="6" grid_row="11" seat_type="none" seat_no="7I" style="left:410px; top:140px;" <?php 
			if(in_array("7I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('7I')\"";
			} 
			?>><p>7</p></div>

			<div grid_col="7" grid_row="11" seat_type="none" seat_no="8I" style="left:430px; top:140px;" <?php 
			if(in_array("8I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('8I')\"";
			} 
			?>><p>8</p></div>


			<div grid_col="12" grid_row="11" seat_type="none" seat_no="13I"  style="left:100px; top:140px;" <?php 
			if(in_array("13I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('13I')\"";
			} 
			?>><p>13</p></div><div grid_col="11" grid_row="11" seat_type="none" seat_no="12I" style="left:120px; top:140px;" <?php 
			if(in_array("12I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('12I')\"";
			} 
			?>><p>12</p></div><div grid_col="10" grid_row="11" seat_type="none" seat_no="11I"  style="left:140px; top:140px;" <?php 
			if(in_array("11I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('11I')\"";
			} 
			?>><p>11</p></div>
			</td><td>


			<div grid_col="9" grid_row="11" seat_type="none" seat_no="10I"  style="left:160px; top:140px;" <?php 
			if(in_array("10I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('10I')\"";
			} 
			?>><p>10</p></div>

			<div grid_col="8" grid_row="11" seat_type="none" seat_no="9I" style="left:180px; top:140px;" <?php 
			if(in_array("9I",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('9I')\"";
			} 
			?>><p>9</p></div>

			<div grid_col="" grid_row="" style="left:200px; top:140px;" class="seat label noclick"><p>I</p></div>

						<div grid_col="" grid_row="" style="left:200px; top:120px;" class="seat label noclick"><p>J</p></div>

			<div grid_col="0" grid_row="11" seat_type="none" seat_no="1J" style="left:180px; top:120px;" 
			<?php 
			if(in_array("1J",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('1J')\"";
			} 
			?>><p>1</p></div>
			<div grid_col="1" grid_row="11" seat_type="none" seat_no="2J"  style="left:160px; top:120px;" <?php 
			if(in_array("2J",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('2J')\"";
			} 
			?>><p>2</p></div>

			<div grid_col="2" grid_row="11" seat_type="none" seat_no="3J"  style="left:140px; top:120px;" 
			<?php 
			if(in_array("3J",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('3J')\"";
			} 
			?>
			><p>3</p></div>

			<div grid_col="3" grid_row="11" seat_type="none" seat_no="4J" style="left:120px; top:120px;"
			<?php 
			if(in_array("4J",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('4J')\"";
			} 
			?>><p>4</p></div>

			<div grid_col="4" grid_row="11" seat_type="none" seat_no="5J" style="left:100px; top:120px;" 
			<?php 
			if(in_array("5J",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('5J')\"";
			} 
			?> ><p>5</p></div>

			<div grid_col="5" grid_row="11" seat_type="none" seat_no="6J" style="left:80px; top:120px;" 
			<?php 
			if(in_array("6J",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('6J')\"";
			} 
			?>><p>6</p></div>



				
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="101" style="left:100px; top:80px;" <?php 
			if(in_array("101",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('101')\"";
			} 
			?>><p>101</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="102" style="left:120px; top:80px;" <?php 
			if(in_array("102",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('102')\"";
			} 
			?>><p>102</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="103" style="left:140px; top:80px;" <?php 
			if(in_array("103",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('103')\"";
			} 
			?>><p>103</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="104" style="left:160px; top:80px;" <?php 
			if(in_array("104",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('104')\"";
			} 
			?>><p>104</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="105" style="left:180px; top:80px;" <?php 
			if(in_array("105",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('105')\"";
			} 
			?>><p>105</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="106" style="left:200px; top:80px;" <?php 
			if(in_array("106",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('106')\"";
			} 
			?>><p>106</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="107" style="left:240px; top:80px;" <?php 
			if(in_array("107",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('107')\"";
			} 
			?>><p>107</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="108" style="left:260px; top:80px;" <?php 
			if(in_array("108",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('108')\"";
			} 
			?>><p>108</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="109" style="left:280px; top:80px;" <?php 
			if(in_array("109",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('109')\"";
			} 
			?>><p>109</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="110" style="left:300px; top:80px;" <?php 
			if(in_array("110",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('110')\"";
			} 
			?>><p>110</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="111" style="left:320px; top:80px;" <?php 
			if(in_array("111",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('111')\"";
			} 
			?>><p>111</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="112" style="left:340px; top:80px;" <?php 
			if(in_array("112",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('112')\"";
			} 
			?>><p>112</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="113" style="left:360px; top:80px;" <?php 
			if(in_array("113",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('113')\"";
			} 
			?>><p>113</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="114" style="left:380px; top:80px;" <?php 
			if(in_array("114",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('114')\"";
			} 
			?>><p>114</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="115" style="left:100px; top:60px;" <?php 
			if(in_array("115",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('115')\"";
			} 
			?>><p>115</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="116" style="left:120px; top:60px;" <?php 
			if(in_array("116",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('116')\"";
			} 
			?>><p>116</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="117" style="left:140px; top:60px;" <?php 
			if(in_array("117",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('117')\"";
			} 
			?>><p>117</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="118" style="left:160px; top:60px;" <?php 
			if(in_array("118",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('118')\"";
			} 
			?>><p>118</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="119" style="left:180px; top:60px;" <?php 
			if(in_array("119",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('119')\"";
			} 
			?>><p>119</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="120" style="left:200px; top:60px;" <?php 
			if(in_array("120",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('120')\"";
			} 
			?>><p>120</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="121" style="left:220px; top:60px;" <?php 
			if(in_array("121",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('121')\"";
			} 
			?>><p>121</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="122" style="left:240px; top:60px;" <?php 
			if(in_array("122",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('122')\"";
			} 
			?>><p>122</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="123" style="left:260px; top:60px;" <?php 
			if(in_array("123",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('123')\"";
			} 
			?>><p>123</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="124" style="left:280px; top:60px;" <?php 
			if(in_array("124",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('124')\"";
			} 
			?>><p>124</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="125" style="left:300px; top:60px;" <?php 
			if(in_array("125",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('125')\"";
			} 
			?>><p>125</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="126" style="left:320px; top:60px;" <?php 
			if(in_array("126",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('126')\"";
			} 
			?>><p>126</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="127" style="left:340px; top:60px;" <?php 
			if(in_array("127",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('127')\"";
			} 
			?>><p>127</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="128" style="left:360px; top:60px;" <?php 
			if(in_array("128",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('128')\"";
			} 
			?>><p>128</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="129" style="left:100px; top:40px;" <?php 
			if(in_array("129",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('129')\"";
			} 
			?>><p>129</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="130" style="left:120px; top:40px;" <?php 
			if(in_array("130",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('130')\"";
			} 
			?>><p>130</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="131" style="left:140px; top:40px;" <?php 
			if(in_array("131",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('131')\"";
			} 
			?>><p>131</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="132" style="left:160px; top:40px;" <?php 
			if(in_array("132",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('132')\"";
			} 
			?>><p>132</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="133" style="left:180px; top:40px;" <?php 
			if(in_array("133",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('133')\"";
			} 
			?>><p>133</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="134" style="left:200px; top:40px;" <?php 
			if(in_array("134",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('134')\"";
			} 
			?>><p>134</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="135" style="left:220px; top:40px;" <?php 
			if(in_array("135",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('135')\"";
			} 
			?>><p>135</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="136" style="left:240px; top:40px;" <?php 
			if(in_array("136",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('136')\"";
			} 
			?>><p>136</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="137" style="left:260px; top:40px;" <?php 
			if(in_array("137",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('137')\"";
			} 
			?>><p>137</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="138" style="left:280px; top:40px;" <?php 
			if(in_array("138",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('138')\"";
			} 
			?>><p>138</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="139" style="left:300px; top:40px;" <?php 
			if(in_array("139",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('139')\"";
			} 
			?>><p>139</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="140" style="left:320px; top:40px;" <?php 
			if(in_array("140",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('140')\"";
			} 
			?>><p>140</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="141" style="left:340px; top:40px;" <?php 
			if(in_array("141",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('141')\"";
			} 
			?>><p>141</p></div>
			
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="142" style="left:100px; top:20px;" <?php 
			if(in_array("142",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('142')\"";
			} 
			?>><p>142</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="143" style="left:120px; top:20px;" <?php 
			if(in_array("143",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('143')\"";
			} 
			?>><p>143</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="144" style="left:140px; top:20px;" <?php 
			if(in_array("144",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('144')\"";
			} 
			?>><p>144</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="145" style="left:160px; top:20px;" <?php 
			if(in_array("145",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('145')\"";
			} 
			?>><p>145</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="146" style="left:180px; top:20px;" <?php 
			if(in_array("146",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('146')\"";
			} 
			?>><p>146</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="147" style="left:200px; top:20px;" <?php 
			if(in_array("147",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('147')\"";
			} 
			?>><p>147</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="148" style="left:220px; top:20px;" <?php 
			if(in_array("148",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('148')\"";
			} 
			?>><p>148</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="149" style="left:240px; top:20px;" <?php 
			if(in_array("149",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('149')\"";
			} 
			?>><p>149</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="150" style="left:260px; top:20px;" <?php 
			if(in_array("150",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('150')\"";
			} 
			?>><p>150</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="151" style="left:280px; top:20px;" <?php 
			if(in_array("151",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('151')\"";
			} 
			?>><p>151</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="152" style="left:300px; top:20px;" <?php 
			if(in_array("152",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('152')\"";
			} 
			?>><p>152</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="153" style="left:320px; top:20px;" <?php 
			if(in_array("153",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('153')\"";
			} 
			?>><p>153</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="154" style="left:340px; top:20px;" <?php 
			if(in_array("154",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('154')\"";
			} 
			?>><p>154</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="155" style="left:360px; top:20px;" <?php 
			if(in_array("155",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('155')\"";
			} 
			?>><p>155</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="156" style="left:100px; top:0px;" <?php 
			if(in_array("156",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('156')\"";
			} 
			?>><p>156</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="157" style="left:120px; top:0px;" <?php 
			if(in_array("157",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('157')\"";
			} 
			?>><p>157</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="158" style="left:140px; top:0px;" <?php 
			if(in_array("158",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('158')\"";
			} 
			?>><p>158</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="159" style="left:160px; top:0px;" <?php 
			if(in_array("159",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('159')\"";
			} 
			?>><p>159</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="160" style="left:180px; top:0px;" <?php 
			if(in_array("160",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('160')\"";
			} 
			?>><p>160</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="161" style="left:200px; top:0px;" <?php 
			if(in_array("161",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('161')\"";
			} 
			?>><p>161</p></div>
			<div grid_col="8" grid_row="11" seat_type="none" seat_no="162" style="left:220px; top:0px;" <?php 
			if(in_array("162",$seating_place)){
			echo "class=\"seat sold noclick\"";
			}else{
			echo "class=\"seat empty clickable\" onclick=\"selectSeat(this)\" onmouseout=\"$('#seat_position').text('')\" onmouseover=\"$('#seat_position').text('162')\"";
			} 
			?>><p>162</p></div>

                                        </tr></table>
                            </div><br><br>
                            <br><br>
                            <br><br><br><br>
							<br><br>
                            <br><br>
                            <br><br><br><br><br><br>
							<br><br><br>
							<br><br><br>
                           <center> <img width="580" height="52" alt="Screen" src="../images/seat-selection_screen.png">
                           <br><br>
                           <input type="button" onclick="selectSeat(this,true)" value="Save Seats"></center>
                            </td></tr>

                        
                            
            </tbody></table>
</center>
