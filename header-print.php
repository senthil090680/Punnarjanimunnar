<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Newserific | Full Width</title>
<link rel="stylesheet" href="styles/layout.css" type="text/css" />

<script type="text/javascript" src="swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.xml_file = "flashmo_225_photo_list.xml";
			var params = {};
			params.wmode = "transparent";
			var attributes = {};
			attributes.id = "slider";
			swfobject.embedSWF("flashmo_225_bar_slider.swf", "flashmo_slider", "480", "81", "9.0.0", false, flashvars, params, attributes);
		</script>
    <style type="text/css">
<!--

#fl_menu{position:absolute; top:153px; left:450px; z-index:9999; width:120px; height:10px; padding-left: 570px}
#fl_menu .label{padding-left:20px; line-height:50px; font-family:"Arial Black", Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; background:#FFDF00; color:#000; letter-spacing:7px;}
#fl_menu .menu{display:none;}
#fl_menu .menu .menu_item{display:block; background:#000; color:#bbb; border-top:1px solid #333; padding:10px 20px; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none;}
#fl_menu .menu a.menu_item:hover{background:#333; color:#FFDF00;}
.content{width:520px; margin:50px auto;}
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="jquery.easing.1.3.js"></script>
<script type="text/javascript">
function FloatMenu(){
	var animationSpeed=1500;
	var animationEasing='easeOutQuint';
	var scrollAmount=$(document).scrollTop();
	var newPosition=menuPosition+scrollAmount;
	if($(window).height()<$('#fl_menu').height()+$('#fl_menu .menu').height()){
		$('#fl_menu').css('top',menuPosition);
	} else {
		$('#fl_menu').stop().animate({top: newPosition}, animationSpeed, animationEasing);
	}
}
$(window).load(function() {
	menuPosition=$('#fl_menu').position().top;
	FloatMenu();
});
$(window).scroll(function () {
	FloatMenu();
});
jQuery(document).ready(function(){
	var fadeSpeed=500;
	$("#fl_menu").hover(
		function(){ //mouse over
			$('#fl_menu .label').fadeTo(fadeSpeed, 1);
			$("#fl_menu .menu").fadeIn(fadeSpeed);
		},
		function(){ //mouse out
			$('#fl_menu .label').fadeTo(fadeSpeed, 0.75);
			$("#fl_menu .menu").fadeOut(fadeSpeed);
		}
	);
});
</script>
</head>

<body id="top">
<div id="fl_menu">
	<div class="label">Links</div>
	<div class="menu">
            <a href="https://www.facebook.com/punarjanimunnar" class="menu_item" target="_new">FaceBook</a>
        <a href="http://www.youtube.com/user/punarjanimunnar" class="menu_item" target="_new">Youtube</a>
        <a href="https://twitter.com/punarjanimunnar" class="menu_item" target="_new">Twitter</a>
        <a href="http://www.tripadvisor.in/Attraction_Review-g303881-d2390526-Reviews-Punarjani_Traditional_Village-Munnar_Kerala.html" class="menu_item" target="_new">TripAdvisor</a>
        <a href="http://www.linkedin.com" class="menu_item" target="_new">Linked IN</a>
    </div>
</div>

    <div class="wrapper col1">
  <div id="header">
    <div class="fl_left">
      <h1><a href="#">Punarjani</a></h1>
        <marquee BEHAVIOR="SCROLL" Direction="Right" ><p>Welcome to Traditional Village</p>
    </marquee >
    </div>
      <div class="fl_right" >
<div id="flashmo_slider">        		</div>
      </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">

        <ul >
        <li class="active"><a href="index.php" > Home</a></li>
        <!--<li>About Shows
        <ul>
            <li><a href="kathakali.php">Kathakalai</a></li>
            <li><a href="Kalaripayat.php">Kalaripeyat</a></li>

          </ul>

        </li>
        -->
        <li><a href="book_your_ticket.php">Book Your Tickets</a></li>

        <li><a href="gallery.php" >Gallery</a></li>

        <li><a href="search_ticket.php">Ticket Status</a></li>

		<li><a href="login.php" class="nav4">Sign In</a></li>
      <!--<li class="divider"></li>
        <li><a href="contact.php" class="nav6">Contact Us</a></li>
        -->
      </ul>

    </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="breadcrumb">
    <ul>
     <!-- <li class="first">Welcome User... !</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
    </ul>-->
  </div>
</div>
<!-- ####################################################################################################### -->
</body>
</html>