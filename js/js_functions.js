//////////// 
//From Quirksmode
var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera",
			versionSearch: "Version"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();
//// End Browser Detect


///////////////////////////////////////////////
// Jquery add ons
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function clickLink(link) {
    var cancelled = false;

    if (document.createEvent) {
        var event = document.createEvent("MouseEvents");
        event.initMouseEvent("click", true, true, window,
            0, 0, 0, 0, 0,
            false, false, false, false,
            0, null);
        cancelled = !link.dispatchEvent(event);
    }
    else if (link.fireEvent) {
        cancelled = !link.fireEvent("onclick");
    }

    if (0 && !cancelled) {
        window.location = link.href;
    }
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location=\'"+selObj.options[selObj.selectedIndex].value+"\'");
  if (restore) selObj.selectedIndex=0;
}


// VALIDATE FORM DATA
function validateForm(form) {
  if (form.first_name.value == "") {
    alert("Please enter your first name.");
    form.first_name.focus();
    return(false);
  }
  if (form.last_name.value == "") {
    alert("Please enter your last name.");
    form.last_name.focus();
    return(false);
  }
  if (form.email.value == "") {
    alert("Please enter your email address.");
    form.email.focus();
    return(false);
  }  
  if (form.theatre.value == "") {
    alert("Please choose a theatre.");
    form.theatre.focus();
    return(false);
  }  
  
  return true;
}

// OPEN NEW WINDOW
function openBrWindow(theURL,winName,features) { 
  window.open(theURL,winName,features);
} 

// OPEN NEW WINDOW
var newwindow;
function openWindow(url)
{
	newwindow=window.open(url,'name','width=302,height=550');
	if (window.focus) {newwindow.focus()}
}

var madison_window;
function openWindow_608(url)
{
	madison_window=window.open(url,'name','width=420,height=700');
	if (window.focus) {madison_window.focus()}
}

var tickets_window;
function openWindow_tickets(url)
{
	tickets_window=window.open(url,'name','width=810,height=650,scrollbars=yes');
	if (window.focus) {tickets_window.focus()}
}

var k_tickets_window;
function openWindow_k_tickets(url)
{
	k_tickets_window=window.open(url,'name','width=810,height=650,scrollbars=yes');
	if (window.focus) {k_tickets_window.focus()}
}
/*************************************************
//    TICKETING AND AJAX FUNCTIONS BELOW HERE
//    DAVID HAMPSON 2011
**************************************************/
var vista = {};
var col_array= new Array("#TicketColumn1","#TicketColumn2","#TicketColumn3","#TicketColumn4","#TicketColumnCC","#SeatingChart");
var max_height;  // actually the minimum height of the ticket window in pixels
var num_tix; //Number of ticket user has selected
var active_ticket_column = 1;  
var TicketTimerSeconds = 600;   // #seconds to purchase tickets
var fade_time = 400;  //milliseconds
var spinner_html = '<div style="height:100px" /><p class="spinner"><img src="images/spinner.gif" height="38" width="38" /></p>';
var selected_seats = new Object;
var num_tix;
var movie_session;	//The string id of the movie/date/showtime.
var movie_date;
var cinema = 1;		//cinema 1 = houston e.g.
var auditorium;		//Which cinema auditorium
var areaCatCode;	//auditorium subsections
var areaNumber;
var seat_chart = false;		// Is the seating chart visible.

vista.loyalty_enabled = false;
vista.busy = false;

//cancel order when the user moves from sundancecinemas.com
$(window).unload( function (){ cancelOrder(false) });


//Code to organize and eliminate all ajax requests....
$.xhrPool = [];
$.xhrPool.abortAll = function() {
						$(this).each(function(idx, jqXHR) { jqXHR.abort(); });
	};
$.ajaxSetup({
		beforeSend: function(jqXHR) {$.xhrPool.push(jqXHR);}
	});

$(document).ajaxComplete(function() { $.xhrPool.pop(); });


