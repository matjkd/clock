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
    <div id="target" style="display:none;">
    
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
	var clockversion = 1;
	$('#target').stop().load('<?=base_url()?>index.php/welcome/ajaxclock/1',{},function(){$('#target').fadeIn(1000)});
	
		
		
		
		
           
	            });
	        </script>
    </body>
</html>
