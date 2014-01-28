<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Clock</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		
        <link rel="stylesheet" type="text/css" href="css/jquery.jdigiclock.css" />
        <script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="lib/jquery.jdigiclock.js"></script>
        
        
      
    </head>
    <body>
		<?php
		
		foreach($country1 as $row):
			
			$timezone = $row->timezone;
			$city = $row->city;
			$weather = $row->weather_code;
			
		endforeach;
		
		$dateTimeZoneRemote = new DateTimeZone($timezone);
		$dateTimeZoneLocal = new DateTimeZone("UTC");

		// Create two DateTime objects that will contain the same Unix timestamp, but
		// have different timezones attached to them.
		$dateTimeRemote = new DateTime("now", $dateTimeZoneRemote);
		$dateTimeLocal = new DateTime("now", $dateTimeZoneLocal);
		
		// Calculate the GMT offset for the date/time contained in the $dateTimeTaipei
		// object, but using the timezone rules as defined for Tokyo
		// ($dateTimeZoneJapan).
		$offset = $dateTimeZoneLocal->getOffset($dateTimeRemote);
		
		
		
		
		?>
		
		
        <div id="wrap" style="position: relative; width: 1000px; margin: auto;">
         
         <div id="clock1_wrap" style="position:absolute; height:200px; border:0px solid #000; display:block;  text-align: center; margin: 0 auto; width: 1000px;">
  	<div  id="digiclock1"></div>
  	</div>


 <div id="clock2_wrap" style="position:absolute; height:200px; border:0px solid #e6f6d4; display:block; text-align: center; margin: 0 auto; width: 1000px;">
  	<div  id="digiclock2">
	</div>

</div>

<div class="clock">
<a href="<?=base_url()?>index.php/clockadmin"><div id="Date"></div></a>
  <ul>
      <li id="hours2"></li>
      <li id="point">:</li>
      <li id="min"></li>
      
  </ul>
  <div id="city"><a href="<?=base_url()?>"><?=$city?> <?=$offset?></a></div>

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
	            		
	            	$(function() {
	            	$('#digiclock1').jdigiclock({weatherLocationCode: "<?=$weather?>"});
					$('#digiclock2').jdigiclock({weatherLocationCode: "<?=$weather?>"});
	            	
	            var clockgo;
					startRefresh();
					});
					
					function startRefresh() {
						
						
					    setTimeout(startRefresh,100000);
					    
					    if($('#clock1_wrap').is(':visible')) {
					    $('#digiclock2').jdigiclock({weatherLocationCode: "<?=$weather?>"});
					   //alert('clock1 is visible');
					    clockgo = 1;
					    }
					    
					  	if($('#clock2_wrap').is(':visible'))  {
					  	$('#digiclock1').jdigiclock({weatherLocationCode: "<?=$weather?>"});
					  	// alert('clock2 is visible');
					    clockgo = 2;
					    }
					    
					    if( clockgo == 1) {
					    
					     $('#clock2_wrap').stop().fadeIn(1500).delay(1500);
					     $('#clock1_wrap').stop().fadeOut(1500).delay(1500);
					     
					    // alert('1 activated');
					     
					    // $('#digiclock2').jdigiclock({weatherLocationCode: "EUR|UK|UK001|LONDON"});
					     
					     
					    }
					    
					   
					    if( clockgo == 2) {
					    
					     $('#clock1_wrap').stop().fadeIn(1500).delay(1500);
					     $('#clock2_wrap').stop().fadeOut(1500).delay(1500);
					     
					   //  alert('2 activated');
					     
					    // $('#digiclock1').jdigiclock({weatherLocationCode: "EUR|UK|UK001|LONDON"});
					     
					     
					    }
					     
					   
					   
					    //$('#digiclock').fadeIn(1500);
					}
					
	           
	                
	            });
	        </script>
    </body>
</html>