function setDivHeights(){
	max_height = "300";
	var m = col_array.length;
	for (i = 0; i < m; i++){
		$(col_array[i]).css('height','');
		this_height = $(col_array[i]).height();
		if (this_height > max_height) max_height = this_height;
//		console.log("Column "+col_array[i]+" is "+this_height+" pixels high.");
		}
	height_str = max_height + "px";
//	console.log ("setting dives to " + height_str);
	for (i = 0; i < m; i++){
		$(col_array[i]).css('height', height_str);
		}
	$('#column_holder').css('height',height_str);
	}

function hidePopUpCols(){
	$(col_array[4]).css('top',(max_height+3) + "px");
	$(col_array[5]).css('top',(max_height+3) + "px");
}

function goto_column(col){
//console.log("Going from " + active_ticket_column + " to " +col);
	if (col != 2 && col != 3) $('#movie_infobox').dialog("close");
	if (col == active_ticket_column) return;
	if (col == 3 && typeof timer != 'undefined'){
		clearTimeout(timer);
	}
	
	var m = col_array.length;
	if (active_ticket_column < col) {  // fold up 
		active_ticket_column++;
		if (active_ticket_column == 5) {   //show CC panel.
			if (navigator.userAgent.indexOf("Windows NT") >= 0){
				$('#movie_calendar').css('visibility','hidden');
			}
			$('#CCalert').text('');
			$('#ticket_purchase_button').one('click',function(e){ e.stopImmediatePropagation(); startPayment()});
			$('#ticket_purchase_button').addClass('clickable');
			$('#ticket_cancel_button').bind('click',function(e){cancelOrder(false);goto_column(3);});
			$('#ticket_cancel_button').addClass('clickable');
			$('#summary_purchase_button').css('display','none'); 
			$(col_array[4]).animate({'top': 0}, fade_time);
		}
		else{
			$(col_array[active_ticket_column -1 ]).fadeIn(fade_time,function() {
					goto_column(col);
					});
		}
	}
	else {  						// Fold away
		if (active_ticket_column == 5) {   // bring down the CC panel.
			if (navigator.userAgent.indexOf("Windows NT") >= 0){
				$('#movie_calendar').css('visibility','visible');
			}
			$(col_array[4]).animate({'top':max_height + 3}, fade_time,'',function(){
														active_ticket_column = 4;
														goto_column(col);
													});
			}
		else {
			active_ticket_column--;
			$(col_array[active_ticket_column]).fadeOut(fade_time,function(){
				goto_column(col);
			});
		}
	}
}

