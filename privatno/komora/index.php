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
<div class="large 6 columns">
				<div class="callout large-6 columns">
					<div class="row">
						<div class="small-4 large-6 columns" align="left">
							<form method="GET">
								<input type="text" placeholder="Unesite broj komore" name="uvjet" 
								value="<?php echo $uvjet; ?>"/>	
							</form>
							
						<div class="row">
						<div class="small-4 large-6 columns" align="right">
					
							<a href="unosKomora.php" class="success button expanded">Dodaj novu komoru</a>
							
					
						
					<table style="text-align: left">
						<thead>
							<tr>
								<th>Broj komore</th>
								<th>Polje</th>
							
								
							</tr>
						</thead>
						<tbody>
							<?php 
							$izraz = $veza->prepare("select sifra,broj_komore,polje
							from komora 
							where broj_komore like :uvjet
							group by broj_komore,polje");
							$uvjet="%" . $uvjet . "%";
							$izraz->execute(array("uvjet"=>$uvjet));
							$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultati as $red) :
							?>
							<tr>
								<td><?php echo $red -> broj_komore; ?></td>
								<td><?php echo $red -> polje; ?></td>
				
								
								
								<td><a href="promjenaKomora.php?sifra=<?php echo $red -> sifra;

									if (isset($_GET["uvjet"])) {
										echo "&uvjet=" . $_GET["uvjet"];
									}
								?>">Promjeni</a> 
								
								
								<a href="brisanjeKomora.php?sifra=<?php echo $red -> sifra;
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