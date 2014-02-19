<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Clock Admin.</title>
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>css/bootstrap-theme.min.css" />

		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>css/style.css" />

		<script type="text/javascript" src="<?=base_url() ?>lib/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>js/bootstrap.min.js"></script>
<style>
	body {
		font-size: 30px;
		text-align: center;
	}

	select, input {
		font-size: 40px;
		text-align: center;
		margin: 5px;
		padding: 30px;
	}
</style>
	</head>
	<body>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-lg-12">
		 		<a href="<?=base_url() ?>">Back to Clock...</a>
		 		</div>
		 	</div>
		 	<div class="row">
		 		<?=form_open('clockadmin/update_clock') ?>
		 		<div class="col-lg-6"><h2>Locations</h2>
		 			
		 			<?php
$citiesarray[0] = 'none';
			foreach ($cities as $row):

				$citiesarray[$row -> id] = $row -> city;

			endforeach;
		?>
			<div><?=form_dropdown('City1', $citiesarray, 1) ?></div>
			
			<div><?=form_dropdown('City2', $citiesarray) ?></div>
			
			<div><?=form_dropdown('City3', $citiesarray) ?></div>
			
			<div><?=form_dropdown('City4', $citiesarray) ?></div>



	</div>
		 		
		 		<div class="col-lg-6">


<?php $timeout = array(
		
		10000 => '10 Seconds',
		20000 => '20 seconds',
		30000 => '30 seconds',
		60000 => '1 Minute'
		);?>
		
		<div><?=form_dropdown('timeout', $timeout) ?></div>
		
	<!-- <div class="btn-group" data-toggle="buttons"> -->
  <label class="btn btn-primary"> 
    <input type="radio" name="temp" id="option1" value="F"> Fahreneit
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="temp" id="option2" value="C" checked="checked"> Centigrade
  </label>
  

</div>
		 		
		 	</div>
		
		

		<div class="form-group">
		
		</div>
		
		
<!-- </div> -->
		
		<div>
		<?=form_submit('submit', 'Submit') ?>
		
		</div>
		<?=form_close() ?>
		
		<div>
		
		</div>
		</div>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$('.btn').button()
		});
			
		</script>
	</body>
</html>