function showTixWindow(dir, cin, label) {
	if (parseInt(cin,10)>0){
		cinema = cin;
	}
	showtimes = showtimes_array[cinema];
//	console.log("showTixWindow: cinema= " + cinema);
//	console.log("refreshing");
//	console.log(showtimes);

//	console.log(cinema_content);
	$('#ticket_info').html(cinema_content[cinema].ticket_info);
	$('#movie_calendar').datepicker('refresh');
	$twb = $('.theater_warn_box[data-cinema_id=' + cinema+']');
//	console.log("Warn box");console.log($twb);
//	console.log("bypass_warning: "+bypass_warning);
	if (dir == 'show') {
		// GOOGLE analytics
		pageTracker._trackEvent( 'Ticket', label, cinema_names[cinema] );
		// disable all pops, where applicable
		closeLocations();
		disableAllPops();
		if (typeof timer != 'undefined') clearTimeout(timer);

//			switch from warning box to ticket box
		if ($('#tickets_overlay').css('visibility') == 'visible'){
			$twb.animate({'opacity':0},fade_time,'',function(){
								$('.theater_warn_box').css('display','none');
								$('#ticket_container').css({visibility:'visible',opacity:0});
								$('#ticket_container').animate({'opacity':1},fade_time,'',function(){
													if (BrowserDetect.browser == "Explorer" && BrowserDetect.version == 7){
//														console.log("IE7 removing filter");
														$('#ticket_container').css('filter','');
													}
											});
								$('#tickets_overlay').css('position','absolute');
								});
			}
//				bring forth the warning or the tix box
		else {
			$('object').css('display','none');  // flash in ie.
			$('embed').css('display','none');   // hides flash et.el.
			if (!bypass_warning) {
				$('#ticket_container').css('visibility','hidden');
				$twb.css('visibility','visible');
				preload_tix_info(cinema);
			}
			else {
				$('#ticket_container').css('visibility','visible');
				$twb.css('visibility','hidden');
			}
			$('#tickets_overlay').css({visibility:'visible', opacity:0});
			$('#tickets_overlay').animate({'opacity':1}, fade_time,'',function(){
							$(document).keydown(function (evt){
													if (evt.keyCode == 27) {  // escape key
														showTixWindow('hide');
														}
													});
	//						$('#movie_date').datepicker("show");
							if ($('#movie_date').val() == '') {
								var today = new Date();
								$('#movie_calendar').datepicker('setDate',firstDate);
	//							$('#movie_date').val((today.getMonth()+1)+'/'+today.getDate()+'/'+today.getFullYear());
								$('#movie_date').val(firstDate);
							}
							
							if (BrowserDetect.browser == "Explorer" && BrowserDetect.version < 9){
//								console.log('NT3');
								$('#IE_underlay').css('visibility', 'visible');
								$('#banner').css('visibility','hidden');
								$('#master0').css('visibility','hidden');
								$('#tickets_overlay').css('z-index','inherit');
							}
							hidePopUpCols();
							getShowTimes(cinema);
							$(function() {$( "#movie_infobox" ).dialog({autoOpen: false});});
							});
		}
	}
	else if (dir == 'hide'){
		// re-enable all pops, where applicable
		enableAllPops();
	
		if (navigator.userAgent.indexOf("Windows NT") >= 0){
			$('#IE_underlay').css('visibility', 'hidden');
			$('#banner').css('visibility','visible');
			$('#master0').css('visibility','visible');
			$('tickets_overlay').css('z-index','');
		}

		$.xhrPool.abortAll();		// ignore incoming ajax requests.
		$(document).unbind('keydown');
		$('object').css('display','block');
		$('embed').css('display','block');   // shows flash et.el.
		if (typeof timer != 'undefined'){
			clearTimeout(timer);
		}
		bypass_warning = false;
		$('#tickets_overlay').animate({'opacity':0}, fade_time,'',function() {
				$('#tickets_overlay').css({visibility:'hidden', position:'fixed'});
				$('#ticket_container').css({visibility:'hidden', opacity:1});
				$('.theater_warn_box').css({visibility:'hidden', opacity:1, display:'block'});
				});
	}
}

function preload_tix_info(cinema){
	var showtimes = showtimes_array[cinema];
	//console.log("showtimes: " + showtimes);
	if (!$('#movie_date').val()) $('#movie_date').val(showtimes[0]);
	$('#tix_cinema').text(cinema_names[cinema]);
	$('#loyalty_div').load('AJAXgetLoyalty.php?cinema='+ cinema);
}

function BypassSeatSelect(){
	$.xhrPool.abortAll();
	$('#seat_timer').text('');
	num_tix = 0;
	tix_array = $('#ticket_form select');
	tix_array.each(function (idx, elem){
					num_tix += parseInt($(elem).val());
//					console.log($(elem).attr("name") + " --> "+ num_tix);
					});
	if (num_tix === 0) {
		setAlert('#tix_qty_alert',"You must select at least one ticket.");
		setDivHeights();
		return;
		}

	getTixSummary('open');
}

