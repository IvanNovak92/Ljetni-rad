<?php
include_once '../../konfiguracija.php';
provjeraLogin();
 ?>
<?php
$uvjet = isset($_GET["uvjet"]) ? $_GET["uvjet"] : "";
?>
<head> <?php
include_once '../../predlosci/head.php';
  ?>
	
</head>
<body bgcolor="E9967A">
	<?php
	include_once '../../predlosci/meni.php';
  ?>
	<div class="row" align="center">
<div class="large 12 columns">
				<div class="callout">
					<div class="row">
						<div class="small-4 large-6 columns" align="center">
							<form method="GET">
								<input type="text" placeholder="Unesite vrstu robe" name="uvjet" 
								value="<?php echo $uvjet; ?>"/>	
							</form>
							
						
						<div class="small-4 large-6 columns" align="left">
							<a href="unosRobe.php" class="success button expanded">Dodaj robu</a>
							
					
						
					<table style="text-align: left">
						<thead>
							<tr>
								<th>Vrsta robe</th>
								<th>Datum berbe</th>
								<th>Datum skladištenja</th>
								<th>Vrsta boxa</th>
								<th>Komada boxa</th>
								<th>Težina robe</th>						
							</tr>
						</thead>
						<tbody>
							<?php 
							$izraz = $veza->prepare("select sifra,vrsta_robe,datum_berbe,datum_skladistenja,
							vrsta_boxa,komad_boxa
							from roba where 
							vrsta_robe like :uvjet
							group by sifra,vrsta_robe,datum_berbe,datum_skladistenja,
							vrsta_boxa,komad_boxa");
							$uvjet="%" . $uvjet . "%";
							$izraz->execute(array("uvjet"=>$uvjet));
							$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultati as $red) :
							?>
							<tr>
								<td><?php echo $red -> vrsta_robe; ?></td>
								<td><?php echo $red -> datum_berbe; ?></td>
								<td><?php echo $red -> datum_skladistenja; ?></td>
								<td><?php echo $red -> vrsta_boxa; ?></td>
								<td><?php echo $red -> komad_boxa; ?></td>
								
							
								<td><a href="promjenaRobe.php?sifra=<?php echo $red -> sifra;

								if (isset($_GET["uvjet"])) {
									echo "&uvjet=" . $_GET["uvjet"];
								}
								?>">Promjeni</a> 
								
								
								<a href="brisanjeRobe.php?sifra=<?php echo $red -> sifra;
									if (isset($_GET["uvjet"])) {
										echo "&uvjet=" . $_GET["uvjet"];
									}
								?>">Obriši</a>
								
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					</div>		
					</div>
					</div>
					</div>
			</div>
		</div>
		
		
		<?php
		include_once '../../skripte.php';
 ?>
		
	</body>
</html>