<script>
	Highcharts.chart('desni', {
		chart : {
			plotBackgroundColor : null,
			plotBorderWidth : null,
			plotShadow : false,
			type : 'pie'
		},
		title : {
			text : 'Tezina'
		},
		plotOptions : {
			pie :  {
		            dataLabels: {
		                distance: -30
		            }
		        }
		},
		series : [{
			name : 'Vrsta robe',
			colorByPoint : true,
			data : [
			<?php 
			
			$izraz = $veza->prepare("select a.tezina, sum(a.tezina) as ukupno
									from roba a inner join kooperant b on a.sifra=b.roba
									group by b.ime");
			$izraz->execute();
			$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $red) :
				?>
				{name : '<?php echo $red->ukupno; ?>',y : <?php echo $red->ime; ?>},
				<?php endforeach;?>
			
			]
		}]
	}); 
</script>