function showSeatChart(dir, col) {
// Deactivate "Continue" button
	$('#tix_selected').unbind('click');
	$('#tix_selected').unbind('mousedown');
	$('#tix_selected').unbind('mouseup');
	$('#tix_selected').attr('src', 'images/button-continue_diabled.png');

	if (dir) {
		if (navigator.userAgent.indexOf("Windows NT") >= 0){
			$('#movie_calendar').css('visibility','hidden');
		}
		$.xhrPool.abortAll();
		$('#seat_timer').text('');
		num_tix = 0;
		tix_array = $('#ticket_form select');
		tix_array.each(function (idx, elem){
						num_tix += parseInt($(elem).val());
//						console.log($(elem).attr("name") + " --> "+ num_tix);
						});
		
		if (num_tix === 0) {
			setAlert('#tix_qty_alert',"You must select at least one ticket.");
			setDivHeights();
			return;
			}
		$('#SeatSelector').html(spinner_html);
		$('#ticket_info').slideUp(fade_time);
		$('#SeatingChart').animate({'top':'0px'},fade_time);
		$('#TIX').text(num_tix);
//console.log (url);
		$.post('AJAXseatingChart.php', $('#ticket_form').serialize(), 
					function(response){
						startTimer();
//??						getTixSummary('reserved');
						$('#SeatSelector').html(response);
						max_top = 300;  //pixels
						$('.seat').each(function(x, s){
									max_top = Math.max(max_top, parseInt($(s).css('top'),10));
									});
						max_top += 30; 
						//console.log("Max height: "+ max_top);
						$('#SeatSelector').css('height', max_top+"px");
						$('#seating_dialog').dialog({autoOpen: false, position: [125,125]});
						seat_chart = true;
						setDivHeights();});
	}
	else { //HIDE
		if (navigator.userAgent.indexOf("Windows NT") >= 0){
			$('#movie_calendar').css('visibility','visible');
		}
		$('#seating_dialog').dialog('close');
		$.xhrPool.abortAll();
		$('#ticket_info').slideDown(fade_time);
		$('#SeatingChart').animate({'top':max_height + 3},fade_time,'',function(){
											$('#SeatSelector').html('');
											$('#SeatSelector').css('height','');
											seat_chart = false;
											setDivHeights();
											});
		if (col==3){
			cancelOrder(false);
			goto_column(3);
		}
		else if (col == 4) 	getTixSummary("reserved");
	}
}

function getShowTimes(){
	$('#showtimes').html(spinner_html);
	goto_column(2);
	movie_date = $('#movie_date').val();
	url = 'AJAXgetShowTimes.php?cinema=' + cinema + '&date=' + movie_date;
//	console.log(url);
	$('#showtimes').load(url, function(){setDivHeights(); hidePopUpCols()});
}

function selectMovie(session){
//	console.log("selectMovie: cinema= " + cinema);
//	console.log($(session).data());
	$('#ticket_types').html(spinner_html);
	time = $(session).attr('time');
	movie_name = $(session).attr('mov_name').stripSlashes();
	auditorium = $(session).attr('aud');
	movie_session = $(session).attr('session');
	seats_left = $(session).attr('seats');
	reserved_seats = $(session).attr('reserved');
	
	if (reserved_seats === "Y"){
		$('#reserved_seats_button').show();
		$('#open_seats_button').hide();
	}
	else{
		$('#reserved_seats_button').hide();
		$('#open_seats_button').show();
	}
	
	
	if ($(session).data('alert_message') === 'on'){
		movie_alert();
	}
	$('.showtime_sel').removeClass('showtime_sel');
	$(session).addClass('showtime_sel');

	tix_text = "Tickets for the " + time + " showing of <span class='ul'>" + movie_name + "</span>";
	tix_text += " on " + movie_date;
	tix_text += " in auditorium " + auditorium ;
	$('#tix_left').html(tix_text);

	$('#colhead_aud').html('<h2 style="float: left;">AUDITORIUM ' + auditorium + '</h2><h2 style="float: right; margin-right: 4px;">' + movie_name + ' - ' + time + ' on ' + movie_date + '</h2>');

	if (typeof(warn_msg) != "undefined") warn_msg.remove();
	if ($(session).data('alert_message') === 'on'){
		$('#tix_left').after( movie_21_alert );
		warn_msg = $('#tix_left').next();
	}
	
	goto_column(3);
	url = 'AJAXgetTicketTypes.php?cinema=' + cinema + '&session=' + movie_session + '&screen=' + auditorium;
	$('#ticket_types').load(url, function(){setDivHeights(); hidePopUpCols()});
}

