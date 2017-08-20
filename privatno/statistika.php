<?php include_once '../konfiguracija.php'; provjeraLogin(); ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php include_once '../predlosci/head.php'; ?>
	</head>
	<body bgcolor="E9967A">
		<?php include_once '../predlosci/meni.php'; ?>
		<div class="row">
			<div class="large-12 columns">
				<div class="callout">
					<div class="row">
						<div class="large-12 columns">
							<div id="desni"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php	include_once '../skripte.php'; ?>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<?php	include_once 'statistikaSkripta.php'; ?>
	</body>
</html>