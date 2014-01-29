<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Clock Admin.</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>

	</head>
	<body>
		<a href="<?=base_url() ?>">Back to Clock...</a>
		
<?=form_open('clockadmin/update_clock')?>
		<div>
		<?php
		
		
		foreach($cities as $row):
			
			$citiesarray[$row->id] = $row->city;
			
		endforeach;
		?>
			<div><?=form_dropdown('City1', $citiesarray)?></div>
			
			<div><?=form_dropdown('City2', $citiesarray)?></div>
			
			<div><?=form_dropdown('City3', $citiesarray)?></div>
			
			<div><?=form_dropdown('City4', $citiesarray)?></div>

		</div>
		<div>
		<?=form_submit('submit', 'Submit')?>
		
		</div>
		<?=form_close()?>
		
		<div>
		<?php
		
		echo "TIME test<br/>";
		//$test = new DateTimeZone('America/New_York');
		//$time =  new DateTime("now", $test);
		//echo DateTime();
		date_default_timezone_set('Europe/London');
		
		
		echo date('l jS \of F Y h:i:s A');

		?>
		</div>
	</body>
</html>
