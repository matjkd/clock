
 <input type="hidden" id="baseurl" value="<?= base_url() ?>"/> 
		<?php
		
		foreach($country as $row):
			
			$timezone = $row->timezone;
			$city = $row->city;
			$weather = $row->weather_code;
			
		endforeach;
		
		
		date_default_timezone_set($timezone);
		$timediff = (date('Z')/60)/60;
		//echo $timediff;
		//echo human_to_unix(date());
		?>
		
	<input type="hidden" value="<?=date('H')?>"/>
		
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
      <li id="hours<?=$version?>"></li>
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
	var hourtimer = '';
	var offset = '';
	var diff = '';
	var time = '';
	var hours2 = '';
	$('#hours2').empty();
	
	clearInterval(hourtimer);
		$('#hours2').html('');
		$('#Date').html('');
		
	 newDate = new Date();
	
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
	
	hourtimer = setInterval( function() {
	
		// Create a newDate() object and extract the hours of the current time on the visitor's
		$('#hours<?=$version?>').html('');
		var hours2 = new Date().getHours();
		var offset = parseInt(<?=$timediff?>);
		var diff = hours2 + offset;
		
		if(diff < 0) { diff = 24 + diff; }
		var time =  diff;
		
		// Add a leading zero to the hours value
		$("#hours<?=$version?>").html(( time < 10 ? "0" : "" ) + time);
	    }, 1000);	
	});
	</script>
	        <script type="text/javascript">
	            $(document).ready(function() {
	            		
	            	$(function() {
	            	$('#digiclock1').jdigiclock({weatherLocationCode: "<?=$weather?>", weatherMetric: "<?=$temp?>"});
					
	            	
	            	
					//startRefresh();
					});
					
					
					
	           
	                
	            });
	        </script>
 