function getTixSummary(reserved){
//	console.log(reserved);
	$('#tix_summary').html(spinner_html);
	order_data = new Object;
	if (reserved == 'open') { 
	    startTimer();
		selected_seats = "";
		$.extend(order_data, $('#ticket_form').serializeObject());
	}

	goto_column(4);
	url = 'AJAXtixSummary.php';
	order_data['cinema'] = cinema;
	order_data['session'] = movie_session;
	order_data['areaCatCode'] = areaCatCode;
	order_data['areaNumber'] = areaNumber;
	order_data['seats'] = selected_seats;
	order_data['num_tix'] = num_tix;
	order_data['reserved'] = reserved;

	//console.log(order_data);
	$.post(url, order_data, function(response) {
									$('#tix_summary').html(response);
								});
}


function LoyaltyLogin(dir){
	if (vista.busy) return;
	$('#loyalty_div').append('<p class="spinner" style="text-align:center"><img src="images/spinner.gif" height="38" width="38" /></p>');
	vista.busy = true;
	var $form = $('#LoyaltyLoginForm');
//	console.log($form);
	var info = {};
	info.direction = dir;
	info.Email = $('#loyalty_email', $form).val() || '';
	info.Password = $('#loyalty_password', $form).val() || '';
	if ( $('#loyalty_remember_me', $form).length){
		info.remember_me = ( $('#loyalty_remember_me', $form)[0].checked ) ? 1 : 0;
	}
//	console.log("Log in info:");console.log(info);
	$.ajax({
				url : 'AJAXloginLoyalty.php',
				type: 'post',
				data: info,
			dataType: 'json',
			success  : function(data){
							if (data.status == 'success'){
								if (window.location.href.match(/loyalty.html$/)){
///									window.location.reload();
//									console.log("Reloading page....");
									$('.spinner').remove();
								}
								else{
									$('#loyalty_div').load('AJAXgetLoyalty.php?cinema='+ cinema , setDivHeights );
								}
							}
							else{
								alert(data.error);
								$('.spinner').remove();
							}
							vista.busy = false;
							},
			error	: function(){
							vista.busy = false;
							}
				});
}

function startTimer(){
	if (typeof timer != 'undefined'){
		clearTimeout(timer);
	}
	ticketTimer(TicketTimerSeconds);
}

function movie_alert(){
	//console.log($('#movie_infobox'));
	$('#movie_infobox').html( '<span style="font-color: red;">' +  movie_21_alert + '</span>' );
	$('#movie_infobox').dialog({title: "Movie Information", zIndex:2000});
	$('#movie_infobox').dialog('open');
}

function ticketTimer(time_left){
//	console.log ("The timer is at: "+time_left);
	if (time_left == 0) {
		if (seat_chart) {
			showSeatChart(false, 3);
			return;
		}
		cancelOrder(true);
		goto_column(3);
		return;
	}
	min = Math.floor(time_left/60);
	sec_str = time_left % 60;
	if (min == 0) min = "0";
	timestr = min + ":";
	timestr +=  (sec_str<10)?"0":"";
	timestr += sec_str ;

	$('#ticket_timer').text(timestr);
	$('#seat_timer').text(timestr);
	func = "ticketTimer(" + (time_left - 1) + ")";
			// PREVIOUS TIMERS INTERFEREING
	timer = setTimeout(func, 1000);
}

