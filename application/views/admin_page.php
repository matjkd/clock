<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Clock Admin.</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>

	</head>
	<body>
		<a href="<?=base_url() ?>">Back to Clock</a>
		
<?=form_open('clockadmin/update_clock')?>
		<div>
		<?php
		$cities = array(
		
		'1' => 'London',
		'2' => 'Paris'
		
		);
		
		?>
			<div><?=form_dropdown('City1', $cities)?></div>

		</div>
		<?=form_close()?>
	</body>
</html>
