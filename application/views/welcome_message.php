<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>jDigiClock - Digital Clock (HTC Hero inspired).</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		
        <link rel="stylesheet" type="text/css" href="css/jquery.jdigiclock.css" />
        <script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="lib/jquery.jdigiclock.js"></script>
        
        
      
    </head>
    <body>
		<?php
		
		function get_timezone_offset($remote_tz, $origin_tz = null) {
		    if($origin_tz === null) {
		        if(!is_string($origin_tz = date_default_timezone_get())) {
		            return false;
		          //  TC timestamp was returned -- bail out!
		        }
		    }
		    $origin_dtz = new DateTimeZone($origin_tz);
		    $remote_dtz = new DateTimeZone($remote_tz);
		    $origin_dt = new DateTime("now", $origin_dtz);
		    $remote_dt = new DateTime("now", $remote_dtz);
		    $offset = $origin_dtz->getOffset($origin_dt) - $remote_dtz->getOffset($remote_dt);
		    return $offset;
		}
		
		$offset = get_timezone_offset('Europe/London', NULL);
		
		
		?>
		
		
        <div id="wrap">
           
            <div style="text-align: center;
margin: 0 auto;
width: 1000px;" id="digiclock"></div>
         
		   
		   
		   
		    <div class="clock">
<div id="Date"></div>
  <ul>
      <li id="hours2"></li>
      <li id="point">:</li>
      <li id="min"></li>
      
  </ul>
  <div id="city">Paris</div>
</div>


            </div>
			
	        <script type="text/javascript">
		
	$(document).ready(function() {
	// Create two variable with the names of the months and days in an array
	var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
	var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

	// Create a newDate() object
	var newDate = new Date();
	// Extract the current date from Date object
	newDate.setDate(newDate.getDate());
	// Output the day, date, month and year   
	$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
	
	setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();
		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	    },1000);
	
	setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours2 = new Date().getHours();
		// Add a leading zero to the hours value
		$("#hours2").html(( hours2 < 10 ? "0" : "" ) + hours2);
	    }, 1000);	
	});
	</script>
	        <script type="text/javascript">
	            $(document).ready(function() {
	                $('#digiclock').jdigiclock({weatherLocationCode: "EUR|UK|UK001|LONDON"});
	            });
	        </script>
    </body>
</html>