function selectSeat(this_seat,b){
    b = typeof b == 'undefined' ? false : true;
    if(!b){
	seat_id = $(this_seat).attr('seat_no');
	seat_type = $(this_seat).attr('seat_type');
	switch (seat_type) {
		case "none":
			seat_class = "empty";
			break;
		}
		
//	console.log("This seat had class " + seat_class);
	if ($(this_seat).hasClass("selected")) {
		$(this_seat).removeClass("selected");
		$(this_seat).addClass(seat_class);
	}
	else {
		no_selected = $('.selected').size();
		if (no_selected >= num_tix) return;
		$(this_seat).removeClass(seat_class);
                $(this_seat).addClass("selected");
	}
	selected_seats = {};
	var s;
	s = 0; 
	$(".selected").each(function(index, elem) {  //rebuild the selected_seats array
				seat_id  = $(elem).attr('seat_no');
				selected_seats[s] = {id:seat_id};
				s++
					});
    }

var jsonString = JSON.stringify(selected_seats);
    
					if(b){
 $.ajax({
        url: "session_seat.php",
        type: "POST",
		dataType: "JSON",
		data:{id:jsonString},
        success: function(data)
        { 
		window.location = 'admin_booking_ticket.php';
        }
    });
					
                                        }
console.log(selected_seats);
console.log($.param(selected_seats));
		$('#tix_selected').bind('mouseup', function(){ $('#tix_selected').attr('src','images/button-continue.png')});
	
	$('#TIX').text(selected_seats);
}

function startPayment(){
//	console.log( "Starting Payment at: " + Date.now() );
//	console.log("Busy?" + makePayment.busy);
	if (makePayment.busy === true) return false;
	$('#clicktime').val( Date.now() );
	if ($("#payment_form").valid() === false) return false;
	$('#CCalert').html('<p>Please wait while we check your payment information...</p>');
	$('#ticket_purchase_button').clearQueue();
	$('#ticket_purchase_button').removeClass('clickable');
	setTimeout("makePayment()",100);
// The above code is a bit of a hack.  However, because this API is synchronous
// the spinning gif image was not displayed in time.
// On the plus side, a synchronous call to a payment API will prevent the user
// from interfering. 
}

function makePayment(){
//	console.log("Making Payment at: " + Date.now() );
	var phone = $('#phone_0').val() + $('#phone_1').val() + $('#phone_2').val();
	$('#phone_no').val(phone);
	$('#tix_amount').val( $('#sale_amt').val() );
	$('input[name=cinema]').val(cinema);  // hack for the SESSION forgetting the cinema.

	if (typeof makePayment.busy == 'undefined' || makePayment.busy == false) {
		makePayment.busy = true;
	    $.ajax({
			    url: 'AJAXmakePayment.php',
//			    url: 'AJAXmakeTestPayment.php',
			    type: 'POST',
			    async: true,		// false required for Chrome pop-up blocker.
			    data: $('#payment_form').serialize(), 
			    dataType: 'json',
			    success: function (data, status){
								$.xhrPool.abortAll();
							    $('#CCalert').html(data.html);
							    if (data.success) {
								    $('#ticket_cancel_button').unbind('click');
								    $('#ticket_cancel_button').removeClass('clickable');
								    $('#payment_form input').attr('disabled', 'disabled');
								    $('#payment_form input').removeAttr('disabled');
								    if (typeof timer != 'undefined'){
									    clearTimeout(timer);
								    }
								    window.location.href = 'receipt.php';  //formerly window.open();
							    }
							    else {
									$('#ticket_purchase_button').off('click').one('click', function(e){startPayment()});
									$('#ticket_purchase_button').addClass('clickable');
									makePayment.busy = false;
							    }
							},
			    error: function(jqXHR, textStatus){
							    $('#ticket_purchase_button').off('click').one('click',function(){startPayment()});
							    $('#ticket_purchase_button').addClass('clickable');
							    $('#CCalert').html('<p>There was an error processing your request. ' + textStatus + '</p>');
							    makePayment.busy = false;
							    }
			    });
	}
}

function showCVV(){
var html = "<p class='center'><img src='images/cvv_number.png' height='136' width='180' /></p><p>The cvv number is printed on the back of your credit card.  Since this number is not a part of the magnetic strip, it provides an extra layer of security.</p>";
$('#CCalert').html(html);

}

