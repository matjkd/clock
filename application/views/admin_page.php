<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Clock Admin.</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
<style>
body {
font-size: 30px;
text-align:center;
}

select, input {
font-size: 40px;
text-align:center;
margin:5px;
padding:30px;
}
</style>
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
		
		</div>
	</body>
</html>
