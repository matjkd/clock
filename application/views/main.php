<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Clock</title>
         <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ui-lightness/jquery-ui.css" />
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style.css" />
		
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.jdigiclock.css" />
        <script type="text/javascript" src="<?=base_url()?>lib/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="<?=base_url()?>lib/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>lib/jquery.jdigiclock.js"></script>
        
        
      
    </head>
    <body>
     <input type="hidden" id="baseurl" value="<?= base_url() ?>"/> 
    <div id="targetwrap" style="display:none; position:absolute; opacity:1; margin:0 auto; width:95%; " >
    <div id="target" style="display:block; position:relative; opacity:1;">
    
    </div>
    </div>
    
    		<?php
		
		foreach($country as $row):
			
			$timezone = $row->timezone;
			$city = $row->city;
			$weather = $row->weather_code;
			
		endforeach;
		
		
		date_default_timezone_set($timezone);
		$timediff = (date('Z')/60)/60;
		//echo $timediff;
		//echo date('H');
		?>
		 
	
		
<script type="text/javascript">
		
		
	$(document).ready(function() {
	$.ajaxSetup({ cache: false });
	var clockversion = 1;
	var newDate;
	
	loadClock(1);
	
	setTimeout( function() {
	
	$('#targetwrap').fadeIn();
	},1000);
	
	
	var number = 1;
	
	setInterval( function() {
	//$('#hours2').empty();
	if(number == 5){ number = 1 }
	
	
	
	
	
	setTimeout( function() {
	
	$('#targetwrap').fadeOut(500, function() {
	$('#target').load('<?=base_url()?>index.php/welcome/ajaxclock/' + number);
	});
	},2000);
	
	
	
	setTimeout( function() {
	
	$('#targetwrap').fadeIn();
	},2000);
	
	number = parseInt(number) + 1;
				
	},6000);
	
	
	
	function nextclock() {		
	
	setTimeout( function() {
	
	('#targetwrap').stop().fadeIn(500);
	},1000);
	
	}
	
	function loadClock(e) {
	
	$('#target').load('<?=base_url()?>index.php/welcome/ajaxclock/' + e);	
	
	}
	
	
	
	
	
	
	
	
		
		
		
		
           
	            });
	        </script>
    </body>
</html>