function setAlert(selector,msg){
	$(selector).text(msg);
}

function SetCreditCardType(elem) {

    var cc = ($(elem).val()).replace(/\s/g, ''); //remove space
    var type;
    var valid;
    
    if ((/^(34|37)/).test(cc) && cc.length == 15) {
        type =  'AMERICANEXPRESS'; //AMEX begins with 34 or 37, and length is 15.
    } else if ((/^(51|52|53|54|55)/).test(cc) && cc.length == 16) {
        type =  'MASTERCARD'; //MasterCard beigins with 51-55, and length is 16.
    } else if ((/^(4)/).test(cc) && (cc.length == 13 || cc.length == 16)) {
        type =  'VISA'; //VISA begins with 4, and length is 13 or 16.
    } else if ((/^(300|301|302|303|304|305|36|38)/).test(cc) && cc.length == 14) {
        type =  'DinersClub'; //Diners Club begins with 300-305 or 36 or 38, and length is 14.
    } else if ((/^(2014|2149)/).test(cc) && cc.length == 15) {
        type =  'enRoute'; //enRoute begins with 2014 or 2149, and length is 15.
    } else if ((/^(6011)/).test(cc) && cc.length == 16) {
        type =  'Discover'; //Discover begins with 6011, and length is 16.
    } else if ((/^(3)/).test(cc) && cc.length == 16) {
        type =  'JCB';  //JCB begins with 3, and length is 16.
    } else if ((/^(2131|1800)/).test(cc) && cc.length == 15) {
        type =  'JCB';  //JCB begins with 2131 or 1800, and length is 15.
    }
    else {
    	type =  '?'; //unknow type
    	}
//    console.log(type);    
    if (type === '?') {
    	$(elem).addClass('error');
    	valid = false;
    	}
    else if (type === "VISA" || type === "MASTERCARD") {
    	$(elem).removeClass('error');
    	valid=true
//    	console.log(type);
    	}
   	$('#cctype').val(type);
   	return valid;
}

function checkCCtype(input_elem){
	cc_num = $(input_elem).val();
	message = '';
	
	string_test = /[^0-9]/;
	if (string_test.test(cc_num) ){
		setAlert("#CCalert2", "Do not use spaces or dashes.");
		$(input_elem).addClass('error');
		return false;
	}

	if (cc_num.substr(0,1) == "6"){
		setAlert("#CCalert2", "We do not accept Discover cards.");
		$(input_elem).addClass('error');
		return false;
	}

	if (cc_num.substr(0,2) == "34" || cc_num.substr(0,2) == "37"){
		setAlert("#CCalert2", "We do not accept American Express.");
		$(input_elem).addClass('error');
		return false;
	}

	if (cc_num.substr(0,2) == "36" || cc_num.substr(0,2) == "38" ||
		cc_num.substr(0,3) == "300" || cc_num.substr(0,3) == "305"){
		setAlert("#CCalert2", "We do not accept Diners' Club/Carte Blanche.");
		$(input_elem).addClass('error');
		return false;
	}

	if (cc_num.substr(0,1) != "4" && cc_num.substr(0,1) != "5" ){
		setAlert("#CCalert2", "We only accept Visa and MasterCard");
		$(input_elem).addClass('error');
		return false;
	}

	setAlert("#CCalert2","");
	$(input_elem).removeClass('error');
	return true;

}

function IsValidCC(str) { //A boolean version
    if (GetCreditCardTypeByNumber(str) == '?') return false;
    return true;
}

function cancelOrder(msg){
//console.log("Cancelling Order");
	$.xhrPool.abortAll();  // ignore current ajax requests
	$.ajax ({
	url : "AJAXcancelOrder.php",
	dataType: 'json',
	success: function(data){
//				console.log(data.status);
				if (data.status=="success") {
					if (msg) alert (cc_timeout_msg);
					clearTimeout(timer);
					}
				}
			});
